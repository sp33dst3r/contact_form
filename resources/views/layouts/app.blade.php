<html>
    <head>
        <title>App Name - @yield('title')</title>

        <link rel="stylesheet" href="{{ URL::asset('/public/css/app.css') }}">
    </head>
    <body>


        <div class="container">
            @yield('content')
        </div>
        <script type="text/javascript" src="{{ URL::asset('/public/js/app.js') }}"></script>
    </body>
</html>
