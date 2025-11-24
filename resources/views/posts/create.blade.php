<x-app-layout>

    @if ($errors->any())
        <div>
            <ul style="color: red">
                @foreach ($errors->all() as $error)
                    <li><strong>ERROR! </strong>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="content-center">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <p>Title: <input type="text" name="title" value="{{ old('title') }}"></p>
            <p>Body: <input type="text" name="body" value="{{ old('body') }}"></p>
            <p>Image: <input type="file" name="image"></p>

            <input type="submit" value="Submit">
            <a href="{{ route('posts.index') }}"> Cancel </a>
        </form>
    </div>
</x-app-layout>
