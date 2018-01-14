<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fakers App @yield('title')</title>
    </head>
    <body>
        @include('partials.header')
        @include('partials.message')
        <div>
            @yield('content')
        </div>
    </body>
</html>
