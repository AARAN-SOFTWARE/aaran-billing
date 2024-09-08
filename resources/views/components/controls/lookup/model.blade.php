@props([
    'showModel' =>false,
    'width' => 'w-1/3',
    'height'=> 'h-80',
    'label'=> null
])
<div>
    <li class="px-4 py-2 text-gray-500 text-sm tracking-wider">No Results Found ...</li>
    <button wire:click="$set('showModel',true); "
       class="w-full inline-flex items-center gap-x-3 px-4 py-2  text-blue-600 border-t border-b border-gray-300px-2 hover:bg-blue-100">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
        </svg>
        <span>New {{$label}}</span>
    </button>

    @if($showModel)
        <div x-data x-init="$refs.vname.focus()">

            <div wire:click="clearAll"
                 class="fixed inset-0 bg-gray-900 bg-opacity-90 cursor-pointer"></div>

            <div
                    class="bg-white shadow-md m-auto rounded-md fixed inset-0 inline-block overflow-y-auto {{$width}} {{$height}}">

                <div class="flex flex-col h-full justify-between">

                    <header class="p-2">
                        <h3 class="font-bold text-lg border-b border-gray-400 text-gray-500 py-2">&nbsp;&nbsp;&nbsp;&nbsp;Create&nbsp;new</h3>
                    </header>

                    <main class="px-5 mb-2 space-y-4">
                        {{$slot}}
                    </main>

                    <footer class="flex justify-end px-2 py-4 mt-3 bg-gray-200 rounded-b-md gap-3">

                        <button
                                wire:click.prevent="clearAll"
                                class='w-36 bg-blue-600 hover:bg-blue-500  border-b-4 border-blue-700 hover:border-blue-700
                                   focus:outline-none text-white  uppercase font-bold shadow-md rounded-lg p-1'>
                            <div class="flex gap-3 justify-center">
                                <x-icons.icon icon="chevrons-left" class="h-4 w-auto block"/>
                                <div class="pt-1.0">Back</div>
                            </div>
                        </button>

                        <button wire:click.prevent="save"
                                class='w-36 bg-green-600 hover:bg-green-500  border-b-4 border-green-700 hover:border-green-700
                                    focus:outline-none text-white  uppercase font-bold shadow-md rounded-lg p-1'>
                            <div class="flex gap-3  justify-center">
                                <x-icons.icon icon="save" class="h-4 w-auto block"/>
                                <div class="pt-1.0">
                                    SAVE
                                </div>
                            </div>
                        </button>
                    </footer>
                </div>
            </div>
        </div>
    @endif
</div>
