@props(['descricao', 'imagem', 'nome', 'preco' => '', 'estoque' => ''])

<div class="flex flex-col w-[270px] ssm:w-[220px] h-[360px] md:w-fit md:h-fit lg:h-[500px] items-center bg-[#EEEEEE] border border-gray-200
rounded-lg shadow  md:max-w-xl hover:bg-gray-100 p-1.5">
    <img class="object-cover w-full rounded-t-lg h-96  md:w-fit lg:max-h-[300px] md:rounded-none md:rounded-s-lg" src="{{ $imagem }}" alt="{{ $nome }} imagem">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900">{{ $nome }}</h5>
        <i class="mb-2">R$ {{ $preco }}</i>
        <p class="mb-3 font-normal text-gray-700">{{ $descricao }}</p>
    </div>
</div>
