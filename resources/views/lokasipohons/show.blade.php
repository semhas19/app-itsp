@extends('layouts.content')

@section('title')
    Detail Lokasi Pohon : {{ $lokasipohon->plot_pohon }}
@endsection

@section('content')
<style>
    .card {
        padding: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed; /* Pastikan kolom memiliki lebar tetap */
    }

    .table th, .table td {
        padding: 10px;
        vertical-align: top;
        overflow-wrap: break-word; /* Tangani kata-kata panjang */
        word-wrap: break-word;
        text-align: left; /* Rata kiri teks untuk konsistensi */
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: bold;
        width: 200px; /* Sesuaikan lebar untuk memastikan ruang yang cukup */
    }

    .table td {
        max-width: 300px; /* Batasi lebar sel untuk mencegah meluber */
    }

    .btn {
        margin-top: 20px;
    }

    /* Penyesuaian responsif */
    @media (max-width: 768px) {
        .table th, .table td {
            display: block;
            width: 100%;
            box-sizing: border-box;
        }

        .table th {
            text-align: left;
        }
    }
</style>

<div class="card">
    <table class="table table-bordered">
        <tr>
            <th>Plot Pohon</th>
            <td>{{ $lokasipohon->jalur_pohon }}</td>
        </tr>
        <tr>
            <th>Plot Pohon</th>
            <td>{{ $lokasipohon->plot_pohon }}</td>
        </tr>
        <tr>
            <th>Koordinat</th>
            <td>{{ $lokasipohon->koordinat }}</td>
        </tr>
    </table>

    <!-- Map container -->
    <div id="map" style="height: 400px; width: 100%;"></div>
</div>

<a href="{{ route('lokasipohons.index') }}" class="btn btn-secondary btn-sm">
    <i class="fas fa-arrow-left"></i>
    <span class="text">Kembali</span>
</a>

<!-- Include Leaflet JavaScript and CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get coordinates from the server
        const coords = '{{ $lokasipohon->koordinat }}';
        const [lat, lng] = coords.split(',').map(coord => parseFloat(coord.trim()));

        // Initialize the map
        const map = L.map('map').setView([lat, lng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a marker at the coordinates
        L.marker([lat, lng]).addTo(map);
    });
</script>
@endsection
