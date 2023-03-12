@extends('main.layouts.master')
@section('title', 'Lupa Kata Sandi')

<div class="bg-login">
    <div class="container">
        <div class="login-body">
            <div class="center">
                <div class="my-5">
                    <h1 class="bold">Lupa Kata Sandi</h1>
                    <form method="post" action="{{ route('forgot.sendEmail') }}">
                        @csrf
                        <div class="txt_field">
                            <input type="email" name="email" required>
                            <span></span>
                            <label>Email</label>
                        </div>

                        <input type="submit" value="Kirim">


                    </form>
                    <div class="text-center mt-5">
                        <p> Copyright &copy; <a href="/" class="text-decoration-none">MOTO Lelang</a> 2022</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
