<?php /*
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{ */
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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
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
                <img src="images/Icon/LOGO2.png" height="200px" height="50px" align="left">
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
    @include('layouts.ad_navbar')
    <!-- Akhir Navbar -->

   <!-- Form Login -->

   <div class="container">
    <div class="judul text-center mt-5">
        <h3 class="font-weight-bold">CEK PESANANAN</h3>
    </div>
    <hr>
       <table class="table table-bordered" id="order">
           <thead class="thead-light">
           <tr class="judul">
               <th scope="row">No</th>
               <th scope="row">Nama Pemesan</th>
               <th scope="row">Kode Pemesanan</th>
               <th scope="row">Alamat</th>
               <th scope="row">No HP</th>
               <th scope="row">Status</th>
               <th scope="row">Detail</th>
           </tr>
           </thead>
           @if(count($notas)==0)
               <tr class="judul">
                   <td style="text-align: center" colspan="6">Belum ada pesanan di toko ini</td>
               </tr>
           @else
               @foreach($notas as $index => $prod)
                   <tr class="judul">
                       <th scope="row">{{$index+1}}</th>
                       <th scope="row">{{$prod['nama_pembeli']}}</th>
                       <th scope="row">{{$prod['kode_pesan']}}</th>
                       <th scope="row">{{$prod['alamat_pembeli']}}</th>
                       <th scope="row">{{$prod['no_hp']}}</th>
                       <th scope="row">
                           @if($prod['status']=='Proses')
                               <button id="gantiStatus"
                                       data-id="{{$prod['id']}}"
                                       class="btn btn-warning btn-sm">
                                   {{$prod['status']}}
                               </button>
                           @else
                               <button id="gantiStatus"
                                       data-id="{{$prod['id']}}"
                                       class="btn btn-success btn-sm" disabled>
                                   {{$prod['status']}}
                               </button>
                           @endif
                       </th>
                       <th scope="row">
                           <a class="btn btn-info btn-sm" href="{{route('detail_pesanan',$prod['id'])}}">
                               Detail Barang
                           </a>
                       </th>
                   </tr>
               @endforeach
           @endif

       </table>
   </div>
<!-- Akhir Form Login -->

    <!-- Awal Footer -->
    <hr class="footer">
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
                    <a href="#"><img src="images/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip"
                            title="Facebook"></a>
                    <a href="#"><img src="images/icon/ig.png" class="mr-3" data-toggle="tooltip"
                            title="Instagram"></a>
                    <a href="#"><img src="images/icon/twitter.png" class="" data-toggle="tooltip"
                            title="Twitter"></a>
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
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            var table = $('#order').DataTable({
                // ordering: false,
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on("click", "#gantiStatus", function(e) {
                let url = '{{route("update_status")}}';
                let id = $(this).data('id');
                // console.log('ganti'+id)
                $.ajax({
                    url,
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        // console.log(data.success)
                        Swal.fire(
                            'Berhasil',
                            data.success,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });


        })
    </script>
</body>

</html>
<?php /* } */ ?>
