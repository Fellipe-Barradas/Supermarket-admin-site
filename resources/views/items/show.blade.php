<x-layout title="Item">
    <main class="max-w-2xl  my-4 mx-auto p-2 flex flex-col gap-3">
        <img src="{{ $item->imagem_url }}" alt="{{ $item->name }}" class="w-96 h-96 object-cover self-center rounded-lg">
        <i class="font-thin text-gray-500 self-center">Detalhes do produto</i>
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
            <div class="mt-4 flex gap-3">
                <a href="{{ route('items.edit', $item) }}" class="text-white bg-[#00ADB5] hover:bg-blue-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-2 flex-shrink self-start focus:outline-none">
                    Editar
                </a>

                <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-2 flex-shrink self-start focus:outline-none">
                        Deletar
                    </button>
                </form>
            </div>
        </div>

    </main>
</x-layout>
