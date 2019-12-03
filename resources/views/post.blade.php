@extends('layouts.html')

@section('html-content')

    <div class="h-1/2-screen bg-cover bg-center bg-no-repeat"
         style="background-image: url(/blog-img/1.jpg);"
    ></div>

    <div style="max-width: 900px;" class="mx-auto">
        <div class="text-center pt-16 text-gray-500 ">
            Dev 3, 2019
        </div>
        <div class="pt-8 pb-2 px-5 text-center text-3xl sm:text-5xl md:text-5xl font-bold text-gray-800">
            How to use vueJs on jQuery websites
        </div>

        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            One of the reasons it was very hard for me to start using vueJs for a long time on
            production is because I was mostly coding on existing websites whose frontend was built
            with jQuery.
        </p>

        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            jQuery? Yes, jQuery.
        </p>

        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            Before getting used to vue, I was constantly choosing it for new projects, because I was
            quite familiar with it. This made me very fast at launching apps with laravel, since
            blade is enough for most of the basics.</p>

        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            But, as soon as the projects started growing, more complex functionality was required.
            For me this was the moment to realize jQuery was not enough, especially when I wanted to
            provide the perfect frontend experience to my website's users started doing ajax calls.
        </p>

        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            So I wanted to start using vueJs but the challenge was that vue dominates the dom it
            uses. And when vue is there, it doesn't give any air for jQuery to breathe.
        </p>

        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            Luckily though, after searching around on the web with my
            <a href="https://twitter.com/janokary">co-founder</a>, we found a solution on how to use
            vueJs into projects with jQuery. My goal is to share this know-how with you.
        </p>

        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            One of the things that made it very hard for me to understand on how to couple vueJs
            with jQuery was the fact that vue lives in what we all know as a root component and I
            call a "silo".
        </p>
        <h2 class="text-gray-800 font-bold text-xl md:text-2xl px-5 my-12">
            What is a silo?
        </h2>
        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            If you have your whole html code wrapped inside a single root component, then you have a
            big big silo belonging to vueJs. I know, this is what tutorials teach. But if this how
            you attempt to "inject" vueJs into a jQuery, that cannot and will not work.
        </p>
        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            <span class="italic">But I love root components!</span>
            I hear you say. Patience friend, we will get there.
        </p>
        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            One characteristic of vueJs is it absorbs all the window events. Something like a black
            hole. This means that jQuery's
            <span class="inline-block bg-gray-200 rounded px-2
            py-1 font-mono text-sm mx-1">on.('click')</span>
            wouldn't work inside a vue component. Your top navigation and hamburger menu code with
            jQuery would stop work for instance.

        </p>
        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            Then,
            <span class="italic">(Hallelujah music in the background)</span>
            we realized we could have multiple vueJs root components into a page. By doing that we
            could limit the scope of anti-social but so beautiful vueJs into smaller black hole
            silos.
        </p>
        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            So instead of having one huge root component silo belonging to vueJs, we had to inject
            multiple mini ones we could use here and there. And as long as these did not interact in
            some way with jQuery, happy life could go on.
        </p>

        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            Enough with the theory and the sentimentals.
        </p>

        <h2 class="text-gray-800 font-bold text-xl md:text-2xl px-5 my-12">
            tl;dr show me da code.
        </h2>

        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            On metabook.gr, we wanted to lazy load the book covers. This is the blade code:
        </p>

        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            {{ '<lazy-img class="vue-root" src="/image.jpg">' }}
        </p>
        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            Of course that won't work unless we tell javascript to load it as a vue component.
        </p>
        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            In our app.js we declare that every element witht he class ".vue-root" is a vue root
            component.
        </p>

        <div class="text-gray-700 px-5 py-5 my-12 font-mono bg-gray-200 rounded">
            <div>{{ "import LazyImg from './vue/lazy-img'" }}</div>
            <div>{{ 'const vueRootElements = document.querySelectorAll(".js-dom");' }}</div>
            <div>{{ 'Array.prototype.forEach.call(vueRootElements, (el) =>' }}</div>
            <div class="pl-4">{{ 'new Vue({' }}</div>
            <div class="pl-8">{{ 'el, components: {' }}</div>
            <div class="pl-12">{{ 'ImgLazy' }}</div>
            <div>{!!  "}}))" !!}</div>
        </div>

        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            By using the technique above, we were finally able to stop writing new jQuery code and
            write only vueJs code.
        </p>
        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            This makes us happy because vueJs is much more fun to work with!
        </p>
        <p class="text-gray-800 text-xl md:text-2xl px-5 my-12">
            Thank you for reading this! If you use a different technique please
            <a href="https://twitter.com/dimsav">do share it with me!</a>
        </p>
    </div>
@endsection
