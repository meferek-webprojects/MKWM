@extends('dashboard.layouts.minimal-layout')

@section('title')
    <title>MKWM - Stwórz konto</title>
@endsection

@section('content')
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background d-lg-flex d-none">

        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="app-auth-container">
                <div class="logo">
                    <a href="{{ url('/') }}">MKWM</a>
                </div>
                <p class="auth-description">Wprowadź poniższe dane aby stworzyć konto na naszej platformie.<br></p>

                <div class="auth-credentials m-b-xxl">

                    @if ($errors->any())
                        <div class="alert alert-danger alert-style-light" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif

                    <label for="signUpUsername" class="form-label">Imię</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control m-b-md" id="signUpUsername" aria-describedby="signUpUsername" placeholder="Adam" required>

                    <label for="signUpSurname" class="form-label">Nazwisko</label>
                    <input type="text" name="surname" value="{{ old('surname') }}" class="form-control m-b-md" id="signUpSurname" aria-describedby="signUpSurname" placeholder="Kowalski" required>

                    <label for="signUpEmail" class="form-label">Adres e-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control m-b-md" id="signUpEmail" aria-describedby="signUpEmail" placeholder="adam@mkwmstudios.pl" required>

                    <label for="signUpPassword" class="form-label">Hasło</label>
                    <input type="password" name="password" class="form-control m-b-md" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required>

                    <label for="signUpPasswordConfirmation" class="form-label">Powtórz hasło</label>
                    <input type="password" name="password_confirmation" class="form-control m-b-md" id="signUpPasswordConfirmation" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required>

                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Stwórz konto</a>
                </div>
                <div class="divider"></div>
                <p class="auth-description-2">Masz już konto? <a href="{{ url('/login') }}">Zaloguj się</a></p>
            </div>

        </form>
    </div>
@endsection
