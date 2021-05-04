<x-html>
    <x-slot name="head">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles
        @bukStyles(true)
    </x-slot>
    <x-main-nav />
    <div class="container bg-gradient-to-b from-gray-50 to-white mx-auto shadow-lg p-6 rounded-lg mt-6">
        {{$slot}}
    </div>
    @livewireScripts
    @bukScripts(true)
</x-html>
