<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/landing_page.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <title>@yield('title')</title>
    </head>
    <body>
        @include('include.modals.landing-page-modal')
        @yield('ellipse')
        <div class="container-fluid lp-banner-gradient">
            @include('include.navbar_01')
            @yield('searchbar')
        </div>
        <div id="procedure">
                @yield('procedure')
        </div>

        @yield('count')
        <div>
            @yield('partner')
        </div>

        {{-- FOOTER --}}
        @include('include.footer_01')
        {{-- end FOOTER --}}
    </body>
    {{-- <script src="{{asset('users/js/jquery.min.js')}}"></script> --}}
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/landing/landing_page.js')}}"></script>
</html>

