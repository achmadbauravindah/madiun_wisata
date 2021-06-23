<div class="kiri col-md-4">
    <div class="custom-card p-3 pb-1">
        @if (auth()->guard('lodger')->check())
        <h6>{{ auth()->guard('lodger')->user()->nama }}</h6>
        @else
        <h6>Nama tidak ditermukan</h6>
        @endif
        <p>Lodger</p>
    </div>
    <div class="list-group custom-card">
        <a href="{{ route('lodger') }}"
            class="list-group-item list-group-item-action {{ request()->is('lodger','lodger/penginapans/*') ? ' list-group-item-dark':''}}"
            aria-current="true"><i class="bi bi-house-fill"></i> Penginapan Saya </a>
        <a href="{{ route('lodger.edit') }}"
            class="list-group-item list-group-item-action {{ request()->is('lodger/edit') ? ' list-group-item-dark':''}}"><i
                class="bi bi-gear-fill"></i> Pengaturan
            Akun</a>
        <a href="{{ route('lodger.editPassword') }}" class="list-group-item list-group-item-action
        {{ request()->is('lodger/edit-password') ? ' list-group-item-dark':''}}">
            <i class="bi bi-shield-lock-fill"></i>Ganti Password
        </a>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action"><i
                class="bi bi-box-arrow-right"></i>
            Logout</a>
    </div>
</div>
