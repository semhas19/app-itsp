<!DOCTYPE html>
<html>

<head>

    <head>
        <title>Data Penebangan</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 1rem;
                background-color: transparent;
            }

            table th,
            table td {
                padding: 0.75rem;
                vertical-align: top;
                border: 1px solid #dee2e6;
            }

            body {
                font-family: Arial, sans-serif;
                /* Menggunakan Arial sebagai font utama */
            }

            .table-active {
                background-color: #f8f9fa;
            }

            .text-center {
                text-align: center;
            }

            img {
                width: 100px;
                /* Atur ukuran gambar sesuai kebutuhan */
                height: auto;
            }

            .bg-success {
                background-color: #28a745;
            }

            .bg-danger {
                background-color: #dc3545;
            }

            .badge.bg-success,
            .badge.bg-danger {
                color: #fff;
            }

            .px-4 {
                padding-right: 1.5rem !important;
                padding-left: 1.5rem !important;
            }

            li {
                margin-bottom: 10px;
            }

            /* first li has margin-top */
            li:first-child {
                margin-top: 10px;
            }
        </style>
    </head>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Penebangan</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lokal</th>
                <th>Nama Ilmiah</th>
                <th>Kode Pohon</th>
                <th>Tanggal Penebangan</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penebangan as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->nama_lokal }}</td>
                    <td>{{ $value->nama_ilmiah }}</td>
                    <td>{{ $value->kode_pohon }}</td>
                    <td>{{ $value->formatted_tgl_tebang }}</td>
                    <td>{{ $value->note }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>