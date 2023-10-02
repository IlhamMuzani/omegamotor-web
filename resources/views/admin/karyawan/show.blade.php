@extends('layout.main')

@section('title', 'Lihat Karyawan')

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
                    <h3>Data Karyawan</h3>
                    <p class="mb-0">Lihat</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Lihat Karyawan</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    {{-- @if ($karyawan->gambar)
                                <img src="{{ asset('storage/uploads/' . $karyawan->gambar) }}"
                        class="w-100 rounded border">
                        @else
                        <img src="{{ asset('storage/uploads/karyawan/user.png') }}" class="w-100 rounded border">
                        @endif --}}
                    {{-- <img src="{{ asset('storage/uploads/' . $karyawan->gambar) }}"
                        alt="{{ $karyawan->nama_lengkap }}" class="w-100 rounded"> --}}
                    @if ($karyawan->gambar)
                        <img src="{{ asset('storage/uploads/' . $karyawan->gambar) }}" alt="{{ $karyawan->nama_lengkap }}"
                            class="w-100 rounded border">
                    @else
                        <img src="{{ asset('adminlte/dist/img/img-placeholder.jpg') }}" alt="{{ $karyawan->nama_lengkap }}"
                            class="w-100 rounded border">
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Qr Code</strong>
                        </div>
                        <div class="col-md-4">
                            <div data-bs-toggle="modal" data-bs-target="#modal-qrcode-{{ $karyawan->id }}"
                                style="display: inline-block;">
                                {!! DNS2D::getBarcodeHTML("$karyawan->qrcode_karyawan", 'QRCODE', 3, 3) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Kode Karyawan</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $karyawan->kode_karyawan }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Departemen</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $karyawan->departemen->nama }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>No KTP</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $karyawan->no_ktp }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>No SIM</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $karyawan->no_sim }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Gender</strong>
                        </div>
                        <div class="col-md-4">
                            @if ($karyawan->gender == 'L')
                                <td>Laki-Laki</td>
                            @else
                                <td>Perempuan</td>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Telepon</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $karyawan->telp }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Alamat</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $karyawan->alamat }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Tanggal Lahir</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $karyawan->tanggal_lahir }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Tanggal Gabung</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $karyawan->tanggal_gabung }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Jabatan</strong>
                        </div>
                        <div class="col-md-4">
                            {{ $karyawan->jabatan }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-qrcode-{{ $karyawan->id }}">
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
                                {!! DNS2D::getBarcodeHTML("$karyawan->qrcode_karyawan", 'QRCODE', 15, 15) !!}
                            </div>
                            {{-- <br>
                                                    AE - {{ $karyawan->qrcode_karyawan }} --}}
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                            {{-- <form action="{{ url('admin/ban/' . $golongan->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Cetak</button>
                                </form> --}}
                            <a href="{{ url('admin/karyawan/cetak-pdf/' . $karyawan->id) }}"
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
