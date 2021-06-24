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
                    @if (auth()->guard('admin')->check())
                    <h6>Selamat datang {{ auth()->guard('admin')->user()->nama }}</h6>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->
