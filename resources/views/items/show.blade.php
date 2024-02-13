<x-layout title="Item">
    <main class="max-w-[1200px] my-4 mx-auto p-2 flex flex-col items-center gap-3">
        <img src="{{ $item->imagem_url }}" alt="{{ $item->name }}" class="w-96 h-96 object-cover rounded-lg">
        <i class="font-thin text-gray-500">Detalhes do produto</i>
        <div>
            <div class="flex justify-between mt-3">
                <h2 class="text-3xl">{{ $item->name }}</h2>
                <div class="flex gap-2">
                    @foreach($item->categories as $category)
                        <x-category-tag :name="$category->name" />
                    @endforeach
                </div>

            </div>
            <p class="text-xl">R$ {{ $item->preco }}</p>
            <p class="text-lg">Estoque: {{ $item->estoque }}</p>
            <p class="text-gray-600">{{ $item->descricao }}</p>
        </div>

    </main>
</x-layout>
