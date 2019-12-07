<a class="relative block overlay-container w-full h-1/2-screen"
   href="{{ $blog_post->url }}">
    <div class="text-blue-100 h-full w-full absolute top-0 left-0 text-shadow z-40">
        <div class="flex flex-col items-start justify-center w-full h-full px-6">
            <div class="mb-2 text-4xl sm:text-5xl md:text-6xl font-bold"
            >{{ $blog_post->title }}
            </div>
            <div class="sm:text-lg md:text-xl mb-6">{{ $blog_post->published_ago }}</div>
        </div>
    </div>
    <div class="relative overlay h-full mx-auto bg-cover bg-center bg-no-repeat"
         style="background-image: url({{ $blog_post->image_url }});"
    ></div>
</a>