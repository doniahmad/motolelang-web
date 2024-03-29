<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-color-primer fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/assets/main/img/logo_white.svg" alt="Logo Moto Lelang" width="100%">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
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
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('login*') ? 'active' : '' }}"
                        href="{{ route('login.index') }}">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- <script>
    const navbar = document.getElementsByTagName('nav')[0];
    window.addEventListener('scroll', function() {
        console.log(window.scrollY);
        if (window.scrollY > 1) {
            navbar.classList.add('add-shadow')
        } else if (this.window.scrollY <= 0) {
            navbar.classList.remove('add-shadow')
        }
    });
</script> --}}
