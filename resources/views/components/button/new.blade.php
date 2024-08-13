
<button wire:click="create"
    {{$attributes->merge(['class' => 'max-w-max bg-gradient-to-r from-emerald-600 to-emerald-500 hover:from-emerald-500 hover:to-emerald-600 focus:ring-2 focus:ring-offset-2
    focus:ring-cyan-700 text-white sm:px-4 sm:py-2 px-2 py-1 text-[12px] inline-flex items-center gap-x-2 rounded-md tracking-widest font-semibold
    transition-all linear duration-400 '])}}>
    <x-icons.icon :icon="'plus-slim'" class="sm:h-5 h-3 w-auto"/>
    <span>NEW</span>
</button>

