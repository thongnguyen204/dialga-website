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
    <a href="{{ route('articles.create') }}">Create article</a>
    @foreach ($articles as $article)
    <p>
        <a href="{{ route('articles.show',$article) }}">{{$article->title}}</a>
    </p>
    @endforeach
</body>
</html>
