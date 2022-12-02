@extends('layouts.master')
@section('title', 'Sign In')

<div class="bg-login">
    <div class="container">
        <div class="login-body">
            <div class="center">
                <div class="my-5">
                    <h1 class="bold">Masuk</h1>
                    <form method="post">
                        <div class="txt_field">
                            <input type="text" required>
                            <span></span>
                            <label>Email</label>
                        </div>
                        <div class="txt_field">
                            <input type="password" required>
                            <span></span>
                            <label>Kata Sandi</label>
                        </div>
                        <div class="pass">Lupa Kata Sandi</div>
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
