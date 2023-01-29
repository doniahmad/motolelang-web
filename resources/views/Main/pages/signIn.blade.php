@extends('Main.layouts.master')
@section('title', 'Masuk')

@if (!auth()->check())
    <div class="bg-login">
        <div class="container">
            <div class="login-body">
                <div class="center">
                    <div class="my-5">
                        <h1 class="bold">Masuk</h1>
                        <form method="post" action="{{ route('login.action') }}">
                            @csrf
                            <div class="txt_field">
                                <input type="text" name="email" required>
                                <span></span>
                                <label>Email</label>
                            </div>
                            <div class="txt_field">
                                <input type="password" name="password" id="password" required>
                                <i class="eye-icon fa fa-eye-slash" id="eye"></i>
                                <span></span>
                                <label>Kata Sandi</label>
                            </div>
                            <div class="pass"><a href="login/lupa">Lupa Kata Sandi</a></div>
                            <input type="submit" value="Masuk">
                            <p class="text-center my-3">OR</p>
                            <div class="signup_link">
                                Belum punya akun? <a href="#"> Daftar</a>
                            </div>
                        </form>
                        <div class="text-center mt-5">
                            <p> Copyright &copy; <a href="#" class="text-decoration-none">MOTO Lelang</a> 2022</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <script>
        window.location = "/";
    </script>
@endif

<script>
    const passwordInput = document.querySelector("#password")
    const eye = document.querySelector("#eye")

    eye.addEventListener("click", function() {
        this.classList.toggle("fa-eye");
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
        passwordInput.setAttribute("type", type)
    })
</script>
