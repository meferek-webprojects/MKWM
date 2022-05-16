@extends('dashboard.layouts.minimal-layout')

@section('title')
    <title>MKWM - Zaloguj się</title>
@endsection

@section('content')
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background d-lg-flex d-none">

        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="app-auth-container">
                <div class="logo">
                    <a href="{{ url('/') }}">MKWM</a>
                </div>
                <p class="auth-description">Wprowadź poniższe dane aby się zalogować na naszej platformie.<br></p>

                <div class="auth-credentials m-b-xxl">

                    @if ($errors->any())
                        <div class="alert alert-danger alert-style-light" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif

                    <label for="signUpEmail" class="form-label">Adres e-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror m-b-md" id="signUpEmail" aria-describedby="signUpEmail" placeholder="adam@mkwmstudios.pl" required>

                    <label for="signUpPassword" class="form-label">Hasło</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror m-b-md" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required>

                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="rememberMe"type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="rememberMe">
                        Zapamiętaj mnie
                    </label>
                </div>

                <div class="auth-submit mt-5">
                    <button type="submit" class="btn btn-primary">Zaloguj się</a>
                </div>
                <div class="divider"></div>
                <p class="auth-description-2">Nie masz konta? <a href="{{ url('/register') }}">Stórz konto</a></p>
                <p class="auth-description-2">Zapomniałeś hasło? <a href="{{ route('password.request') }}">Odzyskaj konto</a></p>
            </div>

        </form>
    </div>
@endsection
