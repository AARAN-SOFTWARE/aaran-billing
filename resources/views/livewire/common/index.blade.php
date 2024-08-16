<div>
    <x-slot name="header">Common</x-slot>

    <x-forms.m-panel>

        <form wire:submit.prevent="save">
            <x-input.model-text wire:model="common.vname"/>
            <x-input.model-text wire:model="desc" :label="'desc'"/>
            <x-input.model-text wire:model="desc_1" :label="'desc 1'"/>
            <x-input.model-text wire:model="common.active_id"/>
            <x-button.save/>
        </form>
        <div>
            <x-input.model-text wire:model.live="getListForm.searches"/>
            @foreach($list as $row)
                <div class="flex gap-3">
                    <span  wire:click.prevent="sortBy('vname')" class="cursor-pointer">{{$row->vname}}</span>
                    <span>{{$row->active_id}}</span>
                    <x-jet.secondary-button wire:click="edit({{$row->id}})">edit</x-jet.secondary-button>
                    <x-jet.danger-button wire:click="getDelete({{$row->id}})">delete</x-jet.danger-button>
                </div>
            @endforeach
        </div>
        <x-modal.delete/>
    </x-forms.m-panel>
</div>
