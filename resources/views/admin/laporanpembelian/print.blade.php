<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pembelian</title>
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
            font-size: 12px;
            /* Atur ukuran font tabel sesuai kebutuhan */
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
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
        <h1>LAPORAN PEMBELIAN - RANGKUMAN</h1>
    </div>
    <table class="tabelatas" width="100%">
        <tr>
            <td>
                <div class="text">
                    @php
                        $startDate = request()->query('tanggal_awal');
                        $endDate = request()->query('tanggal_akhir');
                    @endphp
                    @if ($startDate && $endDate)
                        <p>Periode:{{ $startDate }} s/d {{ $endDate }}</p>
                    @else
                        <p>Periode: Tidak ada tanggal awal dan akhir yang diteruskan.</p>
                    @endif
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
            <th style="width: 35%;">F. Pembelian</th>
            <th style="width: 30%;">Tanggal</th>
            <th style="width: 30%;">Pelanggan</th>
            <th style="width: 35%;">No Registrasi</th>
            <th style="width: 20%;">Model</th>
            <th style="width: 50%;">Harga</th>
        </tr>
        @php
            $total = 0; // Inisialisasi total
        @endphp
        @foreach ($inquery as $pembelian)
            <tr>
                <td>{{ $pembelian->kode_pembelian }}</td>
                <td>{{ $pembelian->tanggal_awal }}</td>
                <td>
                    @if ($pembelian->pelanggan)
                        {{ $pembelian->pelanggan->nama_pelanggan }}
                    @else
                        data tidak ada
                    @endif
                </td>
                <td>
                    @if ($pembelian->detail_kendaraan)
                        {{ $pembelian->detail_kendaraan->first()->no_pol }}
                    @else
                        data tidak ada
                    @endif
                </td>
                <td>
                    @if ($pembelian->detail_kendaraan->first()->merek)
                        @if ($pembelian->detail_kendaraan->first()->merek->modelken)
                            {{ $pembelian->detail_kendaraan->first()->merek->modelken->nama_model }}
                        @else
                            tidak ada
                        @endif
                    @else
                        data tidak ada
                    @endif
                </td>
                <td>Rp. {{ number_format($pembelian->harga, 0, ',', '.') }}</td>
            </tr>
            @php
                $total += $pembelian->harga; // Tambahkan harga ke total
            @endphp
        @endforeach
    </table>

    <br>
    <!-- Tampilkan sub-total di bawah tabel -->
    <div style="text-align: right;">
        <strong>Total: Rp. {{ number_format($total, 0, ',', '.') }}</strong>
    </div>


    {{-- <div class="signature">
        <p>_________________________</p>
        <p>Tanda Tangan</p>
    </div> --}}
</body>


</html>
