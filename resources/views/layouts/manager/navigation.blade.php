<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light custom-nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/ornamen/logoMW.png') }}" alt="logo madiun wisata" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? ' active':''}}" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('wisatas','wisatas/*') ? ' active':''}}"
                        href="{{ route('wisatas') }}">Tempat
                        Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('penginapans','penginapans/*') ? ' active':''}}"
                        href="{{ route('penginapans') }}">Penginapan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('lapakumkms','manager','lapakumkms/*','manager/*','seller','seller/*') ? ' active':''}}"
                        href="{{ route('lapakumkms') }}">Lapak UMKM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('mabours','mabours/*') ? ' active':''}}"
                        href="{{ 'mabours' }}">Mabour</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->
