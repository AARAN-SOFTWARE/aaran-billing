<div class="bg-white">

    <x-slot name="header"></x-slot>

    <x-forms.m-panel>
        <div class="space-y-5">
            <x-input.floating wire:model.live="count" :label="'Count'"/>
            <x-button.secondary wire:click="runFactoryProduct">Product</x-button.secondary>
            <x-button.secondary wire:click="runFactoryCompany">Company</x-button.secondary>
        </div>

    </x-forms.m-panel>
</div>
