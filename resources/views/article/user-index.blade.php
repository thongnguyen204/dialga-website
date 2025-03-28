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
    <div class="flex justify-center mt-10 mx-1">
        <table class="table-auto border-collapse border border-gray-400 w-full">
            <thead>
                <tr>
                    <th class="border border-gray-400">Title</th>
                    <th class="border border-gray-400">Author</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <td class="border border-gray-400"><a href="{{ route('articles.show',$article) }}">{{$article->title}}</a></td>
                    <td class="border border-gray-400"><div class="flex justify-center">{{$article->user->name}}</div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
