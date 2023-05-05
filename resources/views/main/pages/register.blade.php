@extends('main.layouts.master')
@section('title', 'Daftar')

<div class="bg-login">
    <div class="container">
        <div class="login-body">
            <div class="center">
                <div class="my-5">
                    <h1 class="bold">Daftar</h1>
                    <form method="POST" action="{{ route('login.daftarAction') }}" onsubmit="loading()">
                        @csrf
                        <div class="txt_field">
                            <input type="text" name="name" value="{{ old('name') }}" required>
                            <span></span>
                            <label>Nama</label>
                        </div>
                        @error('name')
                            <div class="text-danger" style="font-size:12px;">
                                {{ $message }}
                            </div>
                        @enderror
                        <div
                            class="danger-valid txt_field @error('email')
                            mb-1 text-danger
                        @enderror">
                            <input type="email" name="email" value="{{ old('email') }}" required>
                            <span></span>
                            <label>Email</label>
                        </div>
                        @error('email')
                            <div class="text-danger" style="font-size:12px;">
                                Email yang anda masukkan sudah terdaftar. Gunakan email lain!
                            </div>
                        @enderror
                        <div
                            class="txt_field @error('handphone')
                        mb-1 text-danger
                    @enderror">
                            <input type="text" name="handphone" value="{{ old('handphone') }}" required>
                            <span></span>
                            <label>No. handphone</label>
                        </div>
                        @error('handphone')
                            <div class="text-danger" style="font-size:12px;">
                                Nomor yang anda masukkan sudah terdaftar. Gunakan nomor lain!
                            </div>
                        @enderror
                        <div class="txt_field">
                            <input type="password" name="password" id="password" class="password" minlength="8"
                                required>
                            <i class="eye-icon fa fa-eye-slash text-secondary" id="eyePass"
                                onclick="changePasswordIcon(this)"></i>
                            <span></span>
                            <label>Kata Sandi</label>
                        </div>
                        @error('password')
                            <div class="text-danger" style="font-size:12px;">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="txt_field">
                            <input type="password" name="password_confirmation" id="password-confirmation"
                                class="password" minlength="8" required>
                            <i class="eye-icon fa fa-eye-slash text-secondary" id="eyeConfrimPass"
                                onclick="changePasswordIcon(this)"></i>
                            <span></span>
                            <label>Konfirmasi Kata Sandi</label>
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger" style="font-size:12px;">
                                {{ $message }}
                            </div>
                        @enderror
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
    function changePasswordIcon(target) {
        const parentElement = target.parentElement;
        const inputElement = parentElement.querySelector('.password');
        const iconElement = parentElement.querySelector('.eye-icon');

        const type = inputElement.getAttribute("type") === "password" ? "text" : "password";
        iconElement.classList.toggle("fa-eye");
        inputElement.setAttribute("type", type);

    }

    const password = document.getElementById("password"),
        confirm_password = document.getElementById("password-confirmation");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    function loading() {
        Swal.fire({
            title: 'Tunggu Sebentar !',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            showConfirmButton: false,
            willOpen: () => {
                swal.showLoading();
            },
        });
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
