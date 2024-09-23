@props(['name', 'label'])

<div class="mb-3 form-floating">
    {{ $slot }}
    <label for="{{ $name }}" class="form-label">{!! $label !!}</label>
    @error($name)
        <div class="invalid-feedback">
        {{ $message }}
        </div>
    @enderror
</div>