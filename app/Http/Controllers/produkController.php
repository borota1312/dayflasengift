<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\produk;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Facades\File;

class produkController extends Controller
{

    public function index()
    {

        $data = produk::orderBy('id', 'asc')->paginate();
        return view('produk.ad_produks')->with('data', $data);
    }

    public function create()
    {
        $data = [
            'kategori' => Kategori::all(),
        ];
        return view('produk.tambah_produk', $data);
    }

    public function store(Request $request)
    {
        $form = $request->validate([
            'kategori_id' => ['required', 'exists:kategori,id'],
            'sub_kategori_id' => ['nullable'],
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'gambar' => 'required',
        ], [
            'kategori_id' => 'Kategori wajib dipilih',
            'nama_produk' => 'Nama produk wajib diisi',
            'deskripsi' => 'Deskripsi wajib diisi',
            'harga' => 'Harga wajib diisi',
            'gambar' => 'Gambar produk wajib diisi',
        ]);

        if (isset($request['gambar'])) {
            $declare_path = 'image/';

            //code for remove old file
            \File::exists(public_path($declare_path . $request['gambar']) ?: (\File::delete(public_path($declare_path . $request['gambar']))));

            //upload new file
            $file = $request['gambar'];
            $filename = $declare_path . $file->getClientOriginalName();
            $file->move($declare_path, $filename);
            $form['gambar'] = $filename;
        }
        // dd($form);
        produk::create($form);

        return redirect()->to('produk')->with('success', 'Berhasil Menambahkan Data');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'data' => produk::where('id', $id)->first(),
            'kategori' => Kategori::all(),
        ];
        return view('produk.edit_produk', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kategori_id' => ['required', 'exists:kategori,id'],
            'sub_kategori_id' => ['nullable'],
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'gambar' => 'nullable',
        ], [
            'kategori_id' => 'Kategori wajib dipilih',
            'nama_produk' => 'Nama produk wajib diisi',
            'deskripsi' => 'Deskripsi wajib diisi',
            'harga' => 'Harga wajib diisi',
            'gambar' => 'Gambar produk wajib diisi',
        ]);

        if (isset($request['gambar'])) {
            $declare_path = 'image/';

            //code for remove old file
            \File::exists(public_path($declare_path . $request['gambar']) ?: (\File::delete(public_path($declare_path . $request['gambar']))));

            //upload new file
            $file = $request['gambar'];
            $filename = $declare_path . $file->getClientOriginalName();
            $file->move($declare_path, $filename);
            $data['gambar'] = $filename;
        }
        produk::where('id', $id)->update($data);

        return redirect()->to('produk')->with('success', 'Berhasil Mengupdate Data');
    }

    public function destroy($id)
    {
        produk::where('id', $id)->delete();
        return redirect()->to('produk')->with('success', 'Berhasil Melakukan Delete');
    }

    public function subKategori(Request $request)
    {
        $data = SubKategori::where('kategori_id', $request->query('kategori_id'))->get();
        return response()->json($data);
    }
}
