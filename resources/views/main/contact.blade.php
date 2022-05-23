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

    <div class="big-form">

        <form action="{{ url('/wiadomosc') }}" method="POST">
            @csrf 

            <div class="form">
                <div class="row">
                    <div class="col-12">
                        <input class="form-control my-3" type="email" placeholder="Twój e-mail" name="author" required>
                        <input class="form-control my-3" type="text" placeholder="Temat" name="title"required>
                        <textarea name="" id="" cols="30" rows="10" class="form-control" name="message" placeholder="Twoja wiadomość..." required></textarea>
                        <button type="submit">WYŚLIJ</button>
                    </div>
                </div>
            </div>
            
        </div>

    </form>

@endsection

@section('added-js')
@endsection