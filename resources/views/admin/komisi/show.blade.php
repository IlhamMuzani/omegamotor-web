<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faktur Komisi</title>
    <style>
        /* * {
            border: 1px solid black;
        } */
        .b {
            border: 1px solid black;
        }

        .table,
        .td {
            /* border: 1px solid black; */
        }

        .table,
        .tdd {
            border: 1px solid white;
        }

        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
        }

        span.h2 {
            font-size: 24px;
            font-weight: 500;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tdd td {
            border: none;
        }

        .faktur {
            text-align: center
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin-top: 7rem;
        }

        .blue-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            top: 50%;
            border-radius: 5px;
            transform: translateY(-50%);

        }

        .info-container {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 16px;
            margin: 5px 0;
        }

        .right-col {
            text-align: right;
        }

        .info-text {
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .info-left {
            text-align: left;
            /* Apply left-align specifically for the info-text class */
        }

        .info-item {
            flex: 1;
        }

        .alamat {
            color: black;
            font-weight: bold;
        }

        .blue-button:hover {
            background-color: #0056b3;
        }

        .nama-pt {
            color: black;
            font-weight: bold;
        }

        .alamat {
            color: black;
            font-weight: bold;
        }

        .info-catatan {
            display: flex;
            flex-direction: row;
            /* Mengatur arah menjadi baris */
            align-items: center;
            /* Posisi elemen secara vertikal di tengah */
            margin-bottom: 2px;
            /* Menambah jarak antara setiap baris */
        }

        .info-catatan2 {
            font-weight: bold;
            margin-right: 5px;
            min-width: 120px;
            /* Menetapkan lebar minimum untuk kolom pertama */
        }

        #logo-container {
            text-align: right;
            /* Posisi teks dan gambar ke kanan */
        }

        #logo-container img {
            max-width: 170px;
            /* Ubah sesuai kebutuhan */
            vertical-align: top;
            /* Mengatur gambar lebih tinggi ke atas */
        }

        .info-1 {}
    </style>
</head>

