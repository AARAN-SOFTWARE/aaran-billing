@props([
'label'=>''

])

<div class="flex flex-col ">
    <label for="{{$label}}"
           class="w-[10rem] text-zinc-500 tracking-wide py-2 text-xs">{{ Str::replace('_',' ',Str::ucfirst($label))}}</label>
    <select id="{{$label}}" {{ $attributes }} class="w-full rounded-lg text-md">
        {{$slot}}
    </select>
</div>
