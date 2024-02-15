@if( session('success') )
    <div x-data="{ open: true }" x-show="open" class="absolute top-6 z-10 right-1/4w-1/2 flex justify-between items-center p-4 mt-3 mb-3 text-sm text-green-800 rounded-lg bg-green-500" role="alert">
        <span class="font-medium text-black text-center">{{ session('success') }}</span>
        <button @click="open = false" type="button" class="border w-fit h-fit border-gray-900 rounded-full" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-black p-1.5">&times;</span>
        </button>
    </div>
@elseif( session('error') )
    <div x-data="{ open: true }" x-show="open" class="flex justify-around items-center p-4 mb-4 mt-3 text-sm text-red-800 rounded-lg bg-red-500" role="alert">
        <span class="font-medium text-black">{{ session('error') }}</span>
        <button type="button" @click="open = false" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-black">&times;</span>
        </button>
    </div>
@endif
