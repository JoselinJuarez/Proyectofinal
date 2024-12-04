<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Clientes
            </h2>
            <a href="{{ route('clientes.create') }}"
                class="bg-sky-950 text-white px-3 py-1 rounded hover:bg-sky-900">Agregar Cliente</a>
        </div>
        <form method="GET" action="{{ route('clientes.index') }}" style="display: flex; gap: 10px; align-items: center;">
            <!-- Campo de búsqueda -->
            <input
                type="text"
                name="busqueda"
                value="{{$busqueda}}"
                placeholder="Buscar clientes por nombre o correo..."
                style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; flex-grow: 1;"
            >

            <!-- Botón para buscar -->
            <button
                type="submit"
                style="padding: 10px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;"
            >
                Buscar
            </button>
        </form>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-auto">
                        <table class="w-full bg-white border border-gray-300 rounded">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b">ID</th>
                                    <th class="px-4 py-2 border-b">Nombre</th>
                                    <th class="px-4 py-2 border-b">Correo</th>
                                    <th class="px-4 py-2 border-b">Teléfono</th>
                                    <th class="px-4 py-2 border-b">Dirección</th>
                                    <th class="px-4 py-2 border-b">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td class="px-4 py-2 border-b text-center">{{ $cliente->id }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $cliente->nombre }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $cliente->correo }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $cliente->telefono }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $cliente->direccion }}</td>
                                        <td class="px-4 py-2 border-b text-center">
                                            <div class="flex justify-center align-items">
                                                <a href="{{ route('clientes.edit', $cliente->id) }}"
                                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar</a>
                                                <button
                                                    data-modal-target="{{ $cliente->nombre . $cliente->id }}"
                                                    data-modal-toggle="{{ $cliente->nombre . $cliente->id }}"
                                                    class="bg-red-500 text-white ms-1 px-3 py-1 rounded hover:bg-red-600"
                                                    type="button">Eliminar</button>
                                                <x-modal-dialog
                                                    id="{{ $cliente->nombre . $cliente->id }}"
                                                    title="Eliminar Cliente"
                                                    content="¿Está seguro que desea eliminar el cliente?"
                                                    idDelete="{{ $cliente->id }}"
                                                    route="{{ route('clientes.delete', $cliente->id) }}" />
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $clientes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
