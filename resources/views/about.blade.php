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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="public/fontawesome/css/all.min.css">


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
    @include('layouts.navbar')
    <!-- Akhir Navbar -->

    <!-- Menu -->
    <div class="container">
        <div style=" width: 70%; text-align:center; margin: auto;" class="judul text-center mt-5">
            <h3 class="font-weight-bold">About Us</h3>

            <br>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum."</h5>
        </div>


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
    <script src="{{ asset('/') }} https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/') }} https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/') }} https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ asset('/') }} js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }} js/jquery.js"></script>
</body>

</html>
<?php /* } */ ?>
