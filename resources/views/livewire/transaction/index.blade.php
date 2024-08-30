<div>
    <x-slot name="header">Transaction</x-slot>

    <x-forms.m-panel>

        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-table.caption :caption="'Transaction'">
            {{$list->count()}}
        </x-table.caption>

        <x-table.form>

            <x-slot:table_header name="table_header" class="bg-green-100">

                <x-table.header-serial></x-table.header-serial>

                <x-table.header-text wire:click.prevent="sortBy (acyear)" sort-icon="{{$getListForm->sortAsc}}">A/C
                    Year
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy (acyear)" sort-icon="{{$getListForm->sortAsc}}">
                    Contact
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy (acyear)" sort-icon="{{$getListForm->sortAsc}}">Amount
                </x-table.header-text>
                <x-table.header-text>Status</x-table.header-text>
                <x-table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body name="table_body">

                @foreach($list as $index=>$row)

                    <x-table.row>

                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->contact->vname}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->amount}}</x-table.cell-text>
                        <x-table.cell-status active="{{$row->active_id}}"/>
                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                @endforeach
            </x-slot:table_body>
        </x-table.form>
        <x-modal.delete/>

        <!-- Create  -------------------------------------------------------------------------------------------------->

        <x-forms.create :id="$common->vid" :max-width="'6xl'">

            <div class="grid grid-cols-2 gap-x-5 gap-y-3">

                <!-- Party Name --------------------------------------------------------------------------------------->

                <x-dropdown.wrapper label="Contact Name" type="contactTyped">
                    <div class="relative ">
                        <x-dropdown.input label="Contact Name" id="contact_name"
                                          wire:model.live="contact_name"
                                          wire:keydown.arrow-up="decrementContact"
                                          wire:keydown.arrow-down="incrementContact"
                                          wire:keydown.enter="enterContact"/>
                        <x-dropdown.select>
                            @if($contactCollection)
                                @forelse ($contactCollection as $i => $contact)
                                    <x-dropdown.option highlight="{{ $highlightContact === $i }}"
                                                       wire:click.prevent="setContact('{{$contact->vname}}','{{$contact->id}}')">
                                        {{ $contact->vname }}
                                    </x-dropdown.option>
                                @empty
                                    <a href="{{route('contacts.upsert',['0'])}}" role="button"
                                       class="flex items-center justify-center bg-green-500 w-full h-8 text-white text-center">
                                        Not found , Want to create new
                                    </a>
                                @endforelse
                            @endif
                        </x-dropdown.select>
                    </div>
                </x-dropdown.wrapper>

                <!-- Transaction Type --------------------------------------------------------------------------------->

                <x-dropdown.wrapper label="Transaction Type" type="trans_typeTyped">
                    <div class="relative ">
                        <x-dropdown.input label="Transaction Type" id="trans_type_name"
                                          wire:model.live="trans_type_name"
                                          wire:keydown.arrow-up="decrementTransType"
                                          wire:keydown.arrow-down="incrementTransType"
                                          wire:keydown.enter="enterTransType"/>
                        <x-dropdown.select>
                            @if($trans_typeCollection)
                                @forelse ($trans_typeCollection as $i => $trans_type)
                                    <x-dropdown.option highlight="{{$highlightTransType === $i  }}"
                                                       wire:click.prevent="setTransType('{{$trans_type->vname}}','{{$trans_type->id}}')">
                                        {{ $trans_type->vname }}
                                    </x-dropdown.option>
                                @empty
                                    <a href="{{route('trans_types.upsert',['0'])}}" role="button"
                                       class="flex items-center justify-center bg-green-500 w-full h-8 text-white text-center">
                                        Not found, Want to create new
                                    </a>
                                @endforelse
                            @endif
                        </x-dropdown.select>
                    </div>
                </x-dropdown.wrapper>


                <!-- Mode --------------------------------------------------------------------------------------------->
                <div class="xl:flex w-full gap-2">
                    <label for="mode_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Mode</label>
                    <div x-data="{isTyped: @entangle('modeTyped')}" @click.away="isTyped = false" class="w-full">
                        <div class="relative">
                            <input
                                id="mode_name"
                                type="search"
                                wire:model.live="mode_name"
                                autocomplete="off"
                                placeholder="Mode.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementMode"
                                wire:keydown.arrow-down="incrementMode"
                                wire:keydown.enter="enterMode"
                                class="block w-full rounded-lg"
                            />
                            @error('mode_id')
                            <span class="text-red-500">{{'The Mode is Required.'}}</span>
                            @enderror

                            <div x-show="isTyped"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 x-cloak
                            >
                                <div class="absolute z-20 w-full mt-2">
                                    <div class="block py-1 shadow-md w-full
                    rounded-lg border-transparent flex-1 appearance-none border
                    bg-white text-gray-800 ring-1 ring-purple-600">
                                        <ul class="overflow-y-scroll h-96">
                                            @if($modeCollection)
                                                @forelse ($modeCollection as $i => $mode)
                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                            {{ $highlightMode === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setMode('{{$mode->vname}}','{{$mode->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $mode->vname }}
                                                    </li>
                                                @empty
                                                    <a href="{{route('modes.upsert',['0'])}}" role="button"
                                                       class="flex items-center justify-center bg-green-500 w-full h-8 text-white text-center">
                                                        Not found, Want to create new
                                                    </a>
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order No ----------------------------------------------------------------------------------------->

                <!-- receipt type ------------------------------------------------------------------------------------->

                <div class="flex flex-row rounded-lg">
                    <div class="xl:flex w-full rounded-lg">
                        <label for="receipt_type_name" class="w-[10rem] text-zinc-500 tracking-wide">Type</label>
                        <div x-data="{isTyped: @entangle('receipt_typeTyped')}" @click.away="isTyped = false"
                             class="w-full relative ">
                            <div>
                                <input
                                    id="receipt_type_name"
                                    type="search"
                                    wire:model.live="receipt_type_name"
                                    autocomplete="off"
                                    placeholder="Type Name.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementReceiptType"
                                    wire:keydown.arrow-down="incrementReceiptType"
                                    wire:keydown.enter="enterReceiptType"
                                    class="block w-full rounded-lg"
                                />

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
                                                @if($receipt_typeCollection)
                                                    @forelse ($receipt_typeCollection as $i => $receipt_type)
                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                            {{ $highlightReceiptType === $i ? 'bg-yellow-100' : '' }}"
                                                            wire:click.prevent="setReceiptType('{{$receipt_type->vname}}','{{$receipt_type->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $receipt_type->vname }}
                                                        </li>
                                                    @empty
                                                        <button
                                                            wire:click.prevent="receiptTypeSave('{{$receipt_type_name}}')"
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

                <!-- bank --------------------------------------------------------------------------------------------->
                <div class="flex flex-row ">
                    <div class="xl:flex w-full">
                        <label for="bank_name" class="w-[10rem] text-zinc-500 tracking-wide rounded-lg">Bank</label>
                        <div x-data="{isTyped: @entangle('bankTyped')}" @click.away="isTyped = false"
                             class="w-full relative ">
                            <div>
                                <input
                                    id="bank_name"
                                    type="search"
                                    wire:model.live="bank_name"
                                    autocomplete="off"
                                    placeholder="Bank Name.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementBank"
                                    wire:keydown.arrow-down="incrementBank"
                                    wire:keydown.enter="enterBank"
                                    class="block w-full rounded-lg "
                                />

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
                                                @if($bankCollection)
                                                    @forelse ($bankCollection as $i => $bank)
                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                            {{ $highlightBank === $i ? 'bg-yellow-100' : '' }}"
                                                            wire:click.prevent="setBank('{{$bank->vname}}','{{$bank->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $bank->vname }}
                                                        </li>
                                                    @empty
                                                        <button
                                                            wire:click.prevent="bankSave('{{$bank_name}}')"
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

                @if(\Aaran\Aadmin\Src\SaleEntry::hasOrder())
                    <div class="xl:flex flex-col gap-2 pt-6">
                        <div class="xl:flex w-full gap-2">
                            <label for="order_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Order NO</label>
                            <div x-data="{isTyped: @entangle('orderTyped')}" @click.away="isTyped = false"
                                 class="w-full">
                                <div class="relative">
                                    <input
                                        id="order_name"
                                        type="search"
                                        wire:model.live="order_name"
                                        autocomplete="off"
                                        placeholder="Order.."
                                        @focus="isTyped = true"
                                        @keydown.escape.window="isTyped = false"
                                        @keydown.tab.window="isTyped = false"
                                        @keydown.enter.prevent="isTyped = false"
                                        wire:keydown.arrow-up="decrementOrder"
                                        wire:keydown.arrow-down="incrementOrder"
                                        wire:keydown.enter="enterOrder"
                                        class="block w-full rounded-lg"
                                    />
                                    @error('order_id')
                                    <span class="text-red-500">{{'The Order is Required.'}}</span>
                                    @enderror

                                    <div x-show="isTyped"
                                         x-transition:leave="transition ease-in duration-100"
                                         x-transition:leave-start="opacity-100"
                                         x-transition:leave-end="opacity-0"
                                         x-cloak
                                    >
                                        <div class="absolute z-20 w-full mt-2">
                                            <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                                <ul class="overflow-y-scroll h-96">
                                                    @if($orderCollection)
                                                        @forelse ($orderCollection as $i => $order)
                                                            <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                                        {{ $highlightOrder === $i ? 'bg-yellow-100' : '' }}"
                                                                wire:click.prevent="setOrder('{{$order->vname}}','{{$order->id}}')"
                                                                x-on:click="isTyped = false">
                                                                {{ $order->vname }}
                                                            </li>
                                                        @empty
                                                            @livewire('controls.model.order-model',[$order_name])
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
                @endif

                <x-input.model-text wire:model="paid_to" :label="'Paid To'"/>

                <x-input.model-text wire:model="purpose" :label="'Purpose'"/>
                <x-input.model-date wire:model="vdate" :label="'Date'"/>
                <x-input.model-text wire:model="common.vname" :label="'Amount'"/>
                <x-input.model-text wire:model="remarks" :label="'Remarks'"/>
                <x-input.model-text wire:model="chq_no" :label="'Chq_no'"/>
                <x-input.model-date :label="'date'"/>
                <x-input.model-text wire:model="deposit_on" :label="'Deposit On'"/>
                <x-input.model-text wire:model="realised_on" :label="'Realised On'"/>
                <x-input.model-text wire:model="ref_no" :label="'Ref On'"/>
                <x-input.model-text wire:model="ref_amount" :label="'Ref Amount'"/>
                <x-input.model-text wire:model="verified_by" :label="'Verified_by'"/>
                <x-input.model-text wire:model="verified_on" :label="'Verified_On'"/>


            </div>
        </x-forms.create>


    </x-forms.m-panel>
</div>
