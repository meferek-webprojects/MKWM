@extends('main.layouts.main-layout')

@section('content')

<div class="last-photoshoot">
    <div class="big-photoshoot">
        <div class="row p-0 m-0">
            <div class="col-xl-6 p-0 m-0 my-auto">
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
            <div class="col-xl-6 p-0 m-0">
                <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="mini-photoshoots">

    <div class="row m-0 p-0">

        <div class="col-xl-6 m-0 p-0 mini-photo">

            <div class="row p-0 m-0">
                <div class="col-6 p-0 m-0 order-xl-2 my-auto">
                    <div class="text">
                        <div class="place">
                            Studio
                        </div>
                        <div class="person">
                            Natalia Regulska
                        </div>
                    </div>
                </div>
                <div class="col-6 p-0 m-0 order-xl-1 thumb">
                    <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" alt="">
                </div>
            </div>

        </div>

        <div class="col-xl-6 m-0 p-0 mini-photo">

            <div class="row p-0 m-0">
                <div class="col-6 p-0 m-0 order-2 my-auto">
                    <div class="text">
                        <div class="place">
                            Studio
                        </div>
                        <div class="person">
                            Natalia Regulska
                        </div>
                    </div>
                </div>
                <div class="col-6 p-0 m-0 order-1 thumb">
                    <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" alt="">
                </div>
            </div>

        </div>

        <div class="col-xl-6 m-0 p-0 mini-photo">

            <div class="row p-0 m-0">
                <div class="col-6 p-0 m-0 my-auto">
                    <div class="text">
                        <div class="place">
                            Studio
                        </div>
                        <div class="person">
                            Natalia Regulska
                        </div>
                    </div>
                </div>
                <div class="col-6 p-0 m-0 thumb">
                    <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" alt="">
                </div>
            </div>
            
        </div>

        <div class="col-xl-6 m-0 p-0 mini-photo">

            <div class="row p-0 m-0">
                <div class="col-6 p-0 m-0 order-xl-2 thumb">
                    <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" alt="">
                </div>
                <div class="col-6 p-0 m-0 order-xl-1 my-auto">
                    <div class="text">
                        <div class="place">
                            Studio
                        </div>
                        <div class="person">
                            Natalia Regulska
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>

</div>

@endsection