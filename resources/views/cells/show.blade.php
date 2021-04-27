<x-html>
    <h1><a href="{{route('trays.show',$cell->tray)}}">{{$cell->tray->name}}</a>: {{$cell->address}}</h1>

    @if($cell->plant)
        <h2><a href="{{route('plants.show',$cell->plant)}}">{{$cell->plant->name}}</a></h2>
        <p>{{$cell->plant->description}}</p>
        <form method="POST" action="{{route('cell.plant.delete',$cell)}}">
            @csrf
            @method('DELETE')
            <button>Remove Plant</button>
        </form>
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
</x-html>
