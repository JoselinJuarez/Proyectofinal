<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="{{ route('clientes.index') }}" class="border border-sky-950 bg-sky-950 text-white py-1 rounded hover:bg-sky-900 hover:border-sky-900 cursor-pointer px-3">Regresar</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ isset($cliente) ? 'Editar Cliente' : 'Agregar Nuevo Cliente' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ isset($cliente) ? route('clientes.update', $cliente) : route('clientes.store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @if (isset($cliente))
                            @method('PUT')
                        @endif
                        <div class="w-full sm-block md:flex md:justify-center">
                            <div class="sm:w-full md:w-5/12">
                                <div>
                                    <x-text-input-app label="Nombre Completo:" name="nombre" type="text"
                                        placeholder="Nombre" :value="old('nombre', $cliente->nombre ?? '')"/>
                                    <x-text-input-app label="Correo Electrónico:" name="correo" type="email"
                                        placeholder="madanze@gmail.com" :value="old('correo', $cliente->correo ?? '')" />
                                    <x-text-input-app label="Teléfono:" name="telefono" type="text"
                                        placeholder="12312323" :value="old('telefono', $cliente->telefono ?? '')"/>
                                    <x-text-input-app label="Dirección:" name="direccion" type="text"
                                        placeholder="Calle de ejemplo #12" :value="old('direccion', $cliente->direccion ?? '')"/>
                                    <div class="w-full text-center mt-6">
                                        <x-primary-button-app name type text="{{ isset($cliente) ? 'Actualizar' : 'Agregar' }}"
                                            class="w-full sm:w-full lg:w-3/12" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
