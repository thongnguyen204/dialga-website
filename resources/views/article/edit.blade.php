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
    <form class="w-xs" method="POST" action="{{ route('articles.update', $article)}}">
        @csrf
        @method('PUT')
        <!-- Title -->
        <div class="relative z-0 w-full mb-5 group">
            <label for="title" class="">Title</label>
            <input type="title" name="title" id="title" class="block  w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$article->title}}" required />
        </div>
        <!-- Content -->
        <div class="relative z-0 w-full mb-5 group">
            <label for="content" class="">Content</label>
            <input type="content" name="content" id="content" class="block  w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$article->body}}" required />
        </div>
        <!-- Button -->
        <div class="flex justify-center">
            <button type="submit" class="text-white cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
        </div>
    </form>
</body>
</html>
