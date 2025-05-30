<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="" class="sidebar-logo justify-content-center">
            <img src="{{ asset('frontend') }}/assets/img/core-img/DISHUB.png" alt="site logo" class="light-logo">
            <img src="{{ asset('frontend') }}/assets/img/core-img/DISHUB.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="{{ request()->is('dashboard') ? 'active-page' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="dropdown {{ request()->is('data-uji*') ? 'open' : '' }}">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:document-add-outline" class="menu-icon"></iconify-icon>
                    <span>Data Uji</span>
                </a>
                <ul class="sidebar-submenu">
                    @if (Auth::user()->hasRole('admin'))
                    <li>
                        <a href="{{ route('data-uji.belum-validasi') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Belum Validasi</a>
                    </li>
                    <li>
                        <a href="{{ route('data-uji.sudah-validasi') }}"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Sudah Validasi</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('data-uji.belum-diuji') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Belum Diuji</a>
                    </li>
                    <li>
                        <a href="{{ route('data-uji.teruji') }}"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Teruji</a>
                    </li>
                    <li>
                        <a href="{{ route('data-uji.tidak-teruji') }}"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Tidak Teruji</a>
                    </li>
                    @endif
                </ul>
            </li>
            @if (Auth::user()->hasRole('admin'))
            <li class="{{ request()->is('pengguna*') ? 'active-page' : '' }}">
                <a href="{{ route('pengguna.index') }}">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Data Pengguna</span>
                </a>
            </li>
            <li class="{{ request()->is('laporan*') ? 'active-page' : '' }}">
                <a href="{{ route('laporan') }}">
                    <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>
                    <span>Laporan</span>
                </a>
            </li>
            @endif
            <li class="{{ request()->is('profil*') ? 'active-page' : '' }}">
                <a href="{{ route('profil') }}">
                    <iconify-icon icon="solar:user-linear" class="menu-icon"></iconify-icon>
                    <span>Profile</span>
                </a>
            </li>
            <li class="{{ request()->is('ubah-kata-sandi*') ? 'active-page' : '' }}">
                <a href="{{ route('ubah-kata-sandi') }}">
                    <iconify-icon icon="tabler:key" class="menu-icon"></iconify-icon>
                    <span>Ubah Kata Sandi</span>
                </a>
            </li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <iconify-icon icon="lucide:power" class="menu-icon"></iconify-icon>
                    <span>Keluar</span>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
</aside>