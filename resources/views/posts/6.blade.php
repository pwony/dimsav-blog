@extends('layouts.post')

@section('post-content')

    @component('code')
        echo 'Hello world!';
    @endcomponent

    @component('p')
        I am very happy to announce the release of my personal website. I will post here articles about stuff I learn and my life experiences. Most of the texts will be related to my hobby and passion:
        <span class="font-bold">web development</span>.
    @endcomponent

    @component('p')
        This site is developed on top of the laravel framework, using a content management system that I would love to make public some day. But more about that another day. I decided to start with a minimal version including just a blog, more features will come later.
    @endcomponent

    @component('p')
        Give me some feedback! Do you like the site? What you don't?
    @endcomponent

    @component('h2')
        Update (Dec 8, 2019)
    @endcomponent

    @component('p')
        Thank god I din't publish that cms. It was written in Laravel 3 and I never upgraded to
        the newest laravel versions because I lost interest in building websites for customers
        which was my main motivation behind this. Phew!
    @endcomponent
@endsection
