<button
    name="{{ $name }}"
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'border border-sky-950 bg-sky-950 text-white py-1 rounded hover:bg-sky-900 hover:border-sky-900 cursor-pointer px-3']) }}>
    {{ $text }}
</button>
