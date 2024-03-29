@extends('main.layouts.master')
@section('title', 'Masuk')

@if (!auth()->check())
    <div class="bg-login">
        <div class="container">
            <div class="login-body">
                <div class="center">
                    <div class="my-5">
                        <h1 class="bold">Masuk</h1>
                        <form method="post" action="{{ route('login.action') }}" onsubmit="loading()">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-warning py-2" role="alert">
                                    <i class="fa-solid fa-circle-exclamation">
                                    </i>
                                    <span class="ps-2">
                                        {{ $errors->first('message') }}
                                    </span>
                                </div>
                            @endif
                            <div class="txt_field">
                                <input type="email" name="email" required>
                                <span></span>
                                <label>Email</label>
                            </div>
                            <div class="txt_field">
                                <input type="password" name="password" id="password" minlength="8" required>
                                <i class="eye-icon fa fa-eye-slash" id="eye"></i>
                                <span></span>
                                <label>Kata Sandi</label>
                            </div>
                            <div class="pass"><a href="{{ route('login.forgot') }}">Lupa Kata Sandi</a></div>
                            <input type="submit" value="Masuk" onsubmit="loading()">
                            <p class="text-center my-3">OR</p>
                            <div class="signup_link">
                                Belum punya akun? <a href="{{ route('login.daftar') }}"> Daftar</a>
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

@push('scripts')
    <script>
        const passwordInput = document.querySelector("#password")
        const eye = document.querySelector("#eye")

        eye.addEventListener("click", function() {
            this.classList.toggle("fa-eye");
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
            passwordInput.setAttribute("type", type)
        })



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
    </script>
@endpush
