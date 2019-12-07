{{ route('home') }}
@foreach(App\BlogPost::published() as $post)
{{ route('blog-post', $post->slug) }}
@endforeach