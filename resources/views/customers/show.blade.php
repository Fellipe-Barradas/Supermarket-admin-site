<x-layout title="Cliente">
    <main class="max-w-5xl my-4 mx-auto p-2 flex flex-col gap-3">
        <i class="font-thin text-gray-500 self-center">Customer details</i>
        <div class="flex flex-col gap-1">
            <div class="flex justify-between mt-3">
                <h2 class="text-3xl">{{ $customer->name }}</h2>
            </div>
            <p class="text-xl">{{ $customer->email }}</p>
            <p class="text-lg">{{ $customer->phone }}</p>
            <p class="text-gray-600">{{ $customer->address }}</p>
        </div>

        <div class="flex justify-between mt-4">
            @if(isset($sales))
                <p class="text-lg text-red-500">Nenhuma venda registrada</p>
            @else
            <div>
                <h1 class="text-2xl text-green-500">Vendas</h1>
                @foreach($sales as $sale)
                    <div class="flex gap-1 mt-1">
                        <p class="text-lg">R$ {{ $sale->value }}</p>
                        <p class="text-lg">em {{ $sale->quantity }} quantidades de</p>
                        <p class="text-lg">{{ $sale->item_name }}</p>
                    </div>
                @endforeach
            </div>
            @endif
            @if(isset($purchases))
                <p class="text-lg text-red-500">Nenhuma compra registrada</p>
            @else
            <div>
                <h1 class="text-2xl text-red-500">Compras</h1>
                @foreach($purchases as $purchase)
                    <div class="flex gap-1 mt-1">
                        <p class="text-lg">R$ {{ $purchase->value }}</p>
                        <p class="text-lg">em {{ $purchase->quantity }} quantidades de</p>
                        <p class="text-lg">{{ $purchase->item_name }}</p>
                    </div>
                @endforeach
            </div>
            @endif
        </div>

    </main>
</x-layout>
