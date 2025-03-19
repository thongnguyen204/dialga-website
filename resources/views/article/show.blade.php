<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <x-layouts.navbar/>
    <p>{{$article->title}}</p>
    <p>{{$article->body}}</p>
    <a href="{{ route('articles.edit', $article) }}">Edit article</a>
    <form action=" {{route('articles.destroy',$article)}}" method="POST">
        @csrf
        @method('delete')
        <button class="" type="submit">Delete</button>
    </form>
</body>
</html>
