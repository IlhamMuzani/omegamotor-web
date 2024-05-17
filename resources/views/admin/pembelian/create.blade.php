@extends('layout.main')

@section('title', 'Tambah Pembelian')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Pembelian Kendaraan</h3>
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
            <h5>Tambah Pembelian</h5>
        </div>
        <form action="{{ url('admin/pembelian') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card-body">
                <label class="form-label" for="no_pol">Pelanggan *</label>
                <div class="mb-5 d-flex">
                    <select class="select2bs4" name="pelanggan_id" id="pelanggan_id" style="width: 100%;">
                        <option value="">- Pilih -</option>
                        @foreach ($pelanggans as $pelanggan)
                            <option value="{{ $pelanggan->id }}"
                                {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                                {{ $pelanggan->nama_pelanggan }}
                            </option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#modal-pelanggan">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                {{-- <div class="form-group mb-4">
                    <label for="alamat">Alamat *</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat">{{ old('alamat') }}</textarea>
                </div> --}}

                <div class="col-lg-8 mb-3 mt-5">
                    <h5>Tambah Marketing</h5>
                </div>

                <div class="mb-3 mt-4">
                    <button class="btn btn-primary btn-sm" type="button" onclick="showCategoryModalmarketing(this.value)">
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
                    <input type="text" class="form-control" id="umur_marketing" name="umur" placeholder="" readonly
                        value="{{ old('umur') }}">
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

                <div class="col-lg-8 mb-3 mt-4">
                    <h5>Tambah Kendaraan</h5>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="no_pol">No. Registrasi *</label>
                    <input class="form-control @error('no_pol') is-invalid @enderror" id="no_pol" name="no_pol"
                        type="text" placeholder="masukan no registrasi" value="{{ old('no_pol') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="no_rangka">No. Rangka *</label>
                    <input class="form-control @error('no_rangka') is-invalid @enderror" id="no_rangka" name="no_rangka"
                        type="text" placeholder="masukan no rangka" value="{{ old('no_rangka') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="no_mesin">No. Mesin *</label>
                    <input class="form-control @error('no_mesin') is-invalid @enderror" id="no_mesin" name="no_mesin"
                        type="text" placeholder="masukan no mesin" value="{{ old('no_mesin') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tahun_kendaraan">Tahun Pembuatan *</label>
                    <select class="form-control" id="tahun_kendaraan" name="tahun_kendaraan">
                        <option value="">- Pilih -</option>
                        <option value="2025" {{ old('tahun_kendaraan') == '2025' ? 'selected' : null }}>
                            2025</option>
                        <option value="2024" {{ old('tahun_kendaraan') == '2024' ? 'selected' : null }}>
                            2024</option>
                        <option value="2023" {{ old('tahun_kendaraan') == '2023' ? 'selected' : null }}>
                            2023</option>
                        <option value="2022" {{ old('tahun_kendaraan') == '2022' ? 'selected' : null }}>
                            2022</option>
                        <option value="2021" {{ old('tahun_kendaraan') == '2021' ? 'selected' : null }}>
                            2021</option>
                        <option value="2020" {{ old('tahun_kendaraan') == '2020' ? 'selected' : null }}>
                            2020</option>
                        <option value="2019" {{ old('tahun_kendaraan') == '2019' ? 'selected' : null }}>
                            2019</option>
                        <option value="2018" {{ old('tahun_kendaraan') == '2018' ? 'selected' : null }}>
                            2018</option>
                        <option value="2017" {{ old('tahun_kendaraan') == '2017' ? 'selected' : null }}>
                            2017</option>
                        <option value="2016" {{ old('tahun_kendaraan') == '2016' ? 'selected' : null }}>
                            2016</option>
                        <option value="2015" {{ old('tahun_kendaraan') == '2015' ? 'selected' : null }}>
                            2015</option>
                        <option value="2014" {{ old('tahun_kendaraan') == '2014' ? 'selected' : null }}>
                            2014</option>
                        <option value="2013" {{ old('tahun_kendaraan') == '2013' ? 'selected' : null }}>
                            2013</option>
                        <option value="2012" {{ old('tahun_kendaraan') == '2012' ? 'selected' : null }}>
                            2012</option>
                        <option value="2011" {{ old('tahun_kendaraan') == '2011' ? 'selected' : null }}>
                            2011</option>
                        <option value="2010" {{ old('tahun_kendaraan') == '2010' ? 'selected' : null }}>
                            2010</option>
                        <option value="2009" {{ old('tahun_kendaraan') == '2009' ? 'selected' : null }}>
                            2009</option>
                        <option value="2008" {{ old('tahun_kendaraan') == '2008' ? 'selected' : null }}>
                            2008</option>
                        <option value="2007" {{ old('tahun_kendaraan') == '2007' ? 'selected' : null }}>
                            2007</option>
                        <option value="2006" {{ old('tahun_kendaraan') == '2006' ? 'selected' : null }}>
                            2006</option>
                        <option value="2005" {{ old('tahun_kendaraan') == '2005' ? 'selected' : null }}>
                            2005</option>
                        <option value="2004" {{ old('tahun_kendaraan') == '2004' ? 'selected' : null }}>
                            2004</option>
                        <option value="2003" {{ old('tahun_kendaraan') == '2003' ? 'selected' : null }}>
                            2003</option>
                        <option value="2002" {{ old('tahun_kendaraan') == '2002' ? 'selected' : null }}>
                            2002</option>
                        <option value="2001" {{ old('tahun_kendaraan') == '2001' ? 'selected' : null }}>
                            2001</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="warna">Warna *</label>
                    <select class="form-control" id="warna" name="warna">
                        <option value="">- Pilih -</option>
                        <option value="Hitam" {{ old('warna') == 'Hitam' ? 'selected' : null }}>
                            Hitam</option>
                        <option value="Putih" {{ old('warna') == 'Putih' ? 'selected' : null }}>
                            Putih</option>
                        <option value="Cokelat" {{ old('warna') == 'Cokelat' ? 'selected' : null }}>
                            Cokelat</option>
                        <option value="Hijau" {{ old('warna') == 'Hijau' ? 'selected' : null }}>
                            Hijau</option>
                        <option value="Orange" {{ old('warna') == 'Orange' ? 'selected' : null }}>
                            Orange</option>
                        <option value="Merah" {{ old('warna') == 'Merah' ? 'selected' : null }}>
                            Merah</option>
                        <option value="Ungu" {{ old('warna') == 'Ungu' ? 'selected' : null }}>
                            Ungu</option>
                        <option value="Kuning" {{ old('warna') == 'Kuning' ? 'selected' : null }}>
                            Kuning</option>
                        <option value="Biru" {{ old('warna') == 'Biru' ? 'selected' : null }}>
                            Biru</option>
                        <option value="Silver" {{ old('warna') == 'Silver' ? 'selected' : null }}>
                            Silver</option>
                        <option value="Hitam" {{ old('warna') == 'Hitam' ? 'selected' : null }}>
                            Hitam</option>
                        <option value="Putih" {{ old('warna') == 'Putih' ? 'selected' : null }}>
                            Putih</option>
                        <option value="Abu-abu" {{ old('warna') == 'Abu-abu' ? 'selected' : null }}>
                            Abu-abu</option>
                    </select>
                </div>
                <div class="mb-3 mt-4">
                    <button class="btn btn-primary btn-sm" type="button" onclick="showCategoryModal(this.value)">
                        Pilih Merek
                    </button>
                </div>
                <div class="mb-3" hidden>
                    <label class="form-label" for="merek_id">Merek_id *</label>
                    <input class="form-control @error('merek_id') is-invalid @enderror" id="merek_id" name="merek_id"
                        readonly type="text" placeholder="" value="{{ old('merek_id') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nama_merek">Merek *</label>
                    <input class="form-control @error('nama_merek') is-invalid @enderror" id="nama_merek"
                        name="nama_merek" readonly type="text" placeholder="" value="{{ old('nama_merek') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="model">Model *</label>
                    <input class="form-control @error('model') is-invalid @enderror" id="model" name="model"
                        readonly type="text" placeholder="" value="{{ old('model') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tipe">Tipe *</label>
                    <input class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe"
                        readonly type="text" placeholder="" value="{{ old('tipe') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="transmisi">Transmisi *</label>
                    <input class="form-control @error('transmisi') is-invalid @enderror" id="transmisi" name="transmisi"
                        type="text" placeholder="masukan transmisi" value="{{ old('transmisi') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="km_berjalan">Km Berjalan *</label>
                    <input class="form-control @error('km_berjalan') is-invalid @enderror" id="km_berjalan"
                        name="km_berjalan" type="text" placeholder="masukan km berjalan"
                        value="{{ old('km_berjalan') }}" />
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-8 mb-3">
                    <h5>Tambah Foto</h5>
                </div>
                <div class="form-group mb-3">
                    <label for="gambar_stnk">Foto Stnk</label>
                    <input class="form-control @error('gambar_stnk') is-invalid @enderror" id="gambar_stnk"
                        name="gambar_stnk" type="file" accept="image/*" />
                    @error('gambar_stnk')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="gambar_notis">Foto Notis</label>
                    <input class="form-control @error('gambar_notis') is-invalid @enderror" id="gambar_notis"
                        name="gambar_notis" type="file" accept="image/*" />
                    @error('gambar_notis')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="form-group mb-3">
                    <label for="gambar">Foto BPKB</label>
                    <input class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar[]"
                        type="file" accept="image/*" multiple />
                    @error('gambar')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="gambar_dokumen">Foto Dokumen</label>
                    <input class="form-control @error('gambar_dokumen') is-invalid @enderror" id="gambar_dokumen"
                        name="gambar_dokumen" type="file" accept="image/*" />
                    @error('gambar_dokumen')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-5">
                    <label for="gambar_faktur">Foto Faktur</label>
                    <input class="form-control @error('gambar_faktur') is-invalid @enderror" id="gambar_faktur"
                        name="gambar_faktur" type="file" accept="image/*" />
                    @error('gambar_faktur')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-8 mb-3">
                    <h5>Foto Kendaraan</h5>
                </div>
                <div class="form-group mb-3">
                    <label for="gambar_depan">Foto Depan</label>
                    <input class="form-control @error('gambar_depan') is-invalid @enderror" id="gambar_depan"
                        name="gambar_depan" type="file" accept="image/*" />
                    @error('gambar_depan')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="gambar_belakang">Foto Belakang</label>
                    <input class="form-control @error('gambar_belakang') is-invalid @enderror" id="gambar_belakang"
                        name="gambar_belakang" type="file" accept="image/*" />
                    @error('gambar_belakang')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="gambar_kanan">Foto Kanan</label>
                    <input class="form-control @error('gambar_kanan') is-invalid @enderror" id="gambar_kanan"
                        name="gambar_kanan" type="file" accept="image/*" />
                    @error('gambar_kanan')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="gambar_kiri">Foto Kiri</label>
                    <input class="form-control @error('gambar_kiri') is-invalid @enderror" id="gambar_kiri"
                        name="gambar_kiri" type="file" accept="image/*" />
                    @error('gambar_kiri')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="gambar_dashboard">Foto Dashboard</label>
                    <input class="form-control @error('gambar_dashboard') is-invalid @enderror" id="gambar_dashboard"
                        name="gambar_dashboard" type="file" accept="image/*" />
                    @error('gambar_dashboard')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="gambar_interior">Foto Interiror</label>
                    <input class="form-control @error('gambar_interior') is-invalid @enderror" id="gambar_interior"
                        name="gambar_interior" type="file" accept="image/*" />
                    @error('gambar_interior')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga"
                        placeholder="Masukan harga" value="{{ old('harga') }}">
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

    <div class="modal fade" id="tableKategori" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Merek</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="float-right">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-merek"
                            class="btn btn-primary btn-sm mb-3" data-bs-dismiss="modal">
                            Tambah
                        </button>
                    </div>
                    {{-- <button type="button" data-toggle="modal" data-target="#modal-part"
                            class="btn btn-primary btn-sm mb-2" data-dismiss="modal">
                            Tambah
                        </button> --}}
                    <table id="datatables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Kode Merek</th>
                                <th>Merek</th>
                                <th>Model</th>
                                <th>Type</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mereks as $merek)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $merek->kode_merek }}</td>
                                    <td>{{ $merek->nama_merek }}</td>
                                    <td>{{ $merek->modelken->nama_model }}</td>
                                    <td>{{ $merek->tipe->nama_tipe }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-sm"
                                            onclick="getSelectedData('{{ $merek->id }}', '{{ $merek->nama_merek }}', '{{ $merek->modelken->nama_model }}', '{{ $merek->tipe->nama_tipe }}')">
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

    <div class="modal fade" id="modal-merek"data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Merek</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/mereks') }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="nama_merek">Nama Merek *</label>
                            <input class="form-control @error('nama_merek') is-invalid @enderror" id="nama_merek"
                                name="nama_merek" type="text" placeholder="masukan nama  merek"
                                value="{{ old('nama_merek') }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="modelken_id">Nama Model *</label>
                            <div class="mb-3 d-flex">
                                <select class="form-control" id="modelken_id" name="modelken_id"
                                    style="margin-right: 10px;">
                                    <option value="">- Pilih -</option>
                                    @foreach ($modelkens as $model)
                                        <option value="{{ $model->id }}"
                                            {{ old('modelken_id') == $model->id ? 'selected' : '' }}>
                                            {{ $model->nama_model }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-primary btn-sm" id="btn-tambah-model">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tipe_id">Nama Type *</label>
                            <div class="mb-3 d-flex">
                                <select class="form-control" id="tipe_id" name="tipe_id" style="margin-right: 10px;">
                                    <option value="">- Pilih -</option>
                                    @foreach ($tipes as $tipe)
                                        <option value="{{ $tipe->id }}"
                                            {{ old('tipe_id') == $tipe->id ? 'selected' : '' }}>
                                            {{ $tipe->nama_tipe }}
                                        </option>
                                    @endforeach
                                </select>
                                <!-- Tombol "Tambah Tipe" -->
                                <button type="button" class="btn btn-primary btn-sm" id="btn-tambah-tipe">
                                    <i class="fas fa-plus"></i>
                                </button>
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

    <div class="modal fade" id="modal-tipe">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Type</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/tipe') }}" method="POST" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="nama_tipe">Nama Type *</label>
                                <input class="form-control @error('nama_tipe') is-invalid @enderror" id="nama_tipe"
                                    name="nama_tipe" type="text" placeholder="masukan nama tipe"
                                    value="{{ old('nama_tipe') }}" />
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-secondary me-1" type="reset">
                                    <i class="fas fa-undo"></i> Reset
                                </button>
                                <button class="btn btn-primary" type="submit" id="simpanButton">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-model">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Model</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/modelken') }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="nama_model">Nama Model *</label>
                            <input class="form-control @error('nama_model') is-invalid @enderror" id="nama_model"
                                name="nama_model" type="text" placeholder="masukan nama model"
                                value="{{ old('nama_model') }}" />
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
        </div>
    </div>




    <script>
        function showCategoryModal(selectedCategory) {
            $('#tableKategori').modal('show');
        }

        function getSelectedData(merek_id, namaMerek, namaModel, namaTipe) {
            // Set the values in the form fields
            document.getElementById('merek_id').value = merek_id;
            document.getElementById('nama_merek').value = namaMerek;
            document.getElementById('model').value = namaModel;
            document.getElementById('tipe').value = namaTipe;

            // Close the modal (if needed)
            $('#tableKategori').modal('hide');
        }

        document.getElementById('btn-tambah-tipe').addEventListener('click', function() {
            var modalTipe = new bootstrap.Modal(document.getElementById('modal-tipe'));
            modalTipe.show();
        });

        document.getElementById('btn-tambah-model').addEventListener('click', function() {
            var modalTipe = new bootstrap.Modal(document.getElementById('modal-model'));
            modalTipe.show();
        });

        function showCategoryModalmarketing(selectedCategory) {
            $('#tableMarketing').modal('show');
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
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Tambahkan script inisialisasi -->
    <script>
        $(document).ready(function() {
            $('.select2bs4').select2({
                theme: 'bootstrap4', // Menggunakan tema Bootstrap 4
                placeholder: 'Pilih Pelanggan..', // Pesan placeholder
                allowClear: true // Menambahkan opsi untuk menghapus pilihan
            });
        });
    </script>

@endsection
