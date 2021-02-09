<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('img/dist/likhain-white.png')}}" sizes="16x16" />
    @include('admin.include.default-css')
    @yield('css')
</head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
        <div class="wrapper">
            {{-- NAVBAR --}}
            @include('admin.include.navbar')
            {{-- end NAVBAR --}}

            {{-- SIDEBAR --}}
            @include('admin.include.sidebar')
            {{-- end SIDEBAR --}}

            {{-- CONTENT --}}
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-12">
                            @yield('content_header')
                        </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                </section>
            </div>
            {{-- end CONTENT --}}
        </div>
        @include('admin.include.default-js')
        @yield('js')
    </body>
</html>
