<nav id="admin-navbar" class="navbar navbar-expand-lg bg-white fixed-top">
    <div class="container-fluid px-5">
        <div class="bars">
            <button class="sidebar-toggle" id="sidebar-toggle">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <a class="navbar-brand me-auto" href="{{ route('dashboard.index') }}">
            MOTO Lelang
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
                <li>
                    <div class="dropdown-item" href="{{ route('admin.logout') }}" onclick="logoutBtn(this)">Logout</div>
                </li>
            </ul>
        </div>
    </div>
</nav>

@push('scripts')
    <script type="text/javascript">
        function logoutBtn(val) {
            Swal.fire({
                title: 'Yakin ingin logout ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#138611',
                cancelButtonColor: '#C72D00',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = val.getAttribute('href');
                }
            })
        }
    </script>
    <script type="text/javascript" src="/assets/admin/js/sidebar.js"></script>
@endpush
