<div class="mb-3">
    <label class="font-medium text-sm text-gray-700" for="{{ $name }}">{{ $label }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        class="border-gray-300 mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full py-1
        @if ($disabled ?? false) disabled:bg-gray-200 disabled:cursor-not-allowed @endif"
        value="{{ $value }}"
        @if($disabled ?? false) disabled @endif
    />
</div>
