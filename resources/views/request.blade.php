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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


    <title>Form Request</title>
  </head>
  <body>
 
 <!-- Form Registrasi -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN REQUEST</h3>
    <div class="card p-5 mb-5">
      <form method="" action="nota" enctype="multipart/form-data">
        <div class="form-group">
          <label for="menu1">Nama Bucket</label>
          <input type="hidden" name="id_menu" value="<?php // echo $result[0]['id_menu'] ?>">
          <input type="text" class="form-control" id="menu1" name="nama_menu" value="<?php // echo $result[0]['nama_menu'] ?>">
        </div>
        <div class="form-group">
          <label for="#">Jenis</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="jenis" value="Bucket">Bucket 
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input"  name="jenis" value="Akrilik">Akrilik
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="jenis" value="Hampers">Hampers
            </label>
          </div>
         </div>
        <div class="form-group">
          <label for="stok1">Isian</label>
          <input type="text" class="form-control" id="isian1" name="isian" placeholder="Isian barang yang diinginkan" value="<?php //echo $result[0]['stok'] ?>">
        </div>
        <div class="form-group">
          <label for="harga1">Deskripsi</label>
          <input type="text" class="form-control" id="isian1" name="harga" placeholder="Penjelasan request mau seperti apa" value="<?php //echo $result[0]['harga'] ?>">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="tambah" href="nota" >Pesan</button>
        <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
        <a type="submit" class="btn btn-primary" style="float:right" name="Kembali" href="user" >Kembali</a>
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
  </body>
</html>