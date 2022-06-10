<html lang="pl">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Panel gdzie można uzyskać więcej szczegółów dot. odbytej sesji zdjęciowej.">
    <meta name="keywords" content="Strona główna, Baza zdjęć">
    <meta name="author" content="Mateusz Krysiak & Krzysztof Stępniak">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">
    
    @yield('title')

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/pace/pace.css') }}" rel="stylesheet">

    @yield('added-css')

    <link href="{{ url('dashboard/css/main.css') }}" rel="stylesheet">
    {{-- <link href="{{ url('dashboard/css/darktheme.css') }}" rel="stylesheet"> --}}
    <link href="{{ url('dashboard/css/custom.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/images/neptune.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/neptune.png">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

    @yield('content')
    
    <script src="{{ url('dashboard/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ url('dashboard/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('dashboard/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('dashboard/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ url('dashboard/js/main.min.js') }}"></script>
    <script src="{{ url('dashboard/js/custom.js') }}"></script>
    <script src="{{ url('dashboard/js/pages/dashboard.js') }}"></script>
    <script src="{{ url('main/js/image-center.js') }}"></script>

    @yield('added-js')

</body>
</html>