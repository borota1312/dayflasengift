<?php
use Illuminate\Support\Facades\Form;

?>
<!doctype html>
<html lang="en">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<title>Form Tambah Menu</title>
</head>

<body>

    <!-- Form Registrasi -->
    <div class="container">
        <h3 class="text-center mt-3 mb-5">SILAHKAN TAMBAH PRODUK</h3>
        <div class="card p-5 mb-5">
            @if ($errors->any())
                <div class="pt-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('produk.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if (Session::has('success'))
                    <div class="pt-3">
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif


                <div class="form-group">

                    <label for="menu1">Nama Produk</label>
                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="menu1"
                        value="{{ old('nama_produk') ?? $data->nama_produk }}" name="nama_produk" required>
                    @error('nama_produk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="#">Jenis Produk</label>
                    @foreach ($kategori as $item)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" id="kategori_id_old" value="{{ $data->kategori_id }}">
                                <input type="radio"
                                    class="form-check-input @error('kategori_id') is-invalid @enderror"
                                    value="{{ $item->id }}" id="kategori_id" name="kategori_id"
                                    {{ (old('kategori_id') ?? $data->kategori_id) == $item->id ? 'checked' : '' }}
                                    required onchange="getSubKategori(this.value)">
                                {{ $item->nama }}
                            </label>
                        </div>
                    @endforeach
                    @error('kategori_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sub-kategori">Sub Kategori</label>
                    <input type="hidden" id="sub_kategori_id_old" value="{{ $data->sub_kategori_id }}">
                    <select name="sub_kategori_id" id="sub_kategori_id" type="text"
                        class="form-control form-control-sm @error('sub_kategori_id') is-invalid @enderror">
                        <option value="">Silakan Pilih</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga1">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="harga1"
                        value="{{ old('deskripsi') ?? $data->deskripsi }}" name="deskripsi" required />
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga1">Harga Menu</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga1"
                        value="{{ old('harga') ?? $data->harga }}" name="harga" required />
                    @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="gambar">Foto Menu</label>
                    <input type="file" class="form-control-file border @error('gambar') is-invalid @enderror"
                        id="gambar" value="{{ Session::get('gambar') }}" name="gambar" />
                    @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><br>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
                <a type="submit" class="btn btn-primary" style="float:right" name="Kembali"
                    href="{{ url('produk') }}">Kembali</a>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript">
    getSubKategori();

    function getSubKategori(a) {
        let kategori_id = $("#kategori_id").val();
        let sub_kategori_id_old = $('#sub_kategori_id_old').val();
        let sub_kategori_id = $("#sub_kategori_id");
        $.ajax({
            url: "{{ route('produk.sub-kategori') }}",
            type: 'GET',
            data: {
                kategori_id: a || kategori_id
            }
        }).then(function(response) {
            console.log(response)
            sub_kategori_id.empty();
            sub_kategori_id.append('<option value="">Silahkan Pilih</option>');
            response.forEach(function(val) {
                if (val.id == sub_kategori_id_old) {
                    sub_kategori_id.append('<option selected value="' + val.id + '">' + val.nama +
                        '</option>');
                } else {
                    sub_kategori_id.append('<option value="' + val.id + '">' + val.nama + '</option>');
                }
            });
        });
    }
</script>
