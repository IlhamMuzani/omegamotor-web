@extends('layout.main')

@section('title', 'Perbarui Kendaraan')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Data Kendaraan</h3>
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
            <h5>Perbarui Kendaraan</h5>
        </div>
        <form action="{{ url('admin/kendaraan/' . $kendaraan->id) }}" method="POST" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="no_pol">No. Registrasi *</label>
                    <input class="form-control @error('no_pol') is-invalid @enderror" id="no_pol" name="no_pol"
                        type="text" placeholder="masukan no registrasi"
                        value="{{ old('no_pol', $kendaraan->no_pol) }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="no_rangka">No. Rangka *</label>
                    <input class="form-control @error('no_rangka') is-invalid @enderror" id="no_rangka" name="no_rangka"
                        type="text" placeholder="masukan no rangka"
                        value="{{ old('no_rangka', $kendaraan->no_rangka) }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="no_mesin">No. Mesin *</label>
                    <input class="form-control @error('no_mesin') is-invalid @enderror" id="no_mesin" name="no_mesin"
                        type="text" placeholder="masukan no mesin" value="{{ old('no_mesin', $kendaraan->no_mesin) }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="warna">Warna</label>
                    <select class="form-control" id="warna" name="warna">
                        <option value="">- Pilih -</option>
                        <option value="Hitam" {{ old('warna', $kendaraan->warna) == 'Hitam' ? 'selected' : null }}>
                            Hitam</option>
                        <option value="Putih" {{ old('warna', $kendaraan->warna) == 'Putih' ? 'selected' : null }}>
                            Putih</option>
                        <option value="Cokelat" {{ old('warna', $kendaraan->warna) == 'Cokelat' ? 'selected' : null }}>
                            Cokelat</option>
                        <option value="Hijau" {{ old('warna', $kendaraan->warna) == 'Hijau' ? 'selected' : null }}>
                            Hijau</option>
                        <option value="Orange" {{ old('warna', $kendaraan->warna) == 'Orange' ? 'selected' : null }}>
                            Orange</option>
                        <option value="Merah" {{ old('warna', $kendaraan->warna) == 'Merah' ? 'selected' : null }}>
                            Merah</option>
                        <option value="Ungu" {{ old('warna', $kendaraan->warna) == 'Ungu' ? 'selected' : null }}>
                            Ungu</option>
                        <option value="Kuning" {{ old('warna', $kendaraan->warna) == 'Kuning' ? 'selected' : null }}>
                            Kuning</option>
                        <option value="Biru" {{ old('warna', $kendaraan->warna) == 'Biru' ? 'selected' : null }}>
                            Biru</option>
                        <option value="Silver" {{ old('warna', $kendaraan->warna) == 'Silver' ? 'selected' : null }}>
                            Silver</option>
                        <option value="Hitam" {{ old('warna', $kendaraan->warna) == 'Hitam' ? 'selected' : null }}>
                            Hitam</option>
                        <option value="Putih" {{ old('warna', $kendaraan->warna) == 'Putih' ? 'selected' : null }}>
                            Putih</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="merek_id">Merek</label>
                    <select class="form-control" id="merek_id" name="merek_id">
                        <option value="">- Pilih -</option>
                        @foreach ($mereks as $merek)
                            <option value="{{ $merek->id }}"
                                {{ old('merek_id', $kendaraan->merek_id) == $merek->id ? 'selected' : '' }}>
                                {{ $merek->nama_merek }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="modelken_id">Merek</label>
                    <select class="form-control" id="modelken_id" name="modelken_id">
                        <option value="">- Pilih -</option>
                        @foreach ($modelkens as $model)
                            <option value="{{ $model->id }}"
                                {{ old('modelken_id', $kendaraan->modelken_id) == $model->id ? 'selected' : '' }}>
                                {{ $model->nama_model }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tipe_id">Tipe</label>
                    <select class="form-control" id="tipe_id" name="tipe_id">
                        <option value="">- Pilih -</option>
                        @foreach ($tipes as $tipe)
                            <option value="{{ $tipe->id }}"
                                {{ old('tipe_id', $kendaraan->tipe_id) == $tipe->id ? 'selected' : '' }}>
                                {{ $tipe->nama_tipe }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="transmisi">Transmisi *</label>
                    <input class="form-control @error('transmisi') is-invalid @enderror" id="transmisi" name="transmisi"
                        type="text" placeholder="masukan transmisi" value="{{ old('transmisi', $kendaraan->transmisi) }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="km_berjalan">Km Berjalan *</label>
                    <input class="form-control @error('km_berjalan') is-invalid @enderror" id="km_berjalan"
                        name="km_berjalan" type="text" placeholder="masukan km berjalan"
                        value="{{ old('km_berjalan', $kendaraan->km_berjalan) }}" />
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
                <div class="form-group mb-3">
                    <label for="gambar_notis">Foto Notis</label>
                    <input class="form-control @error('gambar_notis') is-invalid @enderror" id="gambar_notis"
                        name="gambar_notis" type="file" accept="image/*" />
                    @error('gambar_notis')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="gambar_bpkb">Foto BPKB</label>
                    <input class="form-control @error('gambar_bpkb') is-invalid @enderror" id="gambar_bpkb"
                        name="gambar_bpkb" type="file" accept="image/*" />
                    @error('gambar_bpkb')
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
@endsection
