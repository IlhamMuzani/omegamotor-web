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
                <div class="form-group">
                    <label for="">Pilih Kode Karyawan</label>
                    <select class="custom-select form-control" id="kode_karyawan" name="karyawan_id" onchange="getData(0)">
                        <option value="">- Pilih -</option>
                        @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->kode_karyawan }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="form-group" style="flex: 8;"> <!-- Adjusted flex value -->
                    <label for="karyawan_id">Pilih Kode Karyawan</label>
                    <select class="select2bs4 select2-hidden-accessible" name="karyawan_id"
                        data-placeholder="Cari Karyawan.." style="width: 100%;" data-select2-id="23" tabindex="-1"
                        aria-hidden="true" id="kode_karyawan" onchange="getData(0)">
                        <option value="">- Pilih -</option>
                        @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}" {{ old('karyawan_id') == $karyawan->id ? 'selected' : '' }}>
                                {{ $karyawan->kode_karyawan }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group">
                    <label for="nama_lengkap">Nama lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" readonly placeholder=""
                        value="{{ old('nama_lengkap') }}">
                </div>
                <div class="form-group">
                    <label for="nama">No KTP</label>
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" readonly placeholder=""
                        value="{{ old('no_ktp') }}">
                </div>

                <div class="form-group">
                    <label for="nama">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" readonly placeholder=""
                        value="{{ old('alamat') }}">
                </div>

            </div>
            <div class="card-footer text-right">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>


@endsection

<script>
    function getData(id) {
        var kode_karyawan = document.getElementById('kode_karyawan');
        $.ajax({
            url: "{{ url('admin/user/karyawan') }}" + "/" + kode_karyawan.value,
            type: "GET",
            dataType: "json",
            success: function(kode_karyawan) {
                var nama_lengkap = document.getElementById('nama_lengkap');
                nama_lengkap.value = kode_karyawan.nama_lengkap;

                var no_ktp = document.getElementById('no_ktp');
                no_ktp.value = kode_karyawan.no_ktp;

                var alamat = document.getElementById('alamat');
                alamat.value = kode_karyawan.alamat;
            },
        });
    }
</script>
