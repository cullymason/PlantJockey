<x-main-layout class="font-sans">
    <h1 class="text-gray-900 mb-4 text-2xl">Trays</h1>
    <div class="flex">
        <ul class="flex-auto divide-y">
            @forelse($trays as $tray)
                @can('view',$tray)
                <li class="py-1 px-2 mb-2 flex flex-col">
                    <a class="text-gray-700 font-medium" href="{{route('trays.show', $tray)}}">{{$tray->name}}</a>
                    <span class="text-gray-500 text-sm">{{$tray->rows}}&times;{{$tray->columns}}</span>
                </li>
                @endcan
            @empty
                <p class="text-gray-300 text-xl tracking-wide p-6 font-medium">There are no trays</p>
            @endforelse
        </ul>
        @can('create',\App\Models\Tray::class)
        <form class="w-1/4 bg-gray-100 px-4 py-4 rounded-lg" method="POST" action="{{route('trays.store')}}">
            @csrf

            <div class="flex flex-col mb-2">
                <label class="text-gray-700 font-medium" for="name">Name</label>
                <input class="p-2 shadow-inner border" id="name" name="name" type="text" placeholder="{{\App\Models\Tray::defaultTrayName()}}" />
                <span class="text-sm px-2 py-1 italic text-gray-500">Default is {{\App\Models\Tray::defaultTrayName()}}</span>
            </div>

            <div class="flex flex-col mb-2">
                <label class="text-gray-700 font-medium" for="rows">Number of Rows</label>
                <input class="p-2 shadow-inner border" type="number" id="rows" name="rows" min="1" value="1">
                <small class="text-sm px-2 py-1 italic text-gray-500">Default is 1</small>
            </div>

            <div class="flex flex-col mb-2">
                <label class="text-gray-700 font-medium" for="rows">Number of Columns</label>
                <input class="p-2 shadow-inner border" type="number" id="columns" name="columns" min="1" value="1">
                <small class="text-sm px-2 py-1 italic text-gray-500">Default is 1</small>
            </div>

            <button class="bg-gray-600 px-2 py-1 rounded text-gray-100">Create Tray</button>
        </form>
        @endif
    </div>
</x-main-layout>
