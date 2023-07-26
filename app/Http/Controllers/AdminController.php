<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Nota;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function byOrder(Request $request)
    {
        $notas = Nota::query()
            ->select(['notas.id','notas.kode_pesan','notas.status','pembelis.*'])
            ->join('pembelis','pembelis.id','=','notas.pembeli_id')
            ->orderBy('notas.id', 'asc')
            ->paginate();
        return view('ad_by_order',compact('notas'));
    }

    public function updateStatus(Request $request)
    {
        $id_nota = $request->id;

        $getNota = Nota::query()->find($id_nota);
        $idpembeli = $getNota->pembeli_id;
        $kodepesan = $getNota->kode_pesan;

        $getpem = Pembeli::query()->find($idpembeli);
        $nama = $getpem->nama_pembeli;

        $getNota->status = 'Selesai';
        $getNota->save();
        $pesan = "Pesanan dari ".$nama.", dengan Kode Pesan ".$kodepesan." berhasil diubah statusnya.";

        return response()->json(['success'=>$pesan]);
    }

    public function detailPesanan($id)
    {
        $notas = Nota::query()
            ->join('pembelis','pembelis.id','=','notas.pembeli_id')
            ->join('detail_notas','detail_notas.notas_id','=','notas.id')
            ->join('produks','produks.id','=','detail_notas.produk_id')
            ->where('detail_notas.notas_id','=',$id)
            ->get([
                'notas.*',
                'pembelis.*',
                'detail_notas.*',
                'produks.*'
            ]);
//        dd($notas);
        return view('ad_detail_order',compact('notas'));
    }
}
