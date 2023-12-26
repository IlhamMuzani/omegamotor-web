<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('title')</title>
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('falcon/public/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('falcon/public/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('falcon/public/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('falcon/public/assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('falcon/public/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('falcon/public/assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('falcon/public/assets/js/config.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="path/to/jquery.min.js"></script> --}}

    {{-- <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}

    {{-- <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            bsCustomFileInput.init();
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script> --}}
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->

    {{-- <link href="{{ asset('falcon/public/assets/dataTables/datatables.min.css') }}" rel="stylesheet" id="user-style-default"> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('falcon/public/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('falcon/public/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('falcon/public/assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">

    <link href="{{ asset('falcon/public/vendors/choices/choices.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('falcon/public/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('falcon/public/vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('falcon/public/vendors/prism/prism-okaidia.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body id="table-body">
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid" data-layout="container">

            <!-- Start Main Sidebar -->

            <nav class="navbar navbar-light navbar-vertical navbar-expand-xl navbar-vibrant">
                <div class="d-flex align-items-center">
                    <div class="toggle-icon-wrapper">

                        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle"
                            data-bs-toggle="tooltip" data-bs-placement="left" title=""
                            data-bs-original-title="Toggle Navigation" aria-label="Toggle Navigation"><span
                                class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                    </div><a class="navbar-brand" href="index.html">
                        <div class="d-flex align-items-center py-3"><span class="font-sans-serif"
                                style="font-size: 20px;">
                                <img class="" src="{{ asset('storage/uploads/gambaricon/omegapolos.png') }}"
                                    alt="AdminLTELogo" height="37" width="160">
                            </span>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                    <div class="navbar-vertical-content scrollbar">
                        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                    href="{{ url('/') }}" role="button" aria-expanded="false">
                                    {{-- <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                            <span class="fas fa-chart-pie"></span>
                                        </span>
                                        <span class="nav-link-text ps-1">Dashboard</span>
                                    </div> --}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </nav>

            <!-- End Main Sidebar -->

            <div class="content">

                <!-- Start Main Navbar -->

                <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
                    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
                        <span class="navbar-toggle-icon">
                            <span class="toggle-line"></span>
                        </span>
                    </button>
                    <a class="navbar-brand me-1 me-sm-3" href="index.html">
                        <div class="d-flex align-items-center mt-2">
                            <img class="" src="{{ asset('storage/uploads/gambaricon/omegapolos.png') }}"
                                alt="AdminLTELogo" height="25" width="130">
                        </div>
                    </a>
                    <ul class="navbar-nav align-items-center d-none d-lg-block">
                        <li class="nav-item">

                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

                        <li class="nav-item dropdown">
                            <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                    {{-- <a class="dropdown-item" href="{{ url('profile') }}">Profil CV</a> --}}
                                    {{-- <div class="dropdown-divider"></div> --}}
                                    <a class="dropdown-item" href="" data-bs-toggle="modal"
                                        data-bs-target="#modalLogout">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>


                <!-- End Main Navbar -->

                <!-- Start Main Content -->

                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
                    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
                    crossorigin="" />
                <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
                    integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
                    crossorigin=""></script>
                <div class="card mb-3">
                    <div class="bg-holder d-none d-lg-block bg-card"
                        style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
                    </div>
                    <!--/.bg-holder-->
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3>Data Pelanggan</h3>
                                <p class="mb-0">Lihat</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Lihat Pelanggan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                {{-- @if ($pelanggan->gambar)
                                <img src="{{ asset('storage/uploads/' . $pelanggan->gambar) }}"
                        class="w-100 rounded border">
                        @else
                        <img src="{{ asset('storage/uploads/pelanggan/user.png') }}" class="w-100 rounded border">
                        @endif --}}
                                {{-- <img src="{{ asset('storage/uploads/' . $pelanggan->gambar) }}"
                        alt="{{ $pelanggan->nama_lengkap }}" class="w-100 rounded"> --}}
                                {{-- @if ($pelanggan->gambar_ktp)
                                    <img src="{{ asset('storage/uploads/' . $pelanggan->gambar_ktp) }}"
                                        alt="{{ $pelanggan->nama_pelanggan }}" class="w-100 rounded border">
                                @else
                                    <img class="mt-3"
                                        src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                                        alt="AdminLTELogo" height="400" width="400">
                                @endif --}}
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <strong>Qr Code</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <div data-bs-toggle="modal"
                                            data-bs-target="#modal-qrcode-{{ $pelanggan->id }}"
                                            style="display: inline-block;">
                                            {!! DNS2D::getBarcodeHTML("$pelanggan->qrcode_pelanggan", 'QRCODE', 3, 3) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <strong>Kode Pelanggan</strong>
                                    </div>
                                    <div class="col-md-4">
                                        {{ $pelanggan->kode_pelanggan }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <strong>Nama Pelanggan</strong>
                                    </div>
                                    <div class="col-md-4">
                                        {{ $pelanggan->nama_pelanggan }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <strong>Nama alias</strong>
                                    </div>
                                    <div class="col-md-4">
                                        {{ $pelanggan->nama_alias }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <strong>Gender</strong>
                                    </div>
                                    <div class="col-md-4">
                                        {{ $pelanggan->gender }}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <strong>Telepon</strong>
                                    </div>
                                    <div class="col-md-4">
                                        {{ $pelanggan->telp }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <strong>Alamat</strong>
                                    </div>
                                    <div class="col-md-4">
                                        {{ $pelanggan->alamat }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-qrcode-{{ $pelanggan->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Gambar QR Code</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- <p>Yakin hapus kendaraan
                                                    <strong>{{ $kendaraan->kode_kendaraan }}</strong>?
                            </p> --}}
                                    <div style="text-align: center;">
                                        <div style="display: inline-block;">
                                            {!! DNS2D::getBarcodeHTML("$pelanggan->qrcode_pelanggan", 'QRCODE', 15, 15) !!}
                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-bs-dismiss="modal">Batal</button>
                                        {{-- <form action="{{ url('admin/ban/' . $golongan->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Cetak</button>
                                </form> --}}
                                        <a href="{{ url('admin/pelanggan/cetak-pdf/' . $pelanggan->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class=""></i> Cetak
                                        </a>
                                        {{-- <a href="{{ url('admin/cetak-pdf/' . $golongan->id) }}" target="_blank"
                                class="btn btn-outline-primary btn-sm float-end">
                                <i class="fa-solid fa-print"></i> Cetak PDV
                                </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Main Content -->

            <!-- Start Main Footer -->

            @include('layout.footer')

            <!-- End Main Footer -->

        </div>

        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('falcon/public/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('falcon/public/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('falcon/public/assets/js/theme.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/countup/countUp.umd.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/typed.js/typed.js') }}"></script>

    <script src="{{ asset('falcon/public/vendors/choices/choices.min.js') }}"></script>
    <script src="{{ asset('falcon/public/assets/js/flatpickr.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/prism/prism.js') }}"></script>

    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#datatables2').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatables3').DataTable();
        });
    </script>
    {{--     
    <script src="{{ asset('falcon/public/assets/dataTables/datatables.js') }}"></script>
    <script src="{{ asset('falcon/public/assets/dataTables/datatables.js') }}"></script> --}}

</body>

</html>
