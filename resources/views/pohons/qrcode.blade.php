<!DOCTYPE html>
<html>

<head>
    <title>QR Code Pohon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .qr-code {
            margin: 20px 0;
        }

        .btn-print {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .pohon-details {
            text-align: left;
            margin-top: 20px;
        }

        .pohon-details p {
            margin: 5px 0;
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
            <p><strong>Nama Ilmiah:</strong> {{ $pohon->nama_ilmiah }}</p>
            <p><strong>Kondisi:</strong>
                {{ $pohon->kondisi == '1' ? 'Baik' : ($pohon->kondisi == '2' ? 'Rusak Ringan' : 'Rusak Berat') }}</p>
        </div>
        @foreach ($pohons as $key => $value)
            <button class="btn-print" onclick="window.location.href='{{ route('qr-code', $value->id) }}'">Print</button>
        @endforeach
    </div>
</body>

</html>
