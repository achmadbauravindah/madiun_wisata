<div class="kiri col-md-4">
    <div class="custom-card p-3 pb-1">
        @if (auth()->guard('admin')->check())
        <h6>{{ auth()->guard('admin')->user()->nama }}</h6>
        @else
        <h6>Nama tidak ditermukan</h6>
        @endif
        <p>Admin</p>
    </div>
    <div class="list-group custom-card">
        <a href="{{ route('admin') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin','admin/wisatas','admin/wisatas/*') ? ' list-group-item-dark':''}}"
            aria-current="true">
            <i class="bi bi-tree-fill"></i>
            Tempat Wisata
        </a>
        <a href="{{ route('admin.penginapans') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/penginapans', 'admin/penginapans/*') ? ' list-group-item-dark':''}}"">
            <i class=" bi bi-house-door-fill"></i>
            Penginapan
        </a>
        <a href="{{ route('manage-lodger') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/manage-lodger','admin/manage-lodger/*') ? ' list-group-item-dark':''}}"">
            <i class=" bi bi-people-fill"></i>
            Lodger Penginapan
        </a>
        <a href="{{ route('admin.lapakumkms') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/lapakumkms','admin/lapakumkms/*') ? ' list-group-item-dark':''}}"">
            <i class=" bi bi-cart-fill"></i>
            Lapak UMKM Kelurahan
        </a>
        <a href="{{ route('manage-manager') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/manage-manager','admin/manage-manager/*') ? ' list-group-item-dark':''}}"">
            <i class=" bi bi-people-fill"></i>
            Manager Lapak UMKM
        </a>
        <a href="{{route('admin.mabours') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/mabours','admin/mabours/*') ? ' list-group-item-dark':''}}">
            <i class=" fas fa-bus"></i>
            Mabour
        </a>
        <a href="{{ route('admin.editPassword') }}" class="list-group-item list-group-item-action
        {{ request()->is('admin/edit-password') ? ' list-group-item-dark':''}}">
            <i class="bi bi-shield-lock-fill"></i>Ganti Password
        </a>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action"><i
                class="bi bi-box-arrow-right"></i>
            Logout</a>
    </div>
</div>
