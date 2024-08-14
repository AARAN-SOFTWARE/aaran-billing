@props([
'icon' => 'wifi'
])

<div>
    <button class="border border-gray-300 p-2 bg-white-600 grid grid-rows-2 w-20 h-20 hover:bg-gray-300"
            onclick="copyToClipboard('{{$icon}}')">
        <x-icons.icon :icon="$icon" class="block w-8 h-auto grid-rows-1 ml-2 mt-2"/>
        <h5 class="mt-2 text-xs">{{$icon}}</h5>
    </button>
</div>
