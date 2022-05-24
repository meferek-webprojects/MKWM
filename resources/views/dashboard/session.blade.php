@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
    {{-- <link href="{{ url('dashboard/plugins/aec/simple-calendar.css') }}" rel="stylesheet"> --}}
    <link href="{{ url('dashboard/plugins/lightGallery/dist/css/lightgallery.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Sesja zdjęciowa</h1>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="my-1">{{ $session->name }}</h3>
                            </div>
                        </div>

                        @if($session->kind == 'both')
                        <div class="card">
                            <div class="card-body">
                                <iframe class="w-100" height="500vh" src="https://www.youtube-nocookie.com/embed/{{ substr($session->link, 17) }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                         
                            </div>
                        </div>
                        @endif

                        @php 
                            $photos = DB::table('session_files')->where('session_id', $session->id)->get();
                        @endphp
                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-flex"><span class="badge badge-info badge-style-bordered ms-auto">Ilość zdjęć: {{ $photos->count() }}</span></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <ul id="lightgallery" class="list-unstyled row px-4 py-3 mx-auto">
                                        @foreach($photos as $photo)
                                        <li 
                                        @if($loop->first) 
                                            style="border-top-left-radius: 10px;" 
                                        @elseif($loop->iteration == 3) 
                                            style="border-top-right-radius: 10px;" 
                                        @elseif($loop->index == $loop->count-3) 
                                            @if(($loop->count % 3 == 0)) 
                                                style="border-bottom-left-radius: 10px;" 
                                            @endif
                                        @elseif($loop->last)
                                            style="border-bottom-right-radius: 10px;"
                                        @endif
                                        class="col-xs-12 col-sm-12 p-0 col-md-4 square overflow-hidden preview-session" data-src="{{ url('images/photoshoots/'.$photo->session_id.'/'.$photo->file) }}">
                                            <a href="{{ url('images/photoshoots/'.$photo->session_id.'/'.$photo->file) }}">
                                                <img src="{{ url('images/photoshoots/'.$photo->session_id.'/'.$photo->file) }}">
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <form action="{{ url('/download-all') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $session->id }}">
                                    <button class="btn btn-outline-primary w-100 mt-4">Pobierz wszystkie zdjęcia jako .zip</button>
                                </form>
                            </div>
                        </div> 

                        @if($session->kind == 'both')
                        <div class="card widget">
                            <div class="card-header">
                                <h5 class="card-title">Link do twojego filmu z sesji</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted d-block">Ten link jest dostępny tylko dla ciebie.</p>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid-bordered" id="linkToMovie" value="{{ $session->link }}" aria-label="https://themeforest.net/user/stacks/portfolio" aria-describedby="share-link1">
                                    <button class="btn btn-primary" type="button" onClick="copyToClipBoard()" id="share-link1"><i class="material-icons no-m fs-5">content_copy</i></button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="col-xxl-4">

                        @if(Auth::user()->hasRole(10)) 

                            <div class="card">
                                <div class="card-header">
                                    <h5>Narzędzia administratorskie</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('session.edit', $session->id) }}" method="POST">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-primary m-r-xs"><i class="material-icons">edit</i>Edytuj</button>
                                    </form>
                                    <form action="{{ url('/change-privacy') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $session->id }}">
                                        <button type="submit" class="btn {{ $session->type == "public" ? 'btn-info' : 'btn-warning'}} m-r-xs"><i class="material-icons">{{ $session->type == "public" ? 'lock_open' : 'lock'}}</i>Zmień prywatność</button>
                                    </form>
                                </div>
                            </div>

                        @endif

                        @php
                            use Carbon\Carbon;
                            $fav = DB::table('session_files')->where('session_id', $session->id)->where('favourite', true)->first();
                        @endphp

                        @if(isset($fav))
                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-flex">
                                    <span class="badge badge-warning badge-style-bordered mx-auto d-flex my-auto"><p class="my-auto pe-2">NAJLEPSZE ZDJĘCIE Z SESJI</p><i class="material-icons my-auto p-0">star</i></span>
                                </h4>
                            </div>
                            <div class="card-body">
                                <img src="{{ url('images/photoshoots/'.$fav->session_id.'/'.$fav->file) }}" class="img-fluid rounded" alt="...">
                            </div>
                        </div> 
                        @endif

                        @php
                            $m_en = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
                            $m_pl = array("Sty", "Lut", "Mar", "Kwi", "Maj", "Cze", "Lip", "Sie", "Wrz", "Paź", "Lis", "Gru");

                            $data = str_replace($m_en, $m_pl, (date('d M Y', strtotime($session->date) )));
                        @endphp
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">event</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Sesja zdjęciowa odbyła się</span>
                                        <span class="widget-stats-amount">{{ $data }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">{{ $session->type == "public" ? 'lock_open' : 'lock' }}</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Typ sesji zdjęciowej</span>
                                        <span class="widget-stats-amount">{{ $session->type == "public" ? 'Publiczna' : 'Prywatna'  }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @php
                            $allUsers = DB::table('users')->whereIn('id', json_decode($session->users_id))->get();
                        @endphp

                        @foreach ($allUsers as $aU)
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-3">
                                        <div class="avatar avatar-rounded">
                                            <div class="avatar-title">{{ $aU->initials }}</div>
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex">
                                        <h2 class="my-auto">{{ $aU->name.' '.$aU->surname }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @php
                            $place = DB::table('places')->where('id', $session->place_id)->first();
                        @endphp
                        <div class="card overflow-hidden">
                            <div class="card-body">
                              <h5 class="card-title">{{ $place->name }}</h5>
                              <p class="card-text">Ta sesja odbywała się w tej okolicy.</p>
                            </div>
                            <div class="map-frame">
                                @if(Auth::user()->theme == 'dark')
                                    <iframe style="filter: grayscale(90%) invert(90%) contrast(100%);" class="w-100" src="{{ $place->link }}" height="400" allowfullscreen=""></iframe>
                                @else
                                    <iframe class="w-100" src="{{ $place->link.'&zoom=12&format=png&maptype=roadmap&style=feature:administrative%7Celement:geometry%7Cvisibility:off&style=feature:administrative.neighborhood%7Cvisibility:off&style=feature:poi%7Cvisibility:off&style=feature:poi%7Celement:labels.text%7Cvisibility:off&style=feature:road%7Cvisibility:off&style=feature:road%7Celement:labels%7Cvisibility:off&style=feature:road%7Celement:labels.icon%7Cvisibility:off&style=feature:transit%7Cvisibility:off&style=feature:water%7Celement:labels.text%7Cvisibility:off&size=480x360' }}" height="400" allowfullscreen=""></iframe>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('added-js')
    <script src="{{ url('dashboard/plugins/lightGallery/dist/js/lightgallery-all.min.js') }}"></script>
    {{-- <script src="{{ url('dashboard/plugins/aec/jquery.simple-calendar.js') }}"></script> --}}

    <script>

        function copyToClipBoard() {
            var toCopy = document.getElementById('linkToMovie');
            toCopy.select();
            toCopy.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(toCopy.value);
            alert("Skopiowano: " + toCopy.value);
        }

        $(document).ready(function() {
            $("#lightgallery").lightGallery(); 
        });
    </script>
@endsection