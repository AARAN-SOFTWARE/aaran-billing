<div>
    <x-slot name="header">Common</x-slot>

    <x-table.section>
        <x-table.caption :caption="'City'">
            100 Cities
        </x-table.caption>
        <x-table.form>
            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="20%"/>
                <x-table.header-check/>
                <x-table.header-text fill="ascend" display="block">Name</x-table.header-text>
                <x-table.header-text fill="descend" display="block">Email</x-table.header-text>
                <x-table.header-text>Description</x-table.header-text>
                <x-table.header-text>Status</x-table.header-text>
                <x-table.header-action/>
            </x-slot:table_header>
            <x-slot:table_body name="table_body">
                <x-table.row>
                    <x-table.cell-text>1</x-table.cell-text>
                    <x-table.cell-check/>
                    <x-table.cell-user />
                    <x-table.cell-text left>Jerry@mail</x-table.cell-text>
                    <x-table.cell-text>Jerry@mail</x-table.cell-text>
                    <x-table.cell-status />
                    <x-table.cell-action />
                </x-table.row>
                <x-table.row>
                    <x-table.cell-text>2</x-table.cell-text>
                    <x-table.cell-check/>
                    <x-table.cell-user />
                    <x-table.cell-text>jaga@mail</x-table.cell-text>
                    <x-table.cell-text>jaga@mail</x-table.cell-text>
                    <x-table.cell-status />
                    <x-table.cell-action />
                </x-table.row>
                <x-table.row>
                    <x-table.cell-text>1</x-table.cell-text>
                    <x-table.cell-check/>
                    <x-table.cell-user />
                    <x-table.cell-text>Divi@mail</x-table.cell-text>
                    <x-table.cell-text>Divi@mail</x-table.cell-text>
                    <x-table.cell-status />
                    <x-table.cell-action />
                </x-table.row>
            </x-slot:table_body>
        </x-table.form>
    </x-table.section>

</div>
