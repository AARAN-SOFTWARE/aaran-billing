<div>
    <x-slot name="header">Bank Book</x-slot>
    <x-forms.m-panel>

        <x-forms.top-controls :show-filters="$showFilters"/>

        {{--        <div class="flex sm:flex-row sm:justify-between sm:items-center  flex-col gap-6 py-4 print:hidden">--}}
        {{--            <div class="w-2/4 flex items-center space-x-2">--}}
        {{--                <x-input.search-bar wire:model.live="getListForm.searches"--}}
        {{--                                    wire:keydown.escape="$set('getListForm.searches', '')" label="Search"/>--}}
        {{--                --}}{{--        <x-icons.search-new wire:model.live="getListForm.searches"/>--}}
        {{--                <x-input.toggle-filter :show-filters="$showFilters"/>--}}
        {{--            </div>--}}
        {{--            <div class="flex sm:justify-center justify-between">--}}
        {{--                <x-forms.per-page/>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <x-input.advance-search :show-filters="$showFilters"/>

        <div class="grid grid-cols-3 gap-16 justify-items-center py-10">
            <x-cards.card-4 :list="$bankBookData" :data="$payments"/>
        </div>

        <x-forms.create :id="$common->vid" :max-width="'6xl'" wire:click="contactUpdate">

            <!-- Receipt & Payment  ----------------------------------------------------------------------------------->

            <div class="flex gap-x-5 gap-y-3">

                <!-- Left Area  --------------------------------------------------------------------------------------->

                <div class="w-1/2 space-y-3">

                    <!-- Party Name ----------------------------------------------------------------------------------->

                    <div class="flex flex-row gap-4">
                        <x-radio.btn wire:model.live="mode_id" value="110">Receipt</x-radio.btn>
                        <x-radio.btn wire:model.live="mode_id" value="111">Payment</x-radio.btn>
                    </div>

                    <x-input.model-select wire:model.live="account_book_id">
                        <option value="" selected>Choose</option>
                        @foreach($account_books as $account_book)
                            <option value="{{ $account_book->id }}">
                                {{ $account_book->vname . ' (ACC-No: ' . $account_book->account_no . ')' }}
                            </option>
                        @endforeach
                    </x-input.model-select>

                    {{--                    @if($trans_type_id)--}}
                    {{--                        <div>--}}
                    {{--                            <strong>Transaction Type ID:</strong> {{ $trans_type_id }}--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}

                    <x-dropdown.wrapper label="Contact Name" type="contactTyped">
                        <div class="relative ">

                            <x-dropdown.input label="Contact Name*" id="contact_name"
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
                                        <x-dropdown.new href="{{route('contacts.upsert',['0'])}}" label="Contact"/>
                                    @endforelse
                                @endif
                            </x-dropdown.select>

                        </div>
                    </x-dropdown.wrapper>

                    <x-input.floating wire:model="common.vname" :label="'Amount*'"/>

                    <x-input.model-date wire:model="vdate" :label="'Date'"/>

                    <x-input.floating wire:model="remarks" :label="'Remarks'"/>

                </div>

                <!-- Right Area  -------------------------------------------------------------------------------------->

                <div class="w-1/2 space-y-3">

                    <x-tabs.tab-panel>

                        <x-slot name="tabs">
                            <x-tabs.tab>Instrument</x-tabs.tab>
                            <x-tabs.tab>Against</x-tabs.tab>
                            <x-tabs.tab>Purpose</x-tabs.tab>
                            <x-tabs.tab>Admin</x-tabs.tab>
                        </x-slot>

                        <x-slot name="content">

                            <!-- Tab 1  ------------------------------------------------------------------------------->

                            <x-tabs.content>

                                <div class="flex flex-col gap-3">

                                    <!-- receipt type ----------------------------------------------------------------->

                                    {{--                                    @if($trans_type_id == 109)--}}

                                    <x-dropdown.wrapper label="Type" type="receipt_typeTyped">

                                        <div class="relative ">

                                            <x-dropdown.input label="Type" id="receipt_type_name"
                                                              wire:model.live="receipt_type_name"
                                                              wire:keydown.arrow-up="decrementReceiptType"
                                                              wire:keydown.arrow-down="incrementReceiptType"
                                                              wire:keydown.enter="enterReceiptType"/>

                                            <x-dropdown.select>
                                                @if($receipt_typeCollection)
                                                    @forelse ($receipt_typeCollection as $i => $receipt_type)
                                                        <x-dropdown.option
                                                            highlight="{{$highlightReceiptType === $i  }}"
                                                            wire:click.prevent="setReceiptType('{{$receipt_type->vname}}','{{$receipt_type->id}}')">
                                                            {{ $receipt_type->vname }}
                                                        </x-dropdown.option>
                                                    @empty
                                                        <x-dropdown.new
                                                            wire:click.prevent="receiptTypeSave('{{$receipt_type_name}}')"
                                                            label="Receipt"/>
                                                    @endforelse
                                                @endif
                                            </x-dropdown.select>

                                        </div>

                                    </x-dropdown.wrapper>
                                    {{--                                    @endif--}}

                                    <!-- bank ------------------------------------------------------------------------->

                                    <x-dropdown.wrapper label="Instrument Bank" type="instrumentBankTyped">
                                        <div class="relative">
                                            <x-dropdown.input
                                                label="Instrument Bank"
                                                id="instrument_bank_name"
                                                wire:model.live="instrument_bank_name"
                                                wire:keydown.arrow-up="decrementInstrumentBank"
                                                wire:keydown.arrow-down="incrementInstrumentBank"
                                                wire:keydown.enter="enterInstrumentBank"
                                            />

                                            <x-dropdown.select>
                                                @if($instrumentBankCollection)
                                                    @forelse ($instrumentBankCollection as $i => $instrumentBank)
                                                        <x-dropdown.option
                                                            highlight="{{ $highlightInstrumentBank === $i }}"
                                                            wire:click.prevent="setInstrumentBank('{{ $instrumentBank->vname }}', '{{ $instrumentBank->id }}')">
                                                            {{ $instrumentBank->vname }}
                                                        </x-dropdown.option>
                                                    @empty
                                                        <x-dropdown.new
                                                            wire:click.prevent="instrumentBankSave('{{ $instrument_bank_name }}')"
                                                            label="Instrument Bank Details"/>
                                                    @endforelse
                                                @endif
                                            </x-dropdown.select>
                                        </div>
                                    </x-dropdown.wrapper>

                                    @if($receipt_type_id == 86)
                                        <x-input.model-date :label="'Chq.Date'"/>
                                        <x-input.floating wire:model="chq_no" :label="'Chq_no'"/>

                                    @endif

                                    <x-input.model-date wire:model="deposit_on" :label="'Deposit On'"/>
                                    <x-input.model-date wire:model="realised_on" :label="'Realised On'"/>

                                </div>

                            </x-tabs.content>

                            <!-- Tab 2  ------------------------------------------------------------------------------->

                            <x-tabs.content>

                                <div class="flex flex-col gap-3">

                                    <!-- Order No --------------------------------------------------------------------->

                                    <x-dropdown.wrapper label="Order NO" type="orderTyped">

                                        <div class="relative">
                                            <x-dropdown.input label="Order NO" id="order_name"
                                                              wire:model.live="order_name"
                                                              wire:keydown.arrow-up="decrementOrder"
                                                              wire:keydown.arrow-down="incrementOrder"
                                                              wire:keydown.enter="enterOrder"/>

                                            <x-dropdown.select>
                                                @if($orderCollection)

                                                    @forelse ($orderCollection as $i => $order)

                                                        <x-dropdown.option highlight="{{$highlightOrder === $i  }}"
                                                                           wire:click.prevent="setOrder('{{$order->vname}}','{{$order->id}}')">
                                                            {{ $order->vname }}
                                                        </x-dropdown.option>
                                                    @empty
                                                        @livewire('controls.model.order-model',[$order_name])
                                                    @endforelse
                                                @endif
                                            </x-dropdown.select>
                                        </div>

                                    </x-dropdown.wrapper>

                                    <x-input.floating wire:model="ref_no" :label="'Against'"/>

                                    <x-input.floating wire:model="ref_amount" :label="'Ref Amount'"/>

                                </div>

                            </x-tabs.content>

                            <!-- Tab 3  ------------------------------------------------------------------------------->

                            <x-tabs.content>

                                <div class="flex flex-col gap-3">

                                    <x-input.floating wire:model="paid_to" :label="'Paid To'"/>

                                    <x-input.floating wire:model="purpose" :label="'Purpose'"/>

                                </div>

                            </x-tabs.content>

                            <!-- Tab 4  ------------------------------------------------------------------------------->

                            <x-tabs.content>
                                <div class="flex flex-col gap-3">
                                    <x-input.floating wire:model="verified_by" :label="'Verified_by'"/>
                                    <x-input.model-date wire:model="verified_on" :label="'Verified_On'"/>
                                </div>
                            </x-tabs.content>

                        </x-slot>
                    </x-tabs.tab-panel>

                </div>
            </div>
        </x-forms.create>
    </x-forms.m-panel>
</div>
