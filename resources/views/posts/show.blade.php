<x-app-layout>
    <div style="color: white;">
        <a href="{{ route('posts.index') }}">Back</a>
        <div style="display: grid; place-items: center;">
            <h1><strong>{{ $post->title }} <br> By {{ $username[0] }} on {{ $post->created_at }} </strong></h1>
            <p>{{ $post->body }}</p>
            <p>
                @if ($post->post_url)
                    <img src="{{ asset('storage/' . $post->post_url) }}" alt="{{ $post->title }}" width="400">
                @endif
            </p>

            <a href="{{ route('post.edit', $post->id) }}"> Edit Post</a>
        </div>
    </div>
</x-app-layout>
