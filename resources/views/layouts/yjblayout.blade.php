<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YJBlog - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navigation')
    <div class="min-h-screen bg-white text-black">
        <h1 class="font-bold text-3xl">@yield('title')</h1>

        @if ($errors->any())
            <div>
                <ul class="text-red-500 font-bold">
                    @foreach ($errors->all() as $error)
                        <li>ERROR! {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            @yield('content')
        </div>
    </div>
</body>

</html>
