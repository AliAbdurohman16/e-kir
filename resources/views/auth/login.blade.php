@extends('layouts.auth.app')

@section('title', 'Masuk')

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
            @if ($errors->has('email') || $errors->has('password'))
              <div class="alert alert-danger">Email atau kata sandi anda salah!</div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group text-start mb-4"><span>Email</span>
                <label for="email"><i class="ti ti-mail"></i></label>
                <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="info@example.com" required>
              </div>
              <div class="form-group text-start mb-4"><span>Kata sandi</span>
                <label for="password"><i class="ti ti-key"></i></label>
                <input class="form-control" id="password" name="password" type="password" placeholder="Kata sandi" required>
              </div>
              <button class="btn btn-warning btn-lg w-100" type="submit">Masuk</button>
            </form>
          </div>
          <!-- Login Meta-->
          <div class="login-meta-data">
            <p class="mt-3">Belum punya akun?<a class="mx-1" href="{{ route('register') }}">Daftar</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection