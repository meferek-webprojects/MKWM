<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Panel gdzie można uzyskać więcej szczegółów dot. odbytej sesji zdjęciowej.">
    <meta name="keywords" content="Strona główna, Baza zdjęć">
    <meta name="author" content="Mateusz Krysiak & Krzysztof Stępniak">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">
    
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/pace/pace.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/css/main.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/css/custom.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9BXT39VT2C"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-9BXT39VT2C');
    </script>
</head>
<body class="pace-done no-loader">
    <div class="pace pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity">
        </div>
    </div>

    <div class="app app-error align-content-stretch d-flex flex-wrap">
        <div class="app-error-info">
            <h5>Oops!</h5>
            <span>@yield('message') (@yield('code'))</span>
            <a href="{{ url('/dboard') }}" class="btn btn-dark">Wróć do panelu</a>
        </div>
        <div class="app-error-background"></div>
    </div>

    <script src="{{ url('dashboard/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ url('dashboard/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('dashboard/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('dashboard/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ url('dashboard/js/main.min.js') }}"></script>
    <script src="{{ url('dashboard/js/custom.js') }}"></script>
    <script src="{{ url('dashboard/js/pages/dashboard.js') }}"></script>
    <script src="{{ url('dashboard/js/alertDismiss.js') }}"></script>
</body>
</html>