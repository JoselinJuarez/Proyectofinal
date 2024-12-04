<div class="flex flex-col items-center">
    <div id="imagenPreview" class="rounded-full mb-3 border-sky-950 border-4"
        style="background-image: url({{ $defaultImage }});
        width: {{ $width }};
        height: {{ $height }};
        background-size: cover;
        background-position: center center;">
    </div>
    <label id="fileName" class="font-medium text-sm text-gray-700 h-[16.8px]">{{ $label }}</label>
    <x-secondary-button-app id="btn-upload" name="btn-upload" type="button" text="Seleccionar archivo" class="mt-[9.5px]" />
    <input id="input-upload" class="input-upload hidden" type="file" name="foto" accept=".png, .jpg, .jpeg">
</div>
