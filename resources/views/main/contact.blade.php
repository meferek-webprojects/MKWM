@extends('main.layouts.dark-layout')

@section('added-css')
@endsection

@section('content')

    <div class="contact">
        <div class="text">
            <div class="type">
                SKONTAKTUJ SIĘ Z NAMI
            </div>
        </div>
        <div class="background">
            <img class="img-fluid" src="{{ url('images/img/natalia.jpg')}}" alt="">
        </div>
    </div>

    <div class="container mt-5">
        <div class="row text-center pt-5">
            <div class="col-lg-6">
                <h6>Wiktor Majewski</h6>
                <i data-feather="phone"></i> <a style="text-decoration: none; color: black;" href="tel:+48 601 070 371">+48 601 070 371</a>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <h6>Mateusz Krysiak</h6>
                <i data-feather="phone"></i> <a style="text-decoration: none; color: black;" href="tel:48 530 771 550">+48 530 771 550</a>
            </div>
        </div>
    </div>

    <div class="big-form mt-4">

        @if( @session('success') )

            <b>Wiadomość została wysłana pomyślnie!</b>

        @endif

        <form action="{{ url('/wiadomosc') }}" method="POST">
            @csrf 

            <div class="form">
                <div class="row">
                    <div class="col-12">
                        <input class="form-control my-3" type="email" placeholder="Twój e-mail" name="author" required>
                        <input class="form-control my-3" type="text" placeholder="Temat" name="title"required>
                        <textarea id="" cols="30" rows="10" class="form-control" name="message" placeholder="Twoja wiadomość..." required></textarea>
                        <button type="submit">WYŚLIJ</button>
                    </div>
                </div>
            </div>
            
        </div>

    </form>

@endsection

@section('added-js')
@endsection