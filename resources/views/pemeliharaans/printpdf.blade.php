<!DOCTYPE html>
<html>

<head>

    <head>
        <title>Daftar Kegiatan Pemeliharaan</title>
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
        <h5>Laporan Kegiatan Pemeliharaan</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Kegiatan</th>
                <th>Kegiatan</th>
                <th>Petugas</th>
                <th>Data Pohon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemeliharaan as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->formatted_tgl_kegiatan }}</td>
                    <td>{{ $value->kegiatan }}</td>
                    <td>{{ $value->petugas }}</td>
                    <td>{{ $value->pohon->nama_lokal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>