<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailNota;
use App\Models\Nota;
use App\Models\Pembeli;
use App\Models\produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function addTo(Request $request)
    {
        $produk = $request->id_product;
        $gp = produk::query()->find($produk);
        $nama_produk = $gp->nama_produk;

        $randomString = Str::random(7);
        $getKodeCart = Cart::query()->where('kode_pesan','=',$randomString)->get();

        if (count($getKodeCart)>0) {
            $randomString = Str::random(7);
        }

        if(!$request->session()->has('kode_pesan')){
            $kode_pesan = $randomString;
            $request->session()->put('kode_pesan',$kode_pesan);
//            $request->session()->forget('kode_pesan'); buat hapus session
        }else {
            $kode_pesan = $request->session()->get('kode_pesan');
        }

        $getProduct = Cart::query()
            ->where('kode_pesan','=',$kode_pesan)
            ->where('produk_id','=',$produk)
            ->first();
        if (isset($getProduct)){
            $jumlah = $getProduct->qty;
            $qty = $jumlah+1;
            $getProduct->qty = $qty;
            $getProduct->save();
            $pesan = $nama_produk." sudah ada dikeranjang, dan sekarang jumlahnya jadi ".$qty;
        }else{
            $qty = 1;
            Cart::query()->insert([
                'kode_pesan' => $kode_pesan,
                'produk_id' => $produk,
                'qty' => $qty,
                'created_at' => Carbon::now()
            ]);
            $pesan = $nama_produk." berhasil ditambah ke keranjang anda.";
        }

        return response()->json(['success'=>$pesan]);
    }

    public function nota(Request $request){
        $kode_pesan = 'belum ada';
        $produks = [];
        if($request->session()->has('kode_pesan')){
            if ($request->has('kode_pesan')){
                $kode_pesan = $request->kode_pesan;
                $get = Cart::query()->where('kode_pesan','=',$kode_pesan)->get();
//                $produks = [];
                foreach ($get as $g){
                    $getP = produk::query()->find($g->produk_id);
                    $nama = $getP->nama_produk;
                    $harga = $getP->harga;
                    $produks[]= [
                        'id'=>$g->produk_id,
                        'nama'=>$nama,
                        'harga'=>$harga,
                        'qty'=>$g->qty
                    ];
                }
//            dd($produks);
                return view('nota', compact('kode_pesan','produks'));
            }else{
                $kode_pesan = $request->session()->get('kode_pesan');
                $get = Cart::query()->where('kode_pesan','=',$kode_pesan)->get();
//                $produks = [];
                foreach ($get as $g){
                    $getP = produk::query()->find($g->produk_id);
                    $nama = $getP->nama_produk;
                    $harga = $getP->harga;
                    $produks[]= [
                        'id'=>$g->produk_id,
                        'nama'=>$nama,
                        'harga'=>$harga,
                        'qty'=>$g->qty
                    ];
                }

//            dd($produks);
                return view('nota', compact('kode_pesan','produks'));
            }
        } else{
            return view('nota',compact('kode_pesan','produks'));
        }
    }

    public function updateQty(Request $request)
    {
        $id_produk = $request->id;
        $qty = $request->qty;
        $kode_pesan = $request->kode_pesan;

        $getProduct = Cart::query()
            ->where('kode_pesan','=',$kode_pesan)
            ->where('produk_id','=',$id_produk)
            ->first();
        $getProduct->qty = $qty;
        $getProduct->save();


        return response()->json(['success'=>'berhasil']);
    }

    public function checkout($kode_pesan)
    {
        return view('pesanan', compact('kode_pesan'));
    }

    public function postPembeli(Request $request)
    {
        $nama = strtoupper($request->nama);
        $kode_pesan = $request->kode_pesan;
        $jk = strtoupper($request->jk);
        $no_hp = $request->no_hp;
        $alamat = strtoupper($request->alamat);
        $idpembeli = '';

        $getidpembeli = Pembeli::query()
            ->where('nama_pembeli','=',$nama)
            ->where('alamat_pembeli','=',$alamat)
            ->where('no_hp','=',$no_hp)
            ->where('jenis_kelamin','=',$jk)
            ->first();

        if (isset($getidpembeli)){
            $idpembeli = $getidpembeli->id;
        }
        else{
            Pembeli::query()->insert([
                'nama_pembeli' => $nama,
                'alamat_pembeli' => $alamat,
                'no_hp' => $no_hp,
                'jenis_kelamin' => $jk,
                'created_at' => Carbon::now()
            ]);
            $getidpembeli2 = Pembeli::query()
                ->where('nama_pembeli','=',$nama)
                ->where('alamat_pembeli','=',$alamat)
                ->where('no_hp','=',$no_hp)
                ->where('jenis_kelamin','=',$jk)
                ->first();
            $idpembeli = $getidpembeli2->id;
        }

        $getcart = Cart::query()->where('kode_pesan','=',$kode_pesan)->get();
        $barang= [];
        $total = 0;
        foreach ($getcart as $gc){
            $id_produk = $gc->produk_id;
            $qty = $gc->qty;
            $getprod = produk::query()->find($id_produk);
            $harga = $getprod->harga;
            $total = $total+$qty*$harga;
            $barang[]=[
                'id_produk'=>$id_produk,
                'qty'=>$qty
            ];
        }
        Nota::query()->insert([
            'kode_pesan' => $kode_pesan,
            'pembeli_id' => $idpembeli,
            'tanggal_pemesanan' => Carbon::now()->format('d-m-Y'),
            'total' => $total,
            'status' => 'Proses',
            'created_at' => Carbon::now()
        ]);
        $getidnota = Nota::query()
            ->where('kode_pesan','=',$kode_pesan)
            ->where('pembeli_id','=',$idpembeli)
            ->where('total','=',$total)
            ->where('status','=','Proses')
            ->first();
        $idnota = $getidnota->id;
        foreach ($barang as $b){
            $idbarang=$b['id_produk'];
            $qtybarang=$b['qty'];
            DetailNota::query()->insert([
                'notas_id' => $idnota,
                'produk_id' => $idbarang,
                'qty' => $qtybarang,
                'created_at' => Carbon::now()
            ]);

            $getidcart = Cart::query()
                ->where('kode_pesan','=',$kode_pesan)
                ->where('produk_id','=',$idbarang)
                ->where('qty','=',$qtybarang)
                ->first();
            $idcart = $getidcart->id;
            $cart = Cart::query()->find($idcart);
            $cart->delete();
            $request->session()->forget('kode_pesan');
        }

        return response()->json(['success'=>'Berhasil Konfirmasi Pemesanan']);
    }

    public function byOrder(Request $request)
    {
        $notas = '';
        if ($request->has('kode_pesan')){
            $notas = Nota::query()
                ->join('pembelis','pembelis.id','=','notas.pembeli_id')
                ->where('notas.kode_pesan','=',$request->kode_pesan)
                ->get(['notas.id','notas.kode_pesan','notas.status','pembelis.*']);
        }else{
            $notas = Nota::query()
                ->join('pembelis','pembelis.id','=','notas.pembeli_id')
                ->get(['notas.id','notas.kode_pesan','notas.status','pembelis.*']);
        }
//        dd($notas);
        return view('by_order',compact('notas'));
    }
}
