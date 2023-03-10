<nav class="navbar navbar-expand-lg navbar-dark bg-color-primer fixed-top">
    <div id="navbarLogin" class="container">
        <a class="navbar-brand" href="/">
            <img src="/assets/main/img/logo_white.svg" alt="Logo Moto Lelang" width="100%">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLogin"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarLogin">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item pe-3">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item pe-3">
                    <a class="nav-link {{ request()->is('lelang*') ? 'active' : '' }}"
                        href="{{ route('lelang.index') }}">Lelang</a>
                </li>
                <li class="nav-item pe-3">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                        href="{{ route('about.index') }}">About Us</a>
                </li>
                <li id="iconBell" class="nav-item text-light pe-4">
                    <div class="dropdown">
                        <a class="text-decoration-none text-reset" href="#" id="notification" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if (count(auth()->user()->unreadNotifications))
                                <div class="unread-notif" onclick="readNotif()">
                                    <i class="fa fa-bell"></i>
                                    <div id="iconUnread"
                                        style="width:10px;height:10px;border-radius:100%;background-color:red;">
                                    </div>
                                </div>
                            @else
                                <i class="fa fa-bell"></i>
                            @endif
                        </a>
                        <ul id="dropdownNotif" class="dropdown-menu box-shadow-santuy"
                            aria-labelledby="navbarDropdownMenuLink">
                            <div class="p-3">
                                <h6>Notifikasi</h6>
                                <div class="konten-notif">
                                    @foreach (auth()->user()->notifications as $notif)
                                        <a href="{{ url('lelang/pembayaran/' . $notif->data['kode_pembayaran']) }}"
                                            class="text-dark text-decoration-none">
                                            <div class="d-flex my-3">
                                                <img src="{{ asset('storage/image/product/' . $notif->data['img_product']) }}"
                                                    alt="">
                                                <p class="ms-auto ps-3">Selamat, Anda berhasil memenangkan pelelangan
                                                    motor
                                                    <strong>{{ $notif->data['nama_product'] }}</strong> . Mohon segera
                                                    lakukan pembayaran untuk dapat menerima barang anda.
                                                </p>
                                            </div>
                                        </a>
                                        @php
                                            session()->forget('notifications');
                                        @endphp
                                    @endforeach
                                </div>
                            </div>


                        </ul>
                    </div>
                </li>
                <li id="iconUser" class="nav-item text-light">

                    <div class="dropdown">
                        <a class="nav-link dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ isset(auth()->user()->photo) ? asset('storage/image/user/' . auth()->user()->photo) : '/assets/main/img/avatarround.png' }}"
                                alt="" class="img img-btn-dropdown">
                        </a>
                        <ul id="dropdown-profil" class="dropdown-menu text-center text-grey box-shadow-santuy">
                            <div class="">
                                <li class="mb-3 mt-2"><img
                                        src="{{ isset(auth()->user()->photo) ? asset('storage/image/user/' . auth()->user()->photo) : '/assets/main/img/avatarround.png' }}"
                                        class="img-in-dropdown mx-auto d-block" alt="" srcset=""><span
                                        class="text-center mt-2 mb-2">{{ auth()->user()->name }}</span></li>
                                <li><a class="dropdown-item bt py-3" href="{{ route('profil.index') }}">Profil</a></li>

                                <li style="border-bottom: 1px solid #B7B7B7;
}"><a class="dropdown-item bt py-3"
                                        href="{{ route('lelang.lelangSaya') }}">Lelang Saya</a></li>

                                <li id="keluar"><button href="{{ route('logout.action') }}" type="button"
                                        class="dropdown-item bt py-3" onclick="logoutAction(this)">Keluar</button>
                                </li>
                            </div>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

@include('main.modal.alertLogout')

@push('scripts')
    <script type="text/javascript">
        function readNotif() {
            {{ auth()->user()->unreadNotifications->markAsRead() }}
        }

        function logoutAction(val) {
            Swal.fire({
                title: 'Anda yakin ingin Logout?',
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
        };
    </script>
@endpush
