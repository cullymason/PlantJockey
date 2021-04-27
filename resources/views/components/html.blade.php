@props(['title' => 'SeedsGrid'])
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>{{$title}}</title>
    <meta name="description" content="SeedsGrid">
    <meta name="author" content="Cully Mason">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{$head ?? ''}}
</head>

<body>
    <x-main-nav />
    <div class="container bg-gradient-to-b from-gray-50 to-white mx-auto shadow-lg p-6 rounded-lg mt-6">
        {{$slot}}
    </div>
    {{$footer ?? ''}}
</body>
</html>
