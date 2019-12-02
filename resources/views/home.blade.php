@extends('layouts.html')

@section('html-content')
    <div class="pt-24 h-screen text-blue-100" style="background: no-repeat center center url(/img/bg.jpg); background-size: cover;">
        <div class="flex flex-col mx-10 md:flex-row md:mx-auto items-center" style="max-width: 900px;">
            <div class="mb-10 md:mb-0 md:mr-10">
                <img src="/img/dimitris-savvopoulos-photo.png" alt="" style="width: 150px; height: 150px; opacity: 0.9">
            </div>
            <div class="text-xl flex-1">
                <p class="mb-2">Hi, I'm Dimitris!</p>
                I'm a <a class="underline" href="https://github.com/dimsav/">web developer</a>
                and indie hacker at <a class="underline" href="https://metabook.gr">metabook</a>,
                and also a Co-organizer of the <a class="underline" href="https://laravel.gr">Laravel Athens User group</a>
                and author of <a class="underline" href="https://github.com/dimsav/laravel-translatable">Laravel Translatable</a>.
            </div>
        </div>
        <div class="absolute bottom-0 pb-3 w-full text-center opacity-75">
            <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 30 30">
                <path d="M14.996 23.543c-.539 0-1.074-.207-1.484-.617L.617 10.03a2.098 2.098 0 112.969-2.969l11.41 11.41 11.41-11.41a2.098 2.098 0 112.969 2.97L16.48 22.93a2.11 2.11 0 01-1.484.613zm0 0" />
            </svg>
        </div>
    </div>

    <a class="relative block overlay-container" style="width: 100%; height: 75vh;" href="">
        <div class="text-blue-100" style="width: 100%; height: 100%; z-index: 40;
        position: absolute; top: 0; left: 0; bottom: 0; text-shadow: 0 2px #2c2c2c; ">
            <div class="flex flex-col items-start justify-center w-full h-full px-6">
                <div class="mb-2 text-4xl sm:text-5xl md:text-6xl font-bold">How to start using vueJs on jQuery websites</div>
                <div class="sm:text-lg md:text-xl mb-6">3 days ago</div>
            </div>

        </div>
        <div class="relative overlay"
             style="margin: 0 auto; height: 75vh; background: no-repeat center center url(/blog-img/1.jpg); background-size: cover;"
        ></div>
    </a>
@endsection
