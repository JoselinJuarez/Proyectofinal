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
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 w-full p-6 gap-4">
                    <a class="bg-gradient-to-r from-sky-950 to-sky-700 border-sky-950 border-2 hover:from-sky-700 hover:to-sky-950 p-6 rounded-2xl flex flex-col items-center text-white"
                        href="{{ route('clientes.index') }}">
                        <span class="text-2xl font-bold">Clientes</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-20 mt-5">
                            <path fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a class="bg-gradient-to-r from-sky-950 to-sky-700 border-sky-950 border-2 hover:from-sky-700 hover:to-sky-950 p-6 rounded-2xl flex flex-col items-center text-white"
                        href="{{ route('prestamos.index') }}">
                        <span class="text-2xl font-bold">Préstamos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-20 mt-5">
                            <path fill-rule="evenodd"
                                d="M3.75 3.375c0-1.036.84-1.875 1.875-1.875H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375Zm10.5 1.875a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25ZM12 10.5a.75.75 0 0 1 .75.75v.028a9.727 9.727 0 0 1 1.687.28.75.75 0 1 1-.374 1.452 8.207 8.207 0 0 0-1.313-.226v1.68l.969.332c.67.23 1.281.85 1.281 1.704 0 .158-.007.314-.02.468-.083.931-.83 1.582-1.669 1.695a9.776 9.776 0 0 1-.561.059v.028a.75.75 0 0 1-1.5 0v-.029a9.724 9.724 0 0 1-1.687-.278.75.75 0 0 1 .374-1.453c.425.11.864.186 1.313.226v-1.68l-.968-.332C9.612 14.974 9 14.354 9 13.5c0-.158.007-.314.02-.468.083-.931.831-1.582 1.67-1.694.185-.025.372-.045.56-.06v-.028a.75.75 0 0 1 .75-.75Zm-1.11 2.324c.119-.016.239-.03.36-.04v1.166l-.482-.165c-.208-.072-.268-.211-.268-.285 0-.113.005-.225.015-.336.013-.146.14-.309.374-.34Zm1.86 4.392V16.05l.482.165c.208.072.268.211.268.285 0 .113-.005.225-.015.336-.012.146-.14.309-.374.34-.12.016-.24.03-.361.04Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a class="bg-gradient-to-r from-sky-950 to-sky-700 border-sky-950 border-2 hover:from-sky-700 hover:to-sky-950 p-6 rounded-2xl flex flex-col items-center text-white"
                        href="{{ route('garantias.index') }}">
                        <span class="text-2xl font-bold">Garantías</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-20 mt-5">
                            <path fill-rule="evenodd"
                                d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                        </svg>

                    </a>
                    <a class="bg-gradient-to-r from-sky-950 to-sky-700 border-sky-950 border-2 hover:from-sky-700 hover:to-sky-950 p-6 rounded-2xl flex flex-col items-center text-white" href="{{ route('pagos.index') }}">
                        <span class="text-2xl font-bold">Pagos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-20 mt-5">
                            <path
                                d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
