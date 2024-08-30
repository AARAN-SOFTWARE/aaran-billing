@props([
'label'=>''

])

<div class="flex flex-col">
    <label for="{{$label}}"
           class="w-[10rem] text-zinc-500 tracking-wide py-2 text-xs">{{ Str::replace('_',' ',Str::ucfirst($label))}}</label>
    <input id="{{$label}}" autocomplete="off" {{ $attributes }} type="date"
    value="{{ old('label') }}" class="w-full rounded-lg focus:border-0"
    />
</div>
