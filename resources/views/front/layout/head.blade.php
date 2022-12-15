<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @foreach ($setting as $set)

    <title>{{$set->name}}</title>

    @endforeach
    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery-ui.min.css') }}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery.lineProgressbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/aos.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>