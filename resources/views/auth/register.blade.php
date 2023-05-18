@extends('auth.main')

@section('content')

<div class="register-box-body">
    <p class="login-box-msg">Form Registrasi</p>

    <form action="/register" method="post">
        @csrf
      <div class="form-group has-feedback @error('name')has-error @enderror">
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('name')<span class="help-block">{{ $message }}</span>@enderror
      </div>
      <div class="form-group has-feedback @error('email')has-error @enderror">
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email') <span class="help-block">{{ $message }}</span>@enderror
      </div>
      <div class="form-group has-feedback @error('password')has-error @enderror">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password') <span class="help-block">{{ $message }}</span> @enderror
      </div>
      <div class="form-group has-feedback @error('konfirmasi_password') has-error @enderror">
        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="konfirmasi_password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        @error('konfirmasi_password') <span class="help-block">{{ $message }}</span> @enderror
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="col-xs-12 text-center">
        <a href="/" class="text-center">Sudah Punya Akun?</a>
    </div>
    <br>
  </div>

    
@endsection