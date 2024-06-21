<!DOCTYPE html>
<html>

<head>
    <title>QR Code Pohon</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
        }

        .container {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 320px;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02);
        }

        .qr-code {
            margin: 25px 0;
            border: 5px solid #e1e8ed;
            padding: 10px;
            border-radius: 15px;
        }

        .pohon-details {
            text-align: left;
            margin-top: 20px;
        }

        .pohon-details p {
            margin: 8px 0;
            font-size: 16px;
            color: #333;
        }

        .pohon-details p strong {
            color: #007BFF;
        }

        h2 {
            font-size: 24px;
            color: #007BFF;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Detail Pohon</h2>
        <div class="qr-code">
            {!! $qr !!}
        </div>
        <div class="pohon-details">
            <p><strong>Nama Lokal:</strong> {{ $pohon->nama_lokal }}</p>
            <p><strong>Nama Ilmiah:</strong> <em>{{ $pohon->nama_ilmiah }}</em></p>
            <p><strong>Kondisi:</strong>
                {{ $pohon->kondisi == '1' ? 'Baik' : ($pohon->kondisi == '2' ? 'Rusak Ringan' : 'Rusak Berat') }}</p>
        </div>
    </div>
</body>

</html>
