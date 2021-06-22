<div class="kiri col-md-4">
    <div class="custom-card p-3 pb-1">
        @if (auth()->guard('seller')->check())
        <h6>{{ auth()->guard('seller')->user()->nama }}</h6>
        @else
        <h6>Nama tidak ditemukan</h6>
        @endif
        <p>Seller</p>
    </div>
    <div class="list-group custom-card">
        <a href="{{ route('seller') }}"
            class="list-group-item list-group-item-action {{ request()->is('seller','seller/kioses','seller/kios/*') ? ' list-group-item-dark':''}}"
            aria-current="true"><i class="bi bi-house-fill"></i> Data Kios </a>
        <a href="{{ route('seller.edit') }}"
            class="list-group-item list-group-item-action {{ request()->is('seller/edit') ? ' list-group-item-dark':''}}"><i
                class="bi bi-gear-fill"></i> Pengaturan
            Akun</a>
        <a href="{{ route('seller.editPassword') }}"
            class="list-group-item list-group-item-action {{ request()->is('seller/edit-password') ? ' list-group-item-dark':''}}"><i
                class="bi bi-shield-lock-fill"></i> Ganti
            Password</a>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action"><i
                class="bi bi-box-arrow-right"></i>
            Logout</a>
    </div>
</div>
