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

        <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i data-feather="menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto d-flex align-items-center">
                        <li class="nav-item px-5">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item px-5">
                            <a class="nav-link" aria-current="page" href="#">We</a>
                        </li>
                        <li class="nav-item px-5">
                            <a class="nav-link" aria-current="page" href="#">Photography</a>
                        </li>
                        <li class="nav-item px-5 d-none d-xl-block">
                            <a class="nav-link logo" aria-current="page" href="#">MKWM</a>
                        </li>
                        <li class="nav-item px-5">
                            <a class="nav-link" aria-current="page" href="#">Videography</a>
                        </li>
                        <li class="nav-item px-5">
                            <a class="nav-link" aria-current="page" href="#">Contact</a>
                        </li>
                        <li class="nav-item px-5 d-none d-xl-block">
                            <a class="nav-link" aria-current="page" href="#"><i data-feather="search"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="hero">
            <img class="" src="{{ url('images/img/natalia.jpg') }}" alt="">
        </div>

    </div>

    <script>
        feather.replace();
    </script>

</body>
</html>