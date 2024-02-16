<x-layout title="Cliente">
    <main class="max-w-lg mx-auto p-2 mt-8">
        <form
            action="{{ route('customers.update', $customer) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <h1 class="text-3xl">Editar cliente</h1>
            <div class="flex flex-col md:grid md:grid-cols-2 gap-3">
                <div class="flex flex-col gap-3">
                    <label for="name" class="text-lg @error('name') text-red-500 @enderror">Nome</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ $customer->name }}"
                        class="border border-gray-300 rounded-lg p-2.5"

                    >
                </div>
                <div class="flex flex-col gap-3">
                    <label for="phone" class="text-lg @error('phone') text-red-500 @enderror">Telefone</label>
                    <input
                        name="phone"
                        value="{{ $customer->phone }}"
                        class="border border-gray-300 rounded-lg p-2.5"
                        step="0.01"
                    >
                </div>
                <div class="flex flex-col gap-3">
                    <label for="address" class="text-lg @error('address') text-red-500 @enderror">Endereço</label>
                    <input
                        name="address"
                        value="{{ $customer->address }}"
                        class="border border-gray-300 rounded-lg p-2.5"

                    >
                </div>
                <input
                    type="submit"
                    class="bg-[#00ADB5] text-white rounded-lg p-2.5 text
                    -sm font-medium hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300"
                    value="editar"
                />

            </div>
        </form>
    </main>
</x-layout>
