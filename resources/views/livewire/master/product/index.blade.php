<div>
    <x-slot name="header">Products</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-table.caption :caption="'Products'">
            {{$list->count()}}
        </x-table.caption>

        <!-- Table Header --------------------------------------------------------------------------------------------->

        <x-table.form>

            <x-slot:table_header name="table_header" class="bg-green-100">

                <x-table.header-serial width="20%"/>

                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">Product
                </x-table.header-text>

                <x-table.header-text sortIcon="none">Product&nbsp;Type</x-table.header-text>

                <x-table.header-text sortIcon="none">HSN&nbsp;Code</x-table.header-text>
                <x-table.header-text sortIcon="none">Gst&nbsp;Percent</x-table.header-text>
                <x-table.header-text sortIcon="none">Opening&nbsp;qty</x-table.header-text>

                <x-table.header-action/>

            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">

                @foreach($list as $index=>$row)

                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->vname}}</x-table.cell-text>
                        <x-table.cell-text>{{\Aaran\Master\Models\Product::common($row->producttype_id)}}</x-table.cell-text>
                        <x-table.cell-text>
                            {{\Aaran\Master\Models\Product::common($row->hsncode_id)}}
                        </x-table.cell-text>
                        <x-table.cell-text>{{\Aaran\Master\Models\Product::common($row->gstpercent_id)}} %</x-table.cell-text>
                        <x-table.cell-text>{{$row->initial_quantity}}</x-table.cell-text>
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

                <!-- Product ------------------------------------------------------------------------------------------>

                <x-input.floating wire:model="common.vname" label="Product Name"/>

                <x-dropdown.wrapper label="Product Type" type="producttypeTyped">

                    <div class="relative">
                        <x-dropdown.input label="Product Type" id="producttype_name"
                                          wire:model.live="producttype_name"
                                          wire:keydown.arrow-up="decrementProductType"
                                          wire:keydown.arrow-down="incrementProductType"
                                          wire:keydown.enter="enterProductType"/>

                        <x-dropdown.select>
                            @if($producttypeCollection)
                                @forelse ($producttypeCollection as $i => $producttype)

                                    <x-dropdown.option highlight="{{$highlightProductType === $i  }}"
                                                       wire:click.prevent="setProductType('{{$producttype->vname}}','{{$producttype->id}}')">
                                        {{ $producttype->vname }}
                                    </x-dropdown.option>

                                @empty

                                    <button
                                        wire:click.prevent="productTypeSave('{{$producttype_name}}')"
                                        class="text-white bg-green-500 text-center w-full">
                                        create
                                    </button>

                                @endforelse
                            @endif

                        </x-dropdown.select>
                    </div>
                </x-dropdown.wrapper>

                {{--                <div class="flex flex-row py-3 gap-3">--}}
                {{--                    <div class="xl:flex w-full gap-2">--}}
                {{--                        <label for="producttype_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Product Type</label>--}}
                {{--                        <div x-data="{isTyped: @entangle('producttypeTyped')}" @click.away="isTyped = false" class="w-full relative">--}}
                {{--                            <div>--}}
                {{--                                <input--}}
                {{--                                    id="producttype_name"--}}
                {{--                                    type="search"--}}
                {{--                                    wire:model.live="producttype_name"--}}
                {{--                                    autocomplete="off"--}}
                {{--                                    placeholder="Product Type Name.."--}}
                {{--                                    @focus="isTyped = true"--}}
                {{--                                    @keydown.escape.window="isTyped = false"--}}
                {{--                                    @keydown.tab.window="isTyped = false"--}}
                {{--                                    @keydown.enter.prevent="isTyped = false"--}}
                {{--                                    wire:keydown.arrow-up="decrementProductType"--}}
                {{--                                    wire:keydown.arrow-down="incrementProductType"--}}
                {{--                                    wire:keydown.enter="enterProductType"--}}
                {{--                                    class="block w-full purple-textbox"--}}
                {{--                                />--}}

                {{--                                <!-- Product Type Dropdown -->--}}
                {{--                                <div x-show="isTyped"--}}
                {{--                                     x-transition:leave="transition ease-in duration-100"--}}
                {{--                                     x-transition:leave-start="opacity-100"--}}
                {{--                                     x-transition:leave-end="opacity-0"--}}
                {{--                                     x-cloak--}}
                {{--                                >--}}
                {{--                                    <div class="absolute z-20 w-full mt-2">--}}
                {{--                                        <div class="block py-1 shadow-md w-full rounded-lg border-transparent flex-1 appearance-none border--}}
                {{--                             bg-white text-gray-800 ring-1 ring-purple-600">--}}
                {{--                                            <ul class="overflow-y-scroll h-96">--}}
                {{--                                                @if($producttypeCollection)--}}
                {{--                                                    @forelse ($producttypeCollection as $i => $producttype)--}}
                {{--                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8--}}
                {{--                                            {{ $highlightProductType === $i ? 'bg-yellow-100' : '' }}"--}}
                {{--                                                            wire:click.prevent="setProductType('{{$producttype->vname}}','{{$producttype->id}}')"--}}
                {{--                                                            x-on:click="isTyped = false">--}}
                {{--                                                            {{ $producttype->vname }}--}}
                {{--                                                        </li>--}}
                {{--                                                    @empty--}}
                {{--                                                        <button--}}
                {{--                                                            wire:click.prevent="productTypeSave('{{$producttype_name}}')"--}}
                {{--                                                            class="text-white bg-green-500 text-center w-full">--}}
                {{--                                                            create--}}
                {{--                                                        </button>--}}
                {{--                                                    @endforelse--}}
                {{--                                                @endif--}}
                {{--                                            </ul>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <!-- HSN Code ----------------------------------------------------------------------------------------->

                <x-dropdown.wrapper label="HSN Code" type="hsncodeTyped">

                    <div class="relative">

                        <x-dropdown.input label="HSN Code" id="hsncode_name"
                                          wire:model.live="hsncode_name"
                                          wire:keydown.arrow-up="decrementHsncode"
                                          wire:keydown.arrow-down="incrementHsncode"
                                          wire:keydown.enter="enterHsncode"/>

                        <x-dropdown.select>
                            @if($hsncodeCollection)

                                @forelse ($hsncodeCollection as $i => $hsncode)
                                    <x-dropdown.option highlight="{{$highlightHsncode === $i  }}"
                                                       wire:click.prevent="setHsncode('{{$hsncode->vname}}','{{$hsncode->id}}')">
                                        {{ $hsncode->vname }}
                                    </x-dropdown.option>

                                @empty

                                    <button
                                        wire:click.prevent="hsncodeSave('{{$hsncode_name}}')"
                                        class="text-white bg-green-500 text-center w-full">
                                        create
                                    </button>

                                @endforelse
                            @endif

                        </x-dropdown.select>
                    </div>
                </x-dropdown.wrapper>

                <!-- Unit Type ---------------------------------------------------------------------------------------->

                <x-dropdown.wrapper label="Unit" type="unitTyped">
                    <div class="relative ">

                        <x-dropdown.input label="Unit" id="unit_name"
                                          wire:model.live="unit_name"
                                          wire:keydown.arrow-up="decrementUnit"
                                          wire:keydown.arrow-down="incrementUnit"
                                          wire:keydown.enter="enterUnit"/>

                        <x-dropdown.select>
                            @if($unitCollection)
                                @forelse ($unitCollection as $i => $unit)

                                    <x-dropdown.option highlight="{{$highlightUnit === $i  }}"
                                                       wire:click.prevent="setUnit('{{$unit->vname}}','{{$unit->id}}')">
                                        {{ $unit->vname }}
                                    </x-dropdown.option>

                                @empty

                                    <button
                                        wire:click.prevent="unitSave('{{$unit_name}}')"
                                        class="text-white bg-green-500 text-center w-full">
                                        create
                                    </button>

                                @endforelse
                            @endif

                        </x-dropdown.select>
                    </div>
                </x-dropdown.wrapper>

                <!-- GST Percent -------------------------------------------------------------------------------------->

                <x-dropdown.wrapper label="GST Percent" type="gstpercentTyped">
                    <div class="relative ">

                        <x-dropdown.input label="GST Percent" id="gstpercent_name"
                                          wire:model.live="gstpercent_name"
                                          wire:keydown.arrow-up="decrementGstPercent"
                                          wire:keydown.arrow-down="incrementGstPercent"
                                          wire:keydown.enter="enterGstPercent"/>
                        <x-dropdown.select>

                            @if($gstpercentCollection)
                                @forelse ($gstpercentCollection as $i => $gstpercent)

                                    <x-dropdown.option highlight="{{$highlightGstPercent === $i}}"
                                                       wire:click.prevent="setGstPercent('{{$gstpercent->vname}}','{{$gstpercent->id}}')">
                                        {{ $gstpercent->vname }}
                                    </x-dropdown.option>

                                @empty

                                    <button
                                        wire:click.prevent="gstPercentSave('{{$gstpercent_name}}')"
                                        class="text-white bg-green-500 text-center w-full">
                                        create
                                    </button>

                                @endforelse
                            @endif

                        </x-dropdown.select>
                    </div>

                </x-dropdown.wrapper>

                <x-input.floating wire:model="quantity" label="Opening Quantity"/>
                <x-input.floating wire:model="price" label="Opening Price"/>

            </div>

        </x-forms.create>

    </x-forms.m-panel>
</div>
