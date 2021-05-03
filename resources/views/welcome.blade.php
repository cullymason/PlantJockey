<x-html title="PlantJockey.com - Track your Garden">
    <x-slot name="head">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </x-slot>
    <div class="flex flex-col max-w-xl p-4 mx-auto">
        <h1 class="flex items-center my-12">
            <span>
                <x-entypo-leaf class="w-16 text-green-600" />
            </span>
            <span class="font-heading font-black text-gray-700 transform -translate-x-2 text-4xl">PlantJockey</span>
        </h1>

        <main class="space-y-5">
            <h2 class="font-sans font-bold text-gray-700 tracking-wide text-xl">What is this?</h2>
            <p class="font-sans text-gray-900 text-lg max-w-xl">A goal of mine for 2021 is to create the tools to solve my own problems. There is almost certainly already an App that does the same thing and most likely better. However, I want to spend this year learning new tech stacks and approaches.</p>
            <p class="font-sans text-gray-900 text-lg max-w-xl">I suppose that's more <span>why</span> and not <span>what</span> this is. Plant Jockey is a tool to help me track my garden from seed through bearing fruit. </p>
            <h2 class="font-sans font-bold text-gray-700 tracking-wide text-xl">What can it do?</h2>
            <p class="font-sans text-gray-900 text-lg max-w-xl">
                Honestly, not much. I'm adding features as I need them and fixing bugs as I come across them. As of right now, you can create a grid and place plants in them. More to come
            </p>
            <h2 class="font-sans font-bold text-gray-700 tracking-wide text-xl">Any goals?</h2>
            <p class="font-sans text-gray-900 text-lg max-w-xl">
                Sure! First goal is to use this until some of the plants bear fruit. Second, I really want to develop in the YAGNI mindset in that I am only going to add things as I need it and try not to spend too much time thinking about "what if..."
            </p>
            <h2 class="font-sans font-bold text-gray-700 tracking-wide text-xl">Can I try it?</h2>
            <p class="font-sans text-gray-900 text-lg max-w-xl">
                Yes you can, you brave soul. Like I said above, this is very much a work in progress. The design is <span class="italic">rough</span> and the features are sparse. However, I do plan on using this thoroughly so I will try to introduce as few breaking changes as possible and plan to add a good bit of features as needed.
            </p>
            <h2 class="font-sans font-bold text-gray-700 tracking-wide text-xl">I have an idea...</h2>
            <p class="font-sans text-gray-900 text-lg max-w-xl">
                While I did build this for me, I'd love to hear from you. I can't promise anything, but if it makes sense, I will give it a shot. Just shoot me an email, cully@hey.com
            </p>
            <p>Feel free to <a class="font-medium underline" href="{{route('register')}}">register</a> and then <a class="font-medium underline" href="{{route('login')}}">login</a>.</p>
        </main>
        <footer class="my-6 max-w-xl flex justify-center">
                <span class="font-hand text-5xl mb-9 transform text-green-900 -translate-x-5 translate-y-6 -rotate-12">Cully</span>
        </footer>
    </div>
</x-html>
