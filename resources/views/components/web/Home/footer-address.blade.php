<div class=" flex-col flex justify-center lg:h-96 h-auto bg-[#0d0d0d] pattern">

    <div class="lg:flex mx-auto lg:w-11/12 lg:justify-between w-8/12">

        <div class="flex flex-col my-6">
            <!-- address, socialmedia-->
            <div class="lg:text-red-500 lg:text-xl text-lg text-red-500">AARAN INFO TECH
            </div>

            <div class="mt-3">
                <div class="lg:text-sm text-xs font-roboto text-white leading-relaxed tracking-wider">
                    10-A Venkatappa Gounder Street,<br>
                    Postal Colony, P.N.road,<br>
                    Tiruppur - 641602 <br>
                    Tamilnadu, INDIA. <br>
                    &nbsp;<br>
                    info@aarnerp.com<br>
                    +91 9655227738<br>
                </div>
            </div>

        </div>

        <!-- link -->
        <div class="my-3 flex flex-col shrink-0">
            <a class="sm:text-white text-red-500 lg:text-2xl  text-lg lg:my-2 my-1 cursor-pointer hover:text-red-500">Aaran</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('about') }}">About</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('contact') }}">Contact
                Us</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('about') }}">We
                are Hiring</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('blog') }}">Blog</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('about') }}">Careers</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('contact') }}">Finance</a>
        </div>


        <div class="lg:my-3 flex flex-col shrink-0">
            <a class="sm:text-white text-red-500 lg:text-2xl  text-lg font-nunito lg:my-2 my-4 hover:text-red-500">Links</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('service') }}">FAQ</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('service') }}">Pricing</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('contact') }}">Feedback</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('service') }}">Terms
                of Service</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('service') }}">Privacy
                and Policy</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500" href="{{ route('contact') }}">Help
                and Support</a>
        </div>


        <div class="lg:my-3 flex flex-col shrink-0 ">
            <a class="sm:text-white text-red-500 lg:text-2xl  text-lg font-nunito my-2 hover:text-red-500">Products</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500 {{ route('dashboard') }}">GST
                Billing Software</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500 {{ route('dashboard') }}">ERP
                Software</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500 {{ route('dashboard') }}">Marketing
                software</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500 {{ route('dashboard') }}">Task
                Management Software</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 cursor-pointer hover:text-yellow-500 {{ route('dashboard') }}">Auditor
                Software</a>

        </div>

        <div class="lg:my-3 flex flex-col shrink-0">
            <a class="sm:text-white text-red-500 lg:text-2xl  text-lg font-nunito my-2 hover:text-red-500">Templates</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 hover:text-yellow-500" {{ route('dashboard') }}">Invoice
                Templates</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 hover:text-yellow-500" {{ route('dashboard') }}">GST Invoice
                Format</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 hover:text-yellow-500" {{ route('dashboard') }}">Quotation
                Templates</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 hover:text-yellow-500" {{ route('dashboard') }}">Word and Excel
                Invoice Templates</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 hover:text-yellow-500" {{ route('dashboard') }}">Consulting
                Invoice</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 hover:text-yellow-500" {{ route('dashboard') }}">Tax Invoice</a>
            <a class="text-white lg:text-sm text-xs tracking-widest    my-2.5 hover:text-yellow-500" {{ route('dashboard') }}">Estimate
                Template</a>
        </div>
    </div>
</div>


{{--<!-- mobile view -->--}}
{{--<div class="md:hidden w-11/12 mx-auto text-white font-roboto tracking-wider pt-3 flex">--}}
{{--    <div class="w-5/12 mx-auto flex-col flex justify-center items-center">--}}
{{--        <div class="py-1">AARAN</div>--}}
{{--        <div class="text-[10px] w-5/6 mx-auto text-center">--}}
{{--            10-A Venkatappa Gounder Street,--}}
{{--            Tiruppur,641654,<br>--}}
{{--            Tamil Nadu.--}}
{{--        </div>--}}
{{--        <div class="py-1 flex gap-2">--}}
{{--            <x-icons.icon-fill :iconfill="'twitter1'" :colour="'#E6E6FA'" class="w-4 h-4"/>--}}
{{--            <x-icons.icon-fill :iconfill="'facebook-fill'" :colour="'#E6E6FA'" class="w-4 h-4"/>--}}
{{--            <x-icons.icon-fill :iconfill="'git-hub'" :colour="'#E6E6FA'" class="w-4 h-4"/>--}}
{{--            <x-icons.icon-fill :iconfill="'phone1'" :colour="'#E6E6FA'" class="w-4 h-4"/>--}}
{{--        </div>--}}
{{--        --}}
{{--        <div class="w-5/6 bg-[#11141C] border border-white rounded-sm">--}}
{{--            <div class="flex-col p-1 rounded-sm text-center">--}}
{{--                <input type="text" class="w-full rounded-sm white  border-0 focus:ring-0 bg-white">--}}
{{--                <button class="text-white  text-xs hover:text-cyan-200">Subscribe</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="w-7/12 text-white font-roboto tracking-wider grid grid-cols-2 gap-6 text-[10px] py-3">--}}
{{--        <div>--}}
{{--            <div class="text-[16px]">Team</div>--}}
{{--            <div>Blue Team</div>--}}
{{--            <div>Red Team</div>--}}
{{--            <div>Green Team</div>--}}
{{--            <div>Yellow Team</div>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <div class="text-[16px]">About</div>--}}
{{--            <div>About Us</div>--}}
{{--            <div>Anti Corruption Policy</div>--}}
{{--            <div>Anti Doping Policy</div>--}}
{{--            <div>News Access Regulation</div>--}}
{{--            <div>Image Use Terms</div>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <div class="text-[16px]">Stories</div>--}}
{{--            <div>Recent Blog</div>--}}
{{--            <div>Club Story</div>--}}
{{--            <div>Club Story</div>--}}
{{--            <div>Student Story</div>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <div class="text-[16px]">Contact</div>--}}
{{--            <div>Contact Us</div>--}}
{{--            <div>Sponsorship</div>--}}
{{--            <div>Privacy Policy</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
