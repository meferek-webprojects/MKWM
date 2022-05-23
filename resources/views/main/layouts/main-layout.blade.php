<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('/main/plugins/bs5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('main/css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">
    <script src="{{ url('/main/plugins/bs5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/main/plugins/feather-icons/feather-icons.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>MKWM - photo and video masters</title>

</head>
<body>
    
    <div class="container-fluid p-0">

        <nav class="navbar navbar-expand-xl navbar-dark">
            <div class="container-fluid p-0">
                <button class="navbar-toggler navbar-show shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i data-feather="menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto d-flex align-items-center position-relative">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('/#') }}">Główna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#my">My</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#fotografia">Fotografia</a>
                        </li>
                        <li class="nav-item d-none d-xl-block" id="nav-logo">
                            <a class="nav-link logo" aria-current="page" href="{{ url('/') }}">MKWM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#filmografia">Filmografia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('/kontakt') }}">Kontakt</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ url('/account') }}"><i data-feather="user"></i></a>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ url('/login') }}"><i data-feather="log-in"></i></a>
                            </li>
                        @endguest
                        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i data-feather="x"></i>
                        </button>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="hero position-sticky overflow-hidden w-100">
            <img src="{{ url('images/img/natalia.jpg') }}" alt="" class="hero-image position-absolute start-50 translate-middle-x">
            <div id="hero-text" class="hero-text text-center position-absolute top-50 start-50 translate-middle">
                <div>EVERYONE DESERVES</div>
                <div>to see own beauty</div>
            </div>
        </div>

        @yield('content')

        <div class="footer text-center pb-5">
            <h2>MKWM</h2>
            <h6><a href="{{ url('/polityka-i-ciasteczka') }}">Polityka prywatności oraz polityka ciasteczek</a></h6>
            <h5>Copyright &copy; @php echo date('Y') @endphp Mateusz Krysiak & Krzysztof Stępniak<h5>
        </div>

    </div>

    <script>
        $(document).scroll(() => {
            let scrollTop = $(document).scrollTop();

            if(scrollTop){
                if(window.innerWidth > 1199)
                    $('.navbar').css({'background-color': '#000a', 'padding-top': '7px'});
                else
                    $('.navbar').removeAttr('style');

                if(scrollTop <= window.innerHeight)
                    $('.hero').css({'top': -(scrollTop / 2), 'opacity': ''});
                else
                    $('.hero').css({'opacity': '0'});
            }else{
                $('.navbar').removeAttr('style');
                $('.hero').removeAttr('style');
            }
        })

        $(window).resize(() => {
            let scrollTop = $(document).scrollTop();

            if(scrollTop){
                if(window.innerWidth > 1199)
                    $('.navbar').css({'background-color': '#000a', 'padding-top': '7px'});
                else
                    $('.navbar').removeAttr('style');
            }else
                $('.navbar').removeAttr('style');
        })
    </script>

    <script>
        feather.replace();
    </script>

</body>
</html>