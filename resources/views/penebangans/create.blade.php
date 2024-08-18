@extends('layouts.content')

@section('title', 'Tambah Data Penebangan')

@section('content')

    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('penebangans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        {{-- <div class="form-group">
                            <label for="nama_lokal">Nama Lokal</label>
                            <input type="text" class="form-control" name="nama_lokal" id="nama_lokal"
                                value="{{ old('nama_lokal') }}" placeholder="....">
                            @error('nama_lokal')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_ilmiah">Nama Ilmiah</label>
                            <input type="text" class="form-control" name="nama_ilmiah" id="nama_ilmiah"
                                value="{{ old('nama_ilmiah') }}" placeholder="....">
                            @error('nama_ilmiah')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="kode_pohon">Kode Pohon</label>
                            <input type="text" class="form-control" name="kode_pohon" id="kode_pohon"
                                value="{{ old('kode_pohon') }}" placeholder="....">
                            @error('kode_pohon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tinggi_pohon">Tinggi Pohon</label>
                            <input type="number" class="form-control" name="tinggi_pohon" id="tinggi_pohon"
                                value="{{ old('tinggi_pohon') }}" placeholder="....">
                            @error('tinggi_pohon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="diameter_pohon">Diameter Pohon</label>
                            <input type="number" class="form-control" name="diameter_pohon" id="diameter_pohon"
                                value="{{ old('diameter_pohon') }}" placeholder="....">
                            @error('diameter_pohon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keliling_pohon">Keliling Pohon</label>
                            <input type="number" class="form-control" name="keliling_pohon" id="keliling_pohon"
                                value="{{ old('keliling_pohon') }}" placeholder="....">
                            @error('keliling_pohon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_tebang">Tanggal Penebangan</label>
                            <input type="date" class="form-control" name="tgl_tebang" id="tgl_tebang"
                                value="{{ old('tgl_tebang') }}" placeholder="....">
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
                            <textarea class="form-control" name="note" id="note" placeholder="Catatan">{{ old('note') }}</textarea>
                            @error('note')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" name="gambar" id="gambar">
                            @error('gambar')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="lokasi_pohon">Jalur Pohon</label>
                            <select class="form-control" name="lokasi_pohon_id">
                                <option selected="true" disabled="disabled">Pilih Jalur Pohon</option>
                                @foreach ($lokasi_pohons as $lokasi_pohon)
                                    <option value="{{ $lokasi_pohon->id }}">{{ $lokasi_pohon->jalur_pohon }}</option>
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
                                    <option value="{{ $jenis_pohon->id }}">{{ $jenis_pohon->kategori_pohon->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_pohon_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
                        <a href="{{ route('pohons.index') }}" class="btn btn-secondary my-3">
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
