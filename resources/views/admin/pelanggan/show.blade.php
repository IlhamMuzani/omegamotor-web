@extends('layout.main')

@section('title', 'Lihat Pelanggan')

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
                      @if ($pelanggan->gambar_ktp)
                        <img src="{{ asset('storage/uploads/' . $pelanggan->gambar_ktp) }}" alt="{{ $pelanggan->nama_pelanggan }}"
                            class="w-100 rounded border">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="400" width="400">
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Qr Code</strong>
                        </div>
                        <div class="col-md-4">
                            <div data-bs-toggle="modal" data-bs-target="#modal-qrcode-{{ $pelanggan->id }}"
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
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
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
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
@endsection
