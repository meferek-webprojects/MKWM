@extends('main.layouts.main-layout')

@section('content')

<div class="last-photoshoot d-flex flex-wrap w-100" onclick="window.location='{{ url('/photoshoot') }}'">
    <div class="photoshoot-info my-auto">
        <div class="type">
            LAST PHOTOSHOOT
        </div>
        <div class="place">
            Studio
        </div>
        <div class="person">
            Natalia Regulska
        </div>
    </div>
    <div class="photoshoot-image overflow-hidden">
        <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" alt="">
    </div>
</div>

<div class="extra-photoshoots d-none d-sm-flex flex-wrap">
    <div class="extra-photoshoot col-xl-6 m-0 p-0 h-50 d-flex align-items-center">
        <div class="photoshoot-info order-xl-1">
            <div class="place">
                Studio
            </div>
            <div class="person">
                Natalia Regulska
            </div>
        </div>
        <div class="photoshoot-image order-xl-0">
            <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" alt="">
        </div>
    </div>

    <div class="extra-photoshoot col-xl-6 m-0 p-0 h-50 d-flex align-items-center">
        <div class="photoshoot-info order-1">
            <div class="place">
                Studio
            </div>
            <div class="person">
                Natalia Regulska
            </div>
        </div>
        <div class="photoshoot-image order-0">
            <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" alt="">
        </div>
    </div>

    <div class="extra-photoshoot col-xl-6 m-0 p-0 h-50 d-flex align-items-center">
        <div class="photoshoot-info">
            <div class="place">
                Studio
            </div>
            <div class="person">
                Natalia Regulska
            </div>
        </div>
        <div class="photoshoot-image">
            <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" alt="">
        </div>
    </div>

    <div class="extra-photoshoot col-xl-6 m-0 p-0 h-50 d-flex align-items-center">
        <div class="photoshoot-info order-1 order-xl-0">
            <div class="place">
                Studio
            </div>
            <div class="person">
                Natalia Regulska
            </div>
        </div>
        <div class="photoshoot-image order-0 order-xl-1">
            <img class="img-fluid" src="{{ url('images/img/natalia.jpg') }}" alt="">
        </div>
    </div>
</div>

<div class="cta">
    <div class="row p-0 m-0">
        <div class="col-lg-6 p-0 m-0">
            <h3>Zapisz się na sesję</h3>
        </div>
        <div class="col-lg-6 p-0 m-0">
            <form action="{{ url('/') }}" method="GET">
                <div class="row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-light mt-3 mt-sm-0">WYŚLIJ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="about">
    <h3>ABOUT US</h3>    
    <div class="about-info d-flex flex-wrap w-100">
        <div class="about-image position-relative order-1 order-xl-0">
            <img src="{{ url('/images/img/mateusz.jpg') }}" alt="" class="img-fluid">
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
            <img src="{{ url('/images/img/mateusz.jpg') }}" alt="" class="img-fluid">
            <div class="image-text position-absolute top-0 end-0 mt-3 me-2">
                <div class="profession">
                    Fotograf
                </div>
                <div class="person">
                    Mateusz Krysiak
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="breakline">

<div class="testimonials">
    
    <div class="title">
        <h3>Testimonials</h3>
        
    </div>

    <div class="opinions">
        <div class="text">

        </div>
        <div class="author">
            <img src="" alt=""> Natalia Regulska
        </div>
    </div>

</div>

<hr class="breakline">

<div class="portfolio">
    <h4 class="our-portfolio">NASZE PORTFOLIO</h4>
    <h4>FOTOGRAFIA</h4>
    <h3>PORTFOLIO</h3>    
    <div class="row p-0 m-0">
        <div class="col-lg-6 p-0 m-0">
            <img src="{{ url('/images/img/mateusz.jpg') }}" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 p-0 m-0">
            <img src="{{ url('/images/img/mateusz.jpg') }}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="row p-0 m-0">
        <div class="col-lg-6 p-0 m-0">
            <img src="{{ url('/images/img/mateusz.jpg') }}" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 p-0 m-0">
            <img src="{{ url('/images/img/mateusz.jpg') }}" alt="" class="img-fluid">
        </div>
    </div>
</div>

<hr class="breakline">

<div class="portfolio mt-5">
    <h4>FILMOGRAFIA</h4>
    <h3>PORTFOLIO</h3>    
    <div class="container">
        <div class="row my-4">
            <div class="col-12 movies">
                <div class="youtube-player" data-id="R9vtT7CEETo"></div>
                <div class="text">BACKSTAGE</div>
            </div>
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
        photoshootImageNode.src = '../../images/yt-thumbnail/2.jpg'.replace('ID', videoId);
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