{{ route('home') }}
@foreach(App\BlogPostRepo::published() as $post)
{{ route('blog-post', $post->slug) }}
@endforeach