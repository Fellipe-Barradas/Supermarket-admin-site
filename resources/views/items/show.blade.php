<x-layout title="Item">
    <main class="max-w-[1200px] p-2">
        <h1 class="text-2xl">Item</h1>
        <p>Detalhes do produto</p>
        <div class="mt-3">
            <h2>{{ $item->name }}</h2>
            <p>{{ $item->description }}</p>
            <p>{{ $item->price }}</p>
            <p>{{ $item->stock }}</p>
        </div>
    </main>
</x-layout>
