<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="{{ route('pagos.index') }}"
                class="border border-sky-950 bg-sky-950 text-white py-1 rounded hover:bg-sky-900 hover:border-sky-900 cursor-pointer px-3">Regresar</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ isset($pago) ? 'Editar Pago' : 'Agregar Nuevo Pago' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ isset($pago) ? route('pagos.update', $pago) : route('pagos.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($pago))
                            @method('PUT')
                        @endif
                        <div class="w-full sm-block md:flex md:justify-center">
                            <div class="sm:w-full md:w-5/12">
                                <div>
                                    <x-select-input-custom label="Prestamo ID / Cliente / Total:" name="prestamo_id"
                                        selected="{{ isset($pago) ? $pago->prestamo->id : '' }}" :options="$prestamos" />
                                    <x-text-input-app label="Monto:" name="monto" type="text" placeholder="00.00"
                                        :value="old('monto', $pago->monto ?? '')" />
                                    <x-text-input-app label="Fecha de Pago:" name="fecha_pago" type="date"
                                        :value="old('fecha_pago', $pago->fecha_pago ?? '')" />
                                    <div class="w-full text-center mt-6">
                                        <x-primary-button-app name type
                                            text="{{ isset($pago) ? 'Actualizar' : 'Agregar' }}"
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
