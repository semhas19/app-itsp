@extends('layouts.content')

@section('title', 'Tambah Lokasi Pohon')

@section('content')
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('pemeliharaans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card my-3">
                    <div class="card-body">
                        <form action="{{ route('pemeliharaans.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                                        <input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan"
                                            value="{{ old('tgl_kegiatan') }}" placeholder="....">
                                        @error('tgl_kegiatan')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kegiatan">Nama Kegiatan</label>
                                        <input type="text" class="form-control" name="kegiatan" id="kegiatan"
                                            value="{{ old('kegiatan') }}" placeholder="....">
                                        @error('kegiatan')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="petugas">Nama Petugas</label>
                                        <input type="text" class="form-control" name="petugas" id="petugas"
                                            value="{{ old('petugas') }}" placeholder="....">
                                        @error('petugas')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="data_pohon">Data Pohon</label>
                                        <select class="form-control" name="data_pohon_id" id="data_pohon_id">
                                            <option selected="true" disabled="disabled">Pilih Data Pohon</option>
                                            @foreach ($pohons as $pohon)
                                                <option value="{{ $pohon->id }}">{{ $pohon->nama_lokal }}</option>
                                            @endforeach
                                        </select>
                                        @error('data_pohon_id')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Fields to be auto-filled -->
                                    <div class="form-group">
                                        <label for="nama_lokal">Nama Lokal</label>
                                        <input type="text" class="form-control" id="nama_lokal" name="nama_lokal" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_ilmiah">Nama Ilmiah</label>
                                        <input type="text" class="form-control" id="nama_ilmiah" name="nama_ilmiah" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="kode_pohon">Kode Pohon</label>
                                        <input type="text" class="form-control" id="kode_pohon" name="kode_pohon" readonly>
                                    </div>

                                    <button type="submit" class="btn btn-success">Tambah</button>
                                    <a href="{{ route('pemeliharaans.index') }}" class="btn btn-secondary my-3">
                                        <span class="text">Kembali</span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Sertakan script JavaScript untuk auto-fill -->
    <script type="text/javascript">
        var pohonData = @json($pohons);

        document.addEventListener('DOMContentLoaded', function() {
            var dataPohonDropdown = document.getElementById('data_pohon_id');
            dataPohonDropdown.addEventListener('change', function() {
                var selectedId = this.value;
                var selectedPohon = pohonData.find(function(pohon) {
                    return pohon.id == selectedId;
                });

                if (selectedPohon) {
                    document.getElementById('nama_lokal').value = selectedPohon.nama_lokal;
                    document.getElementById('nama_ilmiah').value = selectedPohon.nama_ilmiah;
                    document.getElementById('kode_pohon').value = selectedPohon.kode_pohon;
                } else {
                    document.getElementById('nama_lokal').value = '';
                    document.getElementById('nama_ilmiah').value = '';
                    document.getElementById('kode_pohon').value = '';
                }
            });
        });
    </script>

@endsection
