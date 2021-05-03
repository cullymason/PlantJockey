<x-main-layout>
    <span class="text-gray-600 text-xs uppercase tracking-wide leading-tight">Tray</span>
    <h1 class="text-gray-900 mb-4 text-2xl leading-tight"> {{$tray->name}}</h1>

    <div class="flex">
        <div class="flex-auto">
            <table class="">
                @for ($i = 0; $i <= $tray->rows; $i++)
                    <tr>
                        @foreach($tray->cells()->where('row',$i)->get() as $cell)
                            <td>
                                <a href="{{route('cells.show',$cell)}}"  class="inline-flex flex-col h-24 w-24 @if($cell->plant) bg-gray-200 @else bg-gray-100 @endif">
                                    <div class="flex">
                                        <span class="font-bold uppercase text-xs bg-gray-200 text-gray-500 rounded-br p-1">{{$cell->address}}</span>
                                    </div>
                                    <div class="flex-auto p-1 inline-flex items-center justify-center">
                                        @if($cell->plant)
                                            <span class="overflow-ellipsis text-center text-sm leading-4 uppercase font-bold text-gray-700">{{$cell->plant->name}}</span>
                                        @else
                                            <span class="text-gray-300 font-bold text-sm">EMPTY</span>
                                        @endif
                                    </div>
                                </a>
                            </td>
                        @endforeach
                    </tr>
                @endfor
            </table>
        </div>
        <div class="w-1/4">
            <div class="flex flex-col mb-4">
                <button class="py-2 border-2 rounded-lg mb-2 font-medium text-gray-700">Rename</button>
                <button class="py-2 border-2 rounded-lg mb-2 font-medium text-gray-700">Modify</button>
                <button class="py-2 border-2 rounded-lg mb-2 font-medium bg-gray-300 border-gray-400 text-gray-500">Delete</button>
            </div>
            <div>
                <h2 class="text-gray-600 text-xs uppercase tracking-wide leading-tight">Plants in this tray</h2>
                <ul class="divide-y">
                    @forelse($tray->plants as $plant)
                        <li class="flex py-2 items-center">
                            <div class="bg-gray-300 h-8 w-8 flex items-center justify-center rounded-lg mr-2">CR</div>
                            <div>{{$plant->name}}</div>
                        </li>
                    @empty
                        <p class="py-2 text-gray-400 font-bold text-sm">This tray is empty</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-main-layout>
