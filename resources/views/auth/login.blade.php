@extends('layouts.layout_auth')

@section('title', "login")

@section("content")

@section("content")
<div class="container">
    <div class="row" style="padding-top:50px">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="form-login" style="text-align:center;">
        <h4>Login</h4>
</div>
@if(session("success"))
<div class="alert alert-primary">{{session('success')}}</div>
@endif
<form menthod="post" action="#">
    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email">
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password">
</div>
<button type="submit" class="btn btn-primary">Login</button>
</form>

<br>
belum punya akun ?<a href="{{ route("register") }}">Register</a>
</div>
</div>
</div>
@endsection