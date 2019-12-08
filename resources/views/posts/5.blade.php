@extends('layouts.post')

@section('post-content')

    @component('p')
        After creating my first
        <a href="https://github.com/dimsav/laravel-translatable">laravel package</a>
        last week, I discovered a tip I wanted to share with you.
    @endcomponent

    @component('p')
        If you have write access to a composer package repository, you have the possibility to
        continue its development while it is installed as requirement in another project.
        Let's see how we can accomplish this.
    @endcomponent

    @component('h2')
        Let's do it!
    @endcomponent

    @component('p')
        First, you have to make sure the package is not installed yet. If it is, remove it from
        the @component('inline-code') composer.json @endcomponent file and run
        @component('inline-code') composer update @endcomponent to uninstall it.
    @endcomponent

    @component('p')
        Then, add it to @component('inline-code') composer.json @endcomponent and run
        @component('inline-code') composer update @endcomponent using the following
        option.
    @endcomponent

    @component('code')
        $ composer update --prefer-source
    @endcomponent

    @component('h2')
        Done!
    @endcomponent

    @component('p')
        The composer option @component('inline-code') --prefer-source @endcomponent is cloning
        the package's git repository inside the vendor directory. To see your repository changes,
        or commit, simply chdir to the package's root directory:
    @endcomponent

@component('code')
$ cd vendor/author/package-name
$ git status
@endcomponent

    @component('h2')
        Pushing to the right remote
    @endcomponent

    @component('p')
    Now, if you try to list the available remote repositories, you will notice that there are
    two of them: composer and origin. So if you want to push something, make sure you
    push to origin.
    @endcomponent

@component('code')
$ git remote
composer
origin
$ git push origin development
@endcomponent

    @component('h2')
    A PhpStorm tip
    @endcomponent

    @component('p')
    If you use PhpStorm while coding, you are probably working with its awesome git client.
    In this case you will notice that changes you do to your composer package will not
    be shown in your project's diff list. Of course they won't, those changes
    belong to a different repository.
    @endcomponent

    @component('p')
        <img alt="Phpstorm's git client is not able to check two repositories simultaneously"
             src="/blog-img/5-1.jpg" />
    @endcomponent
    @component('p')
        Phpstorm's git client is not able to check two repositories simultaneously
    @endcomponent

    @component('p')
        Here is what I do in this case: I just open a second PhpStorm project (File -> Open)
        and select as directory the root of the package, that is the directory containing
        your package's composer.json file.
    @endcomponent

    @component('p')
        That's it! Happy coding!
    @endcomponent

@endsection
