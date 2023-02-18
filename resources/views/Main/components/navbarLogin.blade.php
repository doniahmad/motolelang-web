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
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('lelang*') ? 'active' : '' }}"
                        href="{{ route('lelang.index') }}">Lelang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                        href="{{ route('about.index') }}">About Us</a>
                </li>
                <li id="iconBell" class="nav-item text-light">
                    <div class="dropdown">
                        <a class="text-decoration-none text-reset" href="#" id="notification" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                        </a>
                        <ul id="dropdownNotif" class="dropdown-menu box-shadow-santuy"
                            aria-labelledby="navbarDropdownMenuLink">
                            <div class="p-3">
                                <h6>Notifikasi</h6>
                                <div class="konten-notif">
                                    @foreach (json_decode(auth()->user()->unreadNotifications) as $notif)
                                        <a href="http://127.0.0.1:8000/lelang/pembayaran"
                                            class="text-dark text-decoration-none">
                                            <div class="d-flex my-3">
                                                <img src="{{ asset('storage/image/product/' . $notif->data->img_product) }}"
                                                    alt="">
                                                <p class="ms-auto ps-3">Selamat, Anda berhasil memenangkan pelelangan
                                                    motor
                                                    <strong>{{ $notif->data->nama_product }}</strong> . Mohon lakukan
                                                    pembayaran untuk dapat menerima barang anda.
                                                </p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>


                        </ul>
                    </div>
                </li>
                <li id="iconUser" class="nav-item text-light">

                    <div class="dropdown">
                        <a class="nav-link dropdown" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="/assets/main/img/avatarround.png" alt="">
                        </a>
                        <ul id="dropdown-profil" class="dropdown-menu text-center text-grey">
                            <li class="row"><img src="/assets/main/img/avatar.png" class="rounded mx-auto d-block"
                                    alt="" srcset=""><span
                                    class="text-center pt-2 pb-1">{{ auth()->user()->name }}</span></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('profil.index') }}">Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('lelang.lelangSaya') }}">Lelang Saya</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li id="keluar"><a class="dropdown-item" href="{{ route('logout.action') }}">Keluar</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
