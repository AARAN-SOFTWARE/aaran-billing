<div class="w-full bg-white">

    <x-slot name="header">Articles</x-slot>

    <x-web.home-new.items.banner label="Articles" desc="Our Library provides all the necessary direct and indirect tax-related data." padding="sm:px-[160px]" padding_mob="px-[40px]" />


    <div class="w-7/12 mx-auto mt-20">

        <div class="w-full h-auto flex flex-col my-14 gap-y-5">
            <div class="text-4xl capitalize font-merri leading-tight">
                {{$blog['vname']}}
            </div>

            <div class="uppercase flex gap-x-3 text-red-600 font-lex">

                <span class="text-gray-600">{{ date('d-m-Y', strtotime($blog['created_at'])) }}</span>

                <span>
                    <span class="text-gray-900">| &nbsp;</span>
                    <x-icons.icon-fill :iconfill="'tag-menu'" class="w-4 h-3 " :colour="'#dc2626'" />
                    <span>{{$blog['category_name']}}</span>
                </span>
                <span class="text-gray-900">| &nbsp;</span>
                <span>{{$blog['tag_name']}}</span>

            </div>

            @if($blog['image'] != 'no image')
            <img src="{{$blog['image']}}" alt="{{$blog['image']}}" class="h-[35rem] w-full shadow-md shadow-gray-400 rounded-sm" />
            @else
            <x-image.empty-img />
            @endif

            <div class="text-gray-500 inline-flex font-lex">

                <div class="flex gap-1.5 justify-center items-center text-xs">

                    <x-icons.icon :icon="'clock'" class="w-3 h-3" />
                    <span>{{ \Carbon\Carbon::parse($blog['created_at'])->diffForHumans() }}</span>
                </div>

                <span class="inline-flex items-center gap-x-1 mx-3 mt-0.5 text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-3 text-gray-600">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                    </svg>

                    <span class="uppercase">&nbsp;POST BY : </span>
                    <span class="uppercase text-red-600"> {{ $blog['user_name'] }}</span>
                </span>

            </div>
            <div class="text-gray-600 font-lex indent-10 leading-loose">
                {{ $blog['body'] }}
            </div>
        </div>

        <div class="w-full border"></div>

        <div class="space-y-3 py-10">
            <div class="font-lex text-sm font-semibold">About the Author</div>
            <div class="flex items-center gap-x-4">
                <div>
                    <img src="{{ $blog['user_image'] }}" alt="" class="w-10 h-10 rounded-full">
                </div>

                <div class="flex-col flex   font-semibold justify-start items-start gap-y-1">
                    <div class="capitalize text-gray-800 text-sm underline"> {{ $blog['user_name'] }}</div>
                    <div class="text-gray-600 text-xs">{{ $blog['user_role'] }}</div>
                </div>
            </div>
            <div class=" text-gray-600 text-sm">
                {{ $blog['user_bio'] }}
{{--                <a class="px-2 font-semibold cursor-pointer">Read more...</a>--}}
            </div>
        </div>

        <div class="w-full border"></div>

        <div class="py-10 space-y-5">
            <div class="font-lex text-sm font-semibold">Further reading</div>


            <div class="w-full grid grid-cols-3 gap-5 ">
                @foreach ($collectBlog as $index=>$row )

                @if ($index != $blogIndex)

                @if($index<=3) <a href="{{ route('showArticles',[$index]) }}" class=" overflow-hidden rounded-md relative group cursor-pointer">

                    <img src="{{ $row['image'] }}" alt=""
                         class="w-full h-40 object-cover duration-500 ease-in-out transition group-hover:scale-105 rounded-md" />
                    <div class="w-full absolute bottom-0 font-lex
                                    p-3 text-xs text-white bg-black/40">
                        <div class="text-[16px]">{{ $row['vname'] }}</div>
                        <div class="text-xs"> {{ \Illuminate\Support\Str::words( $row['body'], 8) }}</div>


                    </div>
                    </a>

                    @endif

                    @endif

                    @endforeach
            </div>
        </div>
        <div class="w-full border"></div>
        <div class="py-10 space-y-5">
            <div class="space-y-3 font-lex font-semibold">Explore topics</div>

            <div class="flex flex-wrap gap-5 text-gray-600 font-lex text-xs ">
                @foreach ($blogCategory as $index=>$row )
                <div class=" px-4 py-1 border border-gray-600 rounded-md font-bold text-gray-600 hover:text-red-600
            hover:border-red-600  cursor-pointer">{{$row['category_name']}}
                </div>
                @endforeach
            </div>
        </div>

        <div class=" flex justify-between items-center gap-x-5 font-lex text-gray-800 py-10  ">
            <a href="{{ route('showArticles',[$blogIndex==0?0:$blogIndex-1]) }}" class="border px-4 py-2 text-xs flex items-center justify-center gap-x-5  cursor cursor-pointer  transition-all duration-300 ease-in-out group hover:bg-blue-600 rounded-md">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-800 group-hover:text-white">

                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
                <span class="group-hover:text-white">Previous</span>
            </a>
            <a href="{{ route('showArticles',[isset($collectBlog[$blogIndex+1]) ? $blogIndex+1 :0]) }}" class="border px-4 py-2 text-xs flex items-center justify-center gap-x-5 rounded-md cursor cursor-pointer transition-all duration-300 ease-in-out hover:bg-blue-600 group">

                <span class=" group-hover:text-white">Next</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-800  group-hover:text-white">


                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>

        {{-- <div class="w-full border"></div> --}}

    </div>
    <div class="w-full h-60 font-lex flex-col flex justify-center items-center bg-gray-50">
        <div class="w-7/12 mx-auto flex-col justify-center items-center rounded-t-md">
            <div class="w-2/3 mx-auto flex flex-col items-center justify-center py-5 gap-x-5 text-xs space-y-2">
                <div>Subscribe to <span class="text-red-600">Codexsun</span> Newsletter</div>
                <div class="text-gray-600">Stay Connected and get latest updates and more about...</div>
            </div>
        </div>
        <div class="w-7/12 flex justify-center items-center gap-x-3 ">
            <div class="w-2/4 h-full ">
                {{-- <x-input.floating label="Email*"/> --}}
                <div class="relative w-full">
                    <input type="text" id="floating_outlined" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1
           border-gray-300 appearance-none
           focus:outline-none focus:ring-2 focus:ring-cyan-50 focus:border-blue-600 peer" placeholder=" " autocomplete="off" />
                    <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300
           transform -translate-y-4 scale-75 top-2 z-20 origin-[0]
           bg-gray-50  px-2 peer-focus:px-2 peer-focus:text-blue-600
           peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
           peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4
           rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 pointer-events-none">Email*</label>
                </div>

            </div>

            <button class=" bg-black text-white h-10 px-4 rounded-md text-sm cursor-pointer">Sign Up</button>
        </div>
        <div class="w-7/12 mx-auto flex gap-x-5 justify-center py-2 rounded-b-md">

            <div class="text-[10px] text-gray-400 underline cursor-pointer">Privacy Policies</div>
            <div class="text-[10px] text-gray-400">/</div>
            <div class="text-[10px] text-gray-400 underline cursor-pointer">Terms</div>
        </div>

    </div>
</div>
</div>
