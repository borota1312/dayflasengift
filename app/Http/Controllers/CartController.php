<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
//            $request->session()->forget('nama'); buat hapus session
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
        if($request->session()->has('kode_pesan')){
            if ($request->has('kode_pesan')){
                $kode_pesan = $request->kode_pesan;
                $get = Cart::query()->where('kode_pesan','=',$kode_pesan)->get();
                $produks = [];
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
                $produks = [];
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
            return view('nota',compact('kode_pesan'));
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
}
