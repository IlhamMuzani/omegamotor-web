<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faktur Komisi</title>
    <style>
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
            font-family: 'DOSVGA', monospace;
        }

        span.h2 {
            font-size: 24px;
            /* font-weight: 500; */
        }

        .label {
            font-size: 16px;
            /* Sesuaikan ukuran label sesuai preferensi Anda */
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tdd td {
            border: none;
        }

        .container {
            position: relative;
            margin-top: 7rem;
        }

        .faktur {
            text-align: center
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

        /* .nama-pt {
            color: black;
            font-weight: bold;
        }

        .alamat {
            color: black;
            font-weight: bold;
        } */

        .alamat,
        .nama-pt {
            color: black;
            font-weight: bold;
        }

        .label {
            color: black;
            /* Atur warna sesuai kebutuhan Anda */
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

        .tdd1 td {
            text-align: center;
            font-size: 13px;
            position: relative;
            padding-top: 10px;
            /* Sesuaikan dengan kebutuhan Anda */
        }

        .tdd1 td::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            border-top: 1px solid black;
        }

        .info-1 {}

        .label {
            font-size: 13px;
            text-align: center;

        }

        .separator {
            padding-top: 13px;
            /* Atur sesuai kebutuhan Anda */
            text-align: center;
            /* Teks menjadi berada di tengah */

        }

        .separator span {
            display: inline-block;
            border-top: 1px solid black;
            width: 100%;
            position: relative;
            top: -8px;
            /* Sesuaikan posisi vertikal garis tengah */
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

        .label {
            font-weight: bold;
        }

        .label2 {
            font-weight: bold;
            margin-left: 32px
        }

        .content.break-label {
            margin-left: 34;
        }

        .content {
            margin-left: 48px;
        }

        .content2 {
            /* margin-left: 1px */
        }

        .content4 {
            margin-left: 1px
        }

        @page {
            /* size: A4; */
            margin: 1cm;
        }
    </style>
</head>

<body style="margin: 0; padding: 0;">
    <table width="100%">
        <tr>
            <td>
                <div id="logo-container">
                    <!-- Tambahkan gambar logo di sini -->
                    <img src="{{ asset('storage/uploads/gambaricon/omega.png') }}" alt="Logo Omega">
                </div>
            </td>
        </tr>
        <tr>
            <td>

                <div class="info">
                    <span class="label">Nama</span>
                    <span class="content">:
                        @if ($komisis->marketing)
                            {{ $komisis->marketing->nama_marketing }}
                        @else
                            data tidak ada
                        @endif
                    </span>
                </div>
                <div class="info" style="max-width: 450px;">
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <span class="label">Alamat
                                </span>
                                <br>
                            </td>
                            <td>
                                <span class="label2">:
                                </span>
                                <br>
                            </td>
                            <td style="text-align: left;">
                                <span class="content2">
                                    @if ($komisis->marketing)
                                        {{ $komisis->marketing->alamat }}
                                    @else
                                        data tidak ada
                                    @endif
                                </span>
                                <br>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="info">
                    <span class="label">Telp</span>
                    <span class="content">:
                        @if ($komisis->marketing)
                            {{ $komisis->marketing->telp }}
                        @else
                            data tidak ada
                        @endif
                    </span>
                </div>

                <div class="info">
                    <span class="label">ID Pembeli</span>
                    <span class="content4">:
                        @if ($komisis->marketing)
                            {{ $komisis->marketing->kode_marketing }}
                        @else
                            data tidak ada
                        @endif
                    </span>
                </div>

            </td>

        </tr>
    </table>
    <div style="font-weight: bold; text-align: center;">
        <span style="font-weight: bold; font-size: 20px;">FAKTUR KOMISI</span>
        <br>
    </div>

    <table style="width: 100%;
                    border-top: 1px solid black; margin-bottom:5px">
        <tr>
            <td>
                <span class="info-item" style="font-size: 13px; padding-left: 5px;">No. Faktur Komisi:
                    {{ $komisis->kode_komisi }}</span>
                <br>
            </td>
            <td style="text-align: right; padding-right: 45px;">
                <span class="info-item" style="font-size: 13px;">Tanggal:{{ $komisis->tanggal }}</span>
                <br>
            </td>
        </tr>
    </table>
    {{-- <hr style="border-top: 0.5px solid black; margin: 3px 0;"> --}}
    <table style="width: 100%; border-top: 1px solid black;" cellpadding="2" cellspacing="0">
        <tr>
            <td class="td" style="text-align: center; padding: 5px; font-size: 13px;">No.</td>
            <td class="td" style="text-align: center; padding: 5px; font-size: 13px;">Kode Pembelian / Penjualan
            </td>
            <td class="td" style="text-align: center; padding: 5px; font-size: 13px;">Pelanggan</td>
            <td class="td" style="text-align: center; padding: 5px; font-size: 13px;">No Registrasi</td>
            {{-- <td class="td" style="text-align: center; padding: 5px; font-size: 13px;">Harga</td> --}}
            <td class="td" style="text-align: center; padding: 5px; font-size: 13px;">Fee Marketing</td>
            {{-- <td class="td" style="text-align: center; padding: 5px; font-size: 13px;">Total</td> --}}
        </tr>
        <tr style="border-bottom: 1px solid black;">
            <td colspan="" style="padding: 0px;"></td>
        </tr>
        {{-- @php
            $totalHarga = $pembelians->harga + $pembelians->vi_marketing;
        @endphp --}}
        {{-- @foreach ($kendaraans as $item) --}}
        <tr>
            <td class="td" style="text-align: center;  font-size: 13px;">1
            </td>
            <td class="td" style="text-align: center;  font-size: 13px;">{{ $komisis->kode_faktur }}</td>
            <td class="info-text info-left" style="font-size: 13px; text-align: center;">
                @if ($komisis->pelanggan)
                    {{ $komisis->pelanggan->nama_pelanggan }}
                @else
                    data tidak ada
                @endif
            </td>
            <td class="info-text info-left" style="font-size: 13px; text-align: center;">
                @if ($komisis->kendaraan)
                    {{ $komisis->kendaraan->no_pol }}
                @else
                    data tidak ada
                @endif
            </td>
            {{-- <td class="td" style="text-align: center; font-size: 13px;">
                    {{ $pembelians->harga }}
                </td> --}}
            <td class="td" style="text-align: center;  font-size: 13px;">
                {{ number_format($komisis->fee, 0, ',', '.') }}
            </td>
            {{-- <td class="td" style="text-align: center;  font-size: 13px;">Rp.
                    {{ number_format($pembelians->harga, 0, ',', '.') }}</td>
                </td> --}}
        </tr>
        {{-- @endforeach --}}
        <tr style="border-bottom: 1px solid black;">
            <td colspan="4" style="padding: 0px;"></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right; font-weight: bold; padding: 5px; font-size: 13px;">
            </td>
            <td class="td" style="text-align: center; font-weight: bold; padding: 5px; font-size: 13px;">
                {{-- {{ number_format($komisis->fee, 0, ',', '.') }} --}}
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
    <span
        style="font-weight: bold; font-size: 14px; margin-left: 30px; font-style: italic;">({{ terbilang($komisis->fee) }}
        Rupiah)</span>

    <br>
    <br>
    <br>
    <br>
    <table class="tdd" cellpadding="10" cellspacing="0" style="margin: 0 auto;">
        <tr>
            <td style="text-align: center;">
                <table style="margin: 0 auto;">
                    <tr style="text-align: center;">
                        <td class="label">{{ $komisis->marketing->nama_marketing }}</td>
                    </tr>
                    <tr>
                        <td class="separator" colspan="2"><span></span></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td class="label">Marketing</td>
                    </tr>
                </table>
            </td>
            <td style="text-align: center;">
                <table style="margin: 0 auto;">
                    <tr style="text-align: center;">
                        <td class="label">{{ auth()->user()->karyawan->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <td class="separator" colspan="2"><span></span></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td class="label">Finance</td>
                    </tr>
                </table>
            </td>
            {{-- <td style="text-align: center;">
                <table style="margin: 0 auto;">
                    <tr style="text-align: center;">
                        <td class="label" style="min-height: 16px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="separator" colspan="2"><span></span></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td class="label">Accounting</td>
                    </tr>
                </table>
            </td> --}}
        </tr>
    </table>
</body>

</html>
