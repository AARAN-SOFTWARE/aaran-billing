<div>
    <x-slot name="header">Product</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-forms.top-controls :show-filters="$showFilters"/>

        <x-table.caption :caption="'Master'">
            {{$list->count()}}
        </x-table.caption>

        <!-- Table Header --------------------------------------------------------------------------------------------->
        <x-table.form>
            <x-slot:table_header name="table_header" class="bg-green-100">

                <x-table.header-serial width="20%"/>

                <x-table.header-text wire:click.prevent="sortBy('vname')" sortIcon="{{$getListForm->sortAsc}}">Product
                </x-table.header-text>

                <x-table.header-text wire:click.prevent="sortBy('product_type')" sortIcon="{{$getListForm->sortAsc}}">
                    Product Type
                </x-table.header-text>

                <x-table.header-text wire:click.prevent="sortBy('common_id')" sortIcon="{{$getListForm->sortAsc}}">HSN
                    Code
                </x-table.header-text>

                <x-table.header-text>Status</x-table.header-text>

                <x-table.header-action/>

            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">

                @foreach($list as $index=>$row)
                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->vname}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->product_type}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->common->vname}}</x-table.cell-text>
                        <x-table.cell-status active="{{$row->active_id}}"/>
                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                @endforeach
            </x-slot:table_body>
        </x-table.form>

        <x-modal.delete/>

        <!-- Create  -------------------------------------------------------------------------------------------------->

        <x-forms.create :id="$common->vid">

            <div class="flex flex-col  gap-3">
                <x-input.model-text wire:model="common.vname" :label="'Name'"/>

                <x-input.model-select wire:model="product_type" :label="'Product Type'">
                    <option class="">Choose...</option>
                    <option value="Goods">Goods</option>
                    <option value="Service">Service</option>
                </x-input.model-select>

                <x-input.model-select wire:model="common_id" :label="'HsnCode'">
                    <option value="">Choose..</option>
                    @foreach($commonCollection as $value)
                        <option value="{{$value->id}}">{{$value->vname}}</option>
                    @endforeach
                </x-input.model-select>

                <x-input.model-select wire:model="units" :label="'Units'">
                    <option class="">Choose...</option>
                    <option value="Kgs">Kgs</option>
                    <option value="Mts">Mts</option>
                    <option value="Pcs">Pcs</option>
                    <option value="Nos">Nos</option>
                    <option value="Lts">Lts</option>
                </x-input.model-select>

                <x-input.model-select wire:model="gst_percent" :label="'GST_Percent'">
                    <option class="">Choose...</option>
                    <option value="0">0%</option>
                    <option value="5">5%</option>
                    <option value="12">12%</option>
                    <option value="18">18%</option>
                    <option value="24">24%</option>
                </x-input.model-select>

                <x-input.model-text wire:model="quantity" :label="'Quantity'"/>
            </div>

        </x-forms.create>

    </x-forms.m-panel>
</div>
