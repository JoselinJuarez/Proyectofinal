<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex justify-center sm:justify-center md:justify-end md:me-20">
                            <div class="rounded-full mb-3 border-sky-950 border-4"
                                style="background-image: url('{{ Auth::user() && Auth::user()->foto ? asset(Auth::user()->foto) : asset('storage/images/userImage.png') }}');
                                width: 210px;
                                height: 210px;
                                background-size: cover;
                                background-position: center center;">
                            </div>
                        </div>
                        <div class="flex h-full items-center">
                            <div class="text-center sm:text-center md:text-start w-full">
                                <h1 class="text-xl font-bold text-center sm:text-center md:text-start">Bienvenido
                                    {{ Auth::user() ? Auth::user()->name : '' }}</h1>
                                <p>¿Qué desea realizar el día de hoy?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
