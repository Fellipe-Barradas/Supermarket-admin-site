@if( session('success') )
    <div class="p-4 mt-3 mb-3 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
        <span class="font-medium text-black">{{ session('sucess') }}</span>
    </div>
@elseif( session('error') )
    <div class="p-4 mb-4 mt-3 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
        <span class="font-medium text-black">{{ session('error') }}</span>
    </div>
@endif
