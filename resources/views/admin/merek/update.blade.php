@extends('layout.main')

@section('title', 'Tambah Merek')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Data Merek</h3>
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
            <h5>Tambah Merek</h5>
        </div>
        <form action="{{ url('admin/merek/' . $merek->id) }}" method="POST" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="nama_merek">Nama Merek *</label>
                    <input class="form-control @error('nama_merek') is-invalid @enderror" id="nama_merek" name="nama_merek"
                        type="text" placeholder="masukan nama  merek" value="{{ old('nama_merek', $merek->nama_merek) }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="modelken_id">Nama Model *</label>
                    <div class="mb-3 d-flex">
                        <select class="form-control" id="modelken_id" name="modelken_id" style="margin-right: 10px;">
                            <option value="">- Pilih -</option>
                            @foreach ($modelkens as $model)
                                <option value="{{ $model->id }}"
                                    {{ old('modelken_id', $merek->modelken_id) == $model->id ? 'selected' : '' }}>
                                    {{ $model->nama_model }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modal-model">
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
                                    {{ old('tipe_id', $merek->tipe_id) == $tipe->id ? 'selected' : '' }}>
                                    {{ $tipe->nama_tipe }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modal-tipe">
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
                                    <button class="btn btn-primary" type="submit">
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
    </div>
@endsection
