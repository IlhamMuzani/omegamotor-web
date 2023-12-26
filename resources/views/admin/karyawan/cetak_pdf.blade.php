<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <link rel="stylesheet" href="{{ asset('falcon/style.css') }}"> --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Qr Code Karyawan</title>

    <style type="text/css">
        .invoice-box {
            /* max-width: 800px; */
            margin: auto;
            border: 1px solid #eee;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
            font-size: 16px;
            line-height: 24px;
            font-family: Arial, sans-serif;
            transform: rotate(90deg); /* Memutar konten .invoice-box */
        }

        .invoice-box table {
            max-width: 800px;
            margin: auto;
            /* border: 1px solid #eee; */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
            font-size: 16px;
            line-height: 24px;
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>

<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <td>
            <p style="font-size: 40px; text-align: center; font-weight: bold;">{{ $karyawans->kode_karyawan }}</p>
            <div style="display: inline-block;">
                <?php
                    use BaconQrCode\Renderer\ImageRenderer;
                    use BaconQrCode\Writer;

                    // Ubah tautan menjadi QR code
                    $qrcode = new Writer(new ImageRenderer(new \BaconQrCode\Renderer\RendererStyle\RendererStyle(500), new \BaconQrCode\Renderer\Image\SvgImageBackEnd()));
                    $qrcodeData = $qrcode->writeString($karyawans->qrcode_karyawan);

                    // Tampilkan gambar QR code
                    echo '<img src="data:image/png;base64,' . base64_encode($qrcodeData) . '" />';
                ?>
            </div>
            <p style="font-size: 40px; text-align: center; font-weight: bold;">{{ $karyawans->nama_lengkap }}</p>
        </td>
    </table>
</div>


</body>
</html>
