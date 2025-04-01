@extends('layouts.frontend.main')

@section('title', 'Edit Profil')

<!-- Header Area-->
<div class="header-area" id="headerArea">
  <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
    <!-- Back Button-->
    <div class="back-button me-2 me-2"><a href="{{ route('profile.index') }}"><i class="ti ti-arrow-left"></i></a></div>
    <!-- Page Title-->
    <div class="page-heading">
      <h6 class="mb-0">Edit Profil</h6>
    </div>
    <div class="user-profile-icon ms-2">
      <a href="{{ route('profile.index') }}">
        @if ($user->image == 'default/user.jpg')
          <img src="{{ asset('default/user.jpg') }}" alt="image">
        @else
          <img src="{{ asset('storage/users/' . $user->image ) }}" alt="image">
        @endif
      </a>
    </div>
  </div>
</div>

@section('content')
<div class="page-content-wrapper">
  <div class="container">
      <!-- Profile Wrapper-->
      <div class="profile-wrapper-area py-3">
        <!-- User Information-->
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="card user-info-card">
          <div class="card-body p-4 d-flex align-items-center">
            <div class="user-profile me-3">
              @if ($user->image == 'default/user.jpg')
                <img src="{{ asset('default/user.jpg') }}" class="img-preview" alt="image">
              @else
                <img src="{{ asset('storage/users/' . $user->image ) }}" class="img-preview" alt="image">
              @endif
              <div class="change-user-thumb">
                <input class="form-control-file" type="file" name="image" id="image" accept="image/*" onchange="previewImg()">
                <button><i class="ti ti-pencil"></i></button>
              </div>
            </div>
            <div class="user-info">
              <h5 class="mb-0 text-white">{{ $user->name }}</h5>
            </div>
          </div>
        </div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
          <div class="card-body">
              <div class="mb-3">
                <div class="title mb-2"><i class="ti ti-user"></i><span>Nama Lengkap</span></div>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $user->name }}" placeholder="Nama Lengkap" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><i class="ti ti-mail"></i><span>Email</span></div>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->email }}" placeholder="info@example.com" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><i class="ti ti-phone"></i><span>Phone</span></div>
                <input class="form-control @error('phone') is-invalid @enderror" type="number" name="phone" value="{{ $user->phone }}" placeholder="08XXXXXX" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button class="btn btn-primary btn-lg w-100" type="submit">Simpan</button>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection

@section('js')
<script>
  function previewImg() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');
      const fileImg = new FileReader();
      fileImg.readAsDataURL(image.files[0]);
      fileImg.onload = function(e) {
          imgPreview.src = e.target.result;
      }
  }
</script>
@endsection