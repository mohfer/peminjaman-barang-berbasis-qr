<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $name }}</title>
    <style>
        .qr-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .label {
            font-size: 3.75rem;
            line-height: 1;
            color: #000;
            margin: 8px 0px;
            font-size: bold;
        }

        img {
            margin: 100px 0;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="qr-container">
        <h1 class="label">{{ $name }}</h1>
        <img width="500px" height="500px" src="data:image/png;base64,{{ $qrCodeBorrow }}" alt="QR Code Borrow">
        <h1 class="label">PEMINJAMAN</h1>
    </div>

    <div class="page-break"></div>

    <div class="qr-container">
        <h1 class="label">{{ $name }}</h1>
        <img width="500px" height="500px" src="data:image/png;base64,{{ $qrCodeReturn }}" alt="QR Code Return">
        <h1 class="label">PENGEMBALIAN</h1>
    </div>
</body>

</html>
