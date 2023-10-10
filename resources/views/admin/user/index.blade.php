@extends('layout.main')

@section('title', 'Data User')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Data User</h3>
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
            <h5 class="float-start">Tabel User</h5>
            <a href="{{ url('admin/user/create') }}" class="btn btn-outline-primary btn-sm float-end">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar m-2">
                <table id="datatables" class="table table-bordered table-striped">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Kode User</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Departemen</th>
                            {{-- <th class="text-center">Qr Code</th> --}}
                            <th class="text-center" width="20">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $user->kode_user }}</td>
                                <td>
                                    @if ($user->karyawan)
                                        {{ $user->karyawan->nama_lengkap }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                                <td>{{ $user->karyawan->telp }}</td>
                                <td>
                                    @if ($user->karyawan->departemen)
                                        {{ $user->karyawan->departemen->nama }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                                {{-- <td data-toggle="modal" data-target="#modal-qrcode-{{ $user->id }}"
                                    style="text-align: center;">
                                    <div style="display: inline-block;">
                                        {!! DNS2D::getBarcodeHTML("$user->qrcode_user", 'QRCODE', 2, 2) !!}
                                    </div>
                                </td> --}}
                                <td class="text-center">
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-hapus-{{ $user->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-hapus-{{ $user->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus User</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin hapus user <strong>{{ $user->karyawan->nama_lengkap }}</strong>?
                                            </p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Batal</button>
                                            <form action="{{ url('admin/user/' . $user->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-qrcode-{{ $user->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Gambar QR Code</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div style="text-align: center;">
                                                <div style="display: inline-block;">
                                                    {!! DNS2D::getBarcodeHTML("$user->qrcode_user", 'QRCODE', 15, 15) !!}
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Batal</button>
                                                <a href="{{ url('admin/user/cetak-pdf/' . $user->id) }}"
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
                {{ $users->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div> --}}
    </div>
@endsection
