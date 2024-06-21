@extends('layouts.content')

@section('title', 'Dashboard')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="row mb-3">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pohon</div>
                    <div class="mt-2 mb-0 text-muted text-xs">
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totals }}</div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-tree fa-2x text-success"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Kondisi Baik</div>
                    <div class="mt-2 mb-0 text-muted text-xs">
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($baiks) }}</div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-thumbs-up fa-2x text-primary"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Kondisi Rusak Ringan</div>
                    <div class="mt-2 mb-0 text-muted text-xs">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format($rusakringans) }}</div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-thumbs-up fa-2x text-warning"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Kondisi Rusak Berat</div>
                    <div class="mt-2 mb-0 text-muted text-xs">
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($rusakberats) }}</div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-thumbs-down fa-2x text-danger"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    

    <div class="row mb-3">
        <div class="col-12">
            <div class="card h-100">
                <div class="card-body">
                    <form action="{{ route('home') }}" method="GET">
                        <div class="form-group">
                            <label>Pilih Tahun Penanaman</label>
                            <div class="input-group">
                                <select class="custom-select" name="tahun">
                                    <option selected disabled>Pilih Tahun</option>
                                    @foreach ($tahuns as $tahun)
                                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fas fa-search"></i> Cari
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <div class="container px-4 mx-auto">
                            {!! $pohon->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{ $pohon->cdn() }}"></script>

    {{ $pohon->script() }}
    @endpush

@endsection
