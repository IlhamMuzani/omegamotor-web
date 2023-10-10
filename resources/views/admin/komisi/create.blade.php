@extends('layout.main')

@section('title', 'Tambah Komisi')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Komisi Pembelian / Penjualan</h3>
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
            <h5>Tambah Komisi</h5>
        </div>
        <form action="{{ url('admin/komisi') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="kategori">Kategori *</label>
                    <select class="form-control" id="kategori" name="kategori" onchange="showCategoryModal(this.value)">
                        <option value="">- Pilih -</option>
                        <option value="Pembelian" {{ old('kategori') == 'Pembelian' ? 'selected' : null }}>
                            Pembelian</option>
                        <option value="Penjualan" {{ old('kategori') == 'Penjualan' ? 'selected' : null }}>
                            Penjualan</option>
                    </select>
                </div>
                {{-- <div class="mb-3 mt-4">
                    <button class="btn btn-primary btn-sm" type="button" onclick="showCategoryModal(this.value)">
                        Pilih Faktur
                    </button>
                </div> --}}
                <div class="mb-3" hidden>
                    <label class="form-label" for="kode_pembelian">Pembelian / Penjualan id *</label>
                    <input class="form-control @error('kode_pembelian') is-invalid @enderror" id="pembelian_id"
                        name="pembelian_id" readonly type="text" placeholder="" value="{{ old('pembelian_id') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="kode">Kode Faktur *</label>
                    <input class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode_faktur"
                        readonly type="text" placeholder="" value="{{ old('kode') }}" />
                </div>
                <div class="mb-3" hidden>
                    <label class="form-label" for="pelanggan_id">Pelanggan Id *</label>
                    <input class="form-control @error('pelanggan_id') is-invalid @enderror" id="pelanggan_id"
                        name="pelanggan_id" readonly type="text" placeholder="" value="{{ old('pelanggan_id') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nama_pelanggan">Pelanggan *</label>
                    <input class="form-control @error('nama_pelanggan') is-invalid @enderror" id="nama_pelanggan"
                        name="nama_pelanggan" readonly type="text" placeholder="" value="{{ old('nama_pelanggan') }}" />
                </div>
                <div class="mb-3" hidden>
                    <label class="form-label" for="kendaraan_id">Kendaraan Id *</label>
                    <input class="form-control @error('kendaraan_id') is-invalid @enderror" id="kendaraan_id"
                        name="kendaraan_id" readonly type="text" placeholder="" value="{{ old('kendaraan_id') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="no_pol">No Registrasi Kendaraan *</label>
                    <input class="form-control @error('no_pol') is-invalid @enderror" id="kendaraan" name="no_pol" readonly
                        type="text" placeholder="" value="{{ old('no_pol') }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="harga">Harga *</label>
                    <input class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
                        readonly type="text" placeholder="" value="{{ old('harga') }}" />
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary btn-sm" type="button"
                        onclick="showCategoryModalmarketing(this.value)">
                        Pilih Marketing
                    </button>
                </div>

                <label class="form-label" for="nama_marketing">Nama Pembeli *</label>
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
                        <input type="text" id="telp" name="telp" class="form-control" readonly
                            placeholder="" value="{{ old('telp') }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fee">Komisi / Fee Marketing *</label>
                    <input class="form-control @error('fee') is-invalid @enderror" id="fee" name="fee"
                        type="text" placeholder="masukan fee" value="{{ old('fee') }}" />
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

    <div class="modal fade" id="tablePembelians" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Faktur Pembelian</h4>
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
                                        <th>Kode Pembelian</th>
                                        <th>Pembeli</th>
                                        <th>Kendaraan</th>
                                        <th>Harga</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembelians as $pembelian)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $pembelian->kode_pembelian }}</td>
                                            <td>
                                                @if ($pembelian->pelanggan)
                                                    {{ $pembelian->pelanggan->nama_pelanggan }}
                                                @else
                                                    data tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($pembelian->detail_kendaraan->first())
                                                    {{ $pembelian->detail_kendaraan->first()->no_pol }}
                                                @else
                                                    data tidak ada
                                                @endif
                                            </td>
                                            <td>{{ $pembelian->harga }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    onclick="getSelectedData('{{ $pembelian->id ?? '' }}', '{{ $pembelian->kode_pembelian ?? '' }}', '{{ $pembelian->pelanggan->id ?? '' }}', '{{ $pembelian->pelanggan->nama_pelanggan ?? '' }}', '{{ $pembelian->detail_kendaraan->first()->id ?? '' }}', '{{ $pembelian->detail_kendaraan->first()->no_pol ?? '' }}', '{{ $pembelian->harga ?? '' }}')">
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

    <div class="modal fade" id="tablePenjualans" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Faktur Penjualan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="table-responsive scrollbar m-2">
                            <table id="datatables2" class="table table-bordered table-striped">
                                <thead class="bg-200 text-900">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Kode Penjualan</th>
                                        <th>Pelanggan</th>
                                        <th>Kendaraan</th>
                                        <th>Harga</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penjualans as $penjualan)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $penjualan->kode_penjualan }}</td>
                                            <td>
                                                @if ($penjualan->pelanggan)
                                                    {{ $penjualan->pelanggan->nama_pelanggan }}
                                                @else
                                                    data tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($penjualan->kendaraan)
                                                    {{ $penjualan->kendaraan->no_pol }}
                                                @else
                                                    data tidak ada
                                                @endif
                                            </td>
                                            <td>{{ $penjualan->harga }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    onclick="getSelectedData2('{{ $penjualan->id ?? '' }}', '{{ $penjualan->kode_penjualan ?? '' }}', '{{ $penjualan->pelanggan->id ?? '' }}', '{{ $penjualan->pelanggan->nama_pelanggan ?? '' }}', '{{ $penjualan->kendaraan->id ?? '' }}', '{{ $penjualan->kendaraan->no_pol ?? '' }}', '{{ $penjualan->harga ?? '' }}')">
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


    <script>
        function showCategoryModal(selectedCategory) {
            if (selectedCategory === 'Pembelian') {
                $('#tablePembelians').modal('show');
                $('#tablePenjualans').modal('hide');
            } else if (selectedCategory === 'Penjualan') {
                $('#tablePembelians').modal('hide');
                $('#tablePenjualans').modal('show');
            } else {
                $('#tablePembelians').modal('hide');
                $('#tablePenjualans').modal('hide');
            }
        }

        function showCategoryModalmarketing(selectedCategory) {
            $('#tableMarketing').modal('show');
        }

        function getSelectedData(Pembelian_id, Kode_pembelian, Pelanggan_id, Pelanggan, Kendaraan_id, Kendaraan, Harga) {
            // Set the values in the form fields
            document.getElementById('pembelian_id').value = Pembelian_id;
            document.getElementById('kode').value = Kode_pembelian;
            document.getElementById('pelanggan_id').value = Pelanggan_id;
            document.getElementById('nama_pelanggan').value = Pelanggan;
            document.getElementById('kendaraan_id').value = Kendaraan_id;
            document.getElementById('kendaraan').value = Kendaraan;
            document.getElementById('harga').value = Harga;

            // Close the modal (if needed)
            $('#tablePembelians').modal('hide');
        }

        function getSelectedData2(Penjualan_id, Kode_Penjualan, Pelanggan_id, Pelanggan, Kendaraan_id, Kendaraan, Harga) {
            // Set the values in the form fields
            document.getElementById('pembelian_id').value = Penjualan_id;
            document.getElementById('kode').value = Kode_Penjualan;
            document.getElementById('pelanggan_id').value = Pelanggan_id;
            document.getElementById('nama_pelanggan').value = Pelanggan;
            document.getElementById('kendaraan_id').value = Kendaraan_id;
            document.getElementById('kendaraan').value = Kendaraan;
            document.getElementById('harga').value = Harga;

            // Close the modal (if needed)
            $('#tablePenjualans').modal('hide');
        }

        function getSelectedDatamarketing(marketing_id, kodeMarketing, namaMarketing, Telp, Umur, Alamat) {
            // Set the values in the form fields
            document.getElementById('marketing_id').value = marketing_id;
            document.getElementById('kode_marketing').value = kodeMarketing;
            document.getElementById('nama_marketing').value = namaMarketing;
            document.getElementById('telp').value = Telp;
            document.getElementById('umur').value = Umur;
            document.getElementById('alamat').value = Alamat;

            // Close the modal (if needed)
            $('#tableMarketing').modal('hide');
        }
    </script>


@endsection
