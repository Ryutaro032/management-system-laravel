<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body> 
        <div class="header">    
            <div class="header-left">
                @yield('main-title')
            </div>
            <div class="header-right">
                @yield('header')
            </div>
        </div> 
        <div class="clear"></div>
        <div class="flex-center">
            <div class="content">
                @yield('search')
                @yield('content')
            </div>
        </div>
    </body>
</html>
