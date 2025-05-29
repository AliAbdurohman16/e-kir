@extends('layouts.frontend.main')

@section('title', 'Riwayat')

<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
      <!-- Back Button-->
      <div class="back-button me-2 me-2"><a href="{{ route('home') }}"><i class="ti ti-arrow-left"></i></a></div>
      <!-- Page Title-->
      <div class="page-heading">
        <h6 class="mb-0">Riwayat</h6>
      </div>
      <div class="user-profile-icon ms-2">
        <a href="{{ route('profile.index') }}">
          @if (Auth::user()->image == 'default/user.jpg')
            <img src="{{ asset('default/user.jpg') }}" alt="image">
          @else
            <img src="{{ asset('storage/users/' . Auth::user()->image ) }}" alt="image">
          @endif
        </a>
      </div>
    </div>
  </div>

@section('content')
<div class="page-content-wrapper">
    <div class="weekly-best-seller-area py-3">
    <div class="container">
        <div class="row g-2">
        @foreach ($uji as $u)
        <div class="col-12">
            <div class="card horizontal-product-card">
            <div class="d-flex align-items-center">
                <div class="product-description m-4">
                <a class="product-title d-block" href="{{ route('history.show', $u->id) }}">Uji Kendaraan - {{ $u->jenis_kendaraan }}</a>
                <a class="product-title d-block">Nomor Kendaraan: {{ $u->nomor_kendaraan }}</a>
                <p class="sale-price"><i class="ti ti-calendar"></i>{{ date('d/m/Y', strtotime($u->tanggal_pengujian)) }}</p>
                <div class="d-flex justify-content-between mt-3">
                    <div class="mx-2">
                        <small>Status Validasi:</small>
                        <span class="badge {{ $u->status_validasi == 'Valid' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($u->status_validasi) }}
                        </span>
                    </div>
                    <div>
                      @if ($u->status_validasi == 'Valid') 
                      <small>Status Pengujian:</small>
                      <span class="badge {{ $u->status_uji == 'Teruji' ? 'bg-success' : ($u->status_uji == 'Belum Diuji' ? 'bg-secondary' : 'bg-danger')  }}">
                          {{ ucfirst($u->status_uji) }}
                      </span>
                      @endif
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    </div>
</div>
@endsection