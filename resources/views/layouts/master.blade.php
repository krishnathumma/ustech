<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>US Tech Solutions - Cricket Assignment </title>

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,500,400italic,700,900,300' rel='stylesheet' type='text/css'>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <style type="text/css">
        .hidden > * {
    display: none !important; }
    </style>

    @yield('head')
</head>
<body id="@yield('pageName')">
    
        
    @yield('layout')

    <!-- JavaScripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/jquery.fileupload-process.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/jquery.fileupload-validate.js"></script>
</body>
</html>
