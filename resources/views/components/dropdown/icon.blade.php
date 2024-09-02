<div x-data="{ isOpen: false, openedWithKeyboard: false }"
     @keydown.esc.prevent="isOpen = false, openedWithKeyboard = false" class="relative">
    <!-- Toggle Button -->
    <button type="button" aria-label="context menu" @click="isOpen = ! isOpen" @contextmenu.prevent="isOpen = true"
            @keydown.space.prevent="openedWithKeyboard = true" @keydown.enter.prevent="openedWithKeyboard = true"
            @keydown.down.prevent="openedWithKeyboard = true"
            class="inline-flex justify-center cursor-pointer items-center bg-gray-100 w-9 h-9 transition hover:opacity-75 focus-visible:outline
            focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800 active:opacity-100 dark:focus-visible:outline-slate-300 rounded-md"
            :class="isOpen || openedWithKeyboard ? 'text-black dark:text-white' : 'text-slate-700 dark:text-slate-300'"
            :aria-expanded="isOpen || openedWithKeyboard" aria-haspopup="true">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
            <path fill-rule="evenodd"
                  d="M10.5 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z"
                  clip-rule="evenodd"/>
        </svg>
    </button>
    <!-- Dropdown Menu -->
    <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard"
         @click.outside="isOpen = false, openedWithKeyboard = false" @keydown.down.prevent="$focus.wrap().next()"
         @keydown.up.prevent="$focus.wrap().previous()"
         class="absolute top-8 flex max-w-max h-auto flex-col  overflow-hidden border
         bg-white p-1 space-y-2 rounded-md"
         role="menu">
        {{$slot}}
    </div>
</div>
