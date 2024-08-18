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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02);
        }

        .qr-code {
            margin: 0 auto;
            border: 5px solid #e1e8ed;
            padding: 10px;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="qr-code">
            {!! $qr !!}
        </div>
    </div>
</body>

</html>
