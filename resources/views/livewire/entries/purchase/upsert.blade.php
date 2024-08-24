<div>
    <x-slot name="header">Purchase</x-slot>

    <x-forms.m-panel>

        <section class="grid grid-cols-2">

            <div class="mt-3 flex flex-col gap-5 ">

                <!-- Party Name --------------------------------------------------------------------------------------->
                <div class="xl:flex w-full gap-2">
                    <label for="contact_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Party Name</label>
                    <div x-data="{isTyped: @entangle('contactTyped')}" @click.away="isTyped = false" class="w-full">
                        <div class="relative ">
                            <input
                                id="contact_name"
                                type="search"
                                wire:model.live="contact_name"
                                autocomplete="off"
                                placeholder="Party Name.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementContact"
                                wire:keydown.arrow-down="incrementContact"
                                wire:keydown.enter="enterContact"
                                class="block w-full rounded-lg "
                            />
                            @error('contact_id')
                            <span class="text-red-500">{{'The Party Name is Required.'}}</span>
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
                                            @if($contactCollection)
                                                @forelse ($contactCollection as $i => $contact)

                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                                        {{ $highlightContact === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setContact('{{$contact->vname}}','{{$contact->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $contact->vname }}
                                                    </li>

                                                @empty
                                                    <a href="{{route('contacts.upsert',['0'])}}" role="button"
                                                       class="flex items-center justify-center bg-green-500 w-full h-8 text-white text-center">
                                                        Not found , Want to create new
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

                <!-- Order No --------------------------------------------------------------------------------------------->

                @if(\Aaran\Aadmin\Src\SaleEntry::hasOrder())
                    <div class="xl:flex flex-col gap-2 ">
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

                <x-input.model-text wire:model="purchase_no" :label="'Purchase No'"/>
            </div>

            <!-- Top Right Area-------------------------------------------------------------------------------------------->

            <div class="ml-5 mt-3 flex flex-col gap-5">


                <x-input.model-text wire:model="entry_no" :label="'Entry No'"/>

                <x-input.model-text wire:model="purchase_date" :label="'Purchase Date'" type="date"/>

                <x-input.model-select wire:model="sales_type" :label="'Sales Type'">
                    <option class="text-gray-400"> choose ..</option>
                    <option value="CGST-SGST">CGST-SGST</option>
                    <option value="IGST">IGST</option>
                </x-input.model-select>

            </div>
        </section>
        <x-forms.section-border/>


        <!-- Purchase Items  -------------------------------------------------------------------------------------------------->

        <section class="text-xl font-bold text-orange-400">
            Purchase Item
        </section>

        <section class="md:flex md:flex-row w-full gap-0.5">

            <!--Product Name ---------------------------------------------------------------------------------------------->
            <div class="w-full">
                <label for="product_name"></label>
                <div x-data="{isTyped: @entangle('productTyped')}" @click.away="isTyped = false">
                    <div class="relative">
                        <input
                            id="product_name"
                            type="search"
                            wire:model.live="product_name"
                            autocomplete="off"
                            placeholder="Product Name.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementProduct"
                            wire:keydown.arrow-down="incrementProduct"
                            wire:keydown.enter="enterProduct"
                            class="block w-full rounded-lg-no-rounded"
                        />

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
                                        @if($productCollection)
                                            @forelse ($productCollection as $i => $product)

                                                <li class="cursor-pointer w-full h-fit px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300
                                                        {{ $highlightProduct === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setProduct('{{$product->vname}}','{{$product->id}}','{{$product->gstpercent_id}}')"
                                                    x-on:click="isTyped = false">
                                                    {{ $product->vname }} &nbsp;-&nbsp; GST&nbsp;:
                                                    &nbsp;{{\Aaran\Entries\Models\Sale::commons($product->gstpercent_id)}}
                                                    %
                                                </li>

                                            @empty
                                                @livewire('controls.model.product-model',[$product_name])
                                            @endforelse
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--Product Description --------------------------------------------------------------------------------------->

            @if(\Aaran\Aadmin\Src\SaleEntry::hasProductDescription())
                <div class="w-full">
                    <label for="qty"></label>
                    <input id="qty" wire:model.live="description" class="block w-full rounded-lg-no-rounded"
                           autocomplete="false"
                           placeholder="description">
                </div>
            @endif


            <!--Colour Name ----------------------------------------------------------------------------------------------->

            @if(\Aaran\Aadmin\Src\SaleEntry::hasColour())
                <div class="w-full">
                    <label for="colour_name"></label>
                    <div x-data="{isTyped: @entangle('colourTyped')}" @click.away="isTyped = false">
                        <div class="relative">
                            <input
                                id="colour_name"
                                type="search"
                                wire:model.live="colour_name"
                                autocomplete="off"
                                placeholder="Colour Name.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementColour"
                                wire:keydown.arrow-down="incrementColour"
                                wire:keydown.enter="enterColour"
                                class="block w-full rounded-lg-no-rounded"
                            />

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
                                            @if($colourCollection)
                                                @forelse ($colourCollection as $i => $colour)

                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                                        {{ $highlightColour === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setColour('{{$colour->vname}}','{{$colour->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $colour->vname }}
                                                    </li>

                                                @empty
                                                    <button wire:click.prevent="colourSave('{{$colour_name}}')"
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
            @endif

            <!--Size ------------------------------------------------------------------------------------------------------>

            @if(\Aaran\Aadmin\Src\SaleEntry::hasSize())
                <div class="w-full">
                    <label for="size_name"></label>
                    <div x-data="{isTyped: @entangle('sizeTyped')}" @click.away="isTyped = false">
                        <div class="relative">
                            <input
                                id="size_name"
                                type="search"
                                wire:model.live="size_name"
                                autocomplete="off"
                                placeholder="Size.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementSize"
                                wire:keydown.arrow-down="incrementSize"
                                wire:keydown.enter="enterSize"
                                class="block w-full rounded-lg-no-rounded"
                            />

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
                                            @if($sizeCollection)
                                                @forelse ($sizeCollection as $i => $size)

                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                                        {{ $highlightSize === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setSize('{{$size->vname}}','{{$size->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $size->vname }}
                                                    </li>

                                                @empty
                                                    <button wire:click.prevent="sizeSave('{{$size_name}}')"
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
            @endif

            <!-- Quantity ------------------------------------------------------------------------------------------------->
            <div class="w-full">
                <label for="qty"></label>
                <input id="qty" wire:model.live="qty" class="block w-full rounded-lg-no-rounded"
                       autocomplete="false"
                       placeholder="Qty">
            </div>

            <!-- Price ---------------------------------------------------------------------------------------------------->
            <div class="w-full">
                <label for="price"></label>
                <input id="price" wire:model.live="price" class="block w-full rounded-lg-no-rounded"
                       autocomplete="false"
                       placeholder="price">
            </div>
            <button wire:click="addItems"
                    class="px-3 justify-items-center py-1.5 md:px-3 bg-green-500 text-white font-semibold tracking-wider ">
                Add
            </button>
        </section>

        <!-- Display Items ----------------------------------------------------------------------------------------------->
        <section>
            <div class="py-2 mt-5 overflow-x-auto">

                <table class="overflow-x-auto md:w-full ">
                    <thead>
                    <tr class="h-8 text-xs bg-gray-100 border border-gray-300">

                        <th class="w-12 px-2 text-center border border-gray-300">#</th>

                        @if(\Aaran\Aadmin\Src\SaleEntry::hasPo_no())
                            <th class="px-2 text-center border border-gray-300">Po</th>
                        @endif

                        @if(\Aaran\Aadmin\Src\SaleEntry::hasDc_no())
                            <th class="px-2 text-center border border-gray-300">Dc</th>
                        @endif

                        @if(\Aaran\Aadmin\Src\SaleEntry::hasNo_of_roll())
                            <th class="px-2 text-center border border-gray-300">No of Roll</th>
                        @endif

                        <th class="px-2 text-center border border-gray-300">PRODUCT</th>

                        @if(\Aaran\Aadmin\Src\SaleEntry::hasColour())
                            <th class="px-2 text-center border border-gray-300">COLOUR</th>
                        @endif

                        @if(\Aaran\Aadmin\Src\SaleEntry::hasSize())
                            <th class="px-2 text-center border border-gray-300">SIZE</th>
                        @endif

                        <th class="px-2 text-center border border-gray-300">QTY</th>
                        <th class="px-2 text-center border border-gray-300">PRICE</th>
                        <th class="px-2 text-center border border-gray-300">TAXABLE</th>
                        <th class="px-2 text-center border border-gray-300">GST PERCENT</th>
                        <th class="px-2 text-center border border-gray-300">GST</th>
                        <th class="px-2 text-center border border-gray-300">SUBTOTAL</th>
                        <th class="w-12 px-1 text-center border border-gray-300">ACTION</th>
                    </tr>
                    </thead>

                    <!--Display Table Items ------------------------------------------------------------------------------->
                    <tbody>

                    @if ($itemList)

                        @foreach($itemList as $index => $row)

                            <tr class="border border-gray-400 hover:bg-amber-50">
                                <td class="text-center border border-gray-300 bg-gray-100">
                                    <button class="w-full h-full cursor-pointer"
                                            wire:click.prevent="changeItems({{$index}})">
                                        {{$index+1}}
                                    </button>
                                </td>

                                <td class="px-2 text-left border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">
                                    <div>{{$row['product_name']}}
                                        @if($row['description'])
                                            &nbsp;-&nbsp;
                                        @endif
                                        @if(\Aaran\Aadmin\Src\SaleEntry::hasProductDescription())
                                            {{ $row['description']}}
                                        @endif
                                    </div>

                                </td>

                                @if(\Aaran\Aadmin\Src\SaleEntry::hasColour())
                                    <td class="px-2 text-left border border-gray-300 cursor-pointer"
                                        wire:click.prevent="changeItems({{$index}})">{{$row['colour_name']}}</td>
                                @endif

                                @if(\Aaran\Aadmin\Src\SaleEntry::hasSize())
                                    <td class="px-2 text-left border border-gray-300 cursor-pointer"
                                        wire:click.prevent="changeItems({{$index}})">{{$row['size_name']}}</td>
                                @endif

                                <td class="px-2 text-center border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['qty']}}</td>
                                <td class="px-2 text-right border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['price']}}</td>
                                <td class="px-2 text-right border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['taxable']}}</td>
                                <td class="px-2 text-center border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['gst_percent']}}</td>
                                <td class="px-2 text-right border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['gst_amount']}}</td>
                                <td class="px-2 text-right border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['subtotal']}}</td>
                                <td class="text-center border border-gray-300">
                                    <button wire:click.prevent="removeItems({{$index}})"
                                            class="py-1.5 w-full text-red-500 items-center ">
                                        <x-icons.icon icon="trash" class="block w-auto h-6"/>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                    <!-- Table Bottom ------------------------------------------------------------------------------------->
                    <tfoot class="mt-2">
                    <tr class="h-8 text-sm border border-gray-400 bg-cyan-50">

                        @if(\Aaran\Aadmin\Src\SaleEntry::hasSize() or \Aaran\Aadmin\Src\SaleEntry::hasColour())
                            <td colspan="4" class="px-2 text-xs text-right border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;</td>
                        @else
                            <td colspan="2" class="px-2 text-xs text-right border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;</td>
                        @endif

                        <td class="px-2 text-center border border-gray-300">{{$total_qty}}</td>
                        <td class="px-2 text-center border border-gray-300">&nbsp;</td>
                        <td class="px-2 text-right border border-gray-300">{{$total_taxable}}</td>
                        <td class="px-2 text-center border border-gray-300">&nbsp;</td>
                        <td class="px-2 text-right border border-gray-300">{{$total_gst}}</td>
                        <td class="px-2 text-right border border-gray-300">{{$grandtotalBeforeRound}}</td>
                        <td class="px-2 text-center border border-gray-300">&nbsp;</td>
                    </tr>
                    </tfoot>
                </table>

            </div>

        </section>
        <x-forms.section-border/>

        <section class="grid grid-cols-2 gap-2 ">
            <!-- Bottom Left -------------------------------------------------------------------------------------------------->
            <section class="w-full">
                <div class="w-3/4">
                    <x-accordion.accordion :heading="'Additional Charges'">
                        <x-input.model-text wire:model="additional" wire:change.debounce="calculateTotal"
                                            class="md:text-right rounded-lg w-full" :label="'Additional'"/>
                        <!-- Ledger ----------------------------------------------------------------------------------->
                        <div class="flex flex-col gap-2 pt-5">
                            <div class="xl:flex w-full gap-2">

                                <label for="ledger_name"
                                       class="w-[10rem] text-zinc-500 tracking-wide py-2">Ledger</label>
                                <div x-data="{isTyped: @entangle('ledgerTyped')}" @click.away="isTyped = false"
                                     class='w-full'>
                                    <div class="relative">
                                        <input
                                            id="ledger_name"
                                            type="search"
                                            wire:model.live="ledger_name"
                                            autocomplete="off"
                                            placeholder="Ledger.."
                                            @focus="isTyped = true"
                                            @keydown.escape.window="isTyped = false"
                                            @keydown.tab.window="isTyped = false"
                                            @keydown.enter.prevent="isTyped = false"
                                            wire:keydown.arrow-up="decrementLedger"
                                            wire:keydown.arrow-down="incrementLedger"
                                            wire:keydown.enter="enterLedger"
                                            class="block w-full rounded-lg"
                                        />
                                        @error('ledger_id')
                                        <span class="text-red-500">{{'The Ledger is Required.'}}</span>
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
                                                        @if($ledgerCollection)
                                                            @forelse ($ledgerCollection as $i => $ledger)
                                                                <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                                        {{ $highlightLedger === $i ? 'bg-yellow-100' : '' }}"
                                                                    wire:click.prevent="setLedger('{{$ledger->vname}}','{{$ledger->id}}')"
                                                                    x-on:click="isTyped = false">
                                                                    {{ $ledger->vname }}
                                                                </li>
                                                            @empty
                                                                {{--                                                                @livewire('controls.model.common.ledger-model',[$ledger_name])--}}
                                                                <button
                                                                    wire:click.prevent="ledgerSave('{{$ledger_name}}')"
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
                    </x-accordion.accordion>
                    <!-- Transport ---------------------------------------------------------------------------------------->
                    <x-accordion.accordion :heading="'Others'">
                        <div class="mt-3 flex flex-col gap-2 ">
                            @if(\Aaran\Aadmin\Src\SaleEntry::hasTransport())
                                <div class="flex flex-col gap-2 pt-5">
                                    <div class="xl:flex w-full gap-2">
                                        <label for="transport_name"
                                               class="w-[10rem] text-zinc-500 tracking-wide py-2">Transport</label>
                                        <div x-data="{isTyped: @entangle('transportTyped')}"
                                             @click.away="isTyped = false"
                                             class="w-full">
                                            <div class="relative">
                                                <input
                                                    id="transport_name"
                                                    type="search"
                                                    wire:model.live="transport_name"
                                                    autocomplete="off"
                                                    placeholder="Transport.."
                                                    @focus="isTyped = true"
                                                    @keydown.escape.window="isTyped = false"
                                                    @keydown.tab.window="isTyped = false"
                                                    @keydown.enter.prevent="isTyped = false"
                                                    wire:keydown.arrow-up="decrementTransport"
                                                    wire:keydown.arrow-down="incrementTransport"
                                                    wire:keydown.enter="enterTransport"
                                                    class="block w-full rounded-lg"
                                                />
                                                @error('transport_id')
                                                <span class="text-red-500">{{'The Transport is Required.'}}</span>
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
                                                                @if($transportCollection)
                                                                    @forelse ($transportCollection as $i => $transport)
                                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-fit
                                                        {{ $highlightTransport === $i ? 'bg-yellow-100' : '' }}"
                                                                            wire:click.prevent="setTransport('{{$transport->vname}}','{{$transport->id}}')"
                                                                            x-on:click="isTyped = false">
                                                                            {{ $transport->vname }}
                                                                        </li>
                                                                    @empty
                                                                        <button
                                                                            wire:click.prevent="transportSave('{{$transport_name}}')"
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
                            @endif

                            @if(\Aaran\Aadmin\Src\SaleEntry::hasDestination())
                                <x-input.model-text wire:model="destination" :label="'Destination'"/>
                            @endif

                            @if(\Aaran\Aadmin\Src\SaleEntry::hasBundle())
                                <x-input.model-text wire:model="bundle" :label="'Bundle'"/>
                            @endif
                        </div>
                    </x-accordion.accordion>
                </div>
            </section>

            <!-- Bottom Right  -------------------------------------------------------------------------------------------->

            <section class="w-full">
                <div class="w-3/4 mr-3 ml-auto ">


                    <div class="grid w-full md:grid-cols-2 pt-6">
                        <label
                            class="md:px-3 md:pb-2 text-left text-gray-600 text-md">Taxable&nbsp;Amount&nbsp;:&nbsp;&nbsp;</label>
                        <label
                            class="ml-8 md:px-3 md:pb-2 text-right text-gray-800 text-md">{{  $total_taxable }}</label>
                    </div>


                    <div class="grid w-full grid-cols-2 pt-6">
                        <label
                            class="px-3 pb-2 text-left text-gray-600 text-md">Gst&nbsp;:&nbsp;&nbsp;</label>
                        <label class="px-3 pb-2 text-right text-gray-800 text-md">{{  $total_gst }}</label>
                    </div>


                    <div class="grid w-full grid-cols-2 pt-6">
                        <label
                            class="px-3 pb-2 text-left text-gray-600 text-md">Round off&nbsp;:&nbsp;&nbsp;</label>
                        <label class="px-3 pb-2 text-right text-gray-800 text-md">{{$round_off}}</label>
                    </div>


                    <div class="grid w-full grid-cols-2 pt-6">
                        <label
                            class="mr-3 md:px-3 md:pb-2 text-xl text-left  text-gray-600">Grand&nbsp;Total&nbsp;:&nbsp;&nbsp;</label>
                        <label
                            class="ml-8  px-3 pb-2  md:px-3 md:pb-2 text-xl font-extrabold text-right text-gray-800">{{$grand_total}}</label>
                    </div>
                </div>
            </section>

        </section>
    </x-forms.m-panel>
    @if( $common->vid != "")
        <x-forms.m-panel-bottom-button save back print/>
    @else
        <x-forms.m-panel-bottom-button save back/>
    @endif
</div>
