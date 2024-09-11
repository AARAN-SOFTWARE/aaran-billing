<div>
    <x-slot name="header">Elements</x-slot>

    <x-corousels.carousel-auto class="sm:min-h-[80svh] h-72"/>
    <x-web.uielements.color-palette/>
    <x-web.uielements.buttons/>
    <x-web.uielements.cards/>
    <x-web.uielements.extra/>
    <x-web.uielements.form/>
    {{--    <x-accordion-single.accordion/>--}}

    <div class="w-full h-96  px-16">
        <div>
            <label for="">Elements</label>
            <x-combobox.search/>
        </div>
        <div class="w-1/3 mx-auto space-y-4">

            <x-input.floating label="Name"/>

        </div>
        <x-radio.btn label="Receipt"/>
        <x-radio.btn label="Payment"/>

        <x-dropdown.click/>
    </div>

    <div class="bg-blue-800 w-1/4 h-16 flex-col gap-y-3">
        <div class="inline-flex items-center gap-x-2">
            <x-icons.icon-fill iconfill="report-menu" class="w-6 h-auto hover:fill-blue-600"/>
            <span class="text-sm">Menu Items</span>
        </div>
        <div class="inline-flex items-center gap-x-2">
            <x-icons.icon-fill iconfill="report2-menu" class="w-6 h-auto hover:fill-blue-600"/>
            <span class="text-sm">Menu Items</span>
        </div>
    </div>
{{--    <x-input.textarea/>--}}
</div>
