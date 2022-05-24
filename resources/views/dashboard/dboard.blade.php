@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Witaj, {{ Auth::user()->name; }} na naszej stronie!</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body preview-box-big">
                                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ url('images/img/natalia.jpg') }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>First slide label</h5>
                                                <p>Some representative placeholder content for the first slide.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ url('images/img/natalia.jpg') }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Second slide label</h5>
                                                <p>Some representative placeholder content for the second slide.</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ url('images/img/natalia.jpg') }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Third slide label</h5>
                                                <p>Some representative placeholder content for the third slide.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-success">
                                        <i class="material-icons-outlined">photo</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Twoich sesji</span>
                                        <span class="widget-stats-amount">{{ DB::table('sessions')->where('users_id', 'like', '%"'.Auth::user()->id.'"%')->count() }}</span>
                                        <span class="widget-stats-info">Wykonaliśmy sporo dobrej roboty.</span>
                                    </div>
                                    <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                        <i class="material-icons">mood</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">person</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Użytkownicy MKWM</span>
                                        <span class="widget-stats-amount">{{ DB::table('users')->count() }}</span>
                                        <span class="widget-stats-info">Każdego dnia jest nas coraz więcej!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-danger">
                                        <i class="material-icons-outlined">file_download</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Pobrania</span>
                                        <span class="widget-stats-amount">{{ DB::table('sessions')->sum('downloads') }}</span>
                                        <span class="widget-stats-info">Łącznie pobranych sesji.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        @php
                            use Carbon\Carbon;

                            $news = DB::table('news')->get();
                        @endphp
                        @foreach($news as $new)
                            <div class="card text-center">
                                <div class="card-header">
                                    {{ $new->type }}
                                </div>
                                <div class="card-body">
                                <h5 class="card-title">{{ $new->title }}</h5>
                                <p class="card-text">{{ $new->description }}</p>
                                </div>
                                <div class="card-footer text-muted">
                                    {{ date('Y-m-d', strtotime($new->created_at)) }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        @php 
                            $userSessions = DB::table('sessions')->where('users_id', 'like', '%"'.Auth::user()->id.'"%')->whereIn('kind', ['photo', 'both'])->orderBy('date', 'desc')->get()->take(5);
                        @endphp
                        @if($userSessions->count() > 0)
                        @foreach ($userSessions as $uS)
                            @php
                                $mainPhoto = DB::table('session_files')->where('session_id', $uS->id)->first();
                            @endphp
                            <a href="#" style="cursor: pointer;">
                                <div class="card bg-dark text-white preview-box-big">
                                    <img src="{{ url('images/photoshoots/'.$uS->id.'/'.$mainPhoto->file) }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                    <h5 class="card-title text-white">{{ $uS->name }}</h5>
                                    <p class="card-text m-t-md">{{ $uS->description }}</p>
                                    <p class="card-text">{{ date('Y-m-d', strtotime($uS->date)) }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        @else
                            <a href="#">
                                <div class="card bg-dark text-white preview-box-big">
                                    <img src="{{ url('images/img/studio.jpg') }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                    <h5 class="card-title text-white">Chciałbyś taką sesję?</h5>
                                    <p class="card-text m-t-md">Śmiało zapisz się do nas na sesję zdjęciową! Jeśli już jesteś po, cierpliwie czekaj na efekty, które wyświetlą się m.in w tym miejscu!</p>
                                    <p class="card-text">Kiedyś tam...</p>
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                Cytat
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>Zawsze, gdy tworzysz wokół siebie piękno, odnawiasz swoją duszę. </p>
                                    <footer class="blockquote-footer mt-1"><cite title="Alice Walker">Alice Walker</cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('added-js')
@endsection