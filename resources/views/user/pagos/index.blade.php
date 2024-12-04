<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Pagos
            </h2>
            <a href="{{ route('pagos.create') }}"
                class="bg-sky-950 text-white px-3 py-1 rounded hover:bg-sky-900">Agregar Pago</a>
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
                                    <th class="px-4 py-2 border-b">ID de préstamo</th>
                                    <th class="px-4 py-2 border-b">Fecha de pago</th>
                                    <th class="px-4 py-2 border-b">Monto</th>
                                    <th class="px-4 py-2 border-b">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagos as $pago)
                                    <tr>
                                        <td class="px-4 py-2 border-b text-center">{{ $pago->id }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $pago->prestamo_id }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $pago->fecha_pago }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $pago->monto }}</td>
                                        <td class="px-4 py-2 border-b text-center">
                                            <div class="flex justify-center align-items">
                                                <a href="{{ route('pagos.edit', $pago->id) }}"
                                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar</a>
                                                <button data-modal-target="{{ $pago->id }}"
                                                    data-modal-toggle="{{ $pago->id }}"
                                                    class="bg-red-500 text-white ms-1 px-3 py-1 rounded hover:bg-red-600"
                                                    type="button">Eliminar</button>
                                                <x-modal-dialog id="{{ $pago->id }}" title="Eliminar Pago"
                                                    content="¿Está seguro que desea eliminar el pago?"
                                                    idDelete="{{ $pago->id }}"
                                                    route="{{ route('pagos.delete', $pago->id) }}" />
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $pagos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
