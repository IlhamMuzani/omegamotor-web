<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Komisi</title>
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
        <h1>LAPORAN KOMISI - RANGKUMAN</h1>
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
            <th>Faktur Pembelian</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>No Registrasi</th>
            <th>Merek</th>
            <th>Fee</th>
        </tr>
        @php
            $total = 0; // Inisialisasi total
        @endphp
        @foreach ($inquery as $komisi)
            <tr>
                <td>{{ $komisi->kode_faktur }}</td>
                <td> {{ $komisi->tanggal_awal }}</td>
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
                <td>
                    @if ($komisi->kendaraan->merek)
                        {{ $komisi->kendaraan->merek->nama_merek }}
                    @else
                        data tidak ada
                    @endif
                </td>
                <td> Rp. {{ number_format($komisi->fee, 0, ',', '.') }}</td>
            </tr>
            @php
                $total += $komisi->fee; // Tambahkan harga ke total
            @endphp
        @endforeach
    </table>

    <br>
    <!-- Tampilkan sub-total di bawah tabel -->
    <div style="text-align: right;">
        <strong>Total: Rp. {{ number_format($total, 0, ',', '.') }}</strong>
    </div>

    <div class="signature">
        <table>
            <tr>
                <td class="label">Total :</td>
                <td class="value">Rp. {{ number_format($total, 2) }}</td>
            </tr>
            <!-- Tambahkan baris-baris lainnya jika diperlukan -->
            <tr>
                <td class="separator" colspan="2">______________________________</td>
            </tr>
            <tr>
                <td class="label">Sub Total :</td>
                <td class="value">Rp. {{ number_format($total, 2) }}</td>
            </tr>
        </table>
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
