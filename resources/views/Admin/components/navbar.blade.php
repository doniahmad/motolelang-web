<nav id="admin-navbar" class="navbar navbar-expand-lg bg-white fixed-top">
    <div class="container-fluid px-5">
        <div class="bars">
            <button class="sidebar-toggle" id="sidebar-toggle">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <a class="navbar-brand me-auto" href="{{ route('dashboard.index') }}">
            Lelang Motor
        </a>
        <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{-- <i class="fa-solid fa-user"></i> --}}
                <img id="img-profil-admin"
                    src="{{ isset(auth()->user()->photo) ? asset('storage/image/admin/' . auth()->user()->photo) : asset('/assets/main/img/noimg.png') }}"
                    alt="">
                {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu ">
                <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profil</a></li>
                <li>
                    <hr class="dropdown-divider p-0">
                </li>
                <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

@push('scripts')
    <script type="text/javascript" src="/assets/admin/js/sidebar.js"></script>
@endpush
