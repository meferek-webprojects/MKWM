@extends('main.layouts.dark-layout')

@section('added-css')
    <link rel="stylesheet" href="{{ url('main/plugins/lightGallery-clear/css/lightgallery.min.css') }}">
@endsection

@section('content')

    @php
        $thissession = DB::table('sessions')
                ->select('sessions.id', 'sessions.users_id', 'session_files.file as photo', 'places.name as place', 'session_files.centered as centered')
                ->join('session_files', 'sessions.id', '=', 'session_files.session_id')
                ->join('places', 'sessions.place_id', '=', 'places.id')
                ->where('session_files.favourite', '1')
                ->whereIn('kind', ['photo', 'both'])
                ->where('session_id', $session)
                ->where('type', 'public')
                ->first();
        $user = DB::table('users')->where('id', json_decode($thissession->users_id)[0])->first();
    @endphp
    <div class="banner">
        <div class="text">
            <div class="type">
                SESJA
            </div>
            <div class="place">
                {{ $thissession->place }}
            </div>
            <div class="person">
                {{ $user->name.' '.$user->surname }}
            </div>
        </div>
        <div class="background">
            <img src="{{ url('images/webp/'.$thissession->id.'/'.substr($thissession->photo, 0, -4).'.webp') }}" alt="" @if($centered = $thissession->centered) image-center="{{ $centered }}" @endif>
        </div>
    </div>

    <div class="gallery">
        <div class="mx-auto">
            <div class="row">
                <div class="col-12" id="lightgallery">
                    @php
                        use App\Models\SessionFiles;
                        $photos = DB::table('session_files')->where('session_id', $session)->get();
                    @endphp
                    @forelse($photos as $photo)
                        <a href="{{ url('images/webp/'.$photo->session_id.'/'.substr($photo->file, 0, -4).'webp') }}">
                            <img class="img-fluid mb-1" alt=".." src="{{ url('images/webp/'.$photo->session_id.'/'.substr($photo->file, 0, -4).'.webp') }}" />
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