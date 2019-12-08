@extends('layouts.post')

@section('post-content')

    @component('p')First things first.@endcomponent

    @component('h2')
        Installing dusk into laravel
    @endcomponent

    @component('p')In our laravel application we follow the first steps as shown in the
        <a href="https://laravel.com/docs/5.4/dusk#introduction">official documentation</a>. So we
       add the laravel dusk composer dependency:
    @endcomponent

    @component('code')
    composer require laravel/dusk
    @endcomponent

    @component('p')Then, we add the service provider in our AppServiceProvider:@endcomponent

    @component('code')
use Laravel\Dusk\DuskServiceProvider;

/**
 * Register any application services.
 *
 * @return void
 */
public function register()
{
    if ($this-&gt;app-&gt;environment(&#39;local&#39;, &#39;testing&#39;)) {
        $this-&gt;app-&gt;register(DuskServiceProvider::class);
    }
}
    @endcomponent

    @component('p')And finally, we run the `dusk:install` Artisan command:@endcomponent

    @component('code')
php artisan dusk:install
    @endcomponent

    @component('p')Ok. Nothing new so far.@endcomponent

    @component('h2')
        Installing docker with docker compose
    @endcomponent

    @component('p')I&#39;m not going to describe how to install docker on your machine because it differs for
       every operating system. It&#39;s best to follow the official instructions from docker &nbsp;[Docker
       - Build, Ship, and Run Any App, Anywhere](https://www.docker.com/).@endcomponent

    @component('p')You know you&#39;re ready when the following command shows the version of docker-compose:@endcomponent

    @component('code')
$ docker-compose -v
docker-compose version 1.11.2, build dfed245
    @endcomponent

    @component('p')Now that docker and docker-compose are properly setup, we go to the next step.@endcomponent

    @component('h2')
        The docker-compose file
    @endcomponent

    @component('p')Let&#39;s make a new `ci` directory under our project rood folder and put a new file named
       `selenium-docker-compose.yml` in it.@endcomponent

    @component('p')The contents of this yml file should be:@endcomponent

    @component('code')
version: &#39;2&#39;
services:

  dusk_tests:
    image: php:7.1.1-cli
    command: tail -f /dev/null
    volumes:
      - ../:/usr/src/myapp
    links:
      - selenium

  selenium:
    image: selenium/standalone-chrome:3.0.1-fermium
    @endcomponent

    @component('p')Here we define two docker instances we will use.@endcomponent

    @component('code')
dusk_tests:
image: php:7.1.1-cli
    @endcomponent

    @component('p')First we have a `dusk_tests`. This is a machine with php-cli installed. We will run `php
       artisan dusk` from within this machine.&nbsp;@endcomponent

    @component('code')
    command: tail -f /dev/null
    @endcomponent

    @component('p')This skips the default command of the php instance.@endcomponent

    @component('code')
    volumes:
      - ../:/usr/src/myapp
    @endcomponent

    @component('p')Here we &quot;symlink&quot; the root folder `../` of the app in our file system with the path
       `/usr/src/myapp` of the php instance.@endcomponent


    @component('code')
    links:
      - selenium
    @endcomponent

    @component('p')This creates a private network between the php instance and the selenium instance we define
       below. This means that we can call the url `http://selenium` or `http://selenium:80` from
       within the php instance and reach the port 80 of the selenium instance. Pretty handy.@endcomponent


    @component('code')
  selenium:
    image: selenium/standalone-chrome:3.0.1-fermium
    @endcomponent

    @component('p')What we do here is we define the selenium docker instance that uses an official selenium
       image with the Chrome.&nbsp;@endcomponent

    @component('p')We&#39;re almost there. The next step is to ...@endcomponent

    @component('h2')
        Setup Laravel Dusk to use our selenium instance
    @endcomponent

    @component('p')Open the file `tests/DuskTestCase.php` and update the `driver()` method to look like
       this:@endcomponent

    @component('code')
protected function driver()
{
    return RemoteWebDriver::create(
        &#39;http://selenium:4444/wd/hub&#39;, DesiredCapabilities::chrome()
    );
}
    @endcomponent

    @component('p')Have you noticed the change? We essentially tell dusk to use the port 4444 of the selenium
       instance.@endcomponent

    @component('p')Last step.@endcomponent

    @component('h2')
        Our first test
    @endcomponent

    @component('p')At this final step we will be creative. Go to the DustTestCase and add the following
       method:@endcomponent

@component('code')
protected function baseUrl()
{
    return &#39;https://google.com&#39;;
}
@endcomponent

    @component('p')Yes, you guessed right. We will write a test using the Google&#39;s site.@endcomponent

    @component('p')Now go to the &#39;Browser/ExampleTest.php&#39; and assert we see the text &quot;Google&quot;
       at google&#39;s home page.&nbsp;@endcomponent

@component('code')
public function testBasicExample()
{
    $this-&gt;browse(function (Browser $browser) {
        $browser-&gt;visit(&#39;/&#39;)
                -&gt;assertSee(&#39;Google&#39;);
    });
}
@endcomponent

    @component('p')Let&#39;s run our tests. From the root path of your app, run the following command:@endcomponent

@component('code')
$ docker-compose -f ci/selenium-docker-compose.yml run dusk_tests bash -c &#39;cd /usr/src/myapp &amp;&amp; php artisan dusk&#39;
@endcomponent

    @component('p')Let&#39;s explain:@endcomponent

@component('code')
-f ci/selenium-docker-compose.yml
@endcomponent

    @component('p')Here we tell compose to use the file we created.@endcomponent

@component('code')
run dusk_tests bash -c &#39;cd /usr/src/myapp &amp;&amp; php artisan dusk&#39;
@endcomponent

    @component('p')This runs a bash command in the instance `dusk_tests`. This bash command navigates to the app
       directory and runs `artisan dusk`.@endcomponent

    @component('p')Did you run the command?@endcomponent

    @component('p')What a nice image:@endcomponent

    @component('p')
        <img alt="" src="/blog-img/3-1.png" />
    @endcomponent

    @component('p')Alright I lied. This is the next step.@endcomponent

    @component('h2')
        Make the tests fail
    @endcomponent

    @component('p')I wanted to show you a nice way of debugging when things go wrong.&nbsp;@endcomponent

    @component('p')Go ahead and change the assertion in the test to something like:@endcomponent

@component('code')
-&gt;assertSee(&#39;Moogle&#39;)
@endcomponent

    @component('p')Of course the tests will file (I hope!).@endcomponent

    @component('p')
        <img alt="" src="/blog-img/3-2.png" />
    @endcomponent

    @component('p')What I really like about dusk is that it takes a screenshot of the browser when the tests
       fail. Go check the folder under `/tests/Browser/screenshots`.@endcomponent

    @component('p')
        <img alt="" src="/blog-img/3-3.png" />
    @endcomponent

    @component('p')That&#39;s it folks.@endcomponent

    @component('p')I hope you enjoyed! Have fun!@endcomponent
@endsection
