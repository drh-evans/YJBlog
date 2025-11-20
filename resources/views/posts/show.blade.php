<x-app-layout>
    <div style="color: white;">
    <a href="{{ route('posts.index') }}">Back</a>
    <div style="display: grid; place-items: center;">
        <h1><strong>{{$post->title}} <br> By {{ $username[0] }} on {{ $post->created_at }} </strong></h1>
        <p>{{$post->body}}</p>
    </div>
    </div>
</x-app-layout>