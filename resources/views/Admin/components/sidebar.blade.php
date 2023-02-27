@push('scripts')
    <script type="text/javascript" src="/assets/admin/js/sidebar.js"></script>
@endpush

<nav id="admin-sidebar">
    <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
    </div>

    <div class="sidebar-header text-center mt-5 mb-4">
        <img src="/assets/admin/img/logo-2.svg" alt="Logo Moto Lelang">
    </div>

    <ul class="list-unstyled navigation">
        {{-- <li>
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                <span>
                    <i class="fa-solid fa-chart-simple"></i>
                </span>
                Dashboard</a>
        </li> --}}
        @canany(['access owner', 'access admin'])
            <li>
                <a class="nav-link {{ request()->is('dashboard/product') ? 'active' : '' }}"
                    href="{{ route('dashboard.product') }}">
                    <span>
                        <i class="fa-solid fa-motorcycle"></i>
                    </span>
                    Data Barang</a>
            </li>
        @endcan
        @canany(['access owner', 'access admin'])
            <li>
                <a class="nav-link {{ request()->is('/pembayaran') ? 'active' : '' }}"
                    href="{{ route('dashboard.pembayaran') }}">
                    <span>
                        <i class="fa-solid fa-list-check"></i>
                    </span>
                    Tagihan</a>
            </li>
        @endcan
        @canany(['access owner', 'access admin'])
            <li>
                <a class="nav-link {{ request()->is('/pengiriman') ? 'active' : '' }}"
                    href="{{ route('dashboard.pengiriman') }}">
                    <span>
                        <i class="fa-solid fa-truck"></i>
                    </span>
                    Pengiriman</a>
            </li>
        @endcan
        @canany(['access owner', 'access admin'])
            <li>
                <a class="nav-link {{ request()->is('/customer') ? 'active' : '' }}"
                    href="{{ route('dashboard.customer') }}">
                    <span>
                        <i class="fa-solid fa-users"></i>
                    </span>
                    Customer</a>
            </li>
        @endcan
        @canany(['access kurir', 'access owner', 'access admin'])
            <li>
                <a class="nav-link {{ request()->is('/kurir') ? 'active' : '' }}" href="{{ route('dashboard.kurir') }}">
                    <span>
                        <i class="fas fa-user-astronaut"></i>
                    </span>
                    Kurir</a>
            </li>
        @endcan
        {{-- @canany(['access owner', 'access admin'])
            <li>
                <a class="nav-link {{ request()->is('/admin') ? 'active' : '' }}" href="{{ route('dashboard.admin') }}">
                    <span>
                        <i class="fa-solid fa-user-secret"></i>
                    </span>
                    Admin</a>
            </li>
        @endcan --}}
    </ul>
</nav>

<div class="overlay"></div>
