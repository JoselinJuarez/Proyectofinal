@php
    $colors = [
        'success' => [
            'text' => 'text-green-800',
            'border' => 'border-green-300',
            'bg' => 'bg-green-50',
        ],
        'error' => [
            'text' => 'text-red-800',
            'border' => 'border-red-300',
            'bg' => 'bg-red-50',
        ],
        'info' => [
            'text' => 'text-blue-800',
            'border' => 'border-blue-300',
            'bg' => 'bg-blue-50',
        ],
        'warning' => [
            'text' => 'text-yellow-800',
            'border' => 'border-yellow-300',
            'bg' => 'bg-yellow-50',
        ],
    ];

    $color = $colors[$status] ?? $colors['info'];
@endphp

<div id="alert" class="fixed top-0 right-0 m-4 z-50 sm:w-full md:w-5/12 xl:w-3/12 2xl:w-2/12 flex items-center p-4 {{ $color['text'] }} {{ $color['border'] }} {{ $color['bg'] }} border-t-4 rounded-lg shadow-lg"
    role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <div class="ms-3 text-sm font-medium">
        {{ $message }}
    </div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 {{ $color['bg'] }} {{ $color['text'] }} rounded-lg focus:ring-2 focus:ring-{{ $status === 'success' ? 'green' : ($status === 'error' ? 'red' : 'blue') }}-400 p-1.5 hover:bg-{{ $color['bg'] }}"
        data-dismiss-target="#alert" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
