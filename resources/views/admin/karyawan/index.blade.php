@extends('layout.main')

@section('title', 'Data Karyawan')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Data Karyawan</h3>
                    <p class="mb-0">Tabel</p>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
            <div class="bg-success me-3 icon-item">
                <span class="fas fa-check-circle text-white fs-3"></span>
            </div>
            <p class="mb-0 flex-1">{{ session('success') }}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="float-start">Tabel Karyawan</h5>
            <a href="{{ url('admin/karyawan/create') }}" class="btn btn-outline-primary btn-sm float-end">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-bordered table-striped">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Kode Karyawan</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Departemen</th>
                            <th class="text-center">Qr Code</th>
                            <th class="text-center" width="170">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($karyawans as $karyawan)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $karyawan->kode_karyawan }}</td>
                                <td>{{ $karyawan->nama_lengkap }}</td>
                                <td>{{ $karyawan->telp }}</td>
                                <td>
                                    @if ($karyawan->departemen)
                                        {{ $karyawan->departemen->nama }}
                                    @endif
                                    tidak ada
                                </td>
                                <td data-bs-toggle="modal" data-bs-target="#modal-qrcode-{{ $karyawan->id }}"
                                    style="text-align: center;">
                                    <div style="display: inline-block;">
                                        {!! DNS2D::getBarcodeHTML("$karyawan->qrcode_karyawan", 'QRCODE', 2, 2) !!}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('admin/karyawan/' . $karyawan->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ url('admin/karyawan/' . $karyawan->id . '/edit') }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-hapus-{{ $karyawan->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-hapus-{{ $karyawan->id }}" data-bs-keyboard="false"
                                data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog mt-6" role="document">
                                    <div class="modal-content border-0">
                                        <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                            <button
                                                class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-0">
                                            <div class="bg-light rounded-top-lg py-3 ps-4 pe-6 text-start">
                                                <h4 class="mb-3">Hapus</h4>
                                                <h5 class="fs-0 fw-normal">Yakin hapus karyawan
                                                    <strong>{{ $karyawan->nama_lengkap }}?</strong>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="button"
                                                onclick="event.preventDefault(); document.getElementById('delete{{ $karyawan->id }}').submit();">Hapus</button>
                                            <form action="{{ url('admin/karyawan/' . $karyawan->id) }}" method="POST"
                                                id="delete{{ $karyawan->id }}">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-qrcode-{{ $karyawan->id }}">
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
                                            <div style="text-align: center;">
                                                <div style="display: inline-block;">
                                                    {!! DNS2D::getBarcodeHTML("$karyawan->qrcode_karyawan", 'QRCODE', 15, 15) !!}
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <a href="{{ url('admin/karyawan/cetak-pdf/' . $karyawan->id) }}"
                                                    class="btn btn-primary">
                                                    <i class=""></i> Cetak
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer py-0">
            <div class="pagination float-end">
                {{ $karyawans->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
