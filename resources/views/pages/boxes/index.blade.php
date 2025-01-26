<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="p-12 w-full flex justify-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
            @foreach($boxes as $box)
                <x-box-component :id="$box['id']" :title="$box['title']" :url="$box['url']" :color="$box['color']"/>
            @endforeach
        </div>
    </div>
</x-app-layout>
