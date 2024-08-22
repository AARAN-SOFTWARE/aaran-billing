<div>
    <x-slot name="header">Company</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>
        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-table.caption :caption="'Contacts'">
            {{$list->count()}}
        </x-table.caption>

        <x-table.form>
            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="20%"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">Company
                    Name
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">
                    Mobile
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">
                    GST
                </x-table.header-text>
                <x-table.header-action/>
            </x-slot:table_header>
            <x-slot:table_body name="table_body">
                @foreach($list as $index=>$row)
                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->vname}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->mobile}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->gstin}}</x-table.cell-text>
                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                @endforeach
            </x-slot:table_body>

        </x-table.form>
        <x-modal.delete/>

        <x-forms.create :id="$common->vid" :max-width="'6xl'">
            <div class="h-[32.5rem]">
                <x-tabs.tab-panel>

                    <x-slot name="tabs">
                        <x-tabs.tab>Necessary</x-tabs.tab>
                        <x-tabs.tab>Address</x-tabs.tab>
                        <x-tabs.tab>Logo</x-tabs.tab>
                        <x-tabs.tab>Bank</x-tabs.tab>
                        <x-tabs.tab>Other Deatils</x-tabs.tab>
                    </x-slot>

                    <x-slot name="content">

                        <x-tabs.content>
                            <div class="flex flex-col gap-3">
                                <x-input.model-text wire:model="common.vname" :label="'Name'"/>
                                <x-input.model-text wire:model="display_name" :label="'Display-name'"/>
                                <x-input.model-text wire:model="mobile" :label="'Mobile'"/>
                                <x-input.model-text wire:model="landline" :label="'Landline'"/>
                                <x-input.model-text wire:model="gstin" :label="'GSTin'"/>
                                <x-input.model-text wire:model="pan" :label="'Pan'"/>
                                <x-input.model-text wire:model="email" :label="'Email'"/>
                                <x-input.model-text wire:model="website" :label="'Website'"/>
                            </div>
                        </x-tabs.content>

                        <x-tabs.content>
                            <div class="flex flex-col gap-3">
                                <x-input.model-text wire:model="address_1" :label="'Address'"/>
                                <x-input.model-text wire:model="address_2" :label="'Area-Road'"/>
                                <!-- City ----------------------------------------------------------------------------------------------------->
                                <div class="flex flex-row py-3 gap-3">
                                    <div class="xl:flex w-full gap-2">
                                        <label for="city_name"
                                               class="w-[10rem] text-zinc-500 tracking-wide py-2 ">City</label>
                                        <div x-data="{isTyped: @entangle('cityTyped')}" @click.away="isTyped = false"
                                             class="w-full relative">
                                            <div>
                                                <input
                                                    id="city_name"
                                                    type="search"
                                                    wire:model.live="city_name"
                                                    autocomplete="off"
                                                    placeholder="City Name.."
                                                    @focus="isTyped = true"
                                                    @keydown.escape.window="isTyped = false"
                                                    @keydown.tab.window="isTyped = false"
                                                    @keydown.enter.prevent="isTyped = false"
                                                    wire:keydown.arrow-up="decrementCity"
                                                    wire:keydown.arrow-down="incrementCity"
                                                    wire:keydown.enter="enterCity"
                                                    class="block w-full purple-textbox "
                                                />

                                                <!--City Dropdown ----------------------------------------------------------------------------->
                                                <div x-show="isTyped"
                                                     x-transition:leave="transition ease-in duration-100"
                                                     x-transition:leave-start="opacity-100"
                                                     x-transition:leave-end="opacity-0"
                                                     x-cloak
                                                >
                                                    <div class="absolute z-20 w-full mt-2">
                                                        <div class="block py-1 shadow-md w-full rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                                            <ul class="overflow-y-scroll h-96">
                                                                @if($cityCollection)
                                                                    @forelse ($cityCollection as $i => $city)
                                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightCity === $i ? 'bg-yellow-100' : '' }}"
                                                                            wire:click.prevent="setCity('{{$city->vname}}','{{$city->id}}')"
                                                                            x-on:click="isTyped = false">
                                                                            {{ $city->vname }}
                                                                        </li>
                                                                    @empty
                                                                        <button
                                                                            wire:click.prevent="citySave('{{$city_name}}')"
                                                                            class="text-white bg-green-500 text-center w-full">
                                                                            create
                                                                        </button>
                                                                    @endforelse
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- State --------------------------------------------------------------------------------------------------->
                                <div class="flex flex-col gap-2">
                                    <div class="xl:flex w-full gap-2">
                                        <label for="state_name"
                                               class="w-[10rem] text-zinc-500 tracking-wide py-2">State</label>
                                        <div x-data="{isTyped: @entangle('stateTyped')}" @click.away="isTyped = false"
                                             class="w-full relative">
                                            <div>
                                                <input
                                                    id="state_name"
                                                    type="search"
                                                    wire:model.live="state_name"
                                                    autocomplete="off"
                                                    placeholder="state.."
                                                    @focus="isTyped = true"
                                                    @keydown.escape.window="isTyped = false"
                                                    @keydown.tab.window="isTyped = false"
                                                    @keydown.enter.prevent="isTyped = false"
                                                    wire:keydown.arrow-up="decrementState"
                                                    wire:keydown.arrow-down="incrementState"
                                                    wire:keydown.enter="enterState"
                                                    class="block w-full purple-textbox"
                                                />

                                                <!--State Dropdown ---------------------------------------------------------------------------->
                                                <div x-show="isTyped"
                                                     x-transition:leave="transition ease-in duration-100"
                                                     x-transition:leave-start="opacity-100"
                                                     x-transition:leave-end="opacity-0"
                                                     x-cloak
                                                >
                                                    <div class="absolute z-20 w-full mt-2">
                                                        <div class="block py-1 shadow-md w-full rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                                            <ul class="overflow-y-scroll h-96">
                                                                @if($stateCollection)
                                                                    @forelse ($stateCollection as $i => $states)
                                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightState === $i ? 'bg-yellow-100' : '' }}"
                                                                            wire:click.prevent="setState('{{$states->vname}}','{{$states->id}}')"
                                                                            x-on:click="isTyped = false">
                                                                            {{ $states->vname }}
                                                                        </li>
                                                                    @empty
                                                                        <button
                                                                            wire:click.prevent="stateSave('{{ $state_name }}')"
                                                                            class="text-white bg-green-500 text-center w-full">
                                                                            create
                                                                        </button>
                                                                    @endforelse
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pin-code --------------------------------------------------------------------------------------------------->
                                <div class="flex flex-col gap-2">
                                    <div class="xl:flex w-full gap-2">
                                        <label for="pincode_name"
                                               class="w-[10rem] text-zinc-500 tracking-wide py-2">Pincode</label>
                                        <div x-data="{isTyped: @entangle('pincodeTyped')}" @click.away="isTyped = false"
                                             class="w-full relative">
                                            <div>
                                                <input
                                                    id="pincode_name"
                                                    type="search"
                                                    wire:model.live="pincode_name"
                                                    autocomplete="off"
                                                    placeholder="pincode.."
                                                    @focus="isTyped = true"
                                                    @keydown.escape.window="isTyped = false"
                                                    @keydown.tab.window="isTyped = false"
                                                    @keydown.enter.prevent="isTyped = false"
                                                    wire:keydown.arrow-up="decrementPincode"
                                                    wire:keydown.arrow-down="incrementPincode"
                                                    wire:keydown.enter="enterPincode"
                                                    class="block w-full purple-textbox"
                                                />

                                                <div x-show="isTyped"
                                                     x-transition:leave="transition ease-in duration-100"
                                                     x-transition:leave-start="opacity-100"
                                                     x-transition:leave-end="opacity-0"
                                                     x-cloak
                                                >
                                                    <!--Pin-code Dropdown --------------------------------------------------------------------->
                                                    <div class="absolute z-20 w-full mt-2">
                                                        <div class="block py-1 shadow-md w-full rounded-lg border-transparent flex-1 appearance-none border
                                        bg-white text-gray-800 ring-1 ring-purple-600">
                                                            <ul class="overflow-y-scroll h-96">
                                                                @if($pincodeCollection)
                                                                    @forelse ($pincodeCollection as $i => $pincode)
                                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightPincode === $i ? 'bg-yellow-100' : '' }}"
                                                                            wire:click.prevent="setPincode('{{$pincode->vname}}','{{$pincode->id}}')"
                                                                            x-on:click="isTyped = false">
                                                                            {{ $pincode->vname }}
                                                                        </li>
                                                                    @empty
                                                                        <button
                                                                            wire:click.prevent="pincodeSave('{{$pincode_name}}')"
                                                                            class="text-white bg-green-500 text-center w-full">
                                                                            create
                                                                        </button>
                                                                    @endforelse
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-tabs.content>

                        <x-tabs.content>
                            <div class="flex flex-col gap-3">
                                <!-- Image -------------------------------------------------------------------------------------------->
                                <div class="flex flex-row gap-2 mt-4">

                                    <div class="flex">

                                        <label for="logo_in"
                                               class="w-[10rem] text-zinc-500 tracking-wide py-2">Image</label>

                                        <div class="flex-shrink-0">

                                            <div>
                                                @if($logo)
                                                    <div class="flex-shrink-0 ">
                                                        <img class="h-24 w-full" src="{{ $logo->temporaryUrl() }}"
                                                             alt="{{$logo?:''}}"/>
                                                    </div>
                                                @endif

                                                @if(!$logo && isset($old_logo))
                                                    <img class="h-24 w-full"
                                                         src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_logo))}}"
                                                         alt="">

                                                @else
                                                    <x-icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="relative">

                                        <div>
                                            <label for="club_image"
                                                   class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                                <x-icons.icon icon="cloud-upload"
                                                              class="w-8 h-auto block text-gray-400"/>
                                                Upload file

                                                <input type="file" id='club_image' wire:model="logo" class="hidden"/>
                                                <p class="text-xs font-light text-gray-400 mt-2">PNG, JPG SVG, WEBP, and
                                                    GIF
                                                    are
                                                    Allowed.</p>
                                            </label>
                                        </div>

                                        <div wire:loading wire:target="logo" class="z-10 absolute top-6 left-12">
                                            <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-tabs.content>

                        <x-tabs.content>
                            <div class="flex flex-col gap-3">
                                <!-- Bank Details --------------------------------------------------------------------------------------------->
                                <x-input.model-text wire:model="acc_no" :label="'Account No'"/>
                                <x-input.model-text wire:model="ifsc_code" :label="'IFSC Code'"/>
                                <x-input.model-text wire:model="bank" :label="'Bank'"/>
                                <x-input.model-text wire:model="branch" :label="'Branch'"/>
                            </div>
                        </x-tabs.content>

                        <x-tabs.content>
                            <div class="flex flex-col gap-3">
                                <x-input.model-text wire:model="msme_no" :label="'MSME No'"/>
                                <x-input.model-text wire:model="msme_type" :label="'MSME Type'"/>
                            </div>
                        </x-tabs.content>

                    </x-slot>

                </x-tabs.tab-panel>
            </div>
        </x-forms.create>

    </x-forms.m-panel>
</div>
