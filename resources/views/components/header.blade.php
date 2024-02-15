<?php
    $current_page = Request::path();

    function isActiveLink($current_page, $page): string{
        return $current_page === $page ? "text-[#00ADB5]" : "hover:text-[#00ADB5]";
    }
?>

<nav x-data="{ open: true }"  class="bg-[#222831] border-gray-200 text-white flex-none p-1">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="./images/logo.png" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">Supermarket</span>
        </a>
        <button type="button" @click="open = !open" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none hover:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div x-show="open" class="w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium gap-2 0 md:gap-0 flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                <li>
                    <a href="/" class="<?= isActiveLink($current_page, "/") ?>  " aria-current="page">Inicio</a>
                </li>
                @auth
                <li>
                    <a href="/items" class="<?= isActiveLink($current_page, "items") ?>">Inventário</a>
                </li>
                <li>
                    <a href="/sales" class="<?= isActiveLink($current_page, "sales") ?>">Vendas</a>
                </li>
                <li>
                    <a href="#" class="<?= isActiveLink($current_page, "purchases") ?>">Compras</a>
                </li>
                <li>
                    <a href="/customers" class="<?= isActiveLink($current_page, "customers") ?>">Clientes</a>
                </li>
                <li>
                    <form action="{{ route("auth.logout") }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white hover:text-[#00ADB5]">Sair da sessão</button>
                    </form>
                </li>
                @endauth
                @guest
                <li>
                    <a href="{{ route("auth.login") }}" class="<?= isActiveLink($current_page, "login") ?>">Login</a>
                </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
