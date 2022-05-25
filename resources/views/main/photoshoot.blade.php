@extends('main.layouts.dark-layout')

@section('added-css')
    <link rel="stylesheet" href="{{ url('main/plugins/lightGallery-clear/css/lightgallery.min.css') }}">
@endsection

@section('content')

    <div class="banner">
        <div class="text">
            <div class="type">
                SESJA
            </div>
            <div class="place">
                Fotografia
            </div>
            <div class="person">
                Studyjna
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
                    @php
                        use App\Models\SessionFiles;
                        $photos = SessionFiles::where('session_id', $session->id)->get();
                    @endphp
                    @forelse($photos->where('type', 'studio')->get() as $photo)
                        <a href="{{ url('images/portfolios/'.$photo->file) }}">
                            <img class="img-fluid mb-1" alt=".." src="{{ url('images/photoshoots/'.$photo->session_id.'/'.$photo->file) }}" />
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