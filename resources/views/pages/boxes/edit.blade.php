<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('SHKOLO | Boxes - Edit') }}
        </h2>
    </x-slot>

    <div class="p-12 w-full border-gray-300 flex justify-center">
        <div class="w-[400px]">
            <form method="POST" action="{{ route('box.update', [ 'box' => $box->id ]) }}">
                @csrf
                @method('put')

                <!-- Title -->
                <div class="w-full">
                    <div class="grid grid-cols-6 gap-4 items-center">
                        <x-input-label for="title" class="col-span-1" :value="__('Title')"/>
                        <x-text-input id="title" class="block mt-1 col-span-5" type="text" name="title"
                                      :value="old('title') ?? $box->title"
                                      required autofocus autocomplete="box_title"/>
                    </div>
                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                </div>


                <!-- Url -->
                <div class="w-full">
                    <div class="grid grid-cols-6 gap-4 items-center">
                        <x-input-label for="url" class="col-span-1" :value="__('Url')"/>
                        <x-text-input id="url" class="block mt-1 col-span-5" type="url" name="url"
                                      :value="old('url') ?? $box->url"
                                      required autofocus autocomplete="box_url"/>
                    </div>
                    <x-input-error :messages="$errors->get('url')" class="mt-2"/>
                </div>

                <!-- Colors -->
                <div class="w-full">
                    <div class="grid grid-cols-6 gap-4 items-center">
                        <x-input-label for="color" class="col-span-1" :value="__('Color')"/>

                        <select id="countries" name="color" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-xs block mt-1 col-span-5">
                            <option selected>Choose a Color</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->value }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('color')" class="mt-2 w-full"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3 bg-blue-600">
                        {{ __('Edit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
