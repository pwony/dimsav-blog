@extends('layouts.html')

@section('html-content')

    <div class="h-1/2-screen bg-cover bg-center bg-no-repeat"
         style="background-image: url(/blog-img/1.jpg);"
    ></div>

    <div style="max-width: 900px;" class="mx-auto">
        <div class="text-center pt-16 text-gray-500 ">
            Nov 23, 2019
        </div>
        <div class="pt-8 pb-2 px-5 text-center text-3xl sm:text-5xl md:text-5xl font-bold text-gray-800">How I use vueJs on jQuery websites</div>

        @foreach([1,2,3] as $i)
        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            asdaok sdpasokd apsokd paoskd paosdk aposkd Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias cupiditate, dolore doloribus, dolorum, eos et explicabo illo incidunt ipsum itaque minus nihil nostrum obcaecati officiis perspiciatis quaerat repellat sequi tempore.
        </p>
        @endforeach
    </div>
@endsection