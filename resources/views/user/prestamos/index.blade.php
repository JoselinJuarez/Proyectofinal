<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Préstamos
            </h2>
            <a href="{{ route('prestamos.create') }}"
                class="bg-sky-950 text-white px-3 py-1 rounded hover:bg-sky-900">Agregar Préstamo</a>
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
                                    <th class="px-4 py-2 border-b">Cliente</th>
                                    <th class="px-4 py-2 border-b">Monto</th>
                                    <th class="px-4 py-2 border-b">Interés</th>
                                    <th class="px-4 py-2 border-b">Total</th>
                                    <th class="px-4 py-2 border-b">Inicio</th>
                                    <th class="px-4 py-2 border-b">Conclusión</th>
                                    <th class="px-4 py-2 border-b">Estado</th>
                                    <th class="px-4 py-2 border-b">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prestamos as $prestamo)
                                    <tr>
                                        <td class="px-4 py-2 border-b text-center">{{ $prestamo->id }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $prestamo->cliente->nombre }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $prestamo->monto }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $prestamo->interes }}%</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $prestamo->total }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $prestamo->fecha_inicio }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $prestamo->fecha_fin }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ ucfirst($prestamo->estado) }}</td>
                                        <td class="px-4 py-2 border-b text-center">
                                            <div class="flex justify-center align-items">
                                                <a href="{{ route('prestamos.edit', $prestamo->id) }}"
                                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar</a>
                                                <button data-modal-target="{{ $prestamo->id }}"
                                                    data-modal-toggle="{{ $prestamo->id }}"
                                                    class="bg-red-500 text-white ms-1 px-3 py-1 rounded hover:bg-red-600"
                                                    type="button">Eliminar</button>
                                                <x-modal-dialog id="{{ $prestamo->id }}"
                                                    title="Eliminar Préstamo"
                                                    content="¿Está seguro que desea eliminar el préstamo?"
                                                    idDelete="{{ $prestamo->id }}"
                                                    route="{{ route('prestamos.delete', $prestamo->id) }}" />
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $prestamos->links() }}
                        </div>
                        <form action="{{ route('prestamos.pdf') }}" method="GET" target="_blank">
                            <div>
                                <label for="fecha_inicio">Fecha de Inicio:</label>
                                <input type="date" id="fecha_inicio" name="fecha_inicio" required>
                            </div>
                            <div>
                                <label for="fecha_fin">Fecha de Fin:</label>
                                <input type="date" id="fecha_fin" name="fecha_fin" required>
                            </div>
                            <div>
                                <button type="submit" class="btn-imprimir">Imprimir clientes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
