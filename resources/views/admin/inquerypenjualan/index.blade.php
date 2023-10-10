@extends('layout.main')

@section('title', 'Data Penjualan')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Data Penjualan</h3>
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
            <h5 class="float-start">Tabel Penjualan</h5>

        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar m-2">
                <table id="datatables" class="table table-bordered table-striped">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Faktur Penjualan</th>
                            <th>Tanggal</th>
                            <th class="text-center">Pelanggan</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center" width="170">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($penjualans as $penjualan)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $penjualan->kode_penjualan }}</td>
                                <td>{{ $penjualan->tanggal_awal }}</td>
                                <td>
                                    @if ($penjualan->pelanggan)
                                        {{ $penjualan->pelanggan->nama_pelanggan }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                                {{-- <td>{{ $pembelian->harga }}</td>
                                <td>{{ $pembelian->vi_marketing }}</td> --}}
                                <td>Rp {{ number_format($penjualan->harga, 0, ',', '.') }}</td>
                                {{-- <td class="text-center">
                                    <a href="{{ url('admin/pembelian/' . $pembelian->id . '/edit') }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-hapus-{{ $pembelian->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td> --}}
                                <td class="text-center">
                                    @if ($penjualan->status == 'unpost')
                                        <a href="{{ url('admin/inquery_penjualan/' . $penjualan->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ url('admin/inquery_penjualan/' . $penjualan->id . '/edit') }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modal-hapus-{{ $penjualan->id }}">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modal-posting-{{ $penjualan->id }}">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    @endif
                                    @if ($penjualan->status == 'posting')
                                        <a href="{{ url('admin/inquery_penjualan/' . $penjualan->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modal-unpost-{{ $penjualan->id }}">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-unpost-{{ $penjualan->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Unpost Penjualan</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Unpost penjualan
                                                <strong>{{ $penjualan->kode_penjualan }}</strong>?
                                            </p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Batal</button>
                                            <a class="btn btn-primary"
                                                href="{{ route('unpostpenjualan', ['id' => $penjualan->id]) }}">Ya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-posting-{{ $penjualan->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Posting Penjualan</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Posting penjualan
                                                <strong>{{ $penjualan->kode_penjualan }}</strong>?
                                            </p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Batal</button>
                                            <a class="btn btn-primary"
                                                href="{{ route('postingpenjualan', ['id' => $penjualan->id]) }}">Ya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-hapus-{{ $penjualan->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus Penjualan</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin hapus penjualan <strong>{{ $penjualan->kode_penjualan }}</strong>?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Batal</button>
                                            <form action="{{ url('admin/inquery_penjualan/' . $penjualan->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="modal fade" id="modal-qrcode-{{ $penjualan->id }}">
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
                                                    {!! DNS2D::getBarcodeHTML("$penjualan->qrcode_penjualan", 'QRCODE', 15, 15) !!}
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <a href="{{ url('admin/penjualan/cetak-pdf/' . $penjualan->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class=""></i> Cetak
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="card-footer py-0">
            <div class="pagination float-end">
                {{ $penjualans->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div> --}}
    </div>
@endsection
