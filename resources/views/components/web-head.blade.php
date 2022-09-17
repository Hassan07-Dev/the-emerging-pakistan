<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/fevicon-2.jpg') }}" />
    <title>{{ $title }} | Daddy Magz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/templete.css') }}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{ asset('assets/css/skin/skin-1.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FGQPJRD7GQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FGQPJRD7GQ');
    </script>
    <style>
        .icon_c>li>a{
            color: #bf0209 !important;
        }
        .icon_c>li>a:hover{
            color: #c85054 !important;
        }
    </style>
</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-area"></div>
