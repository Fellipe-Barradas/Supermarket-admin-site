@props(['data', 'action'])

<?php
    $keys = array_keys($data[0]->getAttributes());
?>
<div class="relative  overflow-x-auto shadow-md sm:rounded-lg my-4 rounded-sm">
    <table class="w-full text-sm text-left rtl:text-right border shadow-sm">
        <thead class="text-xs uppercase">
        <tr class="bg-[#222831]">
            @foreach($keys as $key)
                <th scope="col" class="px-6 py-3 text-white">
                    {{ $key }}
                </th>
            @endforeach
            <th scope="col" class="px-6 py-3 text-white">
                Ações
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $customer)
            <tr class="border-b">
                @foreach($keys as $key)
                    <td class="px-6 py-4">
                        {{ $customer->$key }}
                    </td>
                @endforeach
                <td class="px-6 py-4">
                    <a href="{{ route("$action.show", $customer) }}" class="font-medium text-green-600 hover:underline">Ver</a>
                    <a href="{{ route("$action.edit", $customer) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                    <a href="{{ route("$action.destroy", $customer) }}" class="font-medium text-red-600 hover:underline">Deletar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
