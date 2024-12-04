<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Usuarios
            </h2>
            <a href="{{ route('users.create') }}"
                class="bg-sky-950 text-white px-3 py-1 rounded hover:bg-sky-900">Agregar Usuario</a>
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
                                    <th class="px-4 py-2 border-b">Nombre</th>
                                    <th class="px-4 py-2 border-b">Correo</th>
                                    <th class="px-4 py-2 border-b">Rol</th>
                                    <th class="px-4 py-2 border-b">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-4 py-2 border-b text-center">{{ $user->id }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $user->name }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $user->email }}</td>
                                        <td class="px-4 py-2 border-b text-center">{{ $user->role }}</td>
                                        <td class="px-4 py-2 border-b text-center">
                                            <div class="flex justify-center align-items">
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar</a>
                                                <button
                                                    data-modal-target="{{ $user->name . $user->id }}"
                                                    data-modal-toggle="{{ $user->name . $user->id }}"
                                                    class="bg-red-500 text-white ms-1 px-3 py-1 rounded hover:bg-red-600"
                                                    type="button">Eliminar</button>
                                                <x-modal-dialog
                                                    id="{{ $user->name . $user->id }}"
                                                    title="Eliminar Usuario"
                                                    content="¿Está seguro que desea eliminar el usuario?"
                                                    idDelete="{{ $user->id }}"
                                                    route="{{ route('users.delete', $user->id) }}"/>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
