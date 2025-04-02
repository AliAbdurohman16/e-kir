<!doctype html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Data Laporan | E-KIR</title>
        <link rel="apple-touch-icon" href="{{ asset('frontend') }}/assets/img/icons/icon-96x96.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('frontend') }}/assets/img/icons/icon-152x152.png">
        <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('frontend') }}/assets/img/icons/icon-167x167.png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend') }}/assets/img/icons/icon-180x180.png">
        <!-- remix icon font css  -->
        <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/remixicon.css">
        <!-- BootStrap css -->
        <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/lib/bootstrap.min.css">

        @yield('css')

        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/style.css">
    </head>

    <body onload="window.print()">

        <h3 class="text-center mt-5">Laporan Transaksi Orderan</h3>
        <h5 class="text-center">Berdasarkan Tanggal {{ date('d-m-Y', strtotime($start_date)) }} - {{ date('d-m-Y', strtotime($end_date)) }}</h5>

        <div class="m-4">
            <div class="table-responsive">
                <div class="card">
                    <div class="card-body">
                        <table id="sudah-validasi" class="table">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Kode</th>
                                    <th>Tanggal Pengujian</th>
                                    <th>Nama Pemilik</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Status Validasi</th>
                                    <th>Status Pengujian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($uji as $u)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $u->kode }}</td>
                                    <td>{{ $u->tanggal_pengujian }}</td>
                                    <td>{{ $u->nama }}</td>
                                    <td>{{ $u->jenis_kendaraan }}</td>
                                    <td>
                                        <span class="badge {{ $u->status_validasi == 'Valid' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($u->status_validasi) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $u->status_uji == 'Teruji' ? 'bg-success' : ($u->status_uji == 'Belum Diuji' ? 'bg-secondary' : 'bg-danger')  }}">
                                            {{ ucfirst($u->status_uji) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery library js -->
        <script src="{{ asset('backend') }}/assets/js/lib/jquery-3.7.1.min.js"></script>
        <!-- Bootstrap js -->
        <script src="{{ asset('backend') }}/assets/js/lib/bootstrap.bundle.min.js"></script>
        <!-- Iconify Font js -->
        <script src="{{ asset('backend') }}/assets/js/lib/iconify-icon.min.js"></script>

    </body>
</html>