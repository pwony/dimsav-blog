<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" @yield('html-itemscope')>
<head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <style>
        svg {
            fill: currentColor;
        }
        .overlay {
            transition: opacity 0.5s ease;
            -webkit-transition: opacity 0.5s ease;
            -moz-transition: opacity 0.5s ease;
        }
        .overlay {
            position: relative;
        }

        .overlay:after {
            content: '\A';
            position: absolute;
            width: 100%;
            height: 100%;
            top:0;
            left:0;
            background:rgba(0,0,0,0.6);
            opacity: 1;
            transition: opacity 0.5s;
            -webkit-transition: opacity 0.5s;
            -moz-transition: opacity 0.5s;
        }
        .overlay-container:hover .overlay:after {
            opacity: 0;
        }
    </style>
    @yield('html-content')
    @include('partials.footer')
</body>
</html>
