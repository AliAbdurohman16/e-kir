@extends('layouts.frontend.main')

@section('title', 'Daftar Uji')

<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
      <!-- Back Button-->
      <div class="back-button me-2 me-2"><a href="{{ route('home') }}"><i class="ti ti-arrow-left"></i></a></div>
      <!-- Page Title-->
      <div class="page-heading">
        <h6 class="mb-0">Daftar Uji</h6>
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
        <!-- User Meta Data-->
        <form action="{{ route('daftar-uji.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="card user-data-card">
            <div class="card-body">
              <div class="mb-3">
                <div class="title mb-2"><span>Tanggal Pengujian</span></div>
                <input class="form-control @error('tanggal_pengujian') is-invalid @enderror" type="date" name="tanggal_pengujian" value="{{ old('tanggal_pengujian') }}" placeholder="Tanggal Pengujian" required>
                @error('tanggal_pengujian')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>Jenis Kendaraan</span></div>
                <select class="form-control @error('jenis_kendaraan') is-invalid @enderror" name="jenis_kendaraan" required>
                    <option value="">Pilih Jenis Kendaraan</option>
                    <option value="Mobil Penumpang" @selected(old('jenis_kendaraan') == 'Mobil Penumpang')>Mobil Penumpang</option>
                    <option value="Mobil Bis" @selected(old('jenis_kendaraan') == 'Mobil Bis')>Mobil Bis</option>
                    <option value="Mobil Barang" @selected(old('jenis_kendaraan') == 'Mobil Barang')>Mobil Barang</option>
                    <option value="Kereta Gandengan" @selected(old('jenis_kendaraan') == 'Kereta Gandengan')>Kereta Gandengan</option>
                    <option value="Kereta Tempelan" @selected(old('jenis_kendaraan') == 'Kereta Tempelan')>Kereta Tempelan</option>
                    <option value="Traktor" @selected(old('jenis_kendaraan') == 'Traktor')>Traktor</option>
                    <option value="Umum" @selected(old('jenis_kendaraan') == 'Umum')>Umum</option>
                    <option value="Tdk. Umum" @selected(old('jenis_kendaraan') == 'Tdk. Umum')>Tdk. Umum</option>
                </select>
                @error('jenis_kendaraan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>Nama Pemilik</span></div>
                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Pemilik" required>
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>Alamat Garasi</span></div>
                <textarea class="form-control @error('alamat_garasi') is-invalid @enderror" name="alamat_garasi" rows="2" placeholder="Alamat Garasi" required>{{ old('alamat_garasi') }}</textarea>
                @error('alamat_garasi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>Merk Kendaraan</span></div>
                <select class="form-control @error('merk_kendaraan') is-invalid @enderror" name="merk_kendaraan" required>
                  <option value="">-- Pilih Merk --</option>
                  <optgroup label="Mobil">
                    <option value="Toyota">Toyota</option>
                    <option value="Honda">Honda</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Daihatsu">Daihatsu</option>
                    <option value="Mitsubishi">Mitsubishi</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Wuling">Wuling</option>
                    <option value="Hyundai">Hyundai</option>
                    <option value="Kia">Kia</option>
                    <option value="Mazda">Mazda</option>
                    <option value="Isuzu">Isuzu</option>
                    <option value="BMW">BMW</option>
                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                  </optgroup>
                </select>
                @error('merk_kendaraan')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <div class="title mb-2"><span>Tipe Kendaraan</span></div>
                <select class="form-control @error('tipe_kendaraan') is-invalid @enderror" name="tipe_kendaraan" required>
                  <option value="">-- Pilih Tipe --</option>

                  <!-- Mobil -->
                  <optgroup label="Mobil Penumpang">
                    <option value="Sedan">Sedan</option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="SUV">SUV</option>
                    <option value="MPV">MPV</option>
                    <option value="Convertible">Convertible</option>
                    <option value="Crossover">Crossover</option>
                  </optgroup>

                  <optgroup label="Mobil Niaga">
                    <option value="Pickup">Pickup</option>
                    <option value="Box">Box</option>
                    <option value="Minibus">Minibus</option>
                    <option value="Double Cabin">Double Cabin</option>
                    <option value="Truck Ringan">Truck Ringan</option>
                    <option value="Truck Berat">Truck Berat</option>
                  </optgroup>
                </select>
                @error('tipe_kendaraan')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <div class="title mb-2"><span>Tahun Pembuatan</span></div>
                <input class="form-control @error('tahun_pembuatan') is-invalid @enderror" type="number" name="tahun_pembuatan" placeholder="Tahun Pembuatan" required>
                @error('tahun_pembuatan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- <div class="mb-3">
                <div class="title mb-2"><span>Nomor Kendaraan</span></div>
                <input class="form-control @error('nomor_kendaraan') is-invalid @enderror" type="text" name="nomor_kendaraan" placeholder="Nomor Kendaraan" required>
                @error('nomor_kendaraan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div> --}}
              <div class="mb-3">
                <div class="title mb-2"><span>Nomor Kendaraan</span></div>
                <div class="d-flex gap-2">
                  <select class="form-control @error('kode_daerah') is-invalid @enderror" name="kode_daerah" required style="width: 80px;">
                    <option value="">Kode</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="T">T</option>
                    <option value="Z">Z</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="K">K</option>
                    <option value="R">R</option>
                    <option value="AA">AA</option>
                    <option value="AB">AB</option>
                    <option value="AD">AD</option>
                    <option value="L">L</option>
                    <option value="M">M</option>
                    <option value="N">N</option>
                    <option value="P">P</option>
                    <option value="S">S</option>
                    <option value="W">W</option>
                    <option value="AE">AE</option>
                    <option value="AG">AG</option>
                    <option value="DA">DA</option>
                    <option value="DB">DB</option>
                    <option value="DC">DC</option>
                    <option value="DD">DD</option>
                    <option value="DE">DE</option>
                    <option value="DF">DF</option>
                    <option value="DG">DG</option>
                    <option value="DH">DH</option>
                    <option value="DK">DK</option>
                    <option value="DL">DL</option>
                    <option value="DM">DM</option>
                    <option value="DN">DN</option>
                    <option value="DR">DR</option>
                    <option value="DS">DS</option>
                    <option value="DT">DT</option>
                    <option value="EA">EA</option>
                    <option value="EB">EB</option>
                    <option value="ED">ED</option>
                    <option value="EJ">EJ</option>
                    <option value="F1">F1</option>
                    <option value="H1">H1</option>
                    <option value="KB">KB</option>
                    <option value="KH">KH</option>
                    <option value="KT">KT</option>
                    <option value="KU">KU</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                  </select>
                  <input class="form-control @error('nomor_plat') is-invalid @enderror" type="number" name="nomor_plat" placeholder="1234" maxlength="4" required style="width: 100px;">
                  <input class="form-control text-uppercase @error('huruf_plat') is-invalid @enderror" type="text" name="huruf_plat" placeholder="XYZ" maxlength="3" required style="width: 80px;">
                </div>

                @error('kode_daerah')
                  <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
                @error('nomor_plat')
                  <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
                @error('huruf_plat')
                  <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>

              <div class="mb-3">
                <div class="title mb-2"><span>Nomor Uji Kendaraan</span></div>
                <input class="form-control @error('nomor_pemeriksaan') is-invalid @enderror" type="text" name="nomor_pemeriksaan" placeholder="Nomor Uji Kendaraan" required>
                @error('nomor_pemeriksaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>Nomor Chassis</span></div>
                <input class="form-control @error('nomor_chassis') is-invalid @enderror" type="text" name="nomor_chassis" placeholder="Nomor Chassis" required>
                @error('nomor_chassis')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>Nomor Mesin</span></div>
                <input class="form-control @error('nomor_mesin') is-invalid @enderror" type="text" name="nomor_mesin" placeholder="Nomor Mesin" required>
                @error('nomor_mesin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <h6 class="mt-4 mb-2">Rumah-rumah :</h6>
              <div class="mb-3">
                <div class="title mb-2"><span>Macam</span></div>
                <input class="form-control @error('macam') is-invalid @enderror" type="text" name="macam" placeholder="Macam" required>
                @error('macam')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>Bahan</span></div>
                <input class="form-control @error('bahan') is-invalid @enderror" type="text" name="bahan" placeholder="Bahan" required>
                @error('bahan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>Keistimewaan</span></div>
                <input class="form-control @error('keistimewaan') is-invalid @enderror" type="text" name="keistimewaan" placeholder="Keistimewaan" required>
                @error('keistimewaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>Tanggal Terakhir Pengujian</span></div>
                <input class="form-control @error('tanggal_terakhir_pengujian') is-invalid @enderror" type="date" name="tanggal_terakhir_pengujian" placeholder="Tanggal Terakhir Pengujian" required>
                @error('tanggal_terakhir_pengujian')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>Tempat Terakhir Pengujian</span></div>
                <input class="form-control @error('tempat_terakhir_pengujian') is-invalid @enderror" type="text" name="tempat_terakhir_pengujian" placeholder="Tempat Terakhir Pengujian" required>
                @error('tempat_terakhir_pengujian')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>KTP</span></div>
                <input class="form-control @error('ktp') is-invalid @enderror" type="file" name="ktp" required>
                @error('ktp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>STNK</span></div>
                <input class="form-control @error('stnk') is-invalid @enderror" type="file" name="stnk" required>
                @error('stnk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><span>Surat Uji Kendaraan</span></div>
                <input class="form-control @error('surat_uji_kendaraan') is-invalid @enderror" type="file" name="surat_uji_kendaraan" required>
                @error('surat_uji_kendaraan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button class="btn btn-primary btn-lg w-100" type="submit">Kirim</button>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection