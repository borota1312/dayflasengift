<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">


    <title>Halaman Registrasi</title>
</head>

<body>

    <!-- Form Registrasi -->
    <div class="container">
        <h3 class="text-center mt-3 mb-5">HALAMAN REGISTRASI</h3>
        <div class="card p-5 mb-5">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                @if (Session::has('success'))
                    <div class="pt-3">
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif

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
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user">Username</label>
                        <input type="text" class="form-control" id="user" name="username" required
                            placeholder="Masukan Username">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="password" required
                            placeholder="Masukan Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="name"
                        placeholder="Masukan Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="jk" value="1"
                            checked>
                        <label class="form-check-label" for="jk">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="jk" value="2">
                        <label class="form-check-label" for="jk">Perempuan</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="rumah">Alamat</label>
                        <input type="text" class="form-control" id="rumah" name="address"
                            placeholder="Masukan Alamat">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="telp">No. Telephone</label>
                        <input type="text" class="form-control" id="telp" name="phone"
                            placeholder="No. Telephone" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telp">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
    <!-- Akhir Form Registrasi -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>

</body>

</html>
