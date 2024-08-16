@props([
    'id'=>null,
])
<td class="p-4">
    <div class="flex justify-center items-center gap-x-6">
       <x-button.edit wire:click="edit({{$id}})"/>
       <x-button.delete  wire:click="getDelete({{$id}})"/>
    </div>
</td>
