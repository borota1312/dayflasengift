@extends('layouts.app-login')
@section('content')
    <div class="container">
        <h4 class="text-center">FORM LOGIN</h4>
        <hr>
        <form method="POST" action="{{ route('login') }}">
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
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                    <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                    </div>
                    <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                </div>
            </div>
            <div class="mb-3">
                <small><a href="{{ route('register') }}" class="text-dark">Belum Punya Akun ? Buat Akun Anda !</a></small>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
            <button type="reset" name="reset" class="btn btn-danger">RESET</button>
        </form>
    </div>
@endsection
