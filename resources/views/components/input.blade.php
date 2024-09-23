@props(['name', 'label'])

<x-floating :name="$name" :label="$label">
    <input
    class="form-control {{ $errors->has($name)? 'is-invalid' : '' }}"
    name="{{ $name }}"
    id="{{ $name }}"
    placeholder=""
    {{ $attributes(['value' => old($name), 'type'=> 'text']) }}
    />
</x-floating>
