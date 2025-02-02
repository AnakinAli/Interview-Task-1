<div data-edit="{{ $editUrl }}" data-url="{{ $url }}"
     class="boxClick hover:scale-90 duration-500  stroke-white  border-2 border-gray-500  w-full h-full">
    <h2 class="text-center font-bold text-2xl">Title: {{ $title }}</h2>
    <div class="flex justify-center items-center h-64 lg:h-[200px]">
        @if($isRed())
            <svg class="w-[96px] h-[96px] stroke-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                 height="24" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
        @elseif($isBlue())
            <svg class="w-[96px] h-[96px] stroke-green-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
        @elseif($isGreen())
            <svg class="w-[96px] h-[96px] stroke-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
        @else
            <svg class="w-[96px] h-[96px] stroke-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
        @endif
    </div>
</div>
