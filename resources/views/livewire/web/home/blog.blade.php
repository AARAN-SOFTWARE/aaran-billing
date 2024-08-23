<div >
    <div class="relative font-roboto tracking-wider">
        <div style="background-image: url('/../../../images/wp1.webp')"
             class="h-[30rem] bg-no-repeat bg-cover bg-center bg-fixed opacity-95 brightness-50 bg-black">
        </div>
        <div class="w-full absolute text-white top-44 text-center">
            <div class="w-6/12 mx-auto text-8xl font-semibold pb-4">Blog</div>
            <div class="w-6/12 mx-auto text-lg pb-4">We Design and develop Outstanding Digital products and digital -
                first Brands
            </div>
        </div>
    </div>

    <div class="flex justify-center font-roboto tracking-wider my-16 gap-6 ">
        <div class="w-6/12 flex-col flex gap-y-8 border-r border-gray-200 pr-6">
            @for($i=1; $i<=3; $i++)
                <div class="flex-col flex gap-y-4">
                    <img src="../../../../images/b1.jpg" alt="" class="h-[30rem]">
                    <div class="inline-flex items-center gap-x-4 text-gray-600 text-sm">
                    <span class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-4 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <span>{{ date('Y-m-d H:i:s') }}</span>
                    </span>
                        <span class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="size-4 text-gray-600">
                        <path fill-rule="evenodd"
                              d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                              clip-rule="evenodd"/>
                        </svg>
                        <span>POST BY : ADMIN</span>
                    </span>
                    </div>
                    <div class="text-2xl font-semibold">Strategies for Effective Web Design by Our Agency</div>
                    <div class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A
                        consequatur culpa, facere facilis illum maxime nesciunt,
                        obcaecati odit porro quibusdam quisquam rem ut voluptate? Alias aspernatur, commodi deleniti
                        ea et eum labore quaerat vero! Accusantium beatae illum repellendus tempore. Laudantium?
                    </div>
                </div>
            @endfor
        </div>
        <div class="w-3/12">
            <div class="relative w-full">
                <label for="">
                <span class="w-full">
                <input type="text" placeholder="Search"
                       class="w-full h-16 border-0 focus:ring-0  bg-[#11151C] text-white placeholder-white">
                </span>
                    <span class="absolute top-0 right-0 w-16 h-16 bg-[#3F5AF3] inline-flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                         class="size-6 text-white">
                      <path fill-rule="evenodd"
                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                            clip-rule="evenodd"/>
                    </svg>
                </span>
                </label>
            </div>

            <div class="text-2xl font-semibold my-6">Category</div>
            <div class="w-full flex-col flex gap-y-6">
                @for($i=1; $i<=5; $i++)
                    <div class="group w-full h-16 bg-[#F2F3F4] inline-flex items-center justify-between px-5 hover:bg-[#3F5AF3] duration-300 transition-all ease-linear">
                        <span class="text-md group-hover:text-white">Web Development</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="size-6 text-[#3F5AF3] group-hover:text-white">
                            <path fill-rule="evenodd"
                                  d="M16.72 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06l2.47-2.47H3a.75.75 0 0 1 0-1.5h16.19l-2.47-2.47a.75.75 0 0 1 0-1.06Z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                @endfor
            </div>
            <div class="text-2xl font-semibold my-6">Recent Post</div>
            <div class="flex-col flex gap-y-6">
                @for($i=1; $i<=4; $i++)
                    <div class="w-full h-20 flex gap-x-4">
                        <img src="../../../../images/b3.jpg" alt="" class="w-20 h-full">
                        <div class="flex flex-col justify-center items-center gap-y-2">
                            <div class="w-full text-gray-600 text-xs inline-flex items-center gap-x-2">
                                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                           class="size-3">
                                    <path fill-rule="evenodd"
                                          d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                          clip-rule="evenodd"/>
                            </svg>
                            </span>
                                <span class="text-xs font-semibold">By User</span>
                            </div>
                            <div class="text-md font-semibold hover:underline">Technical Wizardry of Our Web Design Agency</div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="text-2xl font-semibold my-6">Tags</div>
            <div class="grid grid-cols-3 gap-2 text-sm">
                @for($i=1; $i<=4; $i++)
                    <div class="px-4 py-2 border border-gray-200 text-center hover:bg-[#3F5AF3] hover:text-white duration-300 transition-all ease-linear">Design</div>
                @endfor
                @for($i=1; $i<=6; $i++)
                    <div class="px-4 py-2 border border-gray-200 text-center hover:bg-[#3F5AF3] hover:text-white duration-300 transition-all ease-linear">Technology</div>
                @endfor
                @for($i=1; $i<=3; $i++)
                    <div class="px-4 py-2 border border-gray-200 text-center hover:bg-[#3F5AF3] hover:text-white duration-300 transition-all ease-linear">Accounts</div>
                @endfor
            </div>

        </div>
    </div>

    <x-web.home.footer />
</div>
