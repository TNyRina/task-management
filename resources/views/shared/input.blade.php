@php
    $label ??= null;
    $type ??= 'text';
    $class ??=  null;
    $name ??= '';
    $value ??= '';
@endphp

<div class="flex flex-col {{ $class }}">
    {{-- <label for="{{ $name }}"> {{ $label }} </label> --}}

    @if ($type === 'textarea')
        <textarea  
            class="basis-[100%] rounded-md"
            placeholder="{{ $label }}"
            type="{{ $type }}"  
            name="{{ $name }}" 
            id="{{ $name }}"
            >{{ old($name, $value) }}</textarea>
    @else
        <input 
            class="basis-[100%] rounded-md"
            placeholder="{{ $label }}"
            type="{{ $type }}" 
            id="{{ $name }}" 
            name="{{ $name }}"  
            value="{{ old($name, $value) }}">
    @endif

    @error($name)
        <div class="basis-[100%] text-red-700">
            {{ $message }}
        </div>
    @enderror
</div>