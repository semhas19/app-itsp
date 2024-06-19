@extends('layouts.content')

@section('title', 'Edit Lokasi Pohon')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">"{{$lokasipohon->jalur_pohon}}"</h3>
        <form method="POST" action="{{ route('lokasipohons.update', $lokasipohon->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="jalur_pohon">Jalur Pohon</label>
                        <input type="text" class="form-control" name="jalur_pohon" id="jalur_pohon" value="{{ $lokasipohon->jalur_pohon }}" placeholder="....">
                        @error('jalur_pohon')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="plot_pohon">Plot Pohon</label>
                        <input type="text" class="form-control" name="plot_pohon" id="plot_pohon" value="{{ $lokasipohon->plot_pohon }}" placeholder="....">
                        @error('plot_pohon')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
            <a href="{{ route('lokasipohons.index')  }}" class="btn btn-secondary my-3">
                <span class="text">Kembali</span>
            </a>
        </form>
    </div>
</div>
@endsection

                        {{-- <div class="form-group">
                            <label for="koordinat">Koordinat</label>
                            <input type="text" class="form-control" name="koordinat" id="koordinat" value="{{ $lokasipohon->koordinat }}" placeholder="Masukkan Koordinat Pohon">
                            @error('jalur_pohon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}