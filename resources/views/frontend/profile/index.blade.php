@extends('layouts.frontend.main')

@section('title', 'Profil')

<!-- Header Area -->
@include('layouts.frontend.header')

@section('content')
@if (Session::has('success'))
<div class="toast pwa-install-alert shadow bg-white" id="installWrap" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
  <div class="toast-body">
    <div class="content d-flex align-items-center mb-2">
      <h6 class="mb-0">Berhasil!</h6>
      <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <span class="mb-2 d-block">{{ Session::get('success') }}</span>
  </div>
</div>
@endif

<div class="page-content-wrapper">
  <div class="container">
      <!-- Profile Wrapper-->
      <div class="profile-wrapper-area">
        <!-- User Information-->
        <div class="card user-info-card">
          <div class="card-body p-4 d-flex align-items-center">
            <div class="user-profile me-3">
              @if (Auth::user()->image == 'default/user.jpg')
                <img src="{{ asset('default/user.jpg') }}" alt="image">
              @else
                <img src="{{ asset('storage/users/' . Auth::user()->image ) }}" alt="image">
              @endif
            </div>
            <div class="user-info">
              <h5 class="mb-0 text-white">{{ $user->name }}</h5>
            </div>
          </div>
        </div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
          <div class="card-body">
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><i class="ti ti-user"></i><span>Nama Lengkap</span></div>
              <div class="data-content">{{ $user->name }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><i class="ti ti-mail"></i><span>Email</span></div>
              <div class="data-content">{{ $user->email }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><i class="ti ti-phone"></i><span>Phone</span></div>
              <div class="data-content">{{ $user->phone }}</div>
            </div>
            <!-- Edit Profile-->
            <div class="edit-profile-btn mt-3"><a class="btn btn-primary btn-lg w-100" href="{{ route('profile.edit', $user) }}"><i class="ti ti-pencil me-2"></i>Edit Profil</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection