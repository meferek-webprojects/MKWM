@extends('main.layouts.main-layout')

@section('content')

<div class="last-photoshoot">
    <div class="big-photoshoot">
        <div class="row p-0 m-0">
            <div class="col-lg-6 p-0 m-0">
                <div class="text">
                    <div class="type">
                        LAST PHOTOSHOOT
                    </div>
                    <div class="place">
                        Studio
                    </div>
                    <div class="person">
                        Natalia Regulska
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0 m-0">
                <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" alt="">
            </div>
        </div>
    </div>
    <div class="mini-photoshoot">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>

@endsection