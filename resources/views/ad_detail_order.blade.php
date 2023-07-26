<?php /*
include('koneksi.php');

$id_menu = $_GET['id_menu'];

$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
*/
?>

    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


    <title>Detail Pesanan</title>
</head>
<body>

<!-- Form Registrasi -->

<div class="container">
    <h3 class="text-center mt-3 mb-5">Detail Pesanan</h3>
    <div class="card p-5 mb-5">
        <p>Nama Pembeli     : {{$notas[0]['nama_pembeli']}}</p>
        <p>Alamat Pembeli   : {{$notas[0]['alamat_pembeli']}}</p>
        <p>No HP Pembeli    : {{$notas[0]['no_hp']}}</p>
        <p>
            Kode Pesanan     : <b>{{$notas[0]['kode_pesan']}}</b>
        </p>

        <table class="table table-bordered" id="order">
            <thead class="thead-light">
            <tr class="judul">
                <th scope="row">No</th>
                <th scope="row">Nama Produk</th>
                <th scope="row">Harga Satuan</th>
                <th scope="row">Jumlah</th>
                <th scope="row">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notas as $index => $prod)
                <tr class="judul">
                    <th scope="row">{{$index+1}}</th>
                    <th scope="row">{{$prod['nama_produk']}}</th>
                    <th scope="row">Rp {{$prod['harga']}}</th>
                    <th scope="row">{{$prod['qty']}}</th>
                    <th scope="row">Rp {{($prod['qty']*$prod['harga'])}}</th>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="4"></th>
                <th>Rp {{$notas[0]['total']}}</th>
            </tr>
            </tfoot>

        </table>

        <form>
            <a class="btn btn-primary" style="float:right" href="/ad_by_order" >Kembali</a>
        </form>
    </div>
</div>

<!-- Akhir Form Registrasi -->




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</body>
</html>
