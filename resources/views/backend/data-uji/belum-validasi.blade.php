@extends('layouts.backend.main')

@section('title', 'Data Uji - Belum Validasi')

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
            <table id="belum-validasi" class="table">
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
                    @foreach ($belumValidasi as $bv)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bv->kode }}</td>
                        <td>{{ $bv->tanggal_pengujian }}</td>
                        <td>{{ $bv->nama }}</td>
                        <td>{{ $bv->jenis_kendaraan }}</td>
                        <td>
                            <span class="badge {{ $bv->status_validasi == 'Valid' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($bv->status_validasi) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('data-uji.show', $bv->id) }}" class="btn btn-info mb-2"><iconify-icon icon="mdi:eye-outline"></iconify-icon></a>
                            <span class="btn btn-success btn-validasi" data-id="{{ $bv->id }}"><iconify-icon icon="ep:select" class="icon"></iconify-icon></span>
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
        $('#belum-validasi').DataTable();
    });

    $(".btn-validasi").click(function() {
        var id = $(this).data("id");
        Swal.fire({
            title: 'Validasi Data',
            text: "Apakah anda yakin ingin validasi?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Validasi!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "validasi/" + id,
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