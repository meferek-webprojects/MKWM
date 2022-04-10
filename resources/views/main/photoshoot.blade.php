@extends('main.layouts.dark-layout')

@section('added-css')
    <link rel="stylesheet" href="{{ url('main/plugins/lightGallery-clear/css/lightgallery.min.css') }}">
@endsection

@section('content')

    <div class="banner">
        <div class="text">
            <div class="type">
                PHOTOSHOOT
            </div>
            <div class="place">
                Studio
            </div>
            <div class="person">
                Natalia Regulska
            </div>
        </div>
        <div class="background">
            <img class="img-fluid" src="{{ url('images/img/natalia.jpg')}}" alt="">
        </div>
    </div>

    <div class="gallery">
        <div id="lightgallery">
            <a href="{{ url('images/img/natalia.jpg') }}" data-lg-size="1600-2400">
                <img class="img-fluid" alt=".." src="{{ url('images/img/natalia.jpg') }}" />
            </a>
            <a href="{{ url('images/img/natalia.jpg') }}" data-lg-size="1024-800">
                <img class="img-fluid" alt=".." src="{{ url('images/img/natalia.jpg') }}" />
            </a>
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