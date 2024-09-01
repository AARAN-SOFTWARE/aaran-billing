<div>
    <x-slot name="header">Payment</x-slot>

    <x-forms.m-panel>
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-table.caption :caption="'Payment'">
            {{$list->count()}}
        </x-table.caption>

        <x-table.form>

            <!-- Table Header  ---------------------------------------------------------------------------------------->

            <x-slot:table_header name="table_header" class="bg-green-100">

                <x-table.header-serial></x-table.header-serial>

                <x-table.header-text>Chq No</x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('id')" sort-icon="{{$getListForm->sortAsc}}">Contact Name
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('id')" sort-icon="{{$getListForm->sortAsc}}">Receipt Type
                </x-table.header-text>
                <x-table.header-text wire:click.prevent="sortBy('id')" sort-icon="{{$getListForm->sortAsc}}">Mode
                </x-table.header-text>
                <x-table.header-text>Status</x-table.header-text>

                <x-table.header-action/>
            </x-slot:table_header>

            <!-- Table Body  ------------------------------------------------------------------------------------------>

            <x-slot:table_body name="table_body">
                @foreach($list as $index=>$row)
                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->contact->vname}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->vname}}</x-table.cell-text>
                        <x-table.cell-text>
                            {{\Aaran\Entries\Models\Payment::common($row->receipttype_id)}}
                        </x-table.cell-text>
                        <x-table.cell-text>{{$row->mode}}</x-table.cell-text>
                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                @endforeach
            </x-slot:table_body>

        </x-table.form>

        <x-modal.delete/>

        <!-- Create  -------------------------------------------------------------------------------------------------->

        <x-forms.create :id="$common->vid">

            <div class="flex flex-col  gap-3">

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
                                    <x-dropdown.option highlight="{{$highlightContact === $i  }}"
                                                       wire:click.prevent="setContact('{{$contact->vname}}','{{$contact->id}}')">
                                        {{ $contact->vname }}
                                    </x-dropdown.option>
                                @empty
                                    <a href="{{route('contacts.upsert',['0'])}}" role="button"
                                       class="flex items-center justify-center bg-green-100 w-full h-8 text-green-600 font-bold hover:scale-105 text-center">
                                        Not found , Want to create new
                                    </a>
                                @endforelse
                            @endif
                        </x-dropdown.select>
                    </div>
                </x-dropdown.wrapper>

                <x-input.model-date wire:model="vdate" :label="'Date'"/>

                <x-input.floating wire:model="common.vname" label="Amount"/>

                <!-- receipt type ------------------------------------------------------------------------------------->

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
                                    <x-dropdown.option highlight="{{$highlightReceiptType === $i  }}"
                                                       wire:click.prevent="setReceiptType('{{$receipt_type->vname}}','{{$receipt_type->id}}')">
                                        {{ $receipt_type->vname }}
                                    </x-dropdown.option>
                                @empty
                                    <button
                                        wire:click.prevent="receiptTypeSave('{{$receipt_type_name}}')"
                                        class="text-white bg-green-500 text-center w-full">
                                        create
                                    </button>
                                @endforelse
                            @endif
                        </x-dropdown.select>
                    </div>
                </x-dropdown.wrapper>

                <!-- bank --------------------------------------------------------------------------------------------->

                @if($receipt_type_name =='Cheque')
                    <x-dropdown.wrapper label="Bank" type="bankTyped">
                        <div class="relative ">
                            <x-dropdown.input label="Bank" id="bank_name"
                                              wire:model.live="bank_name"
                                              wire:keydown.arrow-up="decrementBank"
                                              wire:keydown.arrow-down="incrementBank"
                                              wire:keydown.enter="enterBank"/>
                            <x-dropdown.select>
                                @if($bankCollection)
                                    @forelse ($bankCollection as $i => $bank)
                                        <x-dropdown.option highlight="{{$highlightBank === $i  }}"
                                                           wire:click.prevent="setBank('{{$bank->vname}}','{{$bank->id}}')">
                                            {{ $bank->vname }}
                                        </x-dropdown.option>
                                    @empty
                                        <button
                                            wire:click.prevent="bankSave('{{$bank_name}}')"
                                            class="text-white bg-green-500 text-center w-full">
                                            create
                                        </button>
                                    @endforelse
                                @endif
                            </x-dropdown.select>
                        </div>
                    </x-dropdown.wrapper>

                    <x-input.floating wire:model="chq_no" label="Cheque No"/>

                    <x-input.model-date wire:model="chq_date" :label="'Chq.Date'"/>

                @endif

            </div>
        </x-forms.create>

    </x-forms.m-panel>
</div>
