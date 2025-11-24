<x-app-layout>

    <body>
        <div style="color:white">
            <h1 style="font-size:50px">Posts</h1>
            <a href="{{ route('posts.create') }}">New Post</a>

            @foreach ($posts as $post)
                <div>
                    <h2 style="font-size:20px; color:red"><strong><a href="{{ route('post.show', ['id' => $post->id]) }}">
                                {{ $post->title }}</strong></a></h2>
                    <strong>
                        <button>Comment</button>
                        <button>Like</button>
                    </strong>
                </div>
            @endforeach
        </div>
    </body>
</x-app-layout>
