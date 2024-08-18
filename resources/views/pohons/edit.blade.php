@extends('layouts.content')

@section('title')
    Edit Data Pohon : {{ $pohon->kode_pohon }} (Kode Pohon)
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">{{$pohon->jenis_pohon->nama_lokal}}</h3>
        <form action="{{ route('pohons.update', $pohon->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="kategori_pohon">Kategori Pohon</label>
                        <select class="form-control" name="kategori_pohon_id">
                            <option selected="true" disabled="disabled">Pilih Kategori Pohon</option>
                            @foreach ($kategori_pohons as $kategori_pohon)
                                <option value="{{ $kategori_pohon->id }}" {{ old('kategori_pohon_id', $pohon->kategori_pohon_id) == $kategori_pohon->id ? 'selected' : '' }}>{{ $kategori_pohon->nama }}</option>
                            @endforeach
                        </select> 
                        @error('jenis_pohon_id')
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
                                <option value="{{ $jenis_pohon->id }}" {{ old('jenis_pohon_id', $pohon->jenis_pohon_id) == $jenis_pohon->id ? 'selected' : '' }}>{{ $jenis_pohon->nama_lokal }}</option>
                            @endforeach
                        </select> 
                        @error('jenis_pohon_id')
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
                                <option value="{{ $lokasi_pohon->id }}" {{ old('lokasi_pohon_id', $pohon->lokasi_pohon_id) == $lokasi_pohon->id ? 'selected' : '' }}>{{ $lokasi_pohon->jalur_pohon }}</option>
                            @endforeach
                        </select>
                        @error('lokasi_pohon_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kode_pohon">Kode Pohon</label>
                        <input type="text" class="form-control" name="kode_pohon" id="kode_pohon"
                            value="{{ old('kode_pohon', $pohon->kode_pohon) }}" placeholder="....">
                        @error('kode_pohon')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="diameter">Diameter</label>
                        <input type="number" class="form-control" name="diameter" id="diameter"
                            value="{{ old('diameter', $pohon->diameter) }}" placeholder="...." step="0.01">
                        @error('diameter')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="h_top">H Top</label>
                        <input type="number" class="form-control" name="h_top" id="h_top"
                            value="{{ old('h_top', $pohon->h_top) }}" placeholder="....">
                        @error('h_top')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="h_pole">H Pole</label>
                        <input type="number" class="form-control" name="h_pole" id="h_pole"
                            value="{{ old('h_pole', $pohon->h_pole) }}" placeholder="....">
                        @error('h_pole')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="h_base">H Base</label>
                        <input type="number" class="form-control" name="h_base" id="h_base"
                            value="{{ old('h_base', $pohon->h_base) }}" placeholder="....">
                        @error('h_base')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tinggi_jalon">Tinggi Jalon/Galah</label>
                        <input type="number" class="form-control" name="tinggi_jalon" id="tinggi_jalon"
                            value="{{ old('tinggi_jalon', $pohon->tinggi_jalon) }}" placeholder="....">
                        @error('tinggi_jalon')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_tanam">Tanggal Tanam</label>
                        <input type="date" id="tgl_tanam" class="form-control" name="tgl_tanam" value="{{ old('tgl_tanam', $pohon->tgl_tanam) }}">
                        @error('tgl_tanam')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_pengukuran">Tanggal Pengukuran</label>
                        <input type="date" id="tgl_pengukuran" class="form-control" name="tgl_pengukuran" value="{{ old('tgl_pengukuran', $pohon->tgl_pengukuran) }}">
                        @error('tgl_pengukuran')
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
                        <textarea class="form-control" name="note" id="note" placeholder="....">{{ old('note', $pohon->note) }}</textarea>
                        @error('note')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>                    
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
            <a href="{{ route('pohons.index')  }}" class="btn btn-secondary my-3">
                <span class="text">Kembali</span>
            </a>
        </form>
    </div>
</div>
@endsection
