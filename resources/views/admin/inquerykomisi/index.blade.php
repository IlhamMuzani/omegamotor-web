@extends('layout.main')

@section('title', 'Data Komisi')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Data Komisi</h3>
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
            <h5 class="float-start">Tabel Komisi</h5>

        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar m-2">
                <table id="datatables" class="table table-bordered table-striped">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Faktur Komisi</th>
                            <th>Faktur Pembelian / Penjualan</th>
                            <th class="text-center">Pelanggan</th>
                            <th class="text-center">No Registrasi</th>
                            <th class="text-center">Fee Marketing</th>
                            <th class="text-center" width="170">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($komisis as $komisi)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $komisi->kode_komisi }}</td>
                                <td>{{ $komisi->kode_faktur }}</td>
                                <td>
                                    @if ($komisi->pelanggan)
                                        {{ $komisi->pelanggan->nama_pelanggan }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                                <td>
                                    @if ($komisi->kendaraan)
                                        {{ $komisi->kendaraan->no_pol }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                                <td>Rp {{ number_format($komisi->fee, 0, ',', '.') }}</td>

                                <td class="text-center">
                                    @if ($komisi->status == 'unpost')
                                        <a href="{{ url('admin/inquery_komisi/' . $komisi->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ url('admin/inquery_komisi/' . $komisi->id . '/edit') }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modal-hapus-{{ $komisi->id }}">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modal-posting-{{ $komisi->id }}">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    @endif
                                    @if ($komisi->status == 'posting')
                                        <a href="{{ url('admin/inquery_komisi/' . $komisi->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modal-unpost-{{ $komisi->id }}">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-unpost-{{ $komisi->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Unpost Komisi</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Unpost Komisi
                                                <strong>{{ $komisi->kode_pembelian }}</strong>?
                                            </p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Batal</button>
                                            <a class="btn btn-primary"
                                                href="{{ route('unpostkomisi', ['id' => $komisi->id]) }}">Ya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-posting-{{ $komisi->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Posting Komisi</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Posting komisi
                                                <strong>{{ $komisi->kode_pembelian }}</strong>?
                                            </p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Batal</button>
                                            <a class="btn btn-primary"
                                                href="{{ route('postingkomisi', ['id' => $komisi->id]) }}">Ya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-hapus-{{ $komisi->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus Komisi</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin hapus komisi <strong>{{ $komisi->kode_komisi }}</strong>?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Batal</button>
                                            <form action="{{ url('admin/inquery_komisi/' . $komisi->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-qrcode-{{ $komisi->id }}">
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
                                                {{-- <div style="display: inline-block;">
                                                    {!! DNS2D::getBarcodeHTML("$komisi->qrcode_pembelian", 'QRCODE', 15, 15) !!}
                                                </div> --}}
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <a href="{{ url('admin/pembelian/cetak-pdf/' . $komisi->id) }}"
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
                {{ $pembelians->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div> --}}
    </div>
@endsection
