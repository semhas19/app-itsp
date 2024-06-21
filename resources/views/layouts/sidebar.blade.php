<style>
    .warna {
        background-color: white !important;
    }

    .tulisan {
        color: rgb(2, 150, 46); !important;
    }
</style>

<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center warna" href="index.html">
        <div class=" tulisan sidebar-brand-text mx-3 ">WEB-ITSP</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menu
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMasterData"
            aria-expanded="true" aria-controls="collapseMasterData">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseMasterData" class="collapse" aria-labelledby="headingMasterData"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"></h6>
                <a class="collapse-item" href="{{ route('kategoripohons.index') }}">
                    Kategori Pohon
                </a>
                <a class="collapse-item" href="{{ route('lokasipohons.index') }}">
                    Lokasi Pohon
                </a>
                <a class="collapse-item" href="{{ route('jenispohons.index') }}">
                    Jenis Pohon
                </a>

                @if (auth()->user()->role === 'superadmin')
                    <a class="collapse-item" href="{{ route('admins.index') }}">
                        Admin
                    </a>
                @endif

                @if (auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
                    <a class="collapse-item" href="{{ route('pegawais.index') }}">
                        Pegawai
                    </a>
                @endif
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pohons.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Data Pohon</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pemeliharaans.index') }}">
            <i class="fas fa-wrench"></i>
            <span>Pemeliharaan</span>
        </a>
    </li>
</ul>
