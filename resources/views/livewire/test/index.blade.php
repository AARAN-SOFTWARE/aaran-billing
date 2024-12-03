<div>
    <x-slot name="header">Common</x-slot>
    <div class="flex gap-4">
        <x-combobox.search wire:model="searches"/>
        <div>{{$searches}}</div>
    </div>
</div>
