@extends('layouts.post')

@section('post-content')

    @component('p')
        <a href="https://envoyer.io/">Laravel
                                      Envoyer</a> is a great tool that reduces the pain from automating the deployments of your projects.
        According their marketing page they offer "Zero Downtime PHP Deployment".
    @endcomponent

    @component('h2')
        How is zero downtime achieved?
    @endcomponent

    @component('p')
        Similar to the open source <a href="https://deployer.org/">Deployer</a>,
        Envoyer is stores new builds inside new and separate release folders.
    @endcomponent

    @component('p')
        After running all the commands needed for creating the new build
        (like composer install, artisan migrate etc), the new build is ready to release.

        Envoyer then creates a symlink linking the nginx public root to the new release directory.
    @endcomponent

    @component('p')
        In this sense, it's a zero downtime deployment because the creation of a symlink is almost instant.
        However there is a catch.
    @endcomponent


    @component('h2')
        The problem
    @endcomponent

    @component('p')
        I noticed that during the deployment process some http requests failed.
    @endcomponent

    @component('p')
        Occasionally, the server responded with an unfriendly error page, because nginx was not able to handle
        the request.
    @endcomponent

    @component('p')
        I also confirmed the errors by looking into the nginx error log. This was the error in
        <span class="text-gray-600">/var/log/nginx/site-error.log</span>.
    @endcomponent

    @component('code')
        2020/08/18 09:02:57 [error] 6383
#6383: *10527974 recv() failed
(104: Connection reset by peer) while reading response header
from upstream, client: 2.84.198.47, server: metabook.gr,
request: "GET / HTTP/2.0",
upstream: "fastcgi://unix:/var/run/php/php7.2-fpm.sock:",
host: "metabook.gr"
    @endcomponent

    @component('p')
        The cause of these errors was that after every deployment, Envoyer was configured to reload
        php-fpm in order to reset the php cache (opcache).
    @endcomponent

    @component('p')
        Although the downtime was small, it was still a pain in the ass because we wanted
        truly zero downtime deployments and offer an excellent user experience to our users.
    @endcomponent

    @component('p')
        Because of this small downtime, we were conservative
        with the number of deploys per day. For example we avoided deployments during high server
        load for example and this was creating bottlenecks in our product development process.
    @endcomponent

    @component('h2')
        The solution
    @endcomponent

    @component('p')
        Luckily, reloading php-fpm is not the only way to reset the opcache. There is a php
        function <a href="https://www.php.net/manual/en/function.opcache-reset.php" class="">opcache_reset()</a> that resets the cache but there is a catch:
        This function has to be executed from the php-fpm process (nginx) and not the command line.
    @endcomponent

    @component('p')
        This means that if you just run the function inside artisan, it
        <a href="https://www.php.net/manual/en/function.opcache-reset.php#117957">won't work</a>.
    @endcomponent

    @component('p')
        However thanks to the open source <a href="https://gordalina.github.io/cachetool/">Cachetool</a> command, we are able to reset the cache from the command line!
        I presume this tool makes an http call behind the scenes that resets the opcache.
    @endcomponent

    @component('h2')
        How to install CacheTool
    @endcomponent

    @component('p')
        We can create the following script and execute it once on our web server:
    @endcomponent

    @component('code')
# download cachetool.phar
curl -sLO https://github.com/gordalina/cachetool/releases/latest/download/cachetool.phar

# make it executable
chmod +x cachetool.phar

# make it globally available
mv cachetool.phar /usr/local/bin/

# To execute for php-fpm, run
# cachetool.phar opcache:reset
    @endcomponent

    @component('p')
        After installing, we execute as final step the command below to reset the opcache inside our deployment process.
    @endcomponent

    @component('code')
        cachetool.phar opcache:reset
    @endcomponent

    @component('p')
        Also, do not forget to stop the execution of php-fpm reload causing the downtime!
    @endcomponent

    @component('h2')
        That's it!
    @endcomponent

    @component('p')
        That's how we converted an "Almost zero downtime deployment" to a Truly zero downtime deployment with PHP!
    @endcomponent

@endsection
