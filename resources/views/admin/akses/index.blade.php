@extends('layout.main')

@section('title', 'Data Akses')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Data Akses</h3>
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
            <h5 class="float-start">Tabel Akses</h5>
            {{-- <a href="{{ url('admin/karyawan/create') }}" class="btn btn-outline-primary btn-sm float-end">
                <i class="fas fa-plus"></i> Tambah
            </a> --}}
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar m-2">
                <table id="datatables" class="table table-bordered table-striped">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="text-center" width="10">No</th>
                            <th>Kode User</th>
                            <th>Nama</th>
                            <th class="text-center" width="100">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aksess as $akses)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $akses->kode_user }}</td>
                                <td>{{ $akses->karyawan->nama_lengkap }}</td>
                                <td class="text-center">
                                    <a href="{{ url('admin/akses/access/' . $akses->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-low-vision"></i> Akses
                                    </a>
                                    {{-- <a href="{{ url('admin/akses/' . $akses->id . '/edit') }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-low-vision"></i> Update Akses
                                        </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="card-footer py-0">
            <div class="pagination float-end">
                {{ $karyawans->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div> --}}
    </div>
@endsection
