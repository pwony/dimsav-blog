@extends('layouts.html')

@section('html-content')

    <header style="background-image: url({{ $site_image_url }}); background-position: center 10%;"
            class="bg-cover bg-no-repeat">
        <a href="{{ route('home') }}">
            <div class="flex flex-row items-center justify-center py-4 mx-auto text-blue-100 "
                 style="max-width: 900px;">
                <img src="/img/dimitris-savvopoulos-photo.png" alt="{{ $site_name }} logo"
                     class="mr-4"
                     style="width: 60px; height: 60px;">
                <div class="text-xl">
                    {{ $site_name }}
                </div>
            </div>
        </a>
    </header>
    {{--
        Prioritize header image. Idea stolen from
        https://justmarkup.com/articles/2015-02-02-prioritize-loading-of-background-images/
    --}}
    <img src="{{ $site_image_url }}" alt="" style="display: none;">
    <img src="{{ $blog_post->image_url }}" alt="" style="display: none;">

    <div class="h-1/2-screen bg-cover bg-center bg-no-repeat"
         style="background-image: url({{ $blog_post->image_url }});"
    ></div>

    <div class="bg-white pb-1">
        <div style="max-width: 900px;" class="mx-auto">
            <div class="text-center text-lg pt-16 text-gray-500 ">
                {{ $blog_post->published_date }}
            </div>
            <h1 class="pt-8 pb-2 px-5 text-center text-3xl sm:text-5xl md:text-5xl font-bold ">
                {{ $blog_post->title }}
            </h1>
            <div class="flex flex-row justify-center">
                @foreach($blog_post->subjects as $subject)
                    <span class="mr-5">{{ $subject }}</span>
                @endforeach
            </div>

            @yield('post-content')
        </div>
    </div>
    @if($next_blog_post)
        @include('partials.post-preview', ['blog_post' => $next_blog_post])
    @endif
@endsection
