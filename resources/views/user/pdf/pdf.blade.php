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

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
