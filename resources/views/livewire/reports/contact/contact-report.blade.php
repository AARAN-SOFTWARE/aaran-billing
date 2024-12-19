<div>
    <x-slot name="header">Party Report</x-slot>
    <x-forms.m-panel>
    @php
        $party=\Aaran\Master\Models\Contact::find($byParty);
    @endphp
        <div>
            {{$party->vname}}
        </div>
    </x-forms.m-panel>
</div>
