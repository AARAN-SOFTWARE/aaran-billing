
<button wire:click="create"
    {{$attributes->merge(['class' => 'max-w-max bg-gradient-to-r from-emerald-600 to-emerald-500 hover:from-emerald-500 hover:to-emerald-600 focus:ring-2 focus:ring-offset-2
    focus:ring-emerald-600 text-white px-4 py-2 sm:mt-0.5 mt-6 text-[12px] inline-flex items-center gap-x-2 rounded-md tracking-widest font-semibold
    transition-all linear duration-400 '])}}>
    <x-icons.icon :icon="'plus-slim'" class="h-6 w-auto"/>
    <span>NEW</span>
</button>

