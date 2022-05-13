@extends('dashboard.layouts.minimal-layout')

@section('title')
    <title>MKWM - Zweryfikuj konto</title>
@endsection

@section('content')
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background d-lg-flex d-none">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="{{ url('/') }}">MKWM</a>
            </div>
            <p class="auth-description">Aby kontynuować aktywuj swoje konto linkiem aktywacyjnym, który został wysłany na twój adres email.<br></p>

            @if (session('resent'))
                <div class="alert alert-info alert-style-light" role="alert">
                    Nowy link aktywacyjny został wysłany na twój adres email.
                </div>
            @endif

            <div class="auth-submit mt-5">


                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Wyślij link ponownie</a>
                </form>
            </div>
            <div class="divider"></div>
        </div>

    </div>
@endsection
