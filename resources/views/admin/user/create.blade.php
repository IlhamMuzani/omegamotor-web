@extends('layout.main')

@section('title', 'Tambah Karyawan')

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
                    <p class="mb-0">Tambah</p>
                </div>
            </div>
        </div>
    </div>
    @if (session('error'))
        <div class="alert alert-danger border-2" role="alert">
            <div class="clearfix">
                <div class="d-flex align-items-center float-start">
                    <div class="bg-danger me-3 icon-item">
                        <span class="fas fa-times-circle text-white fs-3"></span>
                    </div>
                    <h5 class="mb-0 text-danger">Error!</h5>
                </div>
                <button class="btn-close float-end" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="mt-3">
                @foreach (session('error') as $error)
                    <p>
                        <span class="dot bg-danger"></span> {{ $error }}
                    </p>
                @endforeach
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h5>Tambah Karyawan</h5>
        </div>
        <form action="{{ url('admin/user') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <button class="btn btn-primary btn-sm" type="button" onclick="showCategoryModal(this.value)">
                        Pilih Karyawan
                    </button>
                </div>
                <div class="form-group" hidden>
                    <label for="karyawan_id">Karyawan Id</label>
                    <input type="text" class="form-control" id="karyawan_id" name="karyawan_id" readonly placeholder=""
                        value="{{ old('karyawan_id') }}">
                </div>
                <div class="form-group">
                    <label for="kode_karyawan">Kode Karyawan</label>
                    <input type="text" class="form-control" id="kode_karyawan" name="kode_karyawan" readonly
                        placeholder="" value="{{ old('kode_karyawan') }}">
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Karyawan</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="" readonly
                        value="{{ old('nama_lengkap') }}">
                </div>
                <div class="form-group">
                    <label for="telp">No. Telepon</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input type="text" id="telp" name="telp" class="form-control" readonly placeholder=""
                            value="{{ old('telp') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" readonly placeholder="">{{ old('alamat') }}</textarea>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <div class="modal fade" id="tableKategori" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Karyawan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive scrollbar m-2">
                        <table id="datatables2" class="table table-bordered table-striped">
                            <thead class="bg-200 text-900">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Kode Karyawan</th>
                                    <th>Nama Karyawan</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawans as $karyawan)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $karyawan->kode_karyawan }}</td>
                                        <td>{{ $karyawan->nama_lengkap }}</td>
                                        <td>{{ $karyawan->telp }}</td>
                                        <td>{{ $karyawan->alamat }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm"
                                                onclick="getSelectedDataKaryawan('{{ $karyawan->id }}','{{ $karyawan->kode_karyawan }}', '{{ $karyawan->nama_lengkap }}', '{{ $karyawan->telp }}', '{{ $karyawan->alamat }}')">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showCategoryModal(selectedCategory) {
            $('#tableKategori').modal('show');
        }

        function getSelectedDataKaryawan(Karyawan_id, KodeKaryawan, namaKaryawan, Telp, Alamat) {
            // Set the values in the form fields
            document.getElementById('karyawan_id').value = Karyawan_id;
            document.getElementById('kode_karyawan').value = KodeKaryawan;
            document.getElementById('nama_lengkap').value = namaKaryawan;
            document.getElementById('telp').value = Telp;
            document.getElementById('alamat').value = Alamat;

            // Close the modal (if needed)
            $('#tableKategori').modal('hide');
        }
    </script>
@endsection
