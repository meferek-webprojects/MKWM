@extends('main.layouts.main-layout')

@section('content')

@php
    $session = DB::table('sessions')
            ->select('sessions.id', 'sessions.users_id', 'session_files.file as photo', 'places.name as place', 'session_files.centered as centered')
            ->join('session_files', 'sessions.id', '=', 'session_files.session_id')
            ->join('places', 'sessions.place_id', '=', 'places.id')
            ->where('session_files.favourite', '1')
            ->whereIn('kind', ['photo', 'both'])
            ->where('type', 'public')
            ->orderBy('date', 'desc')
            ->first();
    if(isset($session)) $user = DB::table('users')->where('id', json_decode($session->users_id))->first();
@endphp

@if(isset($session))
<div class="last-photoshoot d-flex flex-wrap w-100" onclick="window.location.href='{{ url('/photoshoot?id='.$session->id) }}'">
    <div class="photoshoot-info my-auto">
        <div class="type">
            OSTATNIA SESJA
        </div>
        <div class="place">
            {{ $session->place }}
        </div>
        <div class="person">
            {{ $user->name.' '.$user->surname }}
        </div>
    </div>
    <div class="photoshoot-image overflow-hidden">
        <img src="{{ url('images/webp/'.$session->id.'/'.substr($session->photo, 0, -4).'webp') }}" alt="" @if($centered = $session->centered) image-center="{{ $centered }}" @endif>
    </div>
</div>
@endif

@php
    $sessions = DB::table('sessions')
                ->select('sessions.id', 'sessions.users_id', 'session_files.file as photo', 'places.name as place', 'session_files.centered as centered')
                ->join('session_files', 'sessions.id', '=', 'session_files.session_id')
                ->join('places', 'sessions.place_id', '=', 'places.id')
                ->where('session_files.favourite', '1')
                ->whereIn('kind', ['photo', 'both'])
                ->where('type', 'public')
                ->orderBy('date', 'desc')
                ->limit(4)
                ->skip(1)
                ->get();

    if($sessions->count() == 3) $sessions->pop(1);
@endphp

@if($sessions->count() >= 2)
<div class="extra-photoshoots d-none d-sm-flex flex-wrap">
    @foreach($sessions as $session)
    @php
        $user = DB::table('users')
                ->where('id', json_decode($session->users_id)[0])
                ->select('name', 'surname')
                ->first();
    @endphp
    
    <div class="extra-photoshoot m-0 p-0 h-50 d-flex align-items-center" onclick="window.location.href='{{ url('/photoshoot?id='.$session->id) }}'">
        <div class="photoshoot-info
            @if($loop->iteration == 1) order-xl-1
            @elseif($loop->iteration == 2) order-1
            @elseif($loop->iteration == 4) order-1 order-xl-0
            @endif
        ">
            <div class="place">
                {{ $session->place }}
            </div>
            <div class="person">
                {{ $user->name.' '.$user->surname }}
            </div>
        </div>
        <div class="photoshoot-image
            @if($loop->iteration == 1) order-xl-0
            @elseif($loop->iteration == 2) order-0
            @elseif($loop->iteration == 4) order-0 order-xl-1
            @endif
        ">
            <img src="{{ url('images/webp/'.$session->id.'/'.substr($session->photo, 0, -4).'webp') }}" alt="" @if($centered = $session->centered) image-center="{{ $centered }}" @endif>
        </div>
    </div>

    @endforeach
</div>
@endif

<div class="cta">
    <div class="row p-0 m-0">
        <div class="col-lg-6 p-0 m-0">
            <h3>Zapisz się<br class="d-block d-sm-none"> na sesję</h3>
        </div>
        <div class="col-lg-6 p-0 m-0">
            <form action="{{ url('/send-photoshoot') }}" method="GET">
                <div class="row">
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-light mt-3 mt-sm-0">WYŚLIJ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="about" id="my">
    <h3>O NAS</h3>    
    <div class="about-info d-flex flex-wrap w-100">
        <div class="about-image position-relative order-1 order-xl-0">
            <img src="{{ url('/images/img/mateusz.jpg') }}" alt="" class="">
            <div class="image-text position-absolute bottom-0 start-0 mb-3 ms-2">
                <div class="profession">
                    Fotograf
                </div>
                <div class="person">
                    Mateusz Krysiak
                </div>
            </div>
        </div>
        <div class="about-image position-relative order-0 order-xl-0">
            <img src="{{ url('/images/img/wiktor3.jpg') }}" alt="" class="">
            <div class="image-text position-absolute top-0 end-0 mt-3 me-2">
                <div class="profession">
                    Filmowiec
                </div>
                <div class="person">
                    Wiktor Majewski
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $testimonials = DB::table('testimonials')->where('aproved', true)->take(5)->get();
@endphp
@if($testimonials->count() > 0)
<div class="testimonials">
    <h3>REFERENCJE</h3>    
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @for ($i = $testimonials->count(); $i > 0; $i--)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i-1 }}" @if($i == $testimonials->count()) class="active" aria-current="true" @else aria-current="false" @endif aria-label="Slide {{ $i }}"></button>
            @endfor
        </div>
        <div class="carousel-inner">
            @foreach($testimonials as $testimonial)
            @php
                $user = DB::table('users')->where('id', $testimonial->user_id)->first();
                $session = DB::table('session_files')->join('sessions', 'sessions.id', '=','session_files.session_id')->select('sessions.*', 'session_files.file')->where('users_id', 'like', '%"'.$testimonial->user_id.'"%')->where('type', 'public')->orderBy('id', 'desc');
            @endphp
            <div class="carousel-item position-relative @if($loop->first) active @endif">
                @if($session->count() > 0)
                    <img src="{{ url('/images/photoshoots/'.$session->first()->id.'/'.$session->first()->file) }}" class="d-block w-100" alt="">
                @else
                    <img src="{{ url('/images/img/natalia.jpg') }}" class="d-block w-100" alt="">
                @endif
                <div class="testimonial position-absolute top-50 start-50 translate-middle text-center">
                    <p class="text">{{ $testimonial->testimonial }}</p>
                    <div class="person">{{ $user->name.' '.$user->surname }}</div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>    
