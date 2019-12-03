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

    <meta property="og:site_name" content="dimsav" />
    <meta property="og:type" content="{{ $head_og_type }}" />
    <meta property="og:title" content="{{ $head_page_title }}" />
    <meta property="og:description" content="{{ $head_description }}" />
    <meta property="og:url" content="{{ $head_canonical_url }}" />
    <meta property="og:image" content="{{ $head_image }}" />
    @if(isset($head_article_tags) && $head_article_tags)
        @foreach($head_article_tags as $article_tag)
            <meta property="article:tag" content="{{ $article_tag }}" />
        @endforeach
    @endif
    @if(isset($head_article_published_time))
        <meta property="article:published_time" content="{{ $head_article_published_time }}" />
    @endif
    @if(isset($head_article_modified_time))
        <meta property="article:modified_time" content="{{ $head_article_modified_time }}" />
    @endif
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $head_page_title }}" />
    <meta name="twitter:description" content="{{ $head_description }}" />
    <meta name="twitter:url" content="{{ $head_canonical_url }}" />
    <meta name="twitter:image" content="{{ $head_image }}" />
    <meta name="twitter:site" content="@dimsav" />

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
