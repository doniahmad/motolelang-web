@extends('Main.layouts.master')
@section('title', 'Lupa Kata Sandi')

<div class="bg-login">
    <div class="container">
        <div class="login-body">
            <div class="center">
                <div class="my-5">
                    <h1 class="bold">Lupa Kata Sandi</h1>
                    <form method="post" action="{{ route('forgot.resetPassword') }}">
                        @csrf
                        <input type="text" name="email" value="{{ request()->input('email') }}" required hidden>
                        <input type="text" name="token" value="{{ request()->input('token') }}" required hidden>
                        <div class="txt_field">
                            <input type="password" id="password" name="password" class="password" required>

                            <i class="eye-icon fa fa-eye-slash" id="eye" onclick="changePasswordIcon(this)"></i>
                            <span></span>
                            <label>Password</label>
                        </div>
                        <div class="txt_field">
                            <input type="password" id="password-confirmation" name="password_confirmation"
                                class="password" required>

                            <i class="eye-icon fa fa-eye-slash" id="eye" onclick="changePasswordIcon(this)"></i>
                            <span></span>
                            <label>Password Confirmation</label>
                        </div>

                        <input type="submit" value="Simpan">
                    </form>
                    <div class="text-center mt-5">
                        <p> Copyright &copy; <a href="/" class="text-decoration-none">MOTO Lelang</a> 2022</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function changePasswordIcon(target) {
            const parentElement = target.parentElement;
            const inputElement = parentElement.querySelector('.password');
            const iconElement = parentElement.querySelector('.eye-icon');

            const type = inputElement.getAttribute("type") === "password" ? "text" : "password";
            iconElement.classList.toggle("fa-eye");
            inputElement.setAttribute("type", type);

        }
    </script>
@endpush
