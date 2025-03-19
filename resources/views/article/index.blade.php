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
    <div class="container flex justify-center">
        <!-- <div class="grid grid-cols-2 gap-x-4">
            @foreach ($articles as $article)
                <a href="{{ route('articles.show',$article) }}">{{$article->title}}</a>
                <div>{{$article->user->name}}</div>
            @endforeach
        </div> -->

        <table class="table-auto border-separate border-spacing-2 border border-gray-400">
            <thead>
                <tr>
                    <th class="border border-gray-300">Title</th>
                    <th class="border border-gray-300">Author</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <td class="border border-gray-300"><a href="{{ route('articles.show',$article) }}">{{$article->title}}</a></td>
                    <td class="border border-gray-300"><div>{{$article->user->name}}</div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
