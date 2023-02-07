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
                    <i class="fa-solid fa-bell"></i>
                </li>
                <li id="iconUser" class="nav-item text-light">

                    <div class="dropdown">
                        <a class="nav-link dropdown" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="/assets/main/img/avatarround.png" alt="">
                        </a>
                        <ul id="dropdown-profil" class="dropdown-menu text-center text-grey">
                            <li class="row"><img src="/assets/main/img/avatar.png" class="rounded mx-auto d-block"
                                    alt="" srcset=""><span class="text-center pt-2 pb-1">Aril
                                    Ponco Nugroho</span></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Lelang Saya</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li id="keluar"><a class="dropdown-item" href="#">Keluar</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
