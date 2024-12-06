<div>
    <x-slot name="header">Account Book</x-slot>
    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-table.caption :caption="'Account Book'">
            {{$list->count()}}
        </x-table.caption>

        <!-- Table Header --------------------------------------------------------------------------------------------->

        <x-table.form>

            <x-slot:table_header name="table_header" class="bg-green-100">

                <x-table.header-serial width="20%"/>
                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">Type
                </x-table.header-text>
                <x-table.header-text sortIcon="none">Account No</x-table.header-text>
                <x-table.header-text sortIcon="none">Account Type</x-table.header-text>
                <x-table.header-text sortIcon="none">Opening Balance</x-table.header-text>
                <x-table.header-text sortIcon="none">Opening Date</x-table.header-text>
                <x-table.header-action/>

            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">

                @foreach($list as $index=>$row)

                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>

                        {{--                        <x-table.cell-text>{{\Aaran\Transaction\Models\AccountBook::common($row->bank->vname)}}</x-table.cell-text>--}}

                        <x-table.cell-text left>{{$row->transType->vname}}</x-table.cell-text>

                        <x-table.cell-text>{{$row->account_no}}</x-table.cell-text>

                        <x-table.cell-text>
                            {{  $row->accountType->vname }}
                        </x-table.cell-text>

                        <x-table.cell-text>{{  $row->vname }}
                        </x-table.cell-text>

                        <x-table.cell-text>{{date('d-m-Y',strtotime($row->opening_balance_date))}}</x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>

                    </x-table.row>

                @endforeach

            </x-slot:table_body>
        </x-table.form>

        <x-modal.delete/>

        <div class="pt-5">{{ $list->links() }}</div>

        <!-- Create  -------------------------------------------------------------------------------------------------->
        <x-forms.create :id="$common->vid">

            <div class="flex flex-col gap-3">

                {{--                <x-dropdown.wrapper label="Trans Type" type="trans_typeTyped">--}}
                {{--                    <div class="relative">--}}
                {{--                        <x-dropdown.input label="Trans Type" id="trans_type_name"--}}
                {{--                                          wire:model.live="trans_type_name"--}}
                {{--                                          wire:keydown.arrow-up="decrementTransType"--}}
                {{--                                          wire:keydown.arrow-down="incrementTransType"--}}
                {{--                                          wire:keydown.enter="enterTransType"/>--}}
                {{--                        <x-dropdown.select>--}}
                {{--                            @if($trans_typeCollection)--}}
                {{--                                @forelse ($trans_typeCollection as $i => $trans_type)--}}
                {{--                                    <x-dropdown.option highlight="{{$highlightTransType === $i}}"--}}
                {{--                                                       wire:click.prevent="setTransType('{{$trans_type->vname}}','{{$trans_type->id}}')">--}}
                {{--                                        {{ $trans_type->vname }}--}}
                {{--                                    </x-dropdown.option>--}}
                {{--                                @empty--}}
                {{--                                    <x-dropdown.new wire:click.prevent="transTypeSave('{{$trans_type_name}}')"--}}
                {{--                                                    label="Trans Type"/>--}}
                {{--                                @endforelse--}}
                {{--                            @endif--}}
                {{--                        </x-dropdown.select>--}}
                {{--                    </div>--}}
                {{--                </x-dropdown.wrapper>--}}

                <div class="w-full">
                    <x-input.model-select wire:model.live="trans_type_id">
                        <option value="Select" selected>Choose</option>
                        <option value="108">Cash Book</option>
                        <option value="109">Bank Book</option>
                        <option value="136">UPI</option>
                    </x-input.model-select>
                </div>

                @if($trans_type_id == 109 || $trans_type_id == 136)

                    <x-input.floating wire:model.live="account_name" label="Account Name"/>

                    <div>
                        <x-input.floating wire:model.live="account_no" label="Account No"/>
                        @error('account_no')
                        <div class="text-xs text-red-500">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <x-input.floating wire:model.live="ifsc_code" label="IFSC Code"/>
                        @error('ifsc_code')
                        <div class="text-xs text-red-500">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <x-dropdown.wrapper label="Bank" type="bankTyped">

                        <div class="relative">

                            <x-dropdown.input label="Bank" id="bank_name"
                                              wire:model.live="bank_name"
                                              wire:keydown.arrow-up="decrementBank"
                                              wire:keydown.arrow-down="incrementBank"
                                              wire:keydown.enter="enterBank"/>

                            <x-dropdown.select>
                                @if($bankCollection)

                                    @forelse ($bankCollection as $i => $bank)
                                        <x-dropdown.option highlight="{{$highlightBank === $i}}"
                                                           wire:click.prevent="setBank('{{$bank->vname}}','{{$bank->id}}')">
                                            {{ $bank->vname }}
                                        </x-dropdown.option>

                                    @empty
                                        <x-dropdown.new wire:click.prevent="bankSave('{{$bank_name}}')"
                                                        label="Bank"/>
                                    @endforelse
                                @endif

                            </x-dropdown.select>
                        </div>
                        @error('bank_id')
                        <div class="text-xs text-red-500">
                            {{$message}}
                        </div>
                        @enderror


                    </x-dropdown.wrapper>

                    <x-dropdown.wrapper label="Account Type" type="account_typeTyped">

                        <div class="relative">

                            <x-dropdown.input label="Account Type" id="account_type_name"
                                              wire:model.live="account_type_name"
                                              wire:keydown.arrow-up="decrementAccountType"
                                              wire:keydown.arrow-down="incrementAccountType"
                                              wire:keydown.enter="enterAccountType"/>

                            <x-dropdown.select>
                                @if($account_typeCollection)

                                    @forelse ($account_typeCollection as $i => $account_type)
                                        <x-dropdown.option highlight="{{$highlightAccountType === $i}}"
                                                           wire:click.prevent="setAccountType('{{$account_type->vname}}','{{$account_type->id}}')">
                                            {{ $account_type->vname }}
                                        </x-dropdown.option>

                                    @empty
                                        <x-dropdown.new wire:click.prevent="accountTypeSave('{{$account_type_name}}')"
                                                        label="Account Type"/>
                                    @endforelse
                                @endif

                            </x-dropdown.select>
                        </div>
                        @error('account_type_id')
                        <div class="text-xs text-red-500">
                            {{$message}}
                        </div>
                        @enderror
                    </x-dropdown.wrapper>

                    <x-input.floating wire:model.live="branch" label="Branch"/>

                @endif

                <div>
                    <x-input.floating wire:model.live="common.vname" label="Opening Balance"/>
                    @error('common.vname')
                    <div class="text-xs text-red-500">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <x-input.floating wire:model.live="opening_balance_date" type="date" label="Opening Balance date"/>

                <x-input.floating wire:model.live="notes" label="Notes"/>


            </div>
        </x-forms.create>
    </x-forms.m-panel>
</div>
