<x-layout title="Item">
    <main class="max-w-lg mx-auto p-2 mt-8">
        <form
            action="{{ route('items.update', $item) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <h1 class="text-3xl">Adicionar item</h1>
            <div class="flex flex-col md:grid md:grid-cols-2 gap-3">
                <div class="flex flex-col gap-3">
                    <label for="name" class="text-lg @error('name') text-red-500 @enderror">Nome</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ $item->name }}"
                        class="border border-gray-300 rounded-lg p-2.5"
                    >
                </div>
                <div class="flex flex-col gap-3">
                    <label for="descricao" class="text-lg @error('descricao') text-red-500 @enderror">Descrição</label>
                    <textarea
                        name="descricao"
                        class="border border-gray-300 rounded-lg p-2.5"
                    >{{ $item->descricao }}</textarea>
                </div>
                <div class="flex flex-col gap-3">
                    <label for="preco" class="text-lg @error('preco') text-red-500 @enderror">Preço</label>
                    <input
                        name="preco"
                        type="number"
                        value="{{ $item->preco }}"
                        class="border border-gray-300 rounded-lg p-2.5"
                        step="0.01"
                    >
                </div>
                <div class="flex flex-col gap-3">
                    <label for="estoque" class="text-lg @error('estoque') text-red-500 @enderror">Estoque</label>
                    <input
                        type="number"
                        name="estoque"
                        value="{{ $item->estoque }}"
                        class="border border-gray-300 rounded-lg p-2.5"

                    >
                </div>
                <div class="flex flex-col gap-3 ">
                    <label for="imagem" class="text-lg @error('imagem_url') text-red-500 @enderror">Imagem url</label>
                    <input
                        type="text"
                        name="imagem_url"
                        value="{{ $item->imagem_url }}"
                        class="border border-gray-300 rounded-lg p-2.5"
                    >
                </div>
                <div class="flex flex-col gap-3">
                    <label for="categories" class="text-lg">Categorias</label>
                    <select
                        name="categoria"
                        class="border border-gray-300 rounded-lg p-2.5 @error('categoria') text-red-500 @enderror"
                    >
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input
                    type="submit"
                    class="bg-[#00ADB5] text-white rounded-lg p-2.5 text
                    -sm font-medium hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300"
                    value="adicionar"
                />

            </div>
        </form>
    </main>
</x-layout>
