@extends('layout.main')

@section('title', 'Tambah Penjualan')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Tambah Penjualan</h3>
                    <p class="mb-0">Tambah</p>
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
            <h5>Tambah Penjualan</h5>
        </div>
        <form action="{{ url('admin/penjualan') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <button class="btn btn-primary btn-sm" type="button" onclick="showCategoryModalpelanggan(this.value)">
                        Pilih Pelanggan
                    </button>
                </div>

                <label class="form-label" for="nama_pelanggan">Nama Pembeli *</label>
                <div class="mb-2 d-flex">
                    <input class="form-control @error('nama_pelanggan') is-invalid @enderror" id="nama_pelanggan"
                        name="no_pol" type="text" placeholder=" " value="{{ old('nama_pelanggan') }}" readonly
                        style="margin-right: 10px;" />
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#modal-pelanggan">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="form-group" hidden>
                    <label for="pelanggan_id">Id Pelanggan</label>
                    <input type="text" class="form-control" id="pelanggan_id" name="pelanggan_id" placeholder=""
                        value="{{ old('pelanggan_id') }}">
                </div>
                <div class="form-group">
                    <label for="kode_pelanggan">Kode Pelanggan</label>
                    <input type="text" class="form-control" id="kode_pelanggan" name="kode_pelanggan" readonly
                        placeholder="" value="{{ old('kode_pelanggan') }}">
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control" id="umur" name="umur" placeholder="" readonly
                        value="{{ old('umur') }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" readonly placeholder="">{{ old('alamat') }}</textarea>
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
                <div class="col-lg-8 mb-3 mt-5">
                    <h5>Tambah Kendaraan</h5>
                </div>
                <div class="mb-3 mt-4">
                    <button class="btn btn-primary btn-sm" type="button" onclick="showCategoryModal(this.value)">
                        Pilih Kendaraan
                    </button>
                </div>
                <div class="mb-3" hidden>
                    <label class="form-label" for="kendaraan_id">Kendaraan id *</label>
                    <input class="form-control @error('no_pol') is-invalid @enderror" id="kendaraan_id"
                        name="kendaraan_id" readonly type="text" placeholder="" value="{{ old('kendaraan_id') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="no_pol">Kode Kendaraan *</label>
                    <input class="form-control @error('no_pol') is-invalid @enderror" id="kode_kendaraan" name="no_pol"
                        readonly type="text" placeholder="" value="{{ old('no_pol') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="no_pol">No. Registrasi *</label>
                    <input class="form-control @error('no_pol') is-invalid @enderror" id="no_pol" name="no_pol"
                        readonly type="text" placeholder="" value="{{ old('no_pol') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="no_rangka">No. Rangka *</label>
                    <input class="form-control @error('no_rangka') is-invalid @enderror" id="no_rangka" name="no_rangka"
                        readonly type="text" placeholder="" value="{{ old('no_rangka') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="no_mesin">No. Mesin *</label>
                    <input class="form-control @error('no_mesin') is-invalid @enderror" id="no_mesin" name="no_mesin"
                        readonly type="text" placeholder="" value="{{ old('no_mesin') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="merek">Warna *</label>
                    <input class="form-control @error('merek') is-invalid @enderror" id="warna" readonly
                        name="merek" readonly type="text" placeholder="" value="{{ old('merek') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="merek">Merek *</label>
                    <input class="form-control @error('merek') is-invalid @enderror" id="merek" readonly
                        name="merek" readonly type="text" placeholder="" value="{{ old('merek') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="model">Model *</label>
                    <input class="form-control @error('model') is-invalid @enderror" id="model" name="model"
                        readonly readonly type="text" placeholder="" value="{{ old('model') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tipe">Tipe *</label>
                    <input class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe"
                        readonly readonly type="text" placeholder="" value="{{ old('tipe') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="transmisi">Transmisi *</label>
                    <input class="form-control @error('transmisi') is-invalid @enderror" id="transmisi" readonly
                        name="transmisi" type="text" placeholder="" value="{{ old('transmisi') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="km_berjalan">Km Berjalan *</label>
                    <input class="form-control @error('km_berjalan') is-invalid @enderror" readonly id="km_berjalan"
                        name="km_berjalan" type="text" placeholder="" value="{{ old('km_berjalan') }}" />
                </div>
                <div class="col-lg-8 mb-3 mt-5">
                    <h5>Tambah Marketing</h5>
                </div>

                <div class="mb-3 mt-4">
                    <button class="btn btn-primary btn-sm" type="button"
                        onclick="showCategoryModalmarketing(this.value)">
                        Pilih Marketing
                    </button>
                </div>

                <label class="form-label" for="nama_marketing">Nama Marketing *</label>
                <div class="mb-2 d-flex">
                    <input class="form-control @error('nama_marketing') is-invalid @enderror" id="nama_marketing"
                        name="no_pol" type="text" placeholder=" " value="{{ old('nama_marketing') }}" readonly
                        style="margin-right: 10px;" />
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#modal-marketing">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="form-group" hidden>
                    <label for="marketing_id">Id Marketing</label>
                    <input type="text" class="form-control" id="marketing_id" name="marketing_id" placeholder=""
                        value="{{ old('marketing_id') }}">
                </div>
                <div class="form-group">
                    <label for="kode_marketing">Kode Marketing</label>
                    <input type="text" class="form-control" id="kode_marketing" name="kode_marketing" readonly
                        placeholder="" value="{{ old('kode_marketing') }}">
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control" id="umur_marketing" name="umur" placeholder=""
                        readonly value="{{ old('umur') }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat_marketing" name="alamat" readonly placeholder="">{{ old('alamat') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="telp">No. Telepon</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input type="text" id="telp_marketing" name="telp" class="form-control" readonly
                            placeholder="" value="{{ old('telp') }}">
                    </div>
                </div>

                <div class="col-lg-8 mb-3 mt-5">
                    <h5>Tambah Harga</h5>
                </div>

                <div class="form-group mb-3">
                    <label for="harga">Harga Jual</label>
                    <input type="number" class="form-control" id="harga" name="harga"
                        placeholder="Masukkan harga" value="{{ old('harga') }}">
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-secondary me-1" type="reset">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </div>

        </form>
    </div>

    <div class="modal fade" id="modal-pelanggan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pelanggan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/pelanggans') }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                                placeholder="Masukan nama pelanggan" value="{{ old('nama_pelanggan') }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Alias</label>
                            <input type="text" class="form-control" id="nama_alias" name="nama_alias"
                                placeholder="Masukan nama alias" value="{{ old('nama_alias') }}">
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" class="form-control" id="umur" name="umur"
                                placeholder="Masukan umur" value="{{ old('umur') }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat">{{ old('alamat') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="telp">No. Telepon</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+62</span>
                                </div>
                                <input type="text" id="telp" name="telp" class="form-control"
                                    placeholder="Masukan nomor telepon" value="{{ old('telp') }}">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Masukan email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="ig">Instagram</label>
                            <input type="text" class="form-control" id="ig" name="ig"
                                placeholder="Masukan ig" value="{{ old('ig') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="fb">Facebook</label>
                            <input type="text" class="form-control" id="fb" name="fb"
                                placeholder="Masukan fb" value="{{ old('fb') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="jk">Jenis Kelamin *</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">- Pilih -</option>
                                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : null }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : null }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gambar_ktp">Foto KTP</label>
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
        </div>
    </div>

    <div class="modal fade" id="tablePelanggan" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Pelanggan</h4>
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
                                    <th>Kode Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggans as $pelanggan)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $pelanggan->kode_pelanggan }}</td>
                                        <td>{{ $pelanggan->nama_pelanggan }}</td>
                                        <td>{{ $pelanggan->alamat }}</td>
                                        <td>{{ $pelanggan->telp }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm"
                                                onclick="getSelectedDatapelanggan('{{ $pelanggan->id }}', '{{ $pelanggan->kode_pelanggan }}', '{{ $pelanggan->nama_pelanggan }}', '{{ $pelanggan->telp }}', '{{ $pelanggan->umur }}', '{{ $pelanggan->alamat }}')">
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

    <div class="modal fade" id="tableKategori" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Kendaraan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="table-responsive scrollbar m-2">
                            <table id="datatables" class="table table-bordered table-striped">
                                <thead class="bg-200 text-900">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Kode Kendaraan</th>
                                        <th>No Registrasi</th>
                                        <th>Merek</th>
                                        <th>Model</th>
                                        <th>Tahun</th>
                                        <th>Warna</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kendaraans as $kendaraan)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $kendaraan->kode_kendaraan }}</td>
                                            <td>{{ $kendaraan->no_pol }}</td>
                                            <td>
                                                @if ($kendaraan->merek)
                                                    {{ $kendaraan->merek->nama_merek }}
                                                @else
                                                    data tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($kendaraan->merek)
                                                    {{ $kendaraan->merek->modelken->nama_model }}
                                                @else
                                                    data tidak ada
                                                @endif
                                            </td>
                                            <td>{{ $kendaraan->tahun_kendaraan }}</td>
                                            <td>{{ $kendaraan->warna }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    onclick="getSelectedData('{{ $kendaraan->id ?? '' }}', '{{ $kendaraan->kode_kendaraan ?? '' }}', '{{ $kendaraan->no_pol ?? '' }}', '{{ $kendaraan->no_rangka ?? '' }}', '{{ $kendaraan->no_mesin ?? '' }}', '{{ $kendaraan->warna ?? '' }}', '{{ $kendaraan->merek->nama_merek ?? '' }}', '{{ $kendaraan->merek->modelken->nama_model ?? '' }}', '{{ $kendaraan->merek->tipe->nama_tipe ?? '' }}', '{{ $kendaraan->transmisi ?? '' }}', '{{ $kendaraan->km_berjalan ?? '' }}')">
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
    </div>

    <div class="modal fade" id="tableMarketing" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Marketing</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive scrollbar m-2">
                        <table id="datatables3" class="table table-bordered table-striped">
                            <thead class="bg-200 text-900">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Kode Marketing</th>
                                    <th>Nama Marketing</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marketings as $marketing)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $marketing->kode_marketing }}</td>
                                        <td>{{ $marketing->nama_marketing }}</td>
                                        <td>{{ $marketing->alamat }}</td>
                                        <td>{{ $marketing->telp }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm"
                                                onclick="getSelectedDatamarketing('{{ $marketing->id }}', '{{ $marketing->kode_marketing }}', '{{ $marketing->nama_marketing }}', '{{ $marketing->telp }}', '{{ $marketing->umur }}', '{{ $marketing->alamat }}')">
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

    <div class="modal fade" id="modal-marketing">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Marketing</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/marketings') }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_marketing">Nama Marketing</label>
                            <input type="text" class="form-control" id="nama_marketing" name="nama_marketing"
                                placeholder="Masukan nama marekting" value="{{ old('nama_marketing') }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Alias</label>
                            <input type="text" class="form-control" id="nama_alias" name="nama_alias"
                                placeholder="Masukan nama alias" value="{{ old('nama_alias') }}">
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" class="form-control" id="umur" name="umur"
                                placeholder="Masukan umur" value="{{ old('umur') }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat">{{ old('alamat') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="telp">No. Telepon</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+62</span>
                                </div>
                                <input type="text" id="telp" name="telp" class="form-control"
                                    placeholder="Masukan nomor telepon" value="{{ old('telp') }}">
                            </div>
                        </div>
                        {{-- <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Masukan email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="ig">Instagram</label>
                            <input type="text" class="form-control" id="ig" name="ig"
                                placeholder="Masukan ig" value="{{ old('ig') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="fb">Facebook</label>
                            <input type="text" class="form-control" id="fb" name="fb"
                                placeholder="Masukan fb" value="{{ old('fb') }}">
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label" for="jk">Jenis Kelamin *</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">- Pilih -</option>
                                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : null }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : null }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gambar_ktp">Foto KTP</label>
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
        </div>
    </div>

    <script>
        function showCategoryModal(selectedCategory) {
            $('#tableKategori').modal('show');
        }

        function showCategoryModalpelanggan(selectedCategory) {
            $('#tablePelanggan').modal('show');
        }

        function showCategoryModalmarketing(selectedCategory) {
            $('#tableMarketing').modal('show');
        }

        function getSelectedData(kendaraan_id, kodeKendaraan, noRegistrasi, noRangka, noMesin, Warna, MerekKendaraan, Model,
            Tipe, Tranmisi, KmBerjalan) {
            // Set the values in the form fields
            document.getElementById('kendaraan_id').value = kendaraan_id;
            document.getElementById('kode_kendaraan').value = kodeKendaraan;
            document.getElementById('no_pol').value = noRegistrasi;
            document.getElementById('no_mesin').value = noMesin;
            document.getElementById('no_rangka').value = noRangka;
            document.getElementById('warna').value = Warna;
            document.getElementById('merek').value = MerekKendaraan;
            document.getElementById('model').value = Model;
            document.getElementById('tipe').value = Tipe;
            document.getElementById('transmisi').value = Tranmisi;
            document.getElementById('km_berjalan').value = KmBerjalan;

            // Close the modal (if needed)
            $('#tableKategori').modal('hide');
        }

        function getSelectedDatapelanggan(pelanggan_id, kodePelanggan, namaPelanggan, Telp, Umur, Alamat) {
            // Set the values in the form fields
            document.getElementById('pelanggan_id').value = pelanggan_id;
            document.getElementById('kode_pelanggan').value = kodePelanggan;
            document.getElementById('nama_pelanggan').value = namaPelanggan;
            document.getElementById('telp').value = Telp;
            document.getElementById('umur').value = Umur;
            document.getElementById('alamat').value = Alamat;

            // Close the modal (if needed)
            $('#tablePelanggan').modal('hide');
        }

        function getSelectedDatamarketing(marketing_id, kodeMarketing, namaMarketing, Telp, Umur, Alamat) {
            // Set the values in the form fields
            document.getElementById('marketing_id').value = marketing_id;
            document.getElementById('kode_marketing').value = kodeMarketing;
            document.getElementById('nama_marketing').value = namaMarketing;
            document.getElementById('telp_marketing').value = Telp;
            document.getElementById('umur_marketing').value = Umur;
            document.getElementById('alamat_marketing').value = Alamat;

            // Close the modal (if needed)
            $('#tableMarketing').modal('hide');
        }

        // $(document).ready(function() {
        //     // Ketika input pencarian berubah
        //     $('#searchInput').on('keyup', function() {
        //         var keyword = $(this).val(); // Mendapatkan nilai input pencarian

        //         // Kirim permintaan AJAX
        //         $.ajax({
        //             url: "{{ url('admin/penjualan') }}", // Ganti dengan URL yang sesuai untuk pencarian
        //             type: 'GET',
        //             data: {
        //                 keyword: keyword
        //             }, // Kirim keyword pencarian sebagai parameter
        //             success: function(data) {
        //                 // Perbarui tabel dengan hasil pencarian
        //                 $('#example tbody').html(data);
        //             }
        //         });
        //     });
        // });
    </script>


@endsection
