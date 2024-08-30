@props([
    'id'=>null,
])
<td class="w-12 print:hidden">
    <div class="flex justify-center items-center gap-4">
       <x-button.edit wire:click="edit({{$id}})"/>
       <x-button.delete  wire:click="getDelete({{$id}})"/>
    </div>
</td>
