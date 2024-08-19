<div>
    <x-slot name="header">Blog</x-slot>

    <div>
        <div style="background-image: url('/../../../images/557501.jpg')"
             class="h-[35rem] w-full bg-[#F7FAF9] bg-no-repeat flex-col flex justify-center items-center">

            <div class="w-8/12 mx-auto flex flex-col justify-center items-center text-white text-2xl font-asul gap-y-2">
                <span>Latest News</span>
                <span>Everything that's going on at Enfold is collected here</span>
            </div>
        </div>

        <section>
            <div class="w-6/12 mx-auto my-10 flex flex-col gap-y-2 ">
                <div class="flex justify-end w-full">
                    <x-button.new/>
                </div>

                <div class="text-4xl font-bold tracking-wider">Entry With Audio{{ $firstPost->vname }}</div>

                <div class="flex flex-row gap-x-1 text-gray-500 text-md">
                    <span>{{ $firstPost->user->name }}</span>
                    <span>Personal,</span>
                    <span>Uncategorized</span>
                </div>

                <div>
                    <img src="{{URL(\Illuminate\Support\Facades\Storage::url('/images/'.$firstPost->image))}}"
                         alt="{{$firstPost->image}}"
                         class="w-full my-6 md:h-[25rem] h-72 rounded-md shadow-md shadow-gray-400">

                    <div class="text-lg text-gray-500">
                        {!! $firstPost->body !!}
                    </div>

                    <div class="flex flex-row my-5">
                        <span>Read More</span>
                        <span class="mt-1 mx-1"><x-icons.icon :icon="'right-arrow'" class="w-5 h-auto"/></span>
                    </div>
                </div>
            </div>
        </section>

        <div class="w-6/12 mx-auto ">
            <div class="h-[20rem] mb-3">
                @foreach($list->skip(1) as $row)

                    <div class="grid grid-cols-2 gap-x-14">

                        <div>
                            <img src="{{URL(\Illuminate\Support\Facades\Storage::url('/images/'.$row->image))}}"
                                 alt="{{$row->image}}"
                                 class="w-full my-6 md:h-[20rem] h-32 rounded-md shadow-md shadow-gray-400">
                        </div>

                        <div>
                            {{--                    <div>--}}
                            <div class="text-4xl font-bold tracking-wider">
                                A small Gallery{{ $row->vname }}
                            </div>

                            <div class="flex flex-row gap-x-1 text-gray-500 text-md">
                                <span>{{ $row->user->name }}</span>
                                <span>Personal,</span>
                                <span>Uncategorized</span>
                            </div>

                            <div class="text-lg text-gray-400 tracking-wider mt-5">
                                {!! $row->body !!}&nbsp;
                            </div>

                            <div class="mt-3 text-gray-500">
                                <time>{{ $row->created_at->diffForHumans() }}</time>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- create record ---------->

    <x-forms.create :id="$common->vid">

        <x-input.model-text wire:model="common.vname" :label="'Name'"/>

        <x-input.textarea wire:model="body"/>

        <!-- Image  --------------------------------------------------------------------------------------->

        <label class="w-[10rem] text-zinc-500 tracking-wide py-2"></label>

        <div class="grid grid-cols-2 flex-shrink-0 h-60 w-80 py-5 mr-4">
            <div>
                @if($image)
                    <img class="h-48 w-full" src="{{ $image->temporaryUrl() }}"
                         alt="{{$image?:''}}"/>
                @endif

                @if(!$image && isset($old_image))
                    <img class="h-48 w-full"
                         src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image))}}"
                         alt="">
                @else
                    <div class="h-48 w-full justify-center flex items-center">
                        Select image
                    </div>

                @endif
            </div>
        </div>

        <div>
            <input type="file" wire:model="image">
            <button wire:click.prevent="save_image"></button>
        </div>

    </x-forms.create>
</div>
