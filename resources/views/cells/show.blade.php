<x-main-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-4">
            <li>
                <div>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <!-- Heroicon name: solid/home -->
                        <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span class="sr-only">Home</span>
                    </a>
                </div>
            </li>

            <li>
                <div class="flex items-center">
                    <!-- Heroicon name: solid/chevron-right -->
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{route('trays.index')}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Trays</a>
                </div>
            </li>

            <li>
                <div class="flex items-center">
                    <!-- Heroicon name: solid/chevron-right -->
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{route('trays.show',$cell->tray)}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">{{$cell->tray->name}}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <!-- Heroicon name: solid/chevron-right -->
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{route('cells.show',$cell)}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">{{$cell->address}}</a>
                </div>
            </li>
        </ol>
    </nav>


    @if($cell->plant)
        <div class="flex mt-6">
            <div class="flex-auto">
                <h2 class="text-2xl"><a href="{{route('plants.show',$cell->plant)}}">{{$cell->plant->name}}</a></h2>
                <p>{{$cell->plant->description}}</p>

                @if($cell->germinated_on)
                    <h3 class="font-medium text-gray-700">Germination Time</h3>
                    <span class="text-gray-600">{{$cell->germinationTime}} Days</span>
                @endif
                <div class="flex mt-6">
                    <form class="mr-2" method="POST" action="{{route('cell.plant.delete',$cell)}}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-gray-400 px-4 py-2">Remove Plant</button>
                    </form>
                    <form method="POST" action="{{route('cell.plant.delete',$cell)}}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-gray-400 px-4 py-2">Transplant Plant</button>
                    </form>
                </div>
            </div>
            <div class="w-1/4">
                <x-form method="PUT" class="space-y-3" action="{{route('cells.update',$cell)}}">
                    <h3 class="text-lg text-gray-800">Events</h3>
                    <div class="flex flex-col">
                        <label class=" font-medium text-sm text-gray-500" for="planted_on">Planted</label>
                        <x-pikaday name="planted_on" class="px-4 py-3 rounded border-gray-300 placeholder-gray-300 shadow-inner" placeholder="MM/DD/YYYY" format="MM/DD/YYYY" value="{{optional($cell->planted_on)->format('m/d/y')}}"   />
                        <x-error field="planted_on" class="text-red-500" />
                    </div>
                    <div class="flex flex-col">
                        <label class=" font-medium text-sm text-gray-500" for="germinated_on">Germinated</label>
                        <x-pikaday  class="px-4 py-3 placeholder-gray-300 rounded border-gray-300 shadow-inner" placeholder="MM/DD/YYYY" format="MM/DD/YYYY" value="{{optional($cell->germinated_on)->format('m/d/Y')}}" name="germinated_on"  />
                        <x-error field="germinated_on" class="text-red-500" />
                    </div>
                    <div class="flex flex-col">
                        <label class=" font-medium text-sm text-gray-500" for="flowered_on">Flowered</label>
                        <x-pikaday  class="px-4 py-3 placeholder-gray-300 rounded border-gray-300 shadow-inner" placeholder="MM/DD/YYYY" format="MM/DD/YYYY" value="{{optional($cell->flowered_on)->format('m/d/Y')}}" name="flowered_on"  />
                        <x-error field="flowered_on" class="text-red-500" />
                    </div>
                    <button class="bg-gray-400 rounded text-gray-50 px-4 py-2" type="submit">Update</button>
                </x-form>
            </div>
        </div>
    @else
        <form method="POST" action="{{route('cell.plant.create',$cell)}}">
            @csrf
            <select name="plant_id" id="plant_id">
                @foreach($plants as $plant)
                    <option value="{{$plant->id}}">{{$plant->name}}</option>
                @endforeach
            </select>

            <button type="submit">Attach Plant</button>
        </form>
    @endif
</x-main-layout>
