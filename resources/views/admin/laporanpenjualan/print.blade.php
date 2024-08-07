<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
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
            font-size: 11px;
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
        <h1>LAPORAN PENJUALAN - RANGKUMAN</h1>
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
            <th style="width: 35%;">F. Penjualan</th>
            <th style="width: 30%;">Tanggal</th>
            <th style="width: 30%;">Pelanggan</th>
            <th style="width: 35%;">No Registrasi</th>
            <th style="width: 20%;">Model</th>
            <th style="width: 50%;">Harga</th>
        </tr>
        @php
            $total = 0; // Inisialisasi total
        @endphp
        @foreach ($inquery as $penjualan)
            <tr>
                <td>{{ $penjualan->kode_penjualan }}</td>
                <td> {{ $penjualan->tanggal_awal }}</td>
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
                <td>
                    @if ($penjualan->kendaraan->merek)
                        @if ($penjualan->kendaraan->merek->modelken)
                            {{ $penjualan->kendaraan->merek->modelken->nama_model }}
                        @else
                            tidak ada
                        @endif
                    @else
                        data tidak ada
                    @endif
                </td>
                <td> Rp. {{ number_format($penjualan->harga, 0, ',', '.') }}</td>
            </tr>
            @php
                $total += $penjualan->harga; // Tambahkan harga ke total
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

    <script>
        function printReport() {
            var startDate = tanggalAwal.value;
            var endDate = tanggalAkhir.value;

            if (startDate && endDate) {
                form.action = "{{ url('admin/print_ban') }}" + "?start_date=" + startDate + "&end_date=" + endDate;
                form.submit();

                // Update the date range in the HTML
                document.getElementById("dateRange").textContent = "Tanggal awal: " + startDate + " - Tanggal akhir: " +
                    endDate;
            } else {
                alert("Silakan isi kedua tanggal sebelum mencetak.");
            }
        }
    </script>
</body>


</html>
