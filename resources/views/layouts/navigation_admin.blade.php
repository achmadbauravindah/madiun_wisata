<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin') }}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                {{-- Untuk mengaktifkan navbar di tulisan akan dibuat kondisi, halaman apa yang aktif --}}
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('admin') ? ' active':''}}" aria-current="page"
                        href="/admin">AdminHome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('admin/wisatas') ? ' active':''}}"
                        href="{{ route('admin.wisatas') }}">Tempat
                        Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('admin/penginapans') ? ' active':''}}"
                        href="{{ route('admin.penginapans') }}">Penginapan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('admin/lapakumkms') ? ' active':''}}"
                        href="{{ route('admin.lapakumkms') }}">Lapak
                        UMKM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('admin/mabours') ? ' active':''}}"
                        href="{{ route('admin.mabours') }}">Mabour</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <a class="nav-link" href="{{ route('admin') }}">Hello, {{ auth()->user()->nama }}</a>
            </ul>
        </div>
    </div>
</nav>
