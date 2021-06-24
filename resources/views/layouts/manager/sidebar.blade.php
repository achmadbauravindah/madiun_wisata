<div class="kiri col-md-4">
    <div class="custom-card p-3 pb-1">
        @if (auth()->guard('manager')->check())
        <h6>{{ auth()->guard('manager')->user()->nama }}</h6>
        @else
        <h6>Nama tidak ditemukan</h6>
        @endif
        <p>Manager</p>
    </div>
    <div class="list-group custom-card">
        <a href="{{ route('manager') }}"
            class="list-group-item list-group-item-action {{ request()->is('manager','manager/kioses','manager/kioses/*') ? ' list-group-item-dark':''}}"
            aria-current="true"><i class="bi bi-house-fill"></i> Data Kios </a>
        <a href="{{ route('manager.edit') }}"
            class="list-group-item list-group-item-action {{ request()->is('manager/edit') ? ' list-group-item-dark':''}}"><i
                class="bi bi-gear-fill"></i> Pengaturan
            Akun</a>
        <a href="{{ route('manager.editPassword') }}"
            class="list-group-item list-group-item-action {{ request()->is('manager/edit-password') ? ' list-group-item-dark':''}}"><i
                class="bi bi-shield-lock-fill"></i> Ganti
            Password</a>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action"><i
                class="bi bi-box-arrow-right"></i>
            Logout</a>
    </div>
</div>
