<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>stately perfumes</title>
    @include('partials/website_partials/head')



</head>
<body class="smoothscroll enable-animation">
<!-- wrapper -->
<div id="wrapper">
    @include('partials/website_partials/header')

    @include('partials/website_partials/menu')

    <footer id="footer">
        @include('partials/website_partials/footer')
    </footer>
</div>

@include('partials/website_partials/javascript')
</body>
</html>
