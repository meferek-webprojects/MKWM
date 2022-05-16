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

        <nav class="navbar navbar-expand-xl navbar-dark full">
            <div class="container-fluid">
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i data-feather="menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 mx-auto d-flex align-items-center position-relative">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Główna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">My</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Fotografia</a>
                        </li>
                        <li class="nav-item d-none d-xl-block" id="nav-logo">
                            <a class="nav-link logo" aria-current="page" href="#">MKWM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Filmografia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Kontakt</a>
                        </li>
                        <li class="nav-item d-none d-xl-block position-relative" id="search-button">
                            <i data-feather="search"></i>
                        </li>
                        <input type="text" class="searchbar position-absolute border-0" placeholder="Szukaj sesji">
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

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
        feather.replace();
    </script>

</body>
</html>