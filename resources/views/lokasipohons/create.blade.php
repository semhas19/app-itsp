@extends('layouts.content')

@section('title', 'Tambah Lokasi Pohon')

@section('content')
<div class="card my-3">
    <div class="card-body">
        <form action="{{ route('lokasipohons.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Form Inputs -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jalur_pohon">Jalur Pohon</label>
                        <input type="text" class="form-control" name="jalur_pohon" id="jalur_pohon" value="{{ old('jalur_pohon') }}" placeholder="....">
                        @error('jalur_pohon')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="plot_pohon">Plot Pohon</label>
                        <input type="text" class="form-control" name="plot_pohon" id="plot_pohon" value="{{ old('plot_pohon') }}" placeholder="....">
                        @error('plot_pohon')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="koordinat">Koordinat</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="koordinat" id="koordinat" value="{{ old('koordinat') }}" placeholder="Masukkan Koordinat">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" id="use-map-coordinates">Gunakan Koordinat Peta</button>
                            </div>
                        </div>
                        @error('koordinat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Tambah</button>
                    <a href="{{ route('lokasipohons.index') }}" class="btn btn-secondary my-3">
                        <span class="text">Kembali</span>
                    </a>
                </div>
                <!-- Map Container -->
                <div class="col-md-6">
                    <div class="map-container" style="position: relative;">
                        <div id="map" style="height: 400px; width: 100%; border: 1px solid #ddd; border-radius: 4px; display: none;"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>a

<!-- Include Leaflet JavaScript and CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let map;
        let marker;

        function initializeMap(lat, lng) {
            map = L.map('map').setView([lat, lng], 18);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            if (marker) {
                marker.setLatLng([lat, lng]);
            } else {
                marker = L.marker([lat, lng], { draggable: true }).addTo(map);
            }

            marker.on('moveend', function(e) {
                const latLng = e.latlng;
                document.getElementById('koordinat').value = `${latLng.lat.toFixed(6)}, ${latLng.lng.toFixed(6)}`;
            });
        }

        document.getElementById('use-map-coordinates').addEventListener('click', function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    
                    document.getElementById('map').style.display = 'block';
                    initializeMap(lat, lng);
                    
                    document.getElementById('koordinat').value = `${lat.toFixed(6)}, ${lng.toFixed(6)}`;
                }, function(error) {
                    alert('Geolocation not supported or permission denied.');
                });
            } else {
                alert('Geolocation not supported by this browser.');
            }
        });
    });
</script>
@endsection
