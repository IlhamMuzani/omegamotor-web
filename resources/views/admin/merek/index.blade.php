@extends('layout.main')

@section('title', 'Data Merek')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Data Merek</h3>
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
            <h5 class="float-start">Tabel Merek</h5>
            <a href="{{ url('admin/merek/create') }}" class="btn btn-outline-primary btn-sm float-end">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar m-2">
                <table id="datatables" class="table table-bordered table-striped">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Kode Merek</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th class="text-center">Qr Code</th>
                            <th class="text-center" width="120">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($mereks as $merek)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $merek->kode_merek }}</td>
                                <td>{{ $merek->nama_merek }}</td>
                                <td>
                                    @if ($merek->modelken)
                                        {{ $merek->modelken->nama_model }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                                <td>
                                    @if ($merek->tipe)
                                        {{ $merek->tipe->nama_tipe }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                                <td data-bs-toggle="modal" data-bs-target="#modal-qrcode-{{ $merek->id }}"
                                    style="text-align: center;">
                                    <div style="display: inline-block;">
                                        {!! DNS2D::getBarcodeHTML("$merek->qrcode_merek", 'QRCODE', 2, 2) !!}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('admin/merek/' . $merek->id . '/edit') }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-hapus-{{ $merek->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-hapus-{{ $merek->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus Merek</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin hapus merek <strong>{{ $merek->nama_merek }}</strong>?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Batal</button>
                                            <form action="{{ url('admin/merek/' . $merek->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal-qrcode-{{ $merek->id }}">
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
                                                    {!! DNS2D::getBarcodeHTML("$merek->qrcode_merek", 'QRCODE', 15, 15) !!}
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <a href="{{ url('admin/merek/cetak-qrcode/' . $merek->id) }}"
                                                    class="btn btn-primary btn-sm">
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
        {{-- <div class="card-footer py-0">
            <div class="pagination float-end">
                {{ $mereks->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div> --}}
    </div>
@endsection