<body style="margin: 0; padding: 0;">
    <br>
    <table width="100%">
        <tr>
            <td>
                <div class="info-container">

                    <div class="info-catatan" style="max-width: 230px;">
                        <table>
                            <tr>
                                <td class="info-catatan2">Nama Marketing</td>
                                <td class="info-item">:</td>
                                <td class="info-text info-left">{{ $komisis->marketing->nama_marketing }}</td>
                            </tr>
                            <tr>
                                <td class="info-catatan2">Alamat</td>
                                <td class="info-item">:</td>
                                <td class="info-text info-left">{{ $komisis->marketing->alamat }}</td>
                            </tr>
                            <tr>
                                <td class="info-catatan2">Telp / HP</td>
                                <td class="info-item">:</td>
                                <td class="info-text info-left">{{ $komisis->marketing->telp }}</td>
                            </tr>
                            <tr>
                                <td class="info-catatan2">ID Marketing</td>
                                <td class="info-item">:</td>
                                <td class="info-text info-left">{{ $komisis->marketing->kode_marketing }}</td>
                            </tr>
                        </table>
                        <!-- Tambahkan gambar logo di sini -->
                    </div>
                    <div id="logo-container">
                        <!-- Tambahkan gambar logo di sini -->
                        <img src="{{ asset('storage/uploads/gambaricon/omega.png') }}" alt="Logo Omega">
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <div style="font-weight: bold; text-align: center">
        <span style="font-weight: bold; font-size: 22px;">FAKTUR KOMISI</span>
        <br>
        <br>
    </div>
    <hr style="border-top: 0.5px solid black; margin: 3px 0;">
    <table width="100%">
        <tr>
            <td>
                <span class="info-item">No. Faktur Komisi: {{ $komisis->kode_komisi }}</span>
                <br>
            </td>
            <td style="text-align: right;">
                {{-- <span class="info-item">Tanggal:{{ now()->format('d-m-Y') }}</span> --}}
                <span class="info-item">Tanggal:{{ $komisis->tanggal_awal }}</span>
                <br>
            </td>
        </tr>
    </table>
    <hr style="border-top: 0.5px solid black; margin: 3px 0;">
    <table style="width: 100%;" cellpadding="2" cellspacing="0">
        <tr>
            <td class="td" style="text-align: center; padding: 0px;">No.</td>
            <td class="td" style="text-align: center; padding: 2px;">Kode Pembelian / Penjualan</td>
            <td class="td" style="text-align: center; padding: 2px;">Pelanggan</td>
            <td class="td" style="text-align: center; padding: 2px;">No Registrasi</td>
            {{-- <td class="td" style="text-align: center; padding: 2px;">Harga Mobil</td> --}}
            <td class="td" style="text-align: center; padding: 2px;">Fee Marketing</td>
            {{-- <td class="td" style="text-align: center; padding: 2px;">Total</td> --}}
        </tr>
        <tr style="border-bottom: 1px solid black;">
            <td colspan="7" style="padding: 0px;">
            </td>
        </tr>
        {{-- @php
            $totalHarga = $komisis->pembelian + $komisis->vi_marketing;
        @endphp --}}
        {{-- @foreach ($komisis as $item) --}}
        <tr>
            <td class="td" style="text-align: center; padding: 0px;">1</td>
            <td class="td" style="text-align: center; padding: 2px;">{{ $komisis->kode_faktur }}</td>
            <td class="td" style="text-align: center; padding: 2px;">{{ $komisis->pelanggan->nama_pelanggan }}</td>
            <td class="td" style="text-align: center; padding: 2px;">{{ $komisis->kendaraan->no_pol }}</td>
            {{-- <td class="td" style="text-align: center; padding: 2px;">{{ $komisis->pembelian->harga }}</td> --}}
            <td class="td" style="text-align: center; padding: 2px;">
                {{ number_format($komisis->fee, 0, ',', '.') }}</td>
            {{-- <td class="td" style="text-align: center; padding: 2px;">Rp
                    {{ number_format($totalHarga, 0, ',', '.') }}</td> --}}
        </tr>
        {{-- @endforeach --}}
        <tr style="border-bottom: 1px solid black;">
            <td colspan="7" style="padding: 0px;">
            </td>
        </tr>
    </table>
    <?php
    function terbilang($angka)
    {
        $angka = abs($angka); // Pastikan angka selalu positif
        $bilangan = ['', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas'];
        $hasil = '';
        if ($angka < 12) {
            $hasil = $bilangan[$angka];
        } elseif ($angka < 20) {
            $hasil = terbilang($angka - 10) . ' Belas';
        } elseif ($angka < 100) {
            $hasil = terbilang($angka / 10) . ' Puluh ' . terbilang($angka % 10);
        } elseif ($angka < 200) {
            $hasil = 'Seratus ' . terbilang($angka - 100);
        } elseif ($angka < 1000) {
            $hasil = terbilang($angka / 100) . ' Ratus ' . terbilang($angka % 100);
        } elseif ($angka < 2000) {
            $hasil = 'Seribu ' . terbilang($angka - 1000);
        } elseif ($angka < 1000000) {
            $hasil = terbilang($angka / 1000) . ' Ribu ' . terbilang($angka % 1000);
        } elseif ($angka < 1000000000) {
            $hasil = terbilang($angka / 1000000) . ' Juta ' . terbilang($angka % 1000000);
        } elseif ($angka < 1000000000000) {
            $hasil = terbilang($angka / 1000000000) . ' Miliar ' . terbilang($angka % 1000000000);
        } elseif ($angka < 1000000000000000) {
            $hasil = terbilang($angka / 1000000000000) . ' Triliun ' . terbilang($angka % 1000000000000);
        }
        return $hasil;
    }
    ?>
    <br>
    <span
        style="font-weight: bold; font-size: 18px; margin-left: 100px; font-style: italic;">({{ terbilang($komisis->fee) }}
        Rupiah)</span>



    <br>
    <br>
    <br>
    <br><br><br>

    <table class="tdd" style="width: 100%;" cellpadding="10" cellspacing="0">
        <tr>
            <td style="text-align: center">Gudang</td>
            <td style="text-align: center">Pembelian</td>
            <td style="text-align: center">Accounting</td>
        </tr>
    </table>
</body>

<div class="container">
    <a href="{{ url('admin/komisi') }}" class="blue-button">Kembali</a>
    <a href="{{ url('admin/komisi/cetak-pdf/' . $komisis->id) }}" class="blue-button">Cetak</a>
</div>

</html>
