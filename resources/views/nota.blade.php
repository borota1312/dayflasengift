
  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Fredoka+One&display=swap" rel="stylesheet">
    <title>Kedai</title>
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
    @include('layouts.navbar')
    <!-- Akhir Navbar -->

    <!-- Menu -->
    <div class="container">
      <div class="judul-pesanan text-center  mt-5">
        <h3 class="text-center font-weight-bold">PESANAN ANDA</h3>
      </div><br>

      <form method="GET" action="/nota">
        <div class="form-group text-center ">
          <label for="exampleInputEmail1">Kode Pemesanan</label>
            <div style="width:50%; float:absolute; left:280px" class="input-group">
              <div class="input-group-prepend">
              </div>
              <input type="text" class="form-control" style="text-align: center" placeholder="Masukkan Kode Pemesan" name="kode_pesan">
            </div>
        </div>
        <div class="mb-1" >
          <small><a href="/" class="text-dark">Pesan barang telebih dahulu</a></small>
        </div>
        <br>

      </form>
      <table class="table table-bordered" id="example" style="text-align: center">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga Satuan</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
        @if($kode_pesan!='belum ada')
            @if(count($produks)==0)
                <tr>
                    <td style="text-align: center" colspan="5">Belum ada produk di keranjang anda</td>
                </tr>
            @else
                @foreach($produks as $index => $prod)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$prod['nama']}}</td>
                        <td>Rp {{$prod['harga']}}</td>
                        <td>
                            <input onkeyup="Hitunghbarang()"
                                   value="{{$prod['qty']}}"
                                   data-id="{{$prod['id']}}"
                                   id="quantity{{$prod['id']}}"
                                   data-price="{{$prod['harga']}}"
                                   type="text" name="quantity" style="text-align: center">
                        </td>
                        <td id="totalh{{$prod['id']}}"></td>
                    </tr>
                @endforeach
            @endif
        @else
            <tr>
                <td style="text-align: center" colspan="5">Belum ada produk di keranjang anda</td>
            </tr>
        @endif
        </tbody>
        <tfoot>
          <tr>
            <th colspan="4">Kode Pesanan : {{$kode_pesan}}</th>

            <th colspan="2" id="subtotal"></th>
          </tr>
        </tfoot>
      </table>



      <br>
{{--      <form>--}}
          <a href="/" class="btn btn-primary btn-sm">Tambah Produk</a>
          <button class="btn btn-success btn-sm" onclick="window.location.href='{{route('checkout',$kode_pesan)}}';" id="checkout" disabled>Konfirmasi Pesanan</button>
          <button class="btn btn-danger btn-sm" name="bayar" onclick="printData()">Cetak Pesanan</button>
          <a type="submit" class="btn btn-primary" style="float:right" name="Kembali" href="/" >Kembali</a>
{{--      </form>--}}


    </div>

    <!-- Akhir Menu -->


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
            <a href="#"><img src="images/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
            <a href="#"><img src="images/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
            <a href="#"><img src="images/icon/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Footer -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        let kodep = "{{$kode_pesan}}";
        let hti = "{{count($produks)}}";
        let total_items ='';
        let data_barang ='';
        let total = 0;
        if (hti>0){
            total_items = @json($produks);
            document.getElementById("checkout").disabled = false;
        }

        let htotal = [];
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on("keyup", "input[name=quantity]", function(e) {
                e.preventDefault();
                let url = '{{route("updateqty")}}';
                let id = $(this).data('id');
                let qty = $(this).val();
                $.ajax({
                    url,
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        kode_pesan: kodep,
                        qty: qty
                    },
                    success: function(data) {
                        console.log(data.success)
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });
        });

        Hitunghbarang();

        function Hitunghbarang() {
            let subtotal = 0;
            let totalAll = 0;

            for (i = 0; i < total_items.length; i++) {
                let idne = total_items[i]['id'];
                itemID = document.getElementById("quantity" + idne);
                if (typeof itemID == 'undefined' || itemID == null) {
                    alert("No such item - " + "quantity" + idne);
                } else {
                    htotal[idne] = parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
                    subtotal = subtotal + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
                }
                document.getElementById("totalh" + idne).innerHTML = 'Rp '+parseInt(htotal[idne]);
            }
            document.getElementById("subtotal").innerHTML = 'Rp '+ parseInt(subtotal);
            total = subtotal;
        }
    </script>
  </body>

  </html>
