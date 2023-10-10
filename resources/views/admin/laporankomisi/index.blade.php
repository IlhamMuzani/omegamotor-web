@extends('layout.main')

@section('title', 'Laporan Komisi')

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Laporan Komisi</h3>
                    <p class="mb-0">Tabel</p>
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
    <div class="card">
        {{-- <div class="card-header">
            <h5 class="float-start">Tabel pembelian</h5>

        </div> --}}
        <div class="card-body p-0">
            <div class="table-responsive scrollbar m-2">
                <form method="GET" id="form-action">
                    <div class="row justify-content-between">
                        <div class="col-md-5 mb-3">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input class="form-control" id="tanggal_awal" name="tanggal_awal" type="date"
                                value="{{ Request::get('tanggal_awal') }}" max="{{ date('Y-m-d') }}" />
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input class="form-control" id="tanggal_akhir" name="tanggal_akhir" type="date"
                                value="{{ Request::get('tanggal_akhir') }}" max="{{ date('Y-m-d') }}" />
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="text-center mb-3">
                                <button type="button" class="btn btn-outline-primary btn-block" onclick="cari()">
                                    <i class="fas fa-search"></i> Cari ..
                                </button>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary btn-block" onclick="printReport()"
                                    target="_blank">
                                    <i class="fas fa-print"></i> Cetak
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <table id="datatable" class="table table-bordered table-striped">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Faktur Komisi</th>
                            <th>Tanggal</th>
                            <th>Faktur Pembelian/Penjualan</th>
                            <th>Pelanggan</th>
                            <th>Kendaraan</th>
                            <th>Fee Marketing</th>
                            {{-- <th class="text-center" width="220">Opsi</th> --}}
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($inquery as $komisi)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $komisi->kode_komisi }}</td>
                                <td>{{ $komisi->tanggal_awal }}</td>
                                <td>{{ $komisi->kode_faktur }}</td>
                                <td>
                                    @if ($komisi->pelanggan)
                                        {{ $komisi->pelanggan->nama_pelanggan }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                                <td>
                                    @if ($komisi->kendaraan)
                                        {{ $komisi->kendaraan->no_pol }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                                <td>Rp {{ number_format($komisi->fee, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        var tanggalAwal = document.getElementById('tanggal_awal');
        var tanggalAkhir = document.getElementById('tanggal_akhir');
        if (tanggalAwal.value == "") {
            tanggalAkhir.readOnly = true;
        }
        tanggalAwal.addEventListener('change', function() {
            if (this.value == "") {
                tanggalAkhir.readOnly = true;
            } else {
                tanggalAkhir.readOnly = false;
            };
            tanggalAkhir.value = "";
            var today = new Date().toISOString().split('T')[0];
            tanggalAkhir.value = today;
            tanggalAkhir.setAttribute('min', this.value);
        });
        var form = document.getElementById('form-action')

        function cari() {
            form.action = "{{ url('admin/laporan_komisi') }}";
            form.submit();
        }

        function printReport() {
            var startDate = tanggalAwal.value;
            var endDate = tanggalAkhir.value;

            if (startDate && endDate) {
                form.action = "{{ url('admin/print_laporankomisi') }}" + "?start_date=" + startDate + "&end_date=" +
                    endDate;
                form.submit();
            } else {
                alert("Silakan isi kedua tanggal sebelum mencetak.");
            }
        }
    </script>
@endsection
