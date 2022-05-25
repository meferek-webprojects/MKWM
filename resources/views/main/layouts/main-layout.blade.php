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
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9BXT39VT2C"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-9BXT39VT2C');
    </script>
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
                            <a class="nav-link" href="{{ url('/#') }}" aria-current="page">Główna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#my" aria-current="page">My</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#fotografia" aria-current="page">Fotografia</a>
                        </li>
                        <li class="nav-item d-none d-xl-block" id="nav-logo">
                            <a class="nav-link logo" href="{{ url('/') }}" aria-current="page">MKWM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#filmografia" aria-current="page">Filmografia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/kontakt') }}" aria-current="page">Kontakt</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dboard') }}" aria-current="page"><i data-feather="user"></i></a>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/login') }}" aria-current="page"><i data-feather="log-in"></i></a>
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

        <footer id="ciastko" class="d-none">
            <div class="container text-center">
                <p class="text-center pt-3">Ta strona wykorzystuje ciasteczka zgodnie z <a href="https://mkwmstudios.pl/polityka-i-ciasteczka">polityką prywatności</a>! Jeśli się na to nie zgadzasz, opuść tę stronę<button id="cookieBtn" type="button" class="close"><i data-feather="x"></i></button></p>
            </div>
        </footer>

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
        
        var navLinks = document.querySelectorAll('.nav-link');
        var menuToggle = document.getElementById('navbarSupportedContent');
        var bsCollapse = new bootstrap.Collapse(menuToggle, {toggle:false});

        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if($(window).width() < 1200) bsCollapse.toggle();
            })
        });
    </script>

    <script>

        var button = document.getElementById('cookieBtn');
        var ciastko = document.getElementById('ciastko');

        window.onload = function() {
            var ciasteczka = getCookie('ciasteczka');
            if (ciasteczka == "accept"){
                ciastko.classList.add('d-none');
            }
            else{
                ciastko.classList.remove('d-none');
                ciastko.classList.add('d-block');
            }
        };

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
                }
            }
            return "";
        }


        function firstEventHandler() {

            ciastko.classList.add('d-none');
            ciastko.classList.remove('d-block');

            var d = new Date();
            d.setTime(d.getTime() + (90*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = "ciasteczka=accept;" + expires + ";path=/";

        }

        button.addEventListener('click', firstEventHandler, false);


    </script>

    <script>
        feather.replace();
    </script>

</body>
</html>