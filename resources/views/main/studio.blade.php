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
                Studyjna
            </div>
        </div>
        <div class="background">
            @php
                $header = DB::table('portfolios')->where('kind', 'photo')->where('type', 'studio')->where('type_header', true)->first();
            @endphp
            @if(isset($header))
                <img class="img-fluid" src="{{ url('images/portfolios/'.$header->file) }}" alt="" @if($centered = $header->centered) image-center="{{ $centered }}" @endif>
            @else
                <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" image-center="0.485 0.5">
            @endif
        </div>
    </div>

    <div class="gallery">
        <div class="mx-auto">
            <div class="row">
                <div class="col-12" id="lightgallery">
                    @php
                        $photos = DB::table('portfolios')->where('kind', 'photo');
                    @endphp
                    @forelse($photos->where('type', 'studio')->get() as $photo)
                        <a href="{{ url('images/portfolios/'.$photo->file) }}">
                            <img class="img-fluid mb-1" alt=".." src="{{ url('images/portfolios/'.$photo->file) }}" />
                        </a>
                    @empty
                        <h3>WKRÓTCE</h3>
                    @endforelse
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