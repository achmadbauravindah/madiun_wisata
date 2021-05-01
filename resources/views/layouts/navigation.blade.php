<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                {{-- Untuk mengaktifkan navbar di tulisan akan dibuat kondisi, halaman apa yang aktif --}}
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('/') ? ' active':''}}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('wisatas') ? ' active':''}}" href="/wisatas">Tempat
                        Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('penginapans') ? ' active':''}}"
                        href="/penginapans">Penginapan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('lapakumkms') ? ' active':''}}" href="/lapakumkms">Lapak UMKM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('mabours') ? ' active':''}}" href="/mabours">Mabour</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <a class="nav-link" href="/login/admin">{{ __('Login As Admin') }}</a>
            </ul>
        </div>
    </div>
</nav>
