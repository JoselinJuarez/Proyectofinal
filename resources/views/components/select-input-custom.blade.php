<div class="mb-3">
    <label class="font-medium text-sm text-gray-700" for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}"
        class="w-full mt-1  py-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>
