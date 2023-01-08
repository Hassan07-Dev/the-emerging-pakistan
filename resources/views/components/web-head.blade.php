<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @isset($meta)
        <title>{{ isset($meta) ? isset($meta->title) ? $meta->title : "TEP" : "TEP" }}</title>
        <meta name="description" content="{{ isset($meta) ? isset($meta->description) ? $meta->description : "Test Description" : "Test Description" }}">
        <meta name="keywords" content="{{ isset($meta) ? isset($meta->keywords) ? $meta->keywords : "HTML, CSS, JavaScript" : "HTML, CSS, JavaScript" }}">
    @endisset
    @yield('head')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" hreflang="en-us" href="{{url()->current()}}" />
    <meta name="theme-color" content="#030303">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,700;1,300;1,500&family=Poppins:ital,wght@0,300;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
    <link href="{{ asset('assets/css/styles.css?537a1bbd0e5129401d28') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

    <script src="{{ asset('plugins/axios.min.js') }}"></script>

</head>

<body class="body-box">


