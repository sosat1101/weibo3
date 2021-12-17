<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>@yield('title', '我的标题')</title>
</head>
<body>
<head>@include('shared._head')</head>

<div class="container">
    @yield('content')
</div>

<script src="{{ mix('js/app.js') }}"></script>
<footer>@include('shared._footer')</footer>
</body>
</html>


