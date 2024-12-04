<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="{{ route('users.index') }}"
                class="border border-sky-950 bg-sky-950 text-white py-1 rounded hover:bg-sky-900 hover:border-sky-900 cursor-pointer px-3">Regresar</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ isset($user) ? 'Editar Usuario' : 'Agregar Nuevo Usuario' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($user))
                            @method('PUT')
                        @endif
                        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-image-uploader
                                    defaultImage="{{ old('foto', isset($user) && $user->foto ? asset($user->foto) : asset('storage/images/userImage.png')) }}"
                                    width="{{ !isset($user) ? '210px' : '138px' }}"
                                    height="{{ !isset($user) ? '210px' : '138px' }}" label="Foto del Usuario" />
                            </div>
                            <div>
                                <div>
                                    <x-text-input-app label="Nombre Completo:" name="name" type="text"
                                        placeholder="Nombre" :value="old('name', $user->name ?? '')" />
                                    <x-text-input-app label="Correo Electrónico:" name="email" type="email"
                                        placeholder="madanze@gmail.com" :value="old('email', $user->email ?? '')" />
                                    @if (!isset($user))
                                        <x-text-input-app label="Contraseña:" name="pass" type="text"
                                            placeholder="∗∗∗∗∗∗∗∗" :value="old('pass', $user->password ?? '')" />
                                    @endif
                                    <x-select-input label="Rol:" name="role"
                                        selected="{{ isset($user) ? $user->role : '' }}" :options="['Administrador', 'Cobrador']" />
                                    <div class="w-full text-center mt-6">
                                        <x-primary-button-app name type
                                            text="{{ isset($user) ? 'Actualizar' : 'Agregar' }}"
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
