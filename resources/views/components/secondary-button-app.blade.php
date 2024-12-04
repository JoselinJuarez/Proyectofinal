<button
    name="{{ $name }}"
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'border border-sky-600 bg-sky-600 text-white py-1 rounded hover:bg-sky-700 hover:border-sky-700 cursor-pointer px-3']) }}>
    {{ $text }}
</button>
