<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <link rel="stylesheet" href="{{ asset('falcon/style.css') }}"> --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qr Code Pelanggan</title>

    <style type="text/css">
        .invoice-box {
            /* max-width: 800px; */
            margin: auto;
            border: 1px solid #eee;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
            font-size: 16px;
            line-height: 24px;
            font-family: Arial, sans-serif;
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
                <p style="font-size:25px; text-align:center; font-weight: bold;">{{ $pelanggans->kode_pelanggan }}</p>
                <div style="display: inline-block;">
                    {!! DNS2D::getBarcodeHTML("$pelanggans->qrcode_pelanggan", 'QRCODE', 18, 18) !!}
                </div>
                <p style="font-size:25px; text-align:center; font-weight: bold;">{{ $pelanggans->nama_pelanggan }}</p>
            </td>
        </table>
    </div>

</body>

</html>
