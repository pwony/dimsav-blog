@extends('layouts.post')

@section('post-content')

    @component('h2')
        The problem
    @endcomponent

    @component('p')
        Recently I worked on upgrading a legacy Laravel v4.2 to a newer version of Laravel. The site stored user uploaded pictures, which where stored locally on the app's public folder.
    @endcomponent

    @component('p')
        Now, I didn't like the fact that those pictures where stored locally because if the server went down the picture files would go down as well. Therefore deploying to a new server would require the hassle of manually restoring the pictures from a backup.
    @endcomponent

    @component('p')
        I was thinking to upload all images to S3 and serve them from there, but on the other hand I didn't want to get additionally charged from AWS S3 for the pictures bandwidth.
    @endcomponent

    @component('p')
        How could I get a local cache of those pictures? Here is the solution that worked for my case.
    @endcomponent

    @component('h2')
        The solution
    @endcomponent

    @component('p')
        Here is how the problem was solved in 4 steps.
    @endcomponent

    @component('h3')
        1. Put all pictures under a single folder using unique random names
    @endcomponent

    @component('p')
        By using uuid v4 as file names, it was possible to put all pictures into a folder without worrying about conflicts when adding new files.
    @endcomponent

    @component('h3')
        2. Upload pictures in S3.
    @endcomponent

    @component('p')
        Then I uploaded all images in an S3 bucket. If the server was gone, S3 would still be the primary data source.
    @endcomponent

    @component('h3')
        3. Link all images to your server
    @endcomponent

    @component('p')
        The urls of all images were pointing to a specific directory on the server like
        @component('inline-code') example.com/pictures/{picture_file} @endcomponent.
    @endcomponent

    @component('h3')
        4. Create the route
    @endcomponent

    @component('p')
        How did the server handle the request for let's say
        @component('inline-code') example.com/pictures/image_1.jpg? @endcomponent
    @endcomponent

    @component('p')
        The first time the server receives a request for this a file, the file is not on the server, so it hits laravel. We handle the request by using the following route:
    @endcomponent

    @component('partials.code')
    Route::get("/pictures/{filename}", function ($filename) {
    // Load image from S3
    $f = Storage::disk('s3-pictures')->get('pictures-path/'.$filename);
    // If found, store it locally
    Storage::disk('public')->put('pictures/'.$filename, $f);
    // Tell the browser to try again
    return redirect(url("/pictures/{$filename}"));
});
    @endcomponent

    @component('p')
        The beauty of this is that every time we receive a request for an image that is already downloaded locally, nginx serves directly the picture without going through php.
    @endcomponent

    @component('p')
        On the other side, if the picture is missing, we download it and redirect to the same url.
    @endcomponent

    @component('h2')
        Conclusion
    @endcomponent

    @component('p')
        Of course this is not a perfect solution, as it is not going to work for all scenarios. However for small apps it offers the convenience to deploy an app locally or somewhere else without having to worry about dynamically uploaded pictures which shouldn't be in your version control system.
    @endcomponent

    @component('p')
        Finally, by importing the database to a dev environment, this reduces the pain of running a local version of the app for development/debugging while serving the images from the web server.
    @endcomponent

@endsection
