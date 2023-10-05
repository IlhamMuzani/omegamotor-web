@extends('layout.main')

@section('title', 'Tambah Kendaraan')

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
            <h5>Tambah Kendaraan</h5>
        </div>
        <form action="{{ url('admin/kendaraan') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card-body">
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
                    <input class="form-control @error('nama_merek') is-invalid @enderror" id="nama_merek" name="nama_merek"
                        readonly type="text" placeholder="" value="{{ old('nama_merek') }}" />
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
                <div class="form-group mb-3">
                    <label for="gambar_interior">Foto Interiror</label>
                    <input class="form-control @error('gambar_interior') is-invalid @enderror" id="gambar_interior"
                        name="gambar_interior" type="file" accept="image/*" />
                    @error('gambar_interior')
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
                    <table id="example" class="table table-bordered table-striped">
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
    </script>

@endsection
