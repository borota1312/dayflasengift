<?php
/*
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Fredoka+One&display=swap"
        rel="stylesheet">
    <title>Dayflasen Gift</title>
</head>

<body>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4 font-mamasha">
                <img src="{{ asset('images') }}/Icon/LOGO2.png" height="200px" height="50px" align="left">
                <font face="Abril Fatface">Dayflasen Gift</font>
            </h1>
            <h5 class="lead font-weight-bold">Jl. Pahlawan Seberang Masjid No.07
                <br>
                Banjarmasin
            </h5>
        </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- Akhir Navbar -->

    <!-- Menu -->
    <div class="container">
        <div class="judul text-center mt-5">
            <h3 class="font-weight-bold">{{ $subKategori->nama }}</h3>
            @foreach ($subKategori->produk as $item)
                <div class="col-md-3 mt-4" style="float: left;  padding-bottom: 50px;">
                    <div class="card brder-dark">
                        <img src="{{ url('') }}/{{ $item->gambar }}" width="600" height="250"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"></h5>
                            <label class="card-text harga"><strong>{{ $item->nama_produk }}</strong> </label><br><br>
                            <label class="card-text harga">{{ $item->deskripsi }}</label><br><br>
                            <label class="card-text harga"><strong>Rp{{ $item->harga }}</strong> </label><br>
                            <a href="" id="addCart" data-id="{{$item->id}}" class="btn btn-success btn-sm btn-block ">Pesan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Akhir Menu -->

    <!-- Awal Footer -->
    <hr class="footer" style="clear: left;">
    <div class="container">
        <div class="row footer-body">
            <div class="col-md-6">
                <div class="copyright">
                    <strong>Copyright</strong> <i class="far fa-copyright"></i> 2020 - Designed by Alfirdaus&Rinaldo</p>
                </div>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
                <div class="icon-contact">
                    <label class="font-weight-bold">Follow Us </label>
                    <a href="#"><img src="{{ asset('images') }}/icon/fb.png" class="mr-3 ml-4"
                            data-toggle="tooltip" title="Facebook"></a>
                    <a href="#"><img src="{{ asset('images') }}/icon/ig.png" class="mr-3" data-toggle="tooltip"
                            title="Instagram"></a>
                    <a href="#"><img src="{{ asset('images') }}/icon/twitter.png" class=""
                            data-toggle="tooltip" title="Twitter"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Footer -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            let url = '{{route("addtocart")}}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on("click", "#addCart", function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                // console.log(id)
                $.ajax({
                    url,
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id_product: id,
                    },
                    success: function (data) {
                        Swal.fire(
                            'Berhasil',
                            data.success,
                            'success'
                        )
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });
        });
    </script>
</body>

</html>
<?php /* } */ ?>
