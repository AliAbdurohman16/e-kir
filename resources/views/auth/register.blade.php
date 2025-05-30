@extends('layouts.auth.app')

@section('title', 'Daftar')

@section('content')
<!-- Login Wrapper Area-->
<div class="login-wrapper d-flex align-items-center justify-content-center text-center">
    <!-- Background Shape-->
    <div class="background-shape"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-10 col-lg-8">
          <div class="d-flex justify-content-center align-items-center mb-3">
            <img src="{{ asset('frontend') }}/assets/img/core-img/DISHUB.png" alt="DISHUB Logo" style="height: 80px; margin-right: 10px;">
            <img src="{{ asset('frontend') }}/assets/img/core-img/FKOM.png" alt="FKOM Logo" style="height: 80px;">
          </div>
          
          <h3 class="text-white">E-KIR</h3>
          <!-- Register Form-->
          <div class="register-form mt-5">
            <form action="{{ route('register') }}" method="POST">
                @csrf
              <div class="form-group text-start mb-4"><span>Nama Lengkap</span>
                <label for="name"><i class="ti ti-user"></i></label>
                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Nama Lengkap" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group text-start mb-4"><span>Email</span>
                <label for="email"><i class="ti ti-mail"></i></label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="info@example.com" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group text-start mb-4"><span>No Telepon</span>
                <label for="phone"><i class="ti ti-phone"></i></label>
                <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" type="number" value="{{ old('phone') }}" placeholder="08XXXXXX" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group text-start mb-4"><span>Kata sandi</span>
                <label for="password"><i class="ti ti-key"></i></label>
                <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Kata sandi" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group text-start mb-4"><span>Konfirmasi kata sandi</span>
                <label for="password"><i class="ti ti-key"></i></label>
                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Konfirmasi kata sandi">
              </div>
              <button class="btn btn-warning btn-lg w-100" type="submit">Daftar</button>
            </form>
          </div>
          <!-- Login Meta-->
          <div class="login-meta-data">
            <p class="mt-3">Sudah punya akun?<a class="mx-1" href="{{ route('login') }}">Masuk</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection