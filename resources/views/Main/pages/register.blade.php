@extends('Main.layouts.master')
@section('title', 'Daftar')

<div class="bg-login">
    <div class="container">
        <div class="login-body">
            <div class="center">
                <div class="my-5">
                    <h1 class="bold">Daftar</h1>
                    <form method="POST" action="{{ route('login.daftarAction') }}">
                        @csrf
                        <div class="txt_field">
                            <input type="text" name="name" required>
                            <span></span>
                            <label>Nama</label>
                        </div>
                        <div class="txt_field">
                            <input type="email" name="email" required>
                            <span></span>
                            <label>Email</label>
                        </div>
                        <div class="txt_field">
                            <input type="text" name="handphone" required>
                            <span></span>
                            <label>No. handphone</label>
                        </div>
                        <div class="txt_field">
                            <input type="password" name="password" id="password" class="password" required>
                            <i class="eye-icon fa fa-eye-slash" id="eyePass" onclick="changePasswordIcon(this)"></i>
                            <span></span>
                            <label>Kata Sandi</label>
                        </div>
                        <div class="txt_field">
                            <input type="password" name="password_confirmation" id="password-confirmation"
                                class="password" required>
                            <i class="eye-icon fa fa-eye-slash" id="eyeConfrimPass"
                                onclick="changePasswordIcon(this)"></i>
                            <span></span>
                            <label>Konfirmasi Kata Sandi</label>
                        </div>
                        <input type="submit" value="Daftar">
                        <p class="text-center my-3">OR</p>
                        <div class="signup_link">
                            Sudah punya akun? <a href="{{ route('login.index') }}"> Masuk</a>
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

<script>
    // const passwordInput = document.querySelector("#password")
    // const eye = document.querySelector("#eye")

    function changePasswordIcon(target) {
        const parentElement = target.parentElement;
        const inputElement = parentElement.querySelector('.password');
        const iconElement = parentElement.querySelector('.eye-icon');

        const type = inputElement.getAttribute("type") === "password" ? "text" : "password";
        iconElement.classList.toggle("fa-eye");
        inputElement.setAttribute("type", type);

    }

    // eye.addEventListener("click", function() {
    //     this.classList.toggle("fa-eye");
    //     const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
    //     passwordInput.setAttribute("type", type)
    // })
</script>
