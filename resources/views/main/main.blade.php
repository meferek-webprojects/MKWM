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

<div class="cta">
    <div class="row p-0 m-0">
        <div class="col-lg-6 p-0 m-0">
            <h3>Zapisz się na sesję</h3>
        </div>
        <div class="col-lg-6 p-0 m-0">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-8">
                        <input type="text" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="col-4">
                        <button class="btn btn-light">WYŚLIJ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="about-us">
    <h3>ABOUT US</h3>    
    <div class="row p-0 m-0">
        <div class="col-lg-6 p-0 m-0">
            <img src="{{ url('/images/img/mateusz.jpg') }}" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 p-0 m-0">
            <img src="{{ url('/images/img/mateusz.jpg') }}" alt="" class="img-fluid">
        </div>
    </div>
</div>

<hr class="breakline">

<div class="testimonials">
    
    <div class="title">
        <h3>Testimonials</h3>
        
    </div>

    <div class="opinions">
        <div class="text">

        </div>
        <div class="author">
            <img src="" alt=""> Natalia Regulska
        </div>
    </div>

</div>

@endsection