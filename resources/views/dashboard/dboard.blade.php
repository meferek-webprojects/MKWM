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

                @php
                    $userSessions = DB::table('sessions')->join('session_files', 'sessions.id', '=', 'session_files.session_id')->select('sessions.*', 'session_files.file', 'session_files.centered as centered')->where('session_files.favourite', '1')->orderBy('date', 'desc')->where('users_id', 'like', '%"'.Auth::user()->id.'"%')->whereIn('kind', ['photo', 'both'])->limit(5)->get();
                @endphp

                {{-- To dodamy jak zostanie wprowadzone centrowanie zdjęć dla portfolio --}}
                {{-- @php
                    $portfolios = DB::table('portfolios')->where('kind', 'photo')->where('hero', true)->orWhere('type_header', true)->whereIn('type', ['studio', 'plener'])->take(3)->get();
                @endphp
                @if($portfolios->count() > 2)
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="height" style="max-height: 400px; border-radius: 10px; overflow: hidden;">
                                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        @foreach ($portfolios as $portfolio)
                                            <div class="carousel-item @if($loop->first) active @endif">
                                                <img style="filter: brightness(50%);" src="{{ url('images/portfolios/'.$portfolio->file) }}" class="d-block w-100" alt="..." @if($centered = $portfolio->centered) image-center="{{ $centered }}" @endif>
                                                <div class="carousel-caption d-none d-md-block">
                                                    @if($loop->iteration == 1)
                                                    <h5>Dzięki, że z nami jesteś i wspólne wspomagasz zespół MKWM</h5>
                                                    <p>MKWM</p>
                                                    @elseif($loop->iteration == 2)
                                                    <h5>Witamy w naszym nowym panelu dla członków MKWM!</h5>
                                                    <p>MKWM</p>
                                                    @elseif($loop->iteration == 3)
                                                    <h5>Jeśli zauważysz gdzieś błąd prosimy o zgłoszenie tego na kontakt@mkwmstudios.pl</h5>
                                                    <p>MKWM</p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
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
                @endif --}}

                @if($userSessions->count() > 0)
                    @php
                        $hero = $userSessions->first();
                    @endphp
                    
                    <div class="row">
                        <div class="col-lg-12 welcome-hero">
                            <div class="card">
                                <div class="avatar avatar-xxl">
                                    @if(Auth::user()->avatar !== NULL)
                                        <img src="{{ url(Auth::user()->avatar) }}" alt="" @if($centered = Auth::user()->centered) image-center="{{ $centered }}" @endif>
                                    @else
                                        <div class="avatar-title">{{ Auth::user()->initials }}</div>
                                    @endif
                                </div>
                                <div class="photo-box">
                                    {{-- To na przyszłość gdybym chciał to w WEBP --}}
                                    {{-- <img src="{{ url('images/webp/'.$hero->id.'/'.substr($hero->file, 0, -4).'.webp') }}" alt="" @if($centered = $hero->centered) image-center="{{ $centered }}" @endif> --}}
                                    <img src="{{ url('images/photoshoots/'.$hero->id.'/'.$hero->file) }}" alt="" @if($centered = $hero->centered) image-center="{{ $centered }}" @endif>
                                </div>
                                <div class="card-body">
                                    <h3 class="p-0 m-0">{{ Auth::user()->name.' '.Auth::user()->surname }}</h3>
                                </div> 
                            </div>
                        </div>
                    </div>
                @endif
                
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
                        <div class="card widget widget-list">
                            <div class="card-header">
                                <h5 class="card-title">Linki do naszych social mediów</h5>
                            </div>
                            <div class="card-body">
                                <ul class="widget-list-content list-unstyled">
                                    <li class="widget-list-item widget-list-item-blue">
                                        <span class="widget-list-item-icon"><i class="material-icons-outlined">facebook</i></span>
                                        <span class="widget-list-item-description">
                                            <a href="https://www.facebook.com/mkwmstudios" target="_blank" class="widget-list-item-description-title">
                                                MKWM
                                            </a>
                                            <span class="widget-list-item-description-subtitle">
                                                Facebook
                                            </span>
                                        </span>
                                    </li>
                                    <li class="widget-list-item widget-list-item-purple">
                                        <span class="widget-list-item-icon"><i class="material-icons-outlined">photo_camera</i></span>
                                        <span class="widget-list-item-description">
                                            <a href="https://www.instagram.com/mkwm_studios/" target="_blank" class="widget-list-item-description-title">
                                                MKWM
                                            </a>
                                            <span class="widget-list-item-description-subtitle">
                                                Instagram
                                            </span>
                                        </span>
                                    </li>
                                    <li class="widget-list-item widget-list-item-blue">
                                        <span class="widget-list-item-icon"><i class="material-icons-outlined">facebook</i></span>
                                        <span class="widget-list-item-description">
                                            <a href="https://www.facebook.com/meferphotoofficial" target="_blank" class="widget-list-item-description-title">
                                                Mateusz "MeferPhoto" Krysiak
                                            </a>
                                            <span class="widget-list-item-description-subtitle">
                                                Facebook
                                            </span>
                                        </span>
                                    </li>
                                    <li class="widget-list-item widget-list-item-purple">
                                        <span class="widget-list-item-icon"><i class="material-icons-outlined">photo_camera</i></span>
                                        <span class="widget-list-item-description">
                                            <a href="https://www.instagram.com/meferphoto/" target="_blank" class="widget-list-item-description-title">
                                                MeferPhoto
                                            </a>
                                            <span class="widget-list-item-description-subtitle">
                                                Instagram
                                            </span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        @if($userSessions->count() > 0)
                        @foreach ($userSessions as $uS)
                            <a href="{{ url('/session/'.$uS->id) }}" style="cursor: pointer;">
                                <div class="card bg-dark text-white preview-box-big">
                                    <img src="{{ url('images/photoshoots/'.$uS->id.'/'.$uS->file) }}" class="card-img" alt="..." @if($centered = $uS->centered) image-center="{{ $centered }}" @endif>
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
                        {{-- @if($portfolios->count() > 2)
                        <div style="max-height: 400px; border-radius: 10px;">
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="max-height: 400px; border-radius: 10px;">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner" style="max-height: 400px; border-radius: 10px;">
                                    @foreach ($portfolios as $portfolio)
                                        <div class="carousel-item @if($loop->first) active @endif">
                                            <img style="filter: brightness(50%);" src="{{ url('images/portfolios/'.$portfolio->file) }}" class="d-block w-100" alt="..." @if($centered = $portfolio->centered) image-center="{{ $centered }}" @endif>
                                            <div class="carousel-caption d-none d-md-block">
                                                @if($loop->iteration == 1)
                                                <h5>Dzięki, że z nami jesteś i wspólne wspomagasz zespół MKWM</h5>
                                                <p>MKWM</p>
                                                @elseif($loop->iteration == 2)
                                                <h5>Witamy w naszym nowym panelu dla członków MKWM!</h5>
                                                <p>MKWM</p>
                                                @elseif($loop->iteration == 3)
                                                <h5>Jeśli zauważysz gdzieś błąd prosimy o zgłoszenie tego na kontakt@mkwmstudios.pl</h5>
                                                <p>MKWM</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
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
                        @endif --}}
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
                        <div class="card widget widget-list">
                            @php 
                                $allUsers = DB::table('users')->orderBy('created_at', 'desc');
                            @endphp
                            <div class="card-header">
                                <h5 class="card-title">Nowi użytkownicy MKWM<span class="badge badge-success badge-style-light">Łącznie {{ $allUsers->count() }}</span></h5>
                            </div>
                            <div class="card-body">
                                {{-- <span class="text-muted m-b-xs d-block">showing 5 out of 14 new users.</span> --}}
                                <ul class="widget-list-content list-unstyled">
                                    @foreach ($allUsers->limit(6)->get() as $aU)
                                        <li class="widget-list-item widget-list-item-red">
                                            <span class="widget-list-item-avatar">
                                                <div class="avatar avatar-rounded">
                                                    @if($aU->avatar !== NULL)
                                                        <img src="{{ url($aU->avatar) }}" alt="" @if($centered = $aU->centered) image-center="{{ $centered }}" @endif>
                                                    @else
                                                        <div class="avatar-title">{{ $aU->initials }}</div>
                                                    @endif
                                                </div>
                                            </span>
                                            <span class="widget-list-item-description">
                                                <a href="#" class="widget-list-item-description-title">
                                                    {{ $aU->name.' '.$aU->surname }}
                                                </a>
                                                <span class="widget-list-item-description-subtitle">
                                                    Członek rodziny MKWM
                                                </span>
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('added-js')
    <script src="{{ url('dashboard/plugins/lightbox/fslightbox.js') }}"></script>
@endsection