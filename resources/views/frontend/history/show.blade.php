@extends('layouts.frontend.main')

@section('title', 'Profil')

<!-- Header Area -->
<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
      <!-- Back Button-->
      <div class="back-button me-2 me-2"><a href="{{ route('history') }}"><i class="ti ti-arrow-left"></i></a></div>
      <!-- Page Title-->
      <div class="page-heading">
        <h6 class="mb-0">Detail Riwayat</h6>
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
  <div class="container">
        <div class="card user-data-card">
          <div class="card-body">
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Tanggal Pengujian</span></div>
              <div class="data-content">{{ date('d/m/Y', strtotime($uji->tanggal_pengujian)) }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center">Jenis Kendaraan</span></div>
              <div class="data-content">{{ $uji->jenis_kendaraan }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Nama Pemilik</span></div>
              <div class="data-content">{{ $uji->nama }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Alamat Garasi</span></div>
              <div class="data-content">{{ $uji->alamat_garasi }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Merk Kendaraan</span></div>
              <div class="data-content">{{ $uji->merk_kendaraan }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Tipe Kendaraan</span></div>
              <div class="data-content">{{ $uji->tipe_kendaraan }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Tahun Pembuatan</span></div>
              <div class="data-content">{{ $uji->tahun_pembuatan }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Nomor Kendaraan</span></div>
              <div class="data-content">{{ $uji->nomor_kendaraan }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Nomor Pemeriksaan</span></div>
              <div class="data-content">{{ $uji->nomor_pemeriksaan }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Nomor Chassis</span></div>
              <div class="data-content">{{ $uji->nomor_chassis }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Nomor Mesin</span></div>
              <div class="data-content">{{ $uji->nomor_mesin }}</div>
            </div>
            <h6 class="mt-4 mb-2">Rumah-rumah :</h6>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Macam</span></div>
              <div class="data-content">{{ $uji->macam }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Bahan</span></div>
              <div class="data-content">{{ $uji->bahan }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Keistimewaan</span></div>
              <div class="data-content">{{ $uji->keistimewaan }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Tanggal Terakhir Pengujian</span></div>
              <div class="data-content">{{ date('d/m/Y', strtotime($uji->tanggal_terakhir_pengujian)) }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Tempat Terakhir Pengujian</span></div>
              <div class="data-content">{{ $uji->tempat_terakhir_pengujian }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>KTP</span></div>
              <div class="data-content">
                <img src="{{ asset('storage/ktp/' . $uji->ktp ) }}" width="100" alt="ktp"><br>
                <small class="file-size-kk">Ukuran Asli : {{ $uji->ktp_size_asli ?? '0 KB' }}</small> <br>
                <small>Ukuran Kompresi : {{ $uji->ktp_size_kompresi ?? '0 KB' }}</small>
              </div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>STNK</span></div>
              <div class="data-content">
                <img src="{{ asset('storage/stnk/' . $uji->stnk ) }}" width="100" alt="stnk"><br>
                <small class="file-size-kk">Ukuran Asli : {{ $uji->stnk_size_asli ?? '0 KB' }}</small> <br>
                <small>Ukuran Kompresi : {{ $uji->stnk_size_kompresi ?? '0 KB' }}</small>
              </div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><span>Surat Uji Kendaraan</span></div>
              <div class="data-content">
                <img src="{{ asset('storage/surat_uji_kendaraan/' . $uji->surat_uji_kendaraan ) }}" width="100" alt="surat_uji_kendaraan"><br>
                <small class="file-size-kk">Ukuran Asli : {{ $uji->surat_uji_kendaraan_size_asli ?? '0 KB' }}</small> <br>
                <small>Ukuran Kompresi : {{ $uji->surat_uji_kendaraan_size_kompresi ?? '0 KB' }}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection