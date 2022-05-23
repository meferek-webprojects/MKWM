<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('main/plugins/bs5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('main/css/style.css') }}">
    <script src="{{ url('main/plugins/bs5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('main/plugins/feather-icons/feather-icons.min.js') }}"></script>
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    @yield('added-css')

    <title>MKWM - photo and viedo masters</title>

</head>
<body>
    
    <div class="container-fluid m-0 p-0">

        <nav class="navbar navbar-expand-xl navbar-dark full position-sticky">
            <div class="container-fluid">
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i data-feather="menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto d-flex align-items-center position-relative">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('/') }}">Główna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('/#my') }}">My</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('/#fotografia') }}">Fotografia</a>
                        </li>
                        <li class="nav-item d-none d-xl-block" id="nav-logo">
                            <a class="nav-link logo" aria-current="page" href="{{ url('/') }}">MKWM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('/#filmografia') }}">Filmografia</a>
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

        @yield('content')

        <footer id="ciastko" class="d-none">
            <div class="container text-center">
                <p class="text-center pt-3">Ta strona wykorzystuje ciasteczka zgodnie z <a href="https://mkwmstudios.pl/polityka-i-ciasteczka">polityką prywatności</a>! Jeśli się na to nie zgadzasz, opuść tę stronę.<button id="cookieBtn" type="button" class="close"><i data-feather="x"></i></button></p>
            </div>
        </footer>

        <div class="footer text-center pb-5">
            <h2>MKWM</h2>
            <h6><a href="{{ url('/polityka-i-ciasteczka') }}">Polityka prywatności oraz polityka ciasteczek</a></h6>
            <h5>Copyright &copy; 2022 Mateusz Krysiak & Krzysztof Stępniak <h5>
        </div>
        
    </div>

    @yield('added-js')

    <script>
        $('body').on('click', () => {
            if($('.searchbar').hasClass('active')){
                $('.nav-link').toggleClass('hidden');
                $('.searchbar').toggleClass('active');
                $('#search-button').toggleClass('active');
            }
        });

        $('#search-button').on('click', event => {
            event.stopPropagation();
            $('.nav-link').toggleClass('hidden');
            $('.searchbar').toggleClass('active');
            $('#search-button').toggleClass('active');
        });

        $('.searchbar').on('click', event => event.stopPropagation());

        $(document).scroll(() => {
            let scrollTop = $(document).scrollTop();
            let filterBlur = (-window.innerHeight / 2 + scrollTop) / 100;

            if(scrollTop){
                if(window.innerWidth > 8699)
                    $('.navbar').css({'background-color': '#000a', 'padding-top': '7px'});
                else
                    $('.navbar').removeAttr('style');

                if(scrollTop < window.innerHeight)
                    $('.hero').css({'top': (scrollTop / 2), 'filter': (filterBlur > 0 ? 'blur('+filterBlur+'px)' : '')});
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