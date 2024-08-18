<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pohon</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            background-color: transparent;
            font-size: 10px; /* Mengurangi ukuran font */
        }

        table th,
        table td {
            padding: 0.4rem; /* Mengurangi padding */
            vertical-align: top;
            border: 1px solid #dee2e6;
            white-space: nowrap;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px; /* Mengurangi ukuran font */
            margin: 0.5rem; /* Mengurangi margin */
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

        li:first-child {
            margin-top: 10px;
        }

        /* Page break */
        tr {
            page-break-inside: avoid;
        }

    </style>
</head>

<body>
    <center>
        <h5>Laporan Data Pohon Yang Telah Di Ukur</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pohon</th>
                <th>Jenis Pohon</th>
                <th>Nama Ilmiah</th>
                <th>Kondisi</th>
                <th>Diameter (cm)</th>
                <th>Tinggi Jalon/Galah (m)</th>
                <th>H Top</th>
                <th>H Pole</th>
                <th>H Base</th>
                <th>Tinggi Pohon (m)</th>
                <th>Volume Pohon (m³)</th>
                <th>Tanggal Pengukuran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pohon as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->kode_pohon }}</td>
                    <td>{{ $value->jenis_pohon->nama_lokal }}</td>
                    <td>{{ $value->jenis_pohon->nama_ilmiah }}</td>
                    <td>{{ $value->kondisi == '1' ? 'Baik' : ($pohon->kondisi == '2' ? 'Rusak Ringan' : 'Rusak Berat') }}</td>
                    <td>{{ $value->diameter }} (cm)</td>
                    <td>{{ $value->tinggi_jalon }} (m)</td>
                    <td>{{ $value->h_top }}</td>
                    <td>{{ $value->h_pole }}</td>
                    <td>{{ $value->h_base }}</td>
                    <td>{{ number_format($value->tinggi_pohon, 2) }} (m)</td>
                    <td>{{ number_format($value->volume_pohon, 2) }} (m³)</td>
                    <td>{{ $value->formatted_tgl_pengukuran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
