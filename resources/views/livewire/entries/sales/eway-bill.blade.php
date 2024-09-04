<div>
    <x-slot name="header">Sales E-wayBill</x-slot>
    <x-forms.m-panel>
        <div class="flex gap-3 w-full">
            <div class="flex flex-col gap-2 w-full">

                <x-input.floating wire:model="Transid" label="Transport Id"/>
                <x-input.floating wire:model="Transname" label="Transport Name"/>
                <x-input.floating wire:model="Transdocno" label="Transport No"/>
                <x-input.model-date wire:model="TransdocDt" label="Transport Date"/>

            </div>
            <div class="flex flex-col gap-2 w-full">
                <x-input.floating wire:model="distance" label="Distance"/>
                <x-input.floating wire:model="Vehno" label="Vechile No"/>
                <x-input.model-select wire:model="Vehtype" label="Vechile Type">
                    <option value="">Choose..</option>
                    <option value="R">Regular</option>
                    <option value="O">ODC</option>
                </x-input.model-select>

                <x-input.model-select wire:model="TransMode" label="Transport Mode">
                    <option value="">Choose..</option>
                    <option value="1">Road</option>
                    <option value="2">Rail</option>
                    <option value="3">Air</option>
                    <option value="4">ship</option>
                </x-input.model-select>
            </div>
        </div>
        <div>
            <x-button.secondary wire:click="EwayBill" >Generate E-Way Bill</x-button.secondary>
        </div>
    </x-forms.m-panel>

</div>
