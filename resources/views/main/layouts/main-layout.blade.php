<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('/main/plugins/bs5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('main/css/style.css') }}">
    <script src="{{ url('/main/plugins/bs5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/main/plugins/feather-icons/feather-icons.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>MKWM - photo and video masters</title>

</head>
<body>
    
    <div class="container-fluid p-0">

        <nav class="navbar navbar-expand-xl navbar-dark position-fixed">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i data-feather="menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto d-flex align-items-center position-relative">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Photography</a>
                        </li>
                        <li class="nav-item" id="nav-logo">
                            <a class="nav-link logo" aria-current="page" href="#">MKWM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Videography</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Contact</a>
                        </li>
                        <input type="text" class="searchbar position-absolute border-0" placeholder="Szukaj sesji...">
                        <li class="nav-item d-none d-xl-block position-relative" id="search-button">
                            <i data-feather="search"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="hero position-relative overflow-hidden w-100">
            <img src="{{ url('images/img/natalia.jpg') }}" alt="" class="hero-image position-absolute start-50 translate-middle-x ">
            <div class="hero-text text-center position-absolute top-50 start-50 translate-middle">
                <div>EVERYONE DESERVES</div>
                <div>to see your own beauty</div>
            </div>
        </div>

        @yield('content')

    </div>

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
                $('.navbar').css({'background-color': '#000a', 'padding-top': '7px'});

                if(scrollTop < window.innerHeight)
                    $('.hero').css({'top': (scrollTop / 2), 'filter': (filterBlur > 0 ? 'blur('+filterBlur+'px)' : '')});
            }else{
                $('.navbar').css({'background-color': '', 'padding-top': ''});
                $('.hero').css('top', '');
            }
        })
    </script>

    <script>
        feather.replace();
    </script>

</body>
</html>