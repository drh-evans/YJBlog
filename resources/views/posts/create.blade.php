<x-app-layout>
    <form method="POST" action="{{ route("posts.store") }}">
        @csrf
        <p>Title: <input type="text" name="title"></p>
        <p>Body: <input type="text" name="body"></p>
        <input type="submit" value="submit">
        <a href="{{ route("posts.index") }}"> Cancel </a>
    </form>
</x-app-layout>
