<div>

    <x-slot name="header">Icons</x-slot>

    <x-forms.m-panel>

        <div class="relative w-full">
            <label>
                <input type="search" wire:model.live="searches"  wire:keydown.escape="$set('searches', '')"
                       class="w-1/4 search-box"
                       placeholder="type for Search...           escape to clear">
            </label>
            <div class="absolute top-0 left-0 inline-flex items-center p-2">
                <x-icons.search-lens/>
            </div>
        </div>

        {{--<----row-1----->--}}
        <div class="bg-white-900">
            <div class="flex flex-row gap-2">


                <x-icons.utilities :icon="'plus-slim'"/>
                <x-icons.utilities :icon="'trash'"/>



            </div>
        </div>
    </x-forms.m-panel>
</div>


