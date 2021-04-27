<x-html>
    <h1>Edit Plant</h1>
    <form method="POST" action="{{route('plants.update',$plant)}}">
        @method('put')
        @csrf
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="{{$plant->name}}" required aria-required="true" />

        <label for="rows">Description</label>
        <textarea rows="10" name="description" id="description">{{$plant->description}}</textarea>


        <button type="submit">Update Plant</button>
    </form>
</x-html>
