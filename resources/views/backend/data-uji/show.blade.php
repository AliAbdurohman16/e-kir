@extends('layouts.backend.main')

@section('title', 'Detail Data Uji')

@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">@yield('title')</h6>
    <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium">
            <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                Dashboard
            </a>
        </li>
        <li>-</li>
        <li class="fw-medium">@yield('title')</li>
    </ul>
</div>

<div class="col-lg-7">
    <div class="card p-4 shadow-sm">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Tanggal Pengujian</span>
                        <span class="text-muted">{{ date('d/m/Y', strtotime($uji->tanggal_pengujian)) }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Jenis Kendaraan</span>
                        <span class="text-muted">{{ $uji->jenis_kendaraan }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Nama Pemilik</span>
                        <span class="text-muted">{{ $uji->nama }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Alamat Garasi</span>
                        <span class="text-muted">{{ $uji->alamat_garasi }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Merk Kendaraan</span>
                        <span class="text-muted">{{ $uji->merk_kendaraan }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Tipe Kendaraan</span>
                        <span class="text-muted">{{ $uji->tipe_kendaraan }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Tahun Pembuatan</span>
                        <span class="text-muted">{{ $uji->tahun_pembuatan }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Nomor Kendaraan</span>
                        <span class="text-muted">{{ $uji->nomor_kendaraan }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Nomor Pemeriksaan</span>
                        <span class="text-muted">{{ $uji->nomor_pemeriksaan }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Nomor Chassis</span>
                        <span class="text-muted">{{ $uji->nomor_chassis }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Nomor Mesin</span>
                        <span class="text-muted">{{ $uji->nomor_mesin }}</span>
                    </div>
                </div>
                <span class="fw-semibold pt-3">Rumah-rumah :</span>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Macam</span>
                        <span class="text-muted">{{ $uji->macam }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Bahan</span>
                        <span class="text-muted">{{ $uji->bahan }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Keistimewaan</span>
                        <span class="text-muted">{{ $uji->keistimewaan }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Tempat Terakhir Pengujian</span>
                        <span class="text-muted">{{ date('d/m/Y', strtotime($uji->tanggal_terakhir_pengujian)) }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Tanggal Terakhir Pengujian</span>
                        <span class="text-muted">{{ $uji->tempat_terakhir_pengujian }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">KTP</span>
                    <div class="mt-2 ms-auto text-end">
                        <img src="{{ asset('storage/ktp/' . $uji->ktp ) }}" width="100" alt="KTP" class="img-fluid rounded shadow mb-2"><br>
                        <small class="file-size-kk">Ukuran Asli: {{ $uji->ktp_size_asli ?? '0 KB' }}</small> <br>
                        <small>Ukuran Kompresi: {{ $uji->ktp_size_kompresi ?? '0 KB' }}</small>
                    </div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                    <span class="fw-semibold">STNK</span>
                    <div class="ms-auto text-end">
                        <img src="{{ asset('storage/stnk/' . $uji->stnk ) }}" width="100" alt="STNK" class="img-fluid rounded shadow mb-2"><br>
                        <small class="file-size-kk">Ukuran Asli: {{ $uji->stnk_size_asli ?? '0 KB' }}</small> <br>
                        <small>Ukuran Kompresi: {{ $uji->stnk_size_kompresi ?? '0 KB' }}</small>
                    </div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                    <span class="fw-semibold">Surat Uji Kendaraan</span>
                    <div class="ms-auto text-end">
                        <img src="{{ asset('storage/surat_uji_kendaraan/' . $uji->surat_uji_kendaraan ) }}" width="100" alt="Surat Uji Kendaraan" class="img-fluid rounded shadow mb-2"><br>
                        <small class="file-size-kk">Ukuran Asli: {{ $uji->surat_uji_kendaraan_size_asli ?? '0 KB' }}</small> <br>
                        <small>Ukuran Kompresi: {{ $uji->surat_uji_kendaraan_size_kompresi ?? '0 KB' }}</small>
                    </div>
                </div>                
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Status Validasi</span>
                        <div>
                            <span class="badge {{ $uji->status_validasi == 'Valid' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($uji->status_validasi) }}
                            </span>
                        </div>
                    </div>
                </div>
                @if ($uji->status_validasi == 'Valid') 
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="fw-semibold">Status Pengujian</span>
                        <div>
                            <span class="badge {{ $uji->status_uji == 'Teruji' ? 'bg-success' : ($uji->status_uji == 'Belum Diuji' ? 'bg-secondary' : 'bg-danger')  }}">
                                {{ ucfirst($uji->status_uji) }}
                            </span>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
