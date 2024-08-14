<div>
    <x-corousels.carousel-auto/>
    <div class="h-auto w-auto mx-auto p-12">
        <div class="font-roboto py-12 text-2xl mx-5 font-semibold tracking-wider">Alerts</div>
        <x-forms.m-panel>
            <div class="grid grid-cols-1 gap-y-6 p-6">
                <x-alerts.info/>
                <x-alerts.success/>
                <x-alerts.warning/>
                <x-alerts.danger/>
            </div>
        </x-forms.m-panel>
        <div class="font-roboto py-12 text-2xl mx-5 font-semibold tracking-wider">Buttons</div>
        <x-forms.m-panel class="rounded-b-sm">
            <div class="grid sm:grid-cols-3 w-full  h-auto gap-6 p-10 grid-cols-1 justify-items-center">
                {{--                <x-button.active/>--}}
                <x-button.back/>
                <x-button.cancel/>
                <x-button.delete/>
                <x-button.new/>
                <x-button.print/>
                <x-button.save/>
                {{--                <x-button.switch/>--}}
                <x-button.register>Register</x-button.register>
                <x-button.primary>Primary</x-button.primary>
                <x-button.secondary>Secondary</x-button.secondary>
                <x-button.loading />
                <x-button.dot-dropdown/>
                <x-input.toggle-default :label="'Active'"/>
            </div>
        </x-forms.m-panel>
        <div class="font-roboto py-12 text-2xl mx-5 font-semibold tracking-wider">Form</div>
        <x-forms.m-panel class="flex-col flex justify-center items-center">
            <div
                class="w-6/12 flex-col flex justify-center items-center bg-white  gap-y-6 border border-pink-500 p-5 rounded-lg">
                <x-input.text-input-static :label="'Name'"/>
                <x-input.text-input-static :label="'Password'"/>
                <x-input.text-input-static :label="'Email'"/>
                <div class="inline-flex items-center gap-x-6">
                    <x-input.checkbox-new/>
                    {{--                    <x-input.checkbox-animate/>--}}
                    <span>Terms and Conditions</span>
                </div>
                <x-rating.star />
                <x-rating.emote />
                <x-input.textarea :placeholder="'Write Some Comments'"/>
                <x-button.register>Register</x-button.register>
            </div>
        </x-forms.m-panel>
        <div class="font-roboto py-12 text-2xl mx-5 font-semibold tracking-wider">Cards & Carousels</div>
        <x-forms.m-panel>
            <x-accordion.accord/>
            <div class="my-2 flex gap-6">
                <x-cards.card-1/>
                <x-cards.card-2/>
                <x-cards.card-carousel/>
            </div>
        </x-forms.m-panel>

        <x-forms.m-panel>
            <div class="flex-col flex gap-6">
                <x-corousels.carousel/>
                <x-corousels.carousel-auto/>
                <x-corousels.carousel-aspect/>
            </div>
        </x-forms.m-panel>
        <div class="font-roboto py-12 text-2xl mx-5 font-semibold tracking-wider">Extras</div>
        <x-forms.m-panel>
            <div class="font-roboto py-2">Accordion</div>
            <x-accordion.accord/>
            <div class="font-roboto py-2">Combo Box with search</div>
            <x-combobox.search/>
            <div class="font-roboto py-2">Models</div>
            <div class="grid grid-cols-5 gap-y-6 justify-items-center">
                <x-modal.default/>
                <x-modal.success/>
                <x-modal.info/>
                <x-modal.warning/>
                <x-modal.danger/>
            </div>
            <div class="font-roboto py-2">File Input</div>
            <x-input.text-input-static :label="'Input'" class="w-96"/>
            <x-input.textarea :placeholder="'comments'"/>
            <x-input.drag-drop/>
            <x-input.input-trigger />
        </x-forms.m-panel>
        <div class="font-roboto py-12 text-2xl mx-5 font-semibold tracking-wider">Interaction</div>

        <x-forms.m-panel>
            <div class="flex gap-6 justify-center items-center">
                <x-interactions.download />
                <x-interactions.clip />
            </div>
            <div class="w-8/12 mx-auto flex justify-end">
                <x-interactions.share />
            </div>
        </x-forms.m-panel>
        <div class="py-12 flex justify-end">
            <x-pagination.ellipsis />
        </div>
    </div>
</div>
