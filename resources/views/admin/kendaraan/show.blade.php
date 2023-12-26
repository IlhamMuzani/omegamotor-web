@extends('layout.main')

@section('title', 'Lihat Kendaraan')

@section('content')
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
                    <h3>Data Kendaraan</h3>
                    <p class="mb-0">Lihat</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Lihat Kendaraan</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-6 mt-4">
                            <strong>Qr Code</strong>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div data-bs-toggle="modal" data-bs-target="#modal-qrcode-{{ $kendaraan->id }}"
                                style="display: inline-block;">
                                {!! DNS2D::getBarcodeHTML("$kendaraan->qrcode_kendaraan", 'QRCODE', 3, 3) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Kode Kendaraan</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $kendaraan->kode_kendaraan }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>No Registrasi</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $kendaraan->no_pol }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>No Rangka</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $kendaraan->no_rangka }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>No Mesin</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $kendaraan->no_mesin }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Tahun Pembuatan</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $kendaraan->tahun_kendaraan }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Warna</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $kendaraan->warna }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Merek</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $kendaraan->merek->nama_merek }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Model</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $kendaraan->merek->modelken->nama_model }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Type</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $kendaraan->merek->tipe->nama_tipe }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Transmisi</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $kendaraan->transmisi }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Km Berjalan</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $kendaraan->km_berjalan }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Foto Depan</label>
                    @if ($kendaraan->gambar_depan)
                        <img src="{{ asset('storage/uploads/' . $kendaraan->gambar_depan) }}"
                            alt="{{ $kendaraan->no_pol }}" height="130" width="100" class="w-100 rounded border">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="100" width="200">
                    @endif
                    <label for="">Foto Kanan</label>
                    @if ($kendaraan->gambar_kanan)
                        <img src="{{ asset('storage/uploads/' . $kendaraan->gambar_kanan) }}"
                            alt="{{ $kendaraan->no_pol }}" height="130" width="100" class="w-100 rounded border">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="100" width="200">
                    @endif
                    <label for="">Foto Dashboard</label>
                    @if ($kendaraan->gambar_dashboard)
                        <img src="{{ asset('storage/uploads/' . $kendaraan->gambar_dashboard) }}"
                            alt="{{ $kendaraan->no_pol }}" height="130" width="100" class="w-100 rounded border">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="100" width="200">
                    @endif
                    <label for="">Foto STNK</label>
                    @if ($kendaraan->gambar_stnk)
                        <img src="{{ asset('storage/uploads/' . $kendaraan->gambar_stnk) }}"
                            alt="{{ $kendaraan->no_pol }}" height="130" width="100" class="w-100 rounded border">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="100" width="200">
                    @endif
                    <label for="">Foto Dokumen</label>
                    @if ($kendaraan->gambar_dokumen)
                        <img src="{{ asset('storage/uploads/' . $kendaraan->gambar_dokumen) }}"
                            alt="{{ $kendaraan->no_pol }}" height="130" width="100" class="w-100 rounded border">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="100" width="200">
                    @endif
                </div>
                <div class="col-md-3">
                    <label for="">Foto Belakang</label>
                    @if ($kendaraan->gambar_belakang)
                        <img src="{{ asset('storage/uploads/' . $kendaraan->gambar_belakang) }}"
                            alt="{{ $kendaraan->no_pol }}" height="130" width="100" class="w-100 rounded border">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="100" width="200">
                    @endif
                    <label for="">Foto Kiri</label>
                    @if ($kendaraan->gambar_kiri)
                        <img src="{{ asset('storage/uploads/' . $kendaraan->gambar_kiri) }}"
                            alt="{{ $kendaraan->no_pol }}" height="130" width="100" class="w-100 rounded border">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="100" width="200">
                    @endif
                    <label for="">Foto Interior</label>
                    @if ($kendaraan->gambar_interior)
                        <img src="{{ asset('storage/uploads/' . $kendaraan->gambar_interior) }}"
                            alt="{{ $kendaraan->no_pol }}" height="130" width="100" class="w-100 rounded border">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="100" width="200">
                    @endif
                    <label for="">Foto BPKB</label>
                    @if (isset($kendaraan->gambar) && $kendaraan->gambar->first() && $kendaraan->gambar->first()->gambar)
                        <img src="{{ asset('storage/uploads/' . $kendaraan->gambar->first()->gambar) }}"
                            alt="{{ $kendaraan->no_pol }}" height="130" width="100" class="w-100 rounded border">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="100" width="200">
                    @endif
                    <label for="">Foto Faktur</label>
                    @if ($kendaraan->gambar_faktur)
                        <img src="{{ asset('storage/uploads/' . $kendaraan->gambar_faktur) }}"
                            alt="{{ $kendaraan->no_pol }}" height="130" width="100" class="w-100 rounded border">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="100" width="200">
                    @endif
                </div>

            </div>
        </div>

        <div class="modal fade" id="modal-qrcode-{{ $kendaraan->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Gambar QR Code</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div style="text-align: center;">
                            <p style="font-size:20px; font-weight: bold;">{{ $kendaraan->kode_kendaraan }}</p>
                            <div style="display: inline-block;">
                                {!! DNS2D::getBarcodeHTML("$kendaraan->qrcode_kendaraan", 'QRCODE', 15, 15) !!}
                            </div>
                            <p style="font-size:20px; font-weight: bold;">{{ $kendaraan->no_pol }}</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                        <a href="{{ url('admin/kendaraan/cetak-pdf/' . $kendaraan->id) }}"
                            class="btn btn-primary btn-sm">
                            <i class=""></i> Cetak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