@endif

<div class="portfolio">
    <h4 id="fotografia">FOTOGRAFIA</h4>
    <h3>PORTFOLIO</h3>
    <div class="portfolio-images d-flex flex-wrap w-100">
        <div class="portfolio-image">
            <a href="{{ url('/plener') }}">
                <img src="{{ url('/images/img/plener.jpg') }}" alt="" class="img-fluid">
                <div class="type">Plener</div>
            </a>
        </div>
        <div class="portfolio-image">
            <a href="{{ url('/studio') }}">
                <img src="{{ url('/images/img/studio.jpg') }}" alt="" class="img-fluid">
                <div class="type">Studio</div>
            </a>
        </div>
        <div class="portfolio-image">
            <a href="{{ url('/product') }}">
                <img src="{{ url('/images/img/product.jpg') }}" alt="" class="img-fluid">
                <div class="type">Produkt</div>
            </a>
        </div>
        <div class="portfolio-image">
            <a href="{{ url('/event') }}">
                <img src="{{ url('/images/img/event.jpg') }}" alt="" class="img-fluid">
                <div class="type">Event</div>
            </a>
        </div>
    </div>
</div>

@php 
    $movies = DB::table('portfolios')->whereNotNull('link')->get();
@endphp

<div class="portfolio">
    <h4 id="filmografia">FILMOGRAFIA</h4>
    <h3>PORTFOLIO</h3>    
    <div class="container">
        <div class="row">
            <div class="col-12 movies">
                <div class="youtube-player" data-id="R9vtT7CEETo" img-type="studio">
                <div class="text">BACKSTAGE</div>
            </div>
            <div class="col-12 movies">
                <div class="youtube-player" data-id="MnFyQ9WAUtA" img-type="universal">
                </div>
                <div class="text">TELEDYSK</div>
            </div>
            @forelse($movies as $movie)
            <div class="col-12 movies">
                <div class="youtube-player" data-id="{{ substr($movie->link, 17) }}" @if($movie->type) img-type="{{ $movie->type }}" @else img-type="universal" @endif></div>
                <div class="text" style="text-transform: uppercase;">{{ $movie->type }}</div>
            </div>
            @empty
            <div class="col-12 movies">
                <h3 class="text-center">WKRÓTCE WIĘCEJ</h3>
            </div>
            @endforelse
        </div>
    </div>
</div>

<script>
    /*
     * Light YouTube Embeds by @labnol
     * Credit: https://www.labnol.org/
     */
  
    function labnolIframe(div) {
      var iframe = document.createElement('iframe');
      iframe.setAttribute('src', 'https://www.youtube.com/embed/' + div.dataset.id + '?autoplay=1&rel=0');
      iframe.setAttribute('frameborder', '0');
      iframe.setAttribute('allowfullscreen', '1');
      iframe.setAttribute('allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture');
      div.parentNode.replaceChild(iframe, div);
    }
  
    function initYouTubeVideos() {
      var playerElements = document.getElementsByClassName('youtube-player');
      for (var n = 0; n < playerElements.length; n++) {
        var videoId = playerElements[n].dataset.id;
        var div = document.createElement('div');
        div.setAttribute('data-id', videoId);
        var photoshootImageNode = document.createElement('img');

        var imgType = playerElements[n].getAttribute('img-type');
        switch (imgType){
            default:
                photoshootImageNode.src = '../../images/yt-thumbnail/universal.jpg'.replace('ID', videoId);
                break;
            case 'event':
                photoshootImageNode.src = '../../images/yt-thumbnail/event.jpg'.replace('ID', videoId);
                break;
            case 'plener':
                photoshootImageNode.src = '../../images/yt-thumbnail/plener.jpg'.replace('ID', videoId);
                break;
            case 'studio':
                photoshootImageNode.src = '../../images/yt-thumbnail/studio.jpg'.replace('ID', videoId);
                break;
            case 'product':
                photoshootImageNode.src = '../../images/yt-thumbnail/product.jpg'.replace('ID', videoId);
                break;
        }


        div.appendChild(photoshootImageNode);
        var playButton = document.createElement('div');
        playButton.setAttribute('class', 'play');
        div.appendChild(playButton);
        div.onclick = function () {
          labnolIframe(this);
        };
        playerElements[n].appendChild(div);
      }
    }
  
    document.addEventListener('DOMContentLoaded', initYouTubeVideos);


</script>

@endsection