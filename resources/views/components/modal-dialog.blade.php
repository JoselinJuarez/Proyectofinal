<div id="{{ $id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b rounded-t px-5 py-2 bg-sky-950">
                <h2 class="font-semibold text-white">
                    {{ $title }}
                </h2>
                <button type="button"
                    class="border border-white text-gray-400 bg-transparent hover:bg-white/25 hover:text-gray-900 rounded-md text-sm w-6 h-6 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="{{ $id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Cerrar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="px-5 pt-4 pb-3">
                <p class="text-dark text-start">
                    {{ $content }}
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end px-5 py-2 rounded-b dark:border-gray-600">
                <x-secondary-button-app name type="button" text="Cancelar" data-modal-hide="{{ $id }}" />
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-primary-button-app name type="submit" text="Eliminar" class="ms-1"/>
                </form>
            </div>
        </div>
    </div>
</div>
