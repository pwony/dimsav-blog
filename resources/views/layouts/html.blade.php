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

    <meta property="og:site_name" content="{{ $site_name }}" />
    <meta property="og:type" content="{{ $head_og_type }}" />
    <meta property="og:title" content="{{ $head_page_title }}" />
    <meta property="og:description" content="{{ $head_description }}" />
    <meta property="og:url" content="{{ $head_canonical_url }}" />
    <meta property="og:image" content="{{ $head_image }}" />
    @if($head_og_type == 'article')
        <meta property="article:published_time" content="{{ $head_article_published_time }}" />
        <meta property="article:modified_time" content="{{ $head_article_modified_time }}" />
        {{-- See how twitter labels work here:
        https://twitter.com/levelsio/status/828892835172671489 --}}
        <meta name="twitter:label1" content="Written by" />
        <meta name="twitter:data1" content="Dimitris Savvopoulos" />
        @foreach($head_article_tags as $article_tag)
            <meta property="article:tag" content="{{ $article_tag }}" />
        @endforeach
        <meta name="twitter:label2" content="Subjects" />
        <meta name="twitter:data2" content="{{ $head_article_tags->implode(', ') }}" />
    @endif
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $head_page_title }}" />
    <meta name="twitter:description" content="{{ $head_description }}" />
    <meta name="twitter:url" content="{{ $head_canonical_url }}" />
    <meta name="twitter:image" content="{{ $head_image }}" />
    <meta name="twitter:site" content="@dimsav" />
    <meta name="twitter:creator" content="@dimsav" />
    <meta property="og:image:width" content="{{ $head_image_width }}" />
    <meta property="og:image:height" content="{{ $head_image_height }}" />

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "{{ $head_og_type == 'article' ? 'Article' : 'WebSite' }}",
    "publisher": {
        "@type": "Organization",
        "name": "dimsav.com",
        "logo": {
            "@type": "ImageObject",
            "url": "https://dimsav.com/img/dimitrios-savvopoulos-web-square-big.jpg",
            "width": 902,
            "height": 902
        }
    },
    @if($head_og_type == 'article')
        "author": {
            "@type": "Person",
            "name": "Dimitris Savvopoulos",
            "url": "https://dimsav.com",
            "sameAs": []
        },
        "headline": "{{ $head_page_title }}",
        "datePublished": "{{ $head_article_published_time }}",
        "dateModified": "{{ $head_article_modified_time }}",
        "keywords": "{{ $head_article_tags->implode(', ') }}",
    @endif
    "url": "{{ $head_canonical_url }}",
    "image": {
        "@type": "ImageObject",
        "url": "{{ $head_image }}",
        "width": {{ $head_image_width }},
        "height": {{ $head_image_height }}
    },
    "description": "{{ $head_description }}",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://dimsav.com"
    }
}
</script>
</head>
<body class="text-gray-800">
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
        p a {
            text-decoration: underline;
        }
    </style>
    @yield('html-content')
    @include('partials.footer')

    @if(App::environment('production'))
        @include('partials.analytics')
    @endif
</body>
</html>
