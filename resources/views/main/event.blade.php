@extends('main.layouts.dark-layout')

@section('added-css')
    <link rel="stylesheet" href="{{ url('main/plugins/lightGallery-clear/css/lightgallery.min.css') }}">
@endsection

@section('content')

    <div class="banner">
        <div class="text">
            <div class="type">
                PORTFOLIO
            </div>
            <div class="place">
                Fotografia
            </div>
            <div class="person">
                Eventowa
            </div>
        </div>
        <div class="background">
            <img class="img-fluid" src="{{ url('images/img/natalia.jpg')}}" alt="">
        </div>
    </div>

    <div class="gallery">
        <div class="mx-auto">
            <div class="row">
                <div class="col-12" id="lightgallery">
                    <a href="{{ url('images/photoshoots/1/1.jpg') }}">
                        <img class="img-fluid mb-1" alt=".." src="{{ url('images/photoshoots/1/1.jpg') }}" />
                    </a>
                    <a href="{{ url('images/photoshoots/1/1.jpg') }}">
                        <img class="img-fluid mb-1" alt=".." src="{{ url('images/photoshoots/1/2.jpg') }}" />
                    </a>
                    <a href="{{ url('images/photoshoots/1/1.jpg') }}">
                        <img class="img-fluid mb-1" alt=".." src="{{ url('images/photoshoots/1/3.jpg') }}" />
                    </a>
                    <a href="{{ url('images/photoshoots/1/1.jpg') }}">
                        <img class="img-fluid mb-1" alt=".." src="{{ url('images/photoshoots/1/4.jpg') }}" />
                    </a>
                    <a href="{{ url('images/photoshoots/1/1.jpg') }}">
                        <img class="img-fluid mb-1" alt=".." src="{{ url('images/photoshoots/1/5.jpg') }}" />
                    </a>
                    <a href="{{ url('images/photoshoots/1/1.jpg') }}">
                        <img class="img-fluid mb-1" alt=".." src="{{ url('images/photoshoots/1/6.jpg') }}" />
                    </a>
                </div>
            </div>
        </div>    
    </div>

@endsection

@section('added-js')

    <script src="{{ url('main/plugins/lightGallery-clear/js/lightgallery-allclear.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#lightgallery").lightGallery(); 
        });
    </script>

@endsection