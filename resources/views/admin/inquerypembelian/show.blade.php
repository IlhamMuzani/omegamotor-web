<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>faktur Pembelian</title>
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

        .info-1 {}

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
                                <td class="info-catatan2">Nama Supplier</td>
                                <td class="info-item">:</td>
                                <td class="info-text info-left">
                                    @if ($pembelians->pelanggan)
                                        {{ $pembelians->pelanggan->nama_pelanggan }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="info-catatan2">Alamat</td>
                                <td class="info-item">:</td>
                                <td class="info-text info-left">
                                    @if ($pembelians->pelanggan)
                                        {{ $pembelians->pelanggan->alamat }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="info-catatan2">Telp / HP</td>
                                <td class="info-item">:</td>
                                <td class="info-text info-left">
                                    @if ($pembelians->pelanggan)
                                        {{ $pembelians->pelanggan->telp }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="info-catatan2">ID Supplier</td>
                                <td class="info-item">:</td>
                                <td class="info-text info-left">
                                    @if ($pembelians->pelanggan)
                                        {{ $pembelians->pelanggan->kode_pelanggan }}
                                    @else
                                        data tidak ada
                                    @endif
                                </td>
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
        <span style="font-weight: bold; font-size: 22px;">FAKTUR PEMBELIAN</span>
        <br>
        <br>
    </div>
    <hr style="border-top: 0.5px solid black; margin: 3px 0;">
    <table width="100%">
        <tr>
            <td>
                <span class="info-item">No. Faktur: {{ $pembelians->kode_pembelian }}</span>
                <br>
            </td>
            <td style="text-align: right;">
                {{-- <span class="info-item">Tanggal:{{ now()->format('d-m-Y') }}</span> --}}
                <span class="info-item">Tanggal:{{ $pembelians->tanggal }}</span>
                <br>
            </td>
        </tr>
    </table>
    <hr style="border-top: 0.5px solid black; margin: 3px 0;">
    <table style="width: 100%;" cellpadding="2" cellspacing="0">
        <tr>
            <td class="td" style="text-align: center; padding: 0px;">No.</td>
            <td class="td" style="text-align: center; padding: 2px;">Kode Kendaraan</td>
            <td class="td" style="text-align: center; padding: 2px;">No. Registrasi</td>
            <td class="td" style="text-align: center; padding: 2px;">Model</td>
            <td class="td" style="text-align: center; padding: 2px;">Type</td>
            {{-- <td class="td" style="text-align: center; padding: 2px;">Vi Marketing</td> --}}
            <td class="td" style="text-align: center; padding: 2px;">Harga</td>
        </tr>
        <tr style="border-bottom: 1px solid black;">
            <td colspan="7" style="padding: 0px;">
            </td>
        </tr>
        {{-- @php
            $totalHarga = $pembelians->harga + $pembelians->vi_marketing;
        @endphp --}}
        @foreach ($kendaraans as $item)
            <tr>
                <td class="td" style="text-align: center; padding: 0px;">{{ $loop->iteration }}</td>
                <td class="td" style="text-align: center; padding: 2px;">{{ $item->kode_kendaraan }}</td>
                <td class="td" style="text-align: center; padding: 2px;">{{ $item->no_pol }}</td>
                <td class="td" style="text-align: center; padding: 2px;">
                    @if ($item->merek)
                        {{ $item->merek->modelken->nama_model }}
                    @else
                        data tidak ada
                    @endif
                </td>
                <td class="td" style="text-align: center; padding: 2px;">
                    @if ($item->merek)
                        {{ $item->merek->tipe->nama_tipe }}
                    @else
                        data tidak ada
                    @endif
                </td>
                {{-- <td class="td" style="text-align: center; padding: 2px;">{{ $pembelians->vi_marketing }}</td> --}}
                <td class="td" style="text-align: center; padding: 2px;">Rp
                    {{ number_format($pembelians->harga, 0, ',', '.') }}</td>
            </tr>
        @endforeach
        <tr style="border-bottom: 1px solid black;">
            <td colspan="7" style="padding: 0px;">
            </td>
        </tr>
    </table>
    <br>
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
    <span
        style="font-weight: bold; font-size: 18px; margin-left: 100px; font-style: italic;">({{ terbilang($pembelians->harga) }}
        Rupiah)</span>

    <br><br><br>
    <br><br><br>

    <table class="tdd" style="width: 100%;" cellpadding="10" cellspacing="0">
        <tr>
            <td style="text-align: center">Gudang</td>
            <td style="text-align: center">Penjual</td>
            <td style="text-align: center">Marketing</td>
            <td style="text-align: center">Finance</td>
        </tr>
    </table>
</body>

<div class="container">
    <a href="{{ url('admin/inquery_pembelian') }}" class="blue-button">Kembali</a>
    <a href="{{ url('admin/pembelian/cetak-pdf/' . $pembelians->id) }}" class="blue-button">Cetak</a>
</div>

</html>
