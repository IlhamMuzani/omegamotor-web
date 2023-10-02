@extends('layout.main')

@section('title', 'Perbarui Merek')

@section('content')
<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card"
    style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
  </div>
  <!--/.bg-holder-->
  <div class="card-body position-relative">
    <div class="row">
      <div class="col-lg-8">
        <h3>Data Departemen</h3>
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
    <h5>Perbarui Merek</h5>
  </div>
  <form action="{{ url('admin/merek/' . $merek->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    @method('put')
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label" for="nama_merek">Nama Merek *</label>
        <input class="form-control" id="nama_merek" name="nama_merek" type="text" placeholder="masukan nama merek"
          value="{{ old('nama_merek', $merek->nama_merek) }}" />
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