@props([
'showFilters'=>false,
])

<div class="flex justify-between items-center">
    <div class="w-2/4 flex items-center  space-x-2">

        <x-icons.search-new wire:model.live="getListForm.searches"/>
        <x-input.toggle-filter :show-filters="$showFilters"/>

    </div>
    <div class="flex justify-between">
        {{$slot}}
    </div>

    <div class="flex justify-between">
        <x-forms.per-page/>
        <x-button.new/>
    </div>
</div>

<x-input.advance-search :show-filters="$showFilters"/>
