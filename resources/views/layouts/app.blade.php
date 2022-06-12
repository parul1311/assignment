<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title','') </title>

        @include('include.head')
    </head>
    <body class="antialiased">
        <div class="wrapper">
            <div class="page-wrapper">
                @include('include.header')
                    <div class="section-body">
                        @yield('content')
                    </div>
                    @include('include.footer')
            </div>
        </div>
        @include('include.script')
    </body>
</html>
