<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Garantías
            </h2>
            <a href="{{ route('garantias.create') }}"
                class="bg-sky-950 text-white px-3 py-1 rounded hover:bg-sky-900">Agregar Garantía</a>
        </div>
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
                                    <th class="px-4 py-2 border-b">Préstamo</th>
                                    <th class="px-4 py-2 border-b">Cliente</th>
                                    <th class="px-4 py-2 border-b">Valor</th>
                                    <th class="px-4 py-2 border-b">Estado</th>
                                    <th class="px-4 py-2 border-b">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($garantias as $garantia)
                                    <tr>
                                        <td class="px-4 py-2 border-b text-center">{{ $garantia->id }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $garantia->prestamo->id }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $garantia->prestamo->cliente->nombre }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $garantia->valor }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $garantia->estado }}</td>
                                        <td class="px-4 py-2 border-b text-center">
                                            <div class="flex justify-center align-items">
                                                <a href="{{ route('garantias.edit', $garantia->id) }}"
                                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar</a>
                                                <button data-modal-target="{{ $garantia->id }}"
                                                    data-modal-toggle="{{ $garantia->id }}"
                                                    class="bg-red-500 text-white ms-1 px-3 py-1 rounded hover:bg-red-600"
                                                    type="button">Eliminar</button>
                                                <x-modal-dialog id="{{ $garantia->id }}"
                                                    title="Eliminar Garantía"
                                                    content="¿Está seguro que desea eliminar la garantía?"
                                                    idDelete="{{ $garantia->id }}"
                                                    route="{{ route('garantias.delete', $garantia->id) }}" />
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $garantias->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
