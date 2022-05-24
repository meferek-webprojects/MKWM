@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
    <link href="{{ url('dashboard/plugins/aec/simple-calendar.css') }}" rel="stylesheet">
    <style>
        .flatpickr-calendar {
            position: static;
            top: 0;
            left: 0;
        }

        .flatpickr-months {
            display: none!important;
        }
    </style>
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

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h1>{{ $session->name }}</h1>
                            </div>
                        </div> 

                        @php 
                            $photos = DB::table('session_files')->where('session_id', $session->id)->get();
                        @endphp
                        <div class="card">
                            <div class="card-body">
                                Pliki
                                <button class="btn btn-outline-primary w-100 mt-4">Pobierz wszystkie zdjęcia jako .zip</button>
                            </div>
                        </div> 
                    </div>

                    <div class="col-lg-4">

                        @php
                            $fav = DB::table('session_files')->where('session_id', $session->id)->where('favourite', true)->first();
                        @endphp

                        @if(isset($fav))
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ $fav->link }}" class="img-fluid" alt="...">
                            </div>
                        </div> 
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div id="calendar">

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
    <script src="{{ url('dashboard/plugins/aec/jquery.simple-calendar.js') }}"></script>
    <script>
          $("#calendar").simpleCalendar({
                // displays events
                displayEvent: false,

                // disable showing event details
                disableEventDetails: true,

                // disable showing empty date details
                disableEmptyDetails: true 
            });
    </script>
@endsection