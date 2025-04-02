@extends('layouts.frontend.main')

@section('title', 'Beranda')

<!-- Header Area -->
@include('layouts.frontend.header')

@section('content')
<div class="page-content-wrapper">
  <div class="container">
    <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
    
    @if ($uji->isEmpty())
    <div class="d-flex justify-content-center align-items-center vh-100">
      <p class="text-center">Silahkan melakukan daftar uji kendaraan terlebih dahulu</p>
    </div>
    @else
    <!-- Riwayat Uji-->
    <div class="weekly-best-seller-area py-3">
      <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
        <h6>Riwayat Pengujian</h6><a class="btn btn-sm btn-light" href="{{ route('history') }}">Lihat semua<i class="ms-1 ti ti-arrow-right"></i></a>
      </div>
      <div class="row g-2">
        @foreach ($uji as $u)
        <div class="col-12">
          <div class="card horizontal-product-card">
            <div class="d-flex align-items-center">
              <div class="product-description m-4">
                <a class="product-title d-block" href="{{ route('history.show', $u->id) }}">Uji Kendaraan - {{ $u->jenis_kendaraan }}</a>
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
    @endif
  </div>
  
</div>
@endsection