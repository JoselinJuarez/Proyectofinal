<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="{{ route('prestamos.index') }}"
                class="border border-sky-950 bg-sky-950 text-white py-1 rounded hover:bg-sky-900 hover:border-sky-900 cursor-pointer px-3">Regresar</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ isset($prestamo) ? 'Editar Préstamo' : 'Agregar Nuevo Préstamo' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form
                        action="{{ isset($prestamo) ? route('prestamos.update', $prestamo) : route('prestamos.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($prestamo))
                            @method('PUT')
                        @endif
                        <div class="w-full sm-block md:flex md:justify-center">
                            <div class="sm:w-full md:w-5/12">
                                <div>
                                    <x-select-input-custom label="Cliente:" name="cliente_id"
                                        selected="{{ isset($prestamo) ? $prestamo->cliente->id : '' }}"
                                        :options="$clientes" />
                                    <x-text-input-app id="monto" label="Monto:" name="monto" type="text" placeholder="00.00"
                                        :value="old('monto', $prestamo->monto ?? '')" />
                                    <x-select-input-custom id="interes" label="Tipo de Préstamo / Interés:" name="interes"
                                        selected="{{ isset($prestamo) ? $prestamo->interes : '' }}" :options="[
                                            '0.17' => 'Diario - 17%',
                                            '0.10' => 'Con garantía - 10%',
                                            '0.20' => 'Sin garantía - 20%',
                                        ]" />
                                    <x-text-input-app label="Fecha de inicio:" name="fecha_inicio" type="date"
                                        :value="old('fecha_inicio', $prestamo->fecha_inicio ?? '')" />
                                    <x-text-input-app label="Fecha de finalización:" name="fecha_fin" type="date"
                                        :value="old('fecha_fin', $prestamo->fecha_fin ?? '')" />
                                    <x-text-input-app id="total" label="Monto total a pagar:" name="total" type="text"
                                        placeholder="00.00" :value="old('total', $prestamo->total ?? '')" :disabled="true" />
                                    @if (isset($prestamo))
                                        <x-select-input label="Estado:" name="estado"
                                            selected="{{ isset($prestamo) ? $prestamo->estado : '' }}"
                                            :options="['Activo', 'Pagado', 'Incumplido']" />
                                    @endif
                                    <div class="w-full text-center mt-6">
                                        <x-primary-button-app name type
                                            text="{{ isset($prestamo) ? 'Actualizar' : 'Agregar' }}"
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
