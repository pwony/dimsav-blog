@extends('layouts.post')

@section('post-content')

    @component('p')
        Long time ago I was working as a junior software engineer at a software agency.
    @endcomponent

    @component('p')
        One day, during the weekly developer meeting, we were discussing the creation of an internal app that would help us manage incoming support tickets.
        So at some point during the conversation, we started talking about how we were going to organize those tickets
        and we decided to use tags. Tags for feature requests, bug reports, complaints, etc.
    @endcomponent

    @component('p')
        Back then, we used mysql pretty much at every project to store data. No matter what it was, it was inside a mysql table.
        We knew that tags would be a very limited set and that they wouldn't change them often, if at all.
        Of course we discussed the details including the need for a "tags" db table and then I thought, wait a moment...
    @endcomponent

    @component('p')
        <span class="font-bold">Why don't we just hardcode the tags somewhere into the project's code?</span>
    @endcomponent

    @component('p')
        I still remember, back then I wasn't good at writing sql queries, especially for many-to-many relationships.
        And I still suck at it because now I use an ORM. But then, laravel and eloquent did not exist.
    @endcomponent

    @component('p')
        The tool was internal, we (coders) would use it and could change the tags if we wanted. There
        was no need for non technical people to edit them. So why not hardcode them? It could be a config
        or maybe a set of classes.
    @endcomponent

    @component('p')
        The team leader didn't agree. Maybe because this was a new way of thinking or probably because I
        didn't use the right words to explain my thinking.
        On the other hand, projects without a database were not that popular as they are today.
    @endcomponent

    @component('p')
        For example, I remember searching recently for a new platform to build my blog with and I discovered a cms
        called <a href="https://statamic.com/">
            statamic</a>. And I really liked the way they store data
        using files, not a database, unlike more popular platforms like wordpress.
    @endcomponent

    @component('p')
        After many years of coding and using web applications, I found there is one thing I should try
        as much as possible:
        <span class="font-bold">avoiding complexity</span>.
    @endcomponent

    @component('p')
        The database can sometimes be a complexity to avoid, for example when building a blog when the
        author is a coder. Why avoid the database? Because it adds complexity. Agreed, it might sound like a very
        basic dependency, because we are probably so much used to it.
    @endcomponent

    @component('p')
        But, if we give a moment to think about it, we can argue that a blog is simpler without it. Because
        it is better without a db server to maintain, backend forms for editing content, users and permissions,
        an authentication system and sending emails to reset user passwords. All these requirements
        come together with the database.
    @endcomponent

    @component('p')
        That's why I decided to build this blog without a database. It is
        <a href="https://github.com/dimsav/dimsav-blog">open source</a> so you can see how blog posts
        are written.
        It doesn't use any db because it doesn't need one.
    @endcomponent

    @component('p')
        Every time I want to edit a text, it is easier for me to edit the html code.
        So I just edit it, commit, push and it's live. Using this approach I avoid the
        need for building a whole cms, because the content (and truth) lies in the code.
    @endcomponent

    @component('p')
        So, can the database be avoided?
    @endcomponent

@endsection
