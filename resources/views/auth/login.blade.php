<x-layout title="Login">
    <section>
        <div class="flex flex-col max-w-lg mx-auto items-center justify-center px-6 py-8 md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Entre na sua conta
                    </h1>
                    <form class="space-y-4 md:space-y-6"
                          action="{{ route('auth.authenticate') }}"
                          method="POST"
                    >
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Senha</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" name="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500">Lembrar me</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-[#00ADB5] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Entrar</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Não possui uma conta? <a href="#" class="font-medium text-primary-600 hover:underline">Criar conta</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
