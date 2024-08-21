<div>
    <x-slot name="header">Blog</x-slot>

    <div>
        <!-- header --------------------------------------------------------------------------------------------------->
        <div style="background-image: url('/../../../images/557501.jpg')"
             class="h-[35rem] w-full bg-[#F7FAF9] bg-no-repeat flex-col flex justify-center items-center">

            <div
                class="w-8/12 mx-auto flex flex-col justify-center items-center text-white text-2xl font-asul gap-y-2">
                <span>Latest News</span>
                <span>Everything that's going on at Enfold is collected here</span>
            </div>
        </div>

        <div class="flex justify-center my-16">
            <!-- left side card --------------------------------------------------------------------------------------->
            <div class="w-6/12 border-r border-gray-200 pr-10 font-roboto tracking-wider">
                @foreach($firstPost as $data)

                    <a href="{{route('posts.show',[$data->id])}}">
                        <div class="text-4xl tracking-wider">Entry With Audio{{ $data->vname }}</div>

                        <div class="flex flex-row gap-x-1 text-gray-500 text-md mt-3 uppercase">
                            <span>{{ $data->user->name }},</span>
                            <span>Personal,</span>
                            <span>Uncategorized</span>
                        </div>

                        <div class="flex flex-col my-4 gap-y-2">
                            <img
                                src="{{URL(\Illuminate\Support\Facades\Storage::url('/images/'.$data->image))}}"
                                alt="{{$data->image}}"
                                class="w-full md:h-[25rem] h-72 rounded-md">

                            <div class="text-md text-gray-500 pt-1.5">
                                {!!\Illuminate\Support\Str::words( $data->body,35 )!!}
                            </div>

                            <div class="flex justify-between items-center ">
                                <div class="inline-flex items-center gap-x-1">
                                    <span>Read More</span>
                                    <span><x-icons.icon :icon="'right-arrow'"
                                                        class="w-5 h-auto mt-2"/></span>
                                </div>

                                <div class="text-gray-500 text-sm inline-flex gap-x-0.5">
                                    <x-icons.icon :icon="'clock'" class="w-5 h-5 text-gray-800"/>
                                    <time>{{ $data->created_at->diffForHumans() }}</time>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

                <!-- grid cards --------------------------------------------------------------------------------------->
                <div class="h-[20rem] grid grid-cols-2 gap-10">

                    @foreach($list->skip(1) as $row)
                        <a href="{{route('posts.show',[$row->id])}}">

                            <div class="flex-col border-b border-gray-200 rounded-lg ">

                                <div>
                                    <img
                                        src="{{URL(\Illuminate\Support\Facades\Storage::url('/images/'.$row->image))}}"
                                        alt="{{$row->image}}"
                                        class="w-full md:h-[20rem] my-5 h-32">
                                </div>

                                <div class="flex flex-col gap-y-3">
                                    <div class="text-4xl tracking-wider">
                                        A small Gallery&nbsp;{{ \Illuminate\Support\Str::words($row->vname,5) }}
                                    </div>

                                    <div class="flex flex-row gap-x-1 text-gray-500 text-md uppercase">
                                        <span>{{ $row->user->name }},</span>
                                        <span>Personal,</span>
                                        <span>Uncategorized</span>
                                    </div>

                                    <div class="text-md text-gray-500">
                                        {!!\Illuminate\Support\Str::words( $row->body,20 )!!}&nbsp;
                                    </div>

                                    <div class="text-gray-500 inline-flex gap-x-3">
                                        <time>{{ $row->created_at->diffForHumans() }}</time>

                                        <button wire:click="edit({{$row->id}})"
                                                class="rounded-md ">

                                            <x-icons.icon :icon="'pencil'"
                                                          class="h-5 w-auto block text-cyan-700 hover:scale-110"/>
                                        </button>

                                        <button wire:click="getDelete({{$row->id}})"
                                                class="rounded-md ">

                                            <x-icons.icon :icon="'trash'"
                                                          class="h-5 w-auto block text-cyan-700 hover:scale-110"/>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Right side ------------------------------------------------------------------------------------------->
            <div class="w-3/12 px-10 flex flex-col gap-y-10">

                <div class="flex gap-3">
                    <x-icons.search-new/>
                    <x-button.new/>
                </div>

                <div class="flex flex-col gap-10">
                    <div class="flex flex-row gap-5">
                        <div class="w-16 ">
                            <img src='/../../../images/557501.jpg' alt=""
                                 class="w-full md:h-12 h-12 border border-gray-200 p-0.5">
                        </div>

                        <div class="flex flex-col gap-y-1">
                            <span>Modern Single Entry</span>
                            <span class="text-gray-400">
                                JUl.14,2024 - 3.16pm.
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-5">
                        <div class="w-16 ">
                            <img src='/../../../images/418392.jpg' alt=""
                                 class="w-full md:h-12 h-12 border border-gray-200 p-0.5">
                        </div>

                        <div class="flex flex-col gap-y-1">
                            <span>Classic Single Entry</span>
                            <span class="text-gray-400">
                                JUl.14,2024 - 3.16pm.
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-5">
                        <div class="w-16 ">
                            <img src='/../../../images/laptop.webp' alt=""
                                 class="w-full md:h-12 h-12 border border-gray-200 p-0.5">
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <span>Classic Single Entry</span>
                            <span class="text-gray-400">
                                JUl.14,2024 - 3.16pm.
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-row gap-5">
                        <div class="w-16 ">
                            <img src='/../../../images/multi_apple.jpg' alt=""
                                 class="w-full md:h-12 h-12 border border-gray-200 p-0.5">
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <span>Single Book</span>
                            <span class="text-gray-400">
                                JUl.14,2024 - 3.16pm.
                            </span>
                        </div>
                    </div>
                </div>

                <div class=" flex flex-col gap-2.5">
                    <span class="text-xl">Categories</span>
                    <span class="text-gray-400">News</span>
                    <span class="text-gray-400">Personal</span>
                    <span class="text-gray-400">Uncategorized </span>
                </div>
            </div>
        </div>
        <x-modal.delete/>
    </div>

    <!-- create record ------------------------------------------------------------------------------------------------>

    <x-forms.create :id="$common->vid" :max-width="'xl'">
        <div class="flex flex-col gap-4">

            <x-input.model-text wire:model="common.vname" :label="'Name'"/>

            <x-input.textarea wire:model="body"/>

            <!-- Image  ----------------------------------------------------------------------------------------------->

            <div class="flex flex-row gap-2 mt-4">

                <div class="flex">

                    <label for="logo_in" class="w-32 text-zinc-500 tracking-wide py-2">Image</label>

                    <div class="flex-shrink-0">

                        <div>
                            @if($image)
                                <div class="flex-shrink-0 ">
                                    <img class="h-24 w-full" src="{{ $image->temporaryUrl() }}"
                                         alt="{{$image?:''}}"/>
                                </div>
                            @endif

                            @if(!$image && isset($old_image))
                                <img class="h-24 w-full"
                                     src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image))}}"
                                     alt="">

                            @else
                                <x-icons.icon :icon="'add-image'" class="w-auto h-auto block "/>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="relative">

                    <div>
                        <label for="image"
                               class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">

                            <x-icons.icon icon="add-image" class="w-8 h-auto block text-gray-400"/>
                            Upload file

                            <input type="file" id='image' wire:model="image" class="hidden"/>
                            <p class="text-xs font-light text-gray-400 mt-2">PNG, JPG SVG, WEBP, and GIF are
                                Allowed.</p>
                        </label>
                    </div>

                    <div wire:loading wire:target="image" class="z-10 absolute top-6 left-12">
                        <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                    </div>
                </div>
            </div>
        </div>

    </x-forms.create>
</div>
