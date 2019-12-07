@extends('layouts.post')

@section('post-content')

    @component('p')
        {{ $blog_post->summary }}
    @endcomponent

    @component('p')
        jQuery? Yes, jQuery.
    @endcomponent

    @component('p')
        Before getting used to vue, I was constantly choosing jQuery for new projects, because I
        was quite familiar with it. This made me very fast at launching apps with laravel, since
        blade is enough to create an
        <a href="https://en.wikipedia.org/wiki/Minimum_viable_product">MVP</a>.
    @endcomponent

    @component('p')
        But, as soon as the projects started growing, more complex functionality was required.
        For me this was the moment to realize jQuery was not enough, especially when I wanted to
        provide the perfect experience to my website's users.
    @endcomponent

    @component('p')
        So I wanted to start using Vue.js but the challenge was that vue dominates the dom it
        uses. And when vue is there, it doesn't give any air for jQuery to breathe.
    @endcomponent

    @component('p')
        Luckily though, after searching around on the web with my
        <a href="https://twitter.com/janokary">co-founder</a>, we found a solution on how to use
        Vue into projects with jQuery. My goal is to share this know-how with you.
    @endcomponent

    @component('p')
        One of the things that made it very hard for me to understand how to couple Vue.js
        with jQuery was the fact that vue lives in what we all know as a root component and I
        call a "silo".
    @endcomponent
    <h2 class="font-bold text-xl md:text-2xl px-5 my-12">
        What tutorials teach
    </h2>
    @component('p')
        If you have your whole html code wrapped inside a single root component, then you have a
        big big silo belonging to Vue.js. I know, this is what tutorials teach. But if this how
        you attempt to "inject" Vue.js into a jQuery project, that cannot and will not work.
    @endcomponent
    @component('p')
        <span class="italic">But I love root components!</span>
        I hear you say. Patience friend, we will get there.
    @endcomponent
    @component('p')
        One characteristic of Vue.js is it absorbs all the window events. Something like a black
        hole. This means that jQuery's
        <span class="inline-block bg-gray-200 rounded px-2
        py-1 font-mono text-sm mx-1">on.('click')</span>
        wouldn't work inside a vue component. Your top navigation and hamburger menu code coded
        with jQuery would stop work for instance.
    @endcomponent
    @component('p')
        Then,
        <span class="italic text-blue-400">(Hallelujah music in the background)</span>
        we realized we could have multiple Vue.js root components into a page. By doing that we
        could limit the scope of anti-social but so beautiful Vue.js components into smaller
        black-hole-component-silos.
    @endcomponent

    @component('p')
        So instead of having one huge root component-silo belonging to Vue.js, we had to inject
        multiple mini ones we could use here and there. And as long as these did not interact in
        some way with jQuery, happy life could go on.
    @endcomponent

    @component('p')
        Enough with the theory and the sentimental talk. Let's see some code.
    @endcomponent

    <h2 class="font-bold text-xl md:text-2xl px-5 my-12">
        The code
    </h2>

    @component('p')
        On our passion project <a href="https://metabook.gr">metabook.gr</a> (don't open the link,
        unless
        you speak greek), we wanted to lazy load the book covers.
    @endcomponent
    @component('p')
        You clicked the link nevertheless, didn't you?
    @endcomponent
    @component('p')
        Anyway, this is the html code of our vue component:
    @endcomponent
@component('partials.code')
{{ '<lazy-img class="vue-root" src="/image.jpg">' }}
@endcomponent
    @component('p')
        Of course that won't work unless we tell javascript to load it as a vue component.
    @endcomponent
    @component('p')
        <span class="font-bold">
            In our app.js we declare that every element with the class ".vue-root" is a vue root
            component.
        </span>
    @endcomponent

@component('partials.code')
{{ "import LazyImg from './vue/lazy-img'" }}
{{ 'const vueRootElements = document.querySelectorAll(".vue-root");' }}
{{ 'Array.prototype.forEach.call(vueRootElements, (el) =>' }}
<span class="ml-4">{{ 'new Vue({el, ' }}</span>
<span class="ml-8">{{ 'components: {' }}</span>
<span class="ml-12">{{ 'ImgLazy' }}</span>
{!!  "}}))" !!}
@endcomponent

    @component('p')
        By using the trick above, we were finally able to insert Vue.js components anywhere we
        like without worrying too much. Also, any new javascript code can now be written with
        Vue.js and slowly replace jQuery with Vue.js!
    @endcomponent
    @component('p')
        And this makes us happy because Vue.js is much more fun to work with!
    @endcomponent
    @component('p')
        Thank you for reading this!
        <br>
        If you use a different approach, please
        <a href="{{ $twitter_url }}">do share it</a> with me!
    @endcomponent

@endsection
