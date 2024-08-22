<div>
    <x-controls.lookup.model :show-model="$showModel" >
        <x-input.lookup-text class="rounded-lg" wire:model="vname"  x-ref="vname" :label="'Style Name'" :name="'vname'"/>
        <x-input.lookup-text class="rounded-lg" wire:model="desc" :label="'Description'" :name="'desc'"/>
    </x-controls.lookup.model>
</div>
