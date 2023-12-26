<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Stok</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: 'DOSVGA', monospace;
            color: black;
        }

        .container {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* margin-top: 20px; */
            font-size: 9px;
            /* Atur ukuran font tabel sesuai kebutuhan */
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        .signature {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;

            /* Menghilangkan garis tepi tabel */
        }

        td {
            padding: 5px 10px;

            /* Menghilangkan garis tepi sel */

        }

        .label {
            text-align: left;
            width: 50%;
            border: none;
            /* Mengatur lebar kolom teks */
        }

        .value {
            text-align: right;
            width: 50%;
            border: none;
            /* Mengatur lebar kolom hasil */
        }

        .separator {
            text-align: center;
            font-weight: bold;
            border: none;
        }

        #logo-container {
            text-align: right;
            /* Posisi teks dan gambar ke kanan */
        }

        #logo-container img {
            max-width: 100px;
            /* Ubah sesuai kebutuhan */
            vertical-align: top;
            /* Mengatur gambar lebih tinggi ke atas */
        }

        .tabelatas {
            /* border-collapse: collapse; */
            width: 100%;
        }

        .tabelatas th,
        .tabelatas td {
            border: none;
            /* Atur padding sesuai kebutuhan Anda */
        }

        .text {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="font-size: 20px">KARTU STOK AKHIR CV DWI OMEGA MOTOR</h1>
    </div>
    <table class="tabelatas" width="100%">
        <tr>
            <td>
                <div class="text">
                    <p>Stok kendaraan tanggal {{ Carbon\Carbon::now()->translatedFormat('d F Y', 'id') }}</p>
                </div>
            </td>
            <td>
                <div id="logo-container">
                    <!-- Tambahkan gambar logo di sini -->
                    <img src="{{ asset('storage/uploads/gambaricon/omega.png') }}" alt="Logo Omega">
                </div>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <th style="width: 10%;">No</th>
            <th style="width: 15%;">Kode</th>
            <th style="width: 37%;">Tgl Masuk</th>
            <th style="width: 46%;">No. Registrasi</th>
            <th style="width: 20%;">Tahun</th>
            <th style="width: 33%;">Merek</th>
            <th style="width: 30%;">Type</th>
            <th style="width: 40%;">Warna</th>
            <th style="width: 75%;">Harga</th>
            {{-- <th style="width: 40%;">Harga</th> --}}
        </tr>
        @php
            $total = 0; // Inisialisasi total
        @endphp
        @foreach ($inquery as $kendaraan)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $kendaraan->kode_kendaraan }}</td>
                <td>
                    @if ($kendaraan->pembelian)
                        {{ $kendaraan->pembelian->tanggal_awal }}
                    @else
                        {{ $kendaraan->tanggal_awal }}
                    @endif
                </td>
                <td>{{ $kendaraan->no_pol }}</td>
                <td>{{ $kendaraan->tahun_kendaraan }}</td>
                <td>
                    @if ($kendaraan->merek)
                        {{ $kendaraan->merek->nama_merek }}
                    @else
                        data tidak ada
                    @endif
                </td>
                <td>
                    @if ($kendaraan->merek)
                        {{ $kendaraan->merek->tipe->nama_tipe }}
                    @else
                        data tidak ada
                    @endif
                </td>
                <td>{{ $kendaraan->warna }}</td>
                <td>
                    @if ($kendaraan->pembelian)
                        Rp. {{ number_format($kendaraan->pembelian->harga, 0, ',', '.') }}
                    @else
                        tidak ada
                    @endif
                </td>
            </tr>
            {{-- @php
                $total += $kendaraan->pembelian->harga; // Tambahkan harga ke total
            @endphp --}}
        @endforeach
    </table>

    <br>
    <!-- Tampilkan sub-total di bawah tabel -->
    {{-- <div style="text-align: right;">
        <strong>Total: Rp. {{ number_format($total, 0, ',', '.') }}</strong>
    </div> --}}
    <script></script>
</body>


</html>
