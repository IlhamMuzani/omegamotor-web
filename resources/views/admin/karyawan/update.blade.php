@extends('layout.main')

@section('title', 'Ubah Karyawan')

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
                    <p class="mb-0">Perbarui</p>
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
            <h5>Perbarui Karyawan</h5>
        </div>
        <form action="{{ url('admin/karyawan/' . $karyawan->id) }}" method="POST" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="departemen_id">Departemen</label>
                    <select class="custom-select form-control" id="departemen_id" name="departemen_id">
                        <option value="">- Pilih Departemen -</option>
                        @foreach ($departemens as $departemen)
                            <option value="{{ $departemen->id }}"
                                {{ old('departemen_id', $karyawan->departemen_id) == $departemen->id ? 'selected' : '' }}>
                                {{ $departemen->nama }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="form-group">
                            <label for="kode_karyawan">Kode Karyawan</label>
                            <input type="text" class="form-control" id="kode_karyawan" name="kode_karyawan"
                                placeholder="Masukan kode" value="{{ old('kode_karyawan') }}">
                        </div> --}}
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                        placeholder="Masukan nama lengkap" value="{{ old('nama_lengkap', $karyawan->nama_lengkap) }}">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Kecil</label>
                    <input type="text" class="form-control" id="nama_kecil" name="nama_kecil"
                        placeholder="Masukan nama kecil" value="{{ old('nama_kecil', $karyawan->nama_kecil) }}">
                </div>
                <div class="form-group">
                    <label for="nama">No KTP</label>
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukan no KTP"
                        value="{{ old('no_ktp', $karyawan->no_ktp) }}">
                </div>
                <div class="form-group">
                    <label for="nama">No SIM</label>
                    <input type="text" class="form-control" id="no_sim" name="no_sim" placeholder="Masukan no SIM"
                        value="{{ old('no_sim', $karyawan->no_sim) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="gender">Pilih Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="">- Pilih -</option>
                        <option value="L" {{ old('gender', $karyawan->gender) == 'L' ? 'selected' : null }}>
                            Laki-laki</option>
                        <option value="P" {{ old('gender', $karyawan->gender) == 'P' ? 'selected' : null }}>
                            Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir:</label>
                    <div class="input-group date" id="reservationdatetime">
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="d M Y sampai d M Y"
                            data-options='{"mode":"range","dateFormat":"d M Y","disableMobile":true}'
                            value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir) }}"
                            class="form-control datetimepicker-input" data-target="#reservationdatetime">
                    </div>
                </div>
                <div class="form-group">
                    <label>Tanggal Gabung:</label>
                    <div class="input-group date" id="reservationdatetime">
                        <input type="date" id="tanggal_gabung" name="tanggal_gabung" placeholder="d M Y sampai d M Y"
                            data-options='{"mode":"range","dateFormat":"d M Y","disableMobile":true}'
                            value="{{ old('tanggal_gabung', $karyawan->tanggal_gabung) }}"
                            class="form-control datetimepicker-input" data-target="#reservationdatetime">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="jabatan">Jabatan</label>
                    <select class="form-control" id="jabatan" name="jabatan">
                        <option value="">- Pilih Jabatan -</option>
                        <option value="STAFF" {{ old('jabatan', $karyawan->jabatan) == 'STAFF' ? 'selected' : null }}>
                            STAFF</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="telp">No. Telepon</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input type="text" id="telp" name="telp" class="form-control"
                            placeholder="Masukan nomor telepon" value="{{ old('telp', $karyawan->telp) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat"
                        value="">{{ old('alamat', $karyawan->alamat) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="gambar">Foto Profil <small>(Kosongkan saja jika tidak
                            ingin menambahkan)</small></label>
                    <input class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar"
                        type="file" accept="image/*" />
                    @error('gambar')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
