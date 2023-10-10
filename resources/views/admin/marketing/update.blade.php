@extends('layout.main')

@section('title', 'Perbarui Marketing')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Data Marketing</h3>
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
            <h5>Perbarui Marketing</h5>
        </div>
        <form action="{{ url('admin/marketing') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_marketing">Nama Marketing</label>
                    <input type="text" class="form-control" id="nama_marketing" name="nama_marketing"
                        placeholder="Masukan nama marketing"
                        value="{{ old('nama_marketingn', $marketing->nama_marketing) }}">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Alias</label>
                    <input type="text" class="form-control" id="nama_alias" name="nama_alias"
                        placeholder="Masukan nama alias" value="{{ old('nama_alias', $marketing->nama_alias) }}">
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control" id="umur" name="umur" placeholder="Masukan umur"
                        value="{{ old('umur', $marketing->umur) }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat">{{ old('alamat', $marketing->alamat) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="telp">No. Telepon</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input type="text" id="telp" name="telp" class="form-control"
                            placeholder="Masukan nomor telepon" value="{{ old('telp', $marketing->telp) }}">
                    </div>
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email"
                        value="{{ old('email', $marketing->email) }}">
                </div>
                <div class="form-group mb-3">
                    <label for="ig">Instagram</label>
                    <input type="text" class="form-control" id="ig" name="ig" placeholder="Masukan ig"
                        value="{{ old('ig', $marketing->ig) }}">
                </div>
                <div class="form-group mb-3">
                    <label for="fb">Facebook</label>
                    <input type="text" class="form-control" id="fb" name="fb" placeholder="Masukan fb"
                        value="{{ old('fb', $marketing->fb) }}">
                </div> --}}
                <div class="mb-3">
                    <label class="form-label" for="jk">Jenis Kelamin *</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="">- Pilih -</option>
                        <option value="Laki-laki"
                            {{ old('gender', $marketing->gender) == 'Laki-laki' ? 'selected' : null }}>
                            Laki-laki</option>
                        <option value="Perempuan"
                            {{ old('gender', $marketing->gender) == 'Perempuan' ? 'selected' : null }}>
                            Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar_ktp">Foto Profil</label>
                    <input class="form-control @error('gambar_ktp') is-invalid @enderror" id="gambar_ktp"
                        name="gambar_ktp" type="file" accept="image/*" />
                    @error('gambar_ktp')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-secondary me-1" type="reset">
                    <i class="fas fa-undo"></i> Reset
                </button>
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
