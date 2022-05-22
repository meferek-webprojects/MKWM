@extends('dashboard.layouts.minimal-layout')

@section('title')
    <title>MKWM - Zresetuj hasło</title>
@endsection

@section('content')
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background d-lg-flex d-none">

        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="app-auth-container">
                <div class="logo">
                    <a href="{{ url('/') }}">MKWM</a>
                </div>
                <p class="auth-description">Podaj adres, który został użyty do założenia konta na naszej platformie w celu odzyskania hasła.<br></p>

                <div class="auth-credentials m-b-xxl">

                    @if ($errors->any())
                        <div class="alert alert-danger alert-style-light" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif

                    <label for="signUpEmail" class="form-label">Adres e-mail</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                </div>

                <div class="auth-submit mt-5">
                    <button type="submit" class="btn btn-primary">Zresetuj hasło</a>
                </div>
                <div class="divider"></div>
                <p class="auth-description-2">Nie masz konta? <a href="{{ url('/register') }}">Stwórz konto</a></p>
            </div>

        </form>
    </div>
@endsection
