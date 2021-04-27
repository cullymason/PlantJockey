<x-html>
    <header>
        <span class="text-gray-600 text-xs uppercase tracking-wide leading-tight">Plant</span>
        <h1 class="text-gray-900 mb-4 text-2xl leading-tight">{{$plant->name}}</h1>
    </header>
    <main>
        <span class="text-gray-600 text-xs uppercase tracking-wide">Description</span>
        <p class="py-2">{{$plant->description}}</p>
    </main>
    <a class="bg-gray-600 mt-6 px-4 py-2 rounded text-gray-100" href="{{route('plants.edit', $plant)}}">Edit</a>
</x-html>
