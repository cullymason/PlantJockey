<x-html>
    <h1 class="text-gray-900 mb-4 text-2xl">Plants</h1>
    <div class="flex">
        <ul class="flex-auto divide-y">
            @forelse($plants as $plant)
                <li class="py-1 px-2 mb-2 flex flex-col"><a class="text-gray-700 font-medium" href="{{route('plants.show', $plant)}}">{{$plant->name}}</a></li>
            @empty
                <p>There are no plants</p>
            @endforelse
        </ul>
        <form class="w-1/4 bg-gray-100 px-4 py-4 rounded-lg" method="POST" action="{{route('plants.store')}}">
            @csrf
            <div  class="flex flex-col mb-2">
                <label for="name">Name</label>
                <input class="p-2 shadow-inner border" id="name" name="name" type="text" required aria-required="true" />
            </div>

            <div class="flex flex-col mb-2">
                <label for="rows">Description</label>
                <textarea class="p-2 shadow-inner border" rows="10" name="description" id="description"></textarea>
            </div>


            <button class="bg-gray-600 px-2 py-1 rounded text-gray-100" type="submit">Add Plant</button>
        </form>
    </div>
</x-html>
