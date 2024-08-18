@extends('layouts.content')

@section('title', 'Edit Lokasi Pohon')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">{{ $lokasipohon->jalur_pohon }}</h3>
        <form method="POST" action="{{ route('lokasipohons.update', $lokasipohon->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Form Inputs -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jalur_pohon">Jalur Pohon</label>
                        <input type="text" class="form-control" name="jalur_pohon" id="jalur_pohon" value="{{ $lokasipohon->jalur_pohon }}" placeholder="....">
                        @error('jalur_pohon')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="plot_pohon">Plot Pohon</label>
                        <input type="text" class="form-control" name="plot_pohon" id="plot_pohon" value="{{ $lokasipohon->plot_pohon }}" placeholder="....">
                        @error('plot_pohon')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="koordinat">Koordinat</label>
                        <input type="text" class="form-control" name="koordinat" id="koordinat" value="{{ $lokasipohon->koordinat }}" placeholder="....">
                        @error('koordinat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-warning">Edit</button>
                        <a href="{{ route('lokasipohons.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>

                <!-- Map Container -->
                <div class="col-md-6">
                    <div class="map-container" style="position: relative;">
                        <div id="map" style="height: 400px; width: 100%; border: 1px solid #ddd; border-radius: 4px;"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Include Leaflet JavaScript and CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const coords = '{{ $lokasipohon->koordinat }}';
        const [lat, lng] = coords.split(',').map(coord => parseFloat(coord.trim()));

        // Initialize the map
        const map = L.map('map').setView([lat, lng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a marker at the coordinates
        const marker = L.marker([lat, lng], { draggable: true }).addTo(map);

        // Update input field when the marker is moved
        marker.on('moveend', function(e) {
            const latLng = e.latlng;
            document.getElementById('koordinat').value = `${latLng.lat.toFixed(6)}, ${latLng.lng.toFixed(6)}`;
        });

        // Update the input field when the map is clicked
        map.on('click', function(e) {
            const latLng = e.latlng;
            document.getElementById('koordinat').value = `${latLng.lat.toFixed(6)}, ${latLng.lng.toFixed(6)}`;
            marker.setLatLng(latLng);
        });
    });
</script>
@endsection
