<div class="bg-gray-50">
    <div class="container flex items-center mx-auto">
        <div class="flex-auto items-center flex">
            <div class="flex items-center py-4" id="logo">
                <x-entypo-leaf class="w-6 h-6 text-green-600" />
                <span class="font-heading font-black text-gray-900 text-xl">PlantJockey</span>
            </div>
            <nav>
                <x-nav-link :href="route('trays.index')" :active="request()->routeIs('trays.index')">
                    Trays
                </x-nav-link>
                <x-nav-link :href="route('plants.index')" :active="request()->routeIs('plants.index')">
                    Plants
                </x-nav-link>

            </nav>
        </div>
        <div>
            @if(auth()->check())
                <x-logout class="text-gray-500 py-1 px-2" />
            @else
                <a class="text-gray-500 py-1 px-2" href="{{route('login')}}">Login</a>
            @endif
        </div>
    </div>
</div>
