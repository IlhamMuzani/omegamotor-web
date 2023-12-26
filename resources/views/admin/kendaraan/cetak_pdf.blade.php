<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <link rel="stylesheet" href="{{ asset('falcon/style.css') }}"> --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qr Code Kendaraan</title>

    <style type="text/css">
        /* Reset all margins and padding */
        * {
            margin: 0;
            padding: 0;
        }

        .box1 {
            margin-left: 17px;
            margin-top: 15px;
        }

        .text-container {
            position: relative;
            width: 200px;
            /* Set an appropriate width */
            height: 68px;
            /* Set an appropriate height */
            transform: rotate(90deg);
        }

        .text {
            white-space: nowrap;
            position: absolute;
            margin-left: 68px;
            margin-top: 11px;
            font-size: 18px;
            top: 0;
            /* Adjust the top position as needed */
            left: 8;
            /* Adjust the left position as needed */
        }

        .bold-text {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif
        }
    </style>

</head>

<body>
    <div>
        <div class="box1">
                {!! DNS2D::getBarcodeHTML("$kendaraans->qrcode_kendaraan", 'QRCODE', 3.5, 3.5) !!}
        </div>
        <div class="text-container">
            <div class="text">
                <p class="bold-text">{{ $kendaraans->kode_kendaraan }}</p>
                <p class="bold-text">{{ $kendaraans->no_pol }}</p>
                <p class="bold-text">{{ $kendaraans->tahun_kendaraan }}</p>
                <p class="bold-text">{{ $kendaraans->no_mesin }}</p>
                <p class="bold-text">{{ $kendaraans->no_rangka }}</p>
            </div>
        </div>
    </div>
</body>

</html>
