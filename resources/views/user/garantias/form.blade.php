<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="{{ route('garantias.index') }}"
                class="border border-sky-950 bg-sky-950 text-white py-1 rounded hover:bg-sky-900 hover:border-sky-900 cursor-pointer px-3">Regresar</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ isset($garantia) ? 'Editar Garantía' : 'Agregar Nueva Garantía' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form
                        action="{{ isset($garantia) ? route('garantias.update', $garantia) : route('garantias.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($garantia))
                            @method('PUT')
                        @endif
                        <div class="w-full sm-block md:flex md:justify-center">
                            <div class="sm:w-full md:w-5/12">
                                <div>
                                    <x-select-input-custom label="Prestamo ID / Cliente / Total:" name="prestamo_id"
                                        selected="{{ isset($garantia) ? $garantia->prestamo->id : '' }}"
                                        :options="$prestamos" />
                                    <x-text-input-app label="Valor:" name="valor" type="text" placeholder="00.00"
                                        :value="old('valor', $garantia->valor ?? '')" />
                                    <x-text-area-input label="Descripción:" name="descripcion" placeholder="Descripción de la garantía"
                                        :value="old('descripcion', $garantia->descripcion ?? '')"/>
                                    @if (isset($garantia))
                                        <x-select-input label="Estado:" name="estado"
                                            selected="{{ isset($garantia) ? $garantia->estado : '' }}"
                                            :options="['En garantía', 'Vendido', 'Devuelto']" />
                                    @endif
                                    <div class="w-full text-center mt-6">
                                        <x-primary-button-app name type
                                            text="{{ isset($garantia) ? 'Actualizar' : 'Agregar' }}"
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
