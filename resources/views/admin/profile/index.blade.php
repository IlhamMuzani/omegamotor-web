@extends('layout.main')

@section('title', 'Data Marketing')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Profil</h3>
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
            <h5 class="float-start">Update Profil</h5>
        </div>
        <form action="{{ url('admin/profile/update') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="kode">Kode User</label>
                    <input type="text" class="form-control" id="kode_user" name="kode_user" readonly
                        placeholder="Masukan user" value="{{ old('kode_user', $user->kode_user) }}">
                </div>
                <div class="form-group mt-3">
                    <label for="nama">Nama User</label>
                    <input type="text" class="form-control" id="nama" name="nama_lengkap" readonly
                        placeholder="Masukan nama user" value="{{ old('nama', $user->karyawan->nama_lengkap) }}">
                </div>
                <div class="form-group mt-3">
                    <label for="telp">No. Telepon</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62</span>
                        </div>
                        <input type="text" id="telp" name="telp" class="form-control" readonly
                            placeholder="Masukan nomor telepon" value="{{ old('telp', $user->karyawan->telp) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" readonly rows="3" placeholder="Masukan alamat">{{ old('alamat', $user->karyawan->alamat) }}</textarea>
                </div>

                <div class="mt-4">
                    @if ($user->karyawan->gambar)
                        <img src="{{ asset('storage/uploads/' . $user->karyawan->gambar) }}"
                            alt="{{ $user->karyawan->nama_lengkap }}" height="100" width="100">
                    @else
                        <img class="mt-3" src="{{ asset('storage/uploads/gambaricon/imagenoimage.jpg') }}"
                            alt="AdminLTELogo" height="100" width="100">
                    @endif
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="gambar">Foto Profil</label>
                    <input class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar"
                        type="file" accept="image/*" />
                    @error('gambar')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" value="{{ Session::get('password') }}" />
                            <span class="input-group-text cursor-pointer" id="password-toggle"><i
                                    class="far fa-eye-slash"></i></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <small>(Kosongkan saja jika tidak ingin diubah)</small>
                    </div>

                    <div class="col-lg-6">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Konfirmasi Password</label>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password_confirmation" class="form-control"
                                name="password_confirmation"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" value="{{ Session::get('password') }}" />
                            <span class="input-group-text cursor-pointer" id="password-confirm-toggle"><i
                                    class="far fa-eye-slash"></i></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
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

    <script>
        $(document).ready(function() {
            $('#password-toggle').click(function() {
                togglePasswordVisibility('password', 'password-icon');
            });

            $('#password-confirm-toggle').click(function() {
                togglePasswordVisibility('password_confirmation', 'password-confirm-icon');
            });

            function togglePasswordVisibility(inputId, iconId) {
                var passwordInput = $('#' + inputId);
                var passwordIcon = $('#' + iconId);

                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    passwordIcon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    passwordIcon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            }
        });
    </script>
@endsection
