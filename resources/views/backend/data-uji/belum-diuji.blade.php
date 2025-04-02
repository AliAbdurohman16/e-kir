@extends('layouts.backend.main')

@section('title', 'Data Uji - Belum Diuji')

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
            <table id="belum-diuji" class="table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Kode</th>
                        <th>Tanggal Pengujian</th>
                        <th>Nama Pemilik</th>
                        <th>Jenis Kendaraan</th>
                        <th>Status Validasi</th>
                        <th>Status Pengujian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($belumDiuji as $bd)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bd->kode }}</td>
                        <td>{{ $bd->tanggal_pengujian }}</td>
                        <td>{{ $bd->nama }}</td>
                        <td>{{ $bd->jenis_kendaraan }}</td>
                        <td>
                            <span class="badge {{ $bd->status_validasi == 'Valid' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($bd->status_validasi) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $bd->status_uji == 'Teruji' ? 'bg-success' : ($bd->status_uji == 'Belum Diuji' ? 'bg-secondary' : 'bg-danger')  }}">
                                {{ ucfirst($bd->status_uji) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('data-uji.show', $bd->id) }}" class="btn btn-info mb-2"><iconify-icon icon="mdi:eye-outline"></iconify-icon></a>
                            <span class="btn btn-success btn-lolos mb-2" data-id="{{ $bd->id }}"><iconify-icon icon="ep:select" class="icon"></iconify-icon></span>
                            <span class="btn btn-danger btn-tolak" data-id="{{ $bd->id }}"><iconify-icon icon="mdi:times" class="icon"></iconify-icon></span>
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
<script src="{{ asset('backend') }}/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#belum-diuji').DataTable();
    });

    $(".btn-lolos").click(function() {
        var id = $(this).data("id");
        Swal.fire({
            title: 'Lolos Uji',
            text: "Apakah anda yakin ingin kendaraan tersebut teruji?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Teruji!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "lolos/" + id,
                    type: 'POST',
                    data: {
                        "_method": "PUT",
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.success,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Gagal melakukan validasi. ' + errorMessage,
                        });
                    }
                });
            }
        })
    });

    $(".btn-tolak").click(function() {
        var id = $(this).data("id");
        Swal.fire({
            title: 'Tolak Uji',
            text: "Apakah anda yakin ingin tolak pengujian kendaraan tersebut?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tolak!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "tolak/" + id,
                    type: 'POST',
                    data: {
                        "_method": "PUT",
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.success,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Gagal melakukan validasi. ' + errorMessage,
                        });
                    }
                });
            }
        })
    });
</script>
@endsection