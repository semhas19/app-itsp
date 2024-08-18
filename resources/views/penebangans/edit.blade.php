@extends('layouts.content')

@section('title', 'Edit Data Penebangan')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">"{{$penebangan->nama_lokal}}"</h3>
        <form action="{{ route('penebangans.update', $penebangan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    {{-- <div class="form-group">
                        <label for="nama_lokal">Nama Lokal</label>
                        <input type="text" class="form-control" name="nama_lokal" id="nama_lokal"
                            value="{{ old('nama_lokal', $penebangan->nama_lokal) }}" placeholder="....">
                        @error('nama_lokal')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_ilmiah">Nama Ilmiah</label>
                        <input type="text" class="form-control" name="nama_ilmiah" id="nama_ilmiah"
                            value="{{ old('nama_ilmiah', $penebangan->nama_ilmiah) }}" placeholder="....">
                        @error('nama_ilmiah')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="kode_pohon">Kode Pohon</label>
                        <input type="text" class="form-control" name="kode_pohon" id="kode_pohon"
                            value="{{ old('kode_pohon', $penebangan->kode_pohon) }}" placeholder="....">
                        @error('kode_pohon')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tinggi_pohon">Tinggi Pohon</label>
                        <input type="text" class="form-control" name="tinggi_pohon" id="tinggi_pohon"
                            value="{{ old('tinggi_pohon', $penebangan->tinggi_pohon) }}" placeholder="....">
                        @error('tinggi_pohon')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keliling_pohon">Keliling Pohon</label>
                        <input type="text" class="form-control" name="keliling_pohon" id="keliling_pohon"
                            value="{{ old('keliling_pohon', $penebangan->keliling_pohon) }}" placeholder="....">
                        @error('keliling_pohon')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="diameter_pohon">Diameter Pohon</label>
                        <input type="text" class="form-control" name="diameter_pohon" id="diameter_pohon"
                            value="{{ old('diameter_pohon', $penebangan->diameter_pohon) }}" placeholder="....">
                        @error('diameter_pohon')
                            <div class="alert alert-danger">
                                {{ $message }}
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_tebang">Tanggal Penebangan</label>
                        <input type="date" id="tgl_tebang" class="form-control" name="tgl_tebang" value="{{ old('tgl_tebang', $penebangan->tgl_tebang) }}">
                        @error('tgl_tebang')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select class="form-control" id="kondisi" name="kondisi">
                            <option selected disabled>Pilih Kondisi</option>
                            <option value="1">Baik</option>
                            <option value="2">Rusak Ringan</option>
                            <option value="3">Rusak Berat</option>
                        </select>
                        @error('kondisi')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="note">Catatan</label>
                        <input type="text" class="form-control" name="note" id="note"
                            value="{{ old('note', $penebangan->note) }}" placeholder="....">
                        @error('note')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi_pohon">Lokasi Pohon (Jalur)</label>
                        <select class="form-control" name="lokasi_pohon_id">
                            <option selected="true" disabled="disabled">Pilih Lokasi Pohon</option>
                            @foreach ($lokasi_pohons as $lokasi_pohon)
                                <option value="{{ $lokasi_pohon->id }}" {{ old('lokasi_pohon_id', $penebangan->lokasi_pohon_id) == $lokasi_pohon->id ? 'selected' : '' }}>{{ $lokasi_pohon->jalur_pohon }}</option>
                            @endforeach
                        </select>
                        @error('lokasi_pohon_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_pohon">Jenis Pohon</label>
                        <select class="form-control" name="jenis_pohon_id">
                            <option selected="true" disabled="disabled">Pilih Jenis Pohon</option>
                            @foreach ($jenis_pohons as $jenis_pohon)
                                <option value="{{ $jenis_pohon->id }}" {{ old('jenis_pohon_id', $penebangan->jenis_pohon_id) == $jenis_pohon->id ? 'selected' : '' }}>{{ $jenis_pohon->nama }}</option>
                            @endforeach
                        </select> 
                        @error('jenis_pohon_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
            <a href="{{ route('penebangans.index')  }}" class="btn btn-secondary my-3">
                <span class="text">Kembali</span>
            </a>
        </form>
    </div>
</div>
@endsection
