@extends('auth.main')

@section('content')
     <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Form Login</p>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible" style="margin-top: 8px" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif 

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible " role="alert" style="margin-top:8px">
        {{ session('loginError') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <form action="/login" method="post">
        @csrf
      <div class="form-group has-feedback @error('email') has-error @enderror">
        <input type="email" class="form-control" name="email" placeholder="Email" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email') <span class="help-block">{{ $message }}</span> @enderror
      </div>
      <div class="form-group has-feedback @error('password') has-error @enderror">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password') <span class="help-block">{{ $message }}</span> @enderror
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->
    <div class="col-xs-12 text-center">
        <a href="/register">Buat Akun?</a> 
    </div>
    <br>
  </div>
  <!-- /.login-box-body -->
  
@endsection