@extends('layouts.backend.main')

@section('title', 'Data Uji - Sudah Validasi')

@section('css')
<link href="{{ asset('backend') }}/assets/css/lib/dataTables.min.css" rel="stylesheet" >
<link href="{{ asset('backend') }}/assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" >
@endsection

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

<div class="card basic-data-table">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sudah-validasi" class="table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Kode</th>
                        <th>Tanggal Pengujian</th>
                        <th>Nama Pemilik</th>
                        <th>Jenis Kendaraan</th>
                        <th>Status Validasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sudahValidasi as $sv)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sv->kode }}</td>
                        <td>{{ $sv->tanggal_pengujian }}</td>
                        <td>{{ $sv->nama }}</td>
                        <td>{{ $sv->jenis_kendaraan }}</td>
                        <td>
                            <span class="badge {{ $sv->status_validasi == 'Valid' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($sv->status_validasi) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('data-uji.show', $sv->id) }}" class="btn btn-info mb-2"><iconify-icon icon="mdi:eye-outline"></iconify-icon></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend') }}/assets/js/lib/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sudah-validasi').DataTable();
    });
</script>
@endsection