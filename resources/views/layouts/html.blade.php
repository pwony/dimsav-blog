<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" @yield('html-itemscope')>
<head>
    <meta charset="utf-8" />
    <title>{{ $head_page_title }}</title>
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="canonical" href="{{ $head_canonical_url }}" />
    <meta name="description" content="{{ $head_description }}" />
    <link rel="shortcut icon" href="/favicon.png" type="image/png" />

    {{--  Styles  --}}
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
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.6);
            opacity: 1;
            transition: opacity 0.5s;
            -webkit-transition: opacity 0.5s;
            -moz-transition: opacity 0.5s;
        }

        .overlay-container:hover .overlay:after {
            opacity: 0;
        }

        .text-shadow {
            text-shadow: 0 2px #2c2c2c;
        }

        .h-1\/2-screen {
            height: 50vh;
        }
    </style>
    @yield('html-content')
    @include('partials.footer')

    @if(App::environment('production'))
        @include('partials.analytics')
    @endif
</body>
</html>
