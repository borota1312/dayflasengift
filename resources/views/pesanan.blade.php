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


    <title>Form Pesanan</title>
  </head>
  <body>

 <!-- Form Registrasi -->

  <div class="container">
    <h3 class="text-center mt-3 mb-5">PESANAN</h3>
    <div class="card p-5 mb-5">
{{--      <form method="POST" action="" enctype="multipart/form-data">--}}
          <form>
       <div class="form-group">
          <label for="kode1">Kode Pesanan</label>
          <input type="text" class="form-control" id="Kode1" name="kode_pesan" readonly value="{{$kode_pesan}}">
       </div>
      <div class="form-group">
          <label for="menu1">Nama Pemesan</label>
          <input type="text" class="form-control" id="menu1" name="nama" value="" required>
          <div style="display:none; color:red" id="nama_check">
              Isi Nama Anda!
          </div>
      </div>
        <div class="form-group">
          <label for="#">Jenis</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-laki">Laki-laki
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input"  name="jenis_kelamin" value="Perempuan">Perempuan
            </label>
          </div>
            <div style="display:none; color:red" id="jk_check">
                Pilih Jenis Kelamin Anda!
            </div>
        </div>
        <div class="form-group">
          <label for="No_HP1">No Hp</label>
          <input type="text" class="form-control" id="Np_HP1" name="no_hp" value="">
            <div style="display:none; color:red" id="hp_check">
                Isi No HP Anda!
            </div>
        </div>
        <div class="form-group">
          <label for="Alamat1">Alamat</label>
          <input type="text" class="form-control" id="Alamat1" name="alamat"  value="">
            <div style="display:none; color:red" id="alamat_check">
                Isi Alamat Anda!
            </div>
        </div>
       <br>
        <button type="submit" class="btn btn-primary" id="submit" >Pesan</button>
        <button type="reset" class="btn btn-danger">Hapus</button>
        <a class="btn btn-primary" style="float:right" name="Kembali" href="/nota" >Kembali</a>
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
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script type="text/javascript">
     $(document).ready(function() {
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         $(document).on("keyup", "input[name=nama]", function(e) {
             e.preventDefault();
             $("#nama_check").hide();
         });
         $(document).on("change", "input[name=jenis_kelamin]", function(e) {
             e.preventDefault();
             $("#jk_check").hide();
         });
         $(document).on("keyup", "input[name=no_hp]", function(e) {
             e.preventDefault();
             $("#hp_check").hide();
         });
         $(document).on("keyup", "input[name=alamat]", function(e) {
             e.preventDefault();
             $("#alamat_check").hide();
         });
         $(document).on("click", "#submit", function(e) {
             e.preventDefault();
             let url = '{{route("postpembeli")}}';

             let nama = $("input[name=nama]").val();
             let kode_pesan = $("input[name=kode_pesan]").val();
             let jk = $("input[name=jenis_kelamin]:checked").val();
             let no_hp = $("input[name=no_hp]").val();
             let alamat = $("input[name=alamat]").val();

             if (nama==''){
                 $("#nama_check").show();
             }else if ($("input[name=jenis_kelamin]:checked").length == 0) {
                 $("#jk_check").show();
             }else if (no_hp=='') {
                 $("#hp_check").show();
             }else if (alamat=='') {
                 $("#alamat_check").show();
             } else {
                 $.ajax({
                     url,
                     method: "POST",
                     dataType: "JSON",
                     data: {
                         nama: nama,
                         kode_pesan: kode_pesan,
                         jk: jk,
                         no_hp: no_hp,
                         alamat: alamat
                     },
                     success: function(data) {
                         // console.log(data.success);
                         Swal.fire(
                             'Berhasil',
                             data.success,
                             'success'
                         ).then((result) => {
                             if (result.isConfirmed) {
                                 window.location.href = '{{route("byorder")}}';
                             }
                         });
                     },error: function(e) {
                         console.log(e)
                     }
                 });
             }

         });
     });
 </script>
  </body>
</html>
