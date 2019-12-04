@extends('layouts.html')

@section('html-content')
    <div class="pt-24 h-screen text-blue-100 bg-cover bg-center bg-no-repeat" style="background-image: url(/img/bg.jpg);">
        <div class="flex flex-col mx-10 md:flex-row md:px-10 md:mx-auto items-center"
             style="max-width: 900px;">
            <div class="mb-10 md:mb-0 md:mr-10">
                <img src="/img/dimitris-savvopoulos-photo.png" alt="{{ $site_name }} logo" style="width:
                150px; height: 150px; opacity: 0.9">
            </div>
            <div class="text-xl flex-1">
                <p class="mb-2">Hi, I'm Dimitris!</p>
                I'm a <a class="underline" href="https://github.com/dimsav/">web developer</a>
                and indie hacker at <a class="underline" href="https://metabook.gr">metabook</a>,
                and also a Co-organizer of the
                <a class="underline" href="https://laravel.gr">Laravel Athens User group</a>
                and author of
                <a class="underline" href="https://github.com/dimsav/laravel-translatable">
                    Laravel Translatable</a>.
            </div>
        </div>
        <div class="absolute bottom-0 pb-3 w-full text-center opacity-75">
            <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 30 30">
                <path d="M14.996 23.543c-.539 0-1.074-.207-1.484-.617L.617 10.03a2.098 2.098 0 112.969-2.969l11.41 11.41 11.41-11.41a2.098 2.098 0 112.969 2.97L16.48 22.93a2.11 2.11 0 01-1.484.613zm0 0" />
            </svg>
        </div>
    </div>

    @foreach($blog_posts as $blog_post)
        <a class="relative block overlay-container w-full h-1/2-screen"
           href="{{ route('post', 'how-to-use-vuejs-on-jquery-websites') }}">
            <div class="text-blue-100 h-full w-full absolute top-0 left-0 text-shadow z-40">
                <div class="flex flex-col items-start justify-center w-full h-full px-6">
                    <div class="mb-2 text-4xl sm:text-5xl md:text-6xl font-bold"
                    >How to use VueJs on jQuery websites
                    </div>
                    <div class="sm:text-lg md:text-xl mb-6">3 days ago</div>
                </div>
            </div>
            <div class="relative overlay h-full mx-auto bg-cover bg-center bg-no-repeat"
                 style="background-image: url(/blog-img/1.jpg);"
            ></div>
        </a>
    @endforeach
@endsection
