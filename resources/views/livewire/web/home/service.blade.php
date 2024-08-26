<div class="relative" x-data="{ open: false }">
    <div class="relative font-roboto tracking-wider">
        <div style="background-image: url('/../../../images/wp1.webp')"
             class="h-[30rem] bg-no-repeat bg-cover bg-center bg-fixed opacity-95 brightness-50 bg-black">
        </div>
        <div class="w-full absolute text-white top-44 text-center flex-col flex items-center justify-center">
            <div class="z-20 w-6/12 mx-auto text-8xl font-semibold pb-4">Our Services</div>
            <span class="z-10 absolute top-6 py-5 px-[250px] bg-gradient-to-r from-transparent via-[#6f83f6] to-[#2746f1]">&nbsp;</span>
            <div class="w-6/12 mx-auto text-3xl pb-4">Your Business Deserves To Go Premium
            </div>
            <div class="w-6/12 mx-auto text-md pb-4">
                Join 100+ businesses who have streamlined their Invoicing, Accounting, and Sales with Aaran.
            </div>
            <button class="max-w-max mx-auto px-4 py-2 bg-[#3F5AF3] text-white">Explore Price Plans</button>
        </div>
    </div>

    <div x-show="open" x-transition
         class="sm:fixed top-24 right-8 font-roboto w-96 h-[36rem] tracking-wider rounded-md shadow-md shadow-gray-500">
        <div class="h-1/4 bg-[#3F5AF3] text-xs rounded-t-md">
            <div class="text-white p-3 w-1/2 mx-auto h-auto flex-col flex justify-center items-center gap-y-2">
                <div class="max-w-max inline-flex items-center gap-2 px-2 py-1 rounded-md text-white bg-[#091d90]">
                    <x-icons.icon icon="message-round" class="w-5 h-5"/>
                    <span>chat</span>
                </div>
                <div class="flex">
                    <img src="../../../../images/t1.webp" alt="" class="w-10 h-10 rounded-full">
                    <img src="../../../../images/t3.webp" alt="" class="w-10 h-10 rounded-full">
                    <img src="../../../../images/t4.webp" alt="" class="w-10 h-10 rounded-full">
                    <img src="../../../../images/t5.webp" alt="" class="w-10 h-10 rounded-full">
                </div>
                <div class="">Questions? Chat with us!</div>
                <div>Was last active 3 hours ago</div>
            </div>
        </div>
        <div class="relative h-3/4 flex-col flex text-xs py-4 gap-2 px-2 bg-blue-50 rounded-b-md justify-between">
            <div class="flex gap-2">
                <div><img src="../../../../images/t1.webp" alt="" class="w-12 h-12 rounded-full"></div>
                <div class="flex flex-col gap-2">
                    <div class="text-gray-600 text-xs">User</div>
                    <div class="text-white bg-[#3F5AF3] px-2 py-1 rounded-md">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.
                    </div>
                </div>
            </div>
            <div class="w-full">
                <input type="text" class="w-full border-0 focus:ring-0 bg-blue-100 py-2 placeholder-gray-400 text-xs rounded-md" placeholder="Post your message">
            </div>
        </div>

    </div>
    <button x-show="open" x-transition x-on:click="open = ! open"
            class="sm:fixed bottom-8 right-8 bg-[#3F5AF3] text-white rounded-full inline-flex justify-center items-center w-12 h-12 shadow-md shadow-gray-500">
        <x-icons.icon icon="x-mark" class="w-10 h-10 "/>
    </button>

    <div class="font-roboto tracking-wider py-16 flex-col flex gap-y-6">
        <div class="text-3xl font-semibold text-center">Plans Built for your needs</div>
        <div class="text-sm text-gray-600 text-center">Advanced Acounting Solutions</div>
        <div class="max-w-max mx-auto text-center flex gap-x-4 ">
            <button class="tab-button active px-4 py-2 bg-gray-200" onclick="showTab('tab1')">3 months</button>
            <button class="tab-button tab-button px-4 py-2 bg-gray-200" onclick="showTab('tab2')">1 year
            </button>
        </div>
        <div id="tab1" class="tab-content w-9/12 mx-auto grid grid-cols-4 gap-6 ">
            @for($j=1; $j<=3; $j++)
                <div class="border border-gray-200 p-5 flex-col flex gap-y-4 rounded-md">
                    <div class="text-md font-semibold">Basic</div>
                    <div class="text-gray-400 text-lg">Free</div>
                    <div class="inline-flex items-center gap-x-2">
                        <span>
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32"
                                 xmlns="http://www.w3.org/2000/svg"><path
                                    d="M 8 5 L 8 7 L 12 7 C 13.703125 7 15.941406 8.039063 16.71875 10 L 8 10 L 8 12 L 16.96875 12 C 16.660156 14.609375 13.972656 16 12 16 L 8 16 L 8 18.46875 L 18.25 27 L 21.375 27 L 10.5625 18 L 12 18 C 15.234375 18 18.675781 15.609375 18.96875 12 L 24 12 L 24 10 L 18.8125 10 C 18.507813 8.816406 17.859375 7.804688 17 7 L 24 7 L 24 5 Z"/></svg>
                        </span>
                        <span class="text-xl font-semibold">1500</span>
                    </div>
                    <div class="text-gray-400 text-sm">per year</div>
                    <button
                        class="w-full text-[#3F5AF3] font-semibold text-sm border border-[#3F5AF3]  py-2 rounded-md">
                        Continue with basic
                    </button>

                    <div class="flex-col flex gap-y-4">
                        <div class="text-sm italic text-gray-600 pt-4">Features</div>
                        @for($i=1; $i<=5; $i++)
                            <div class="inline-flex items-center gap-x-2 text-sm">
                                <x-icons.icon-fill iconfill="check" class="w-5 h-auto"/>
                                <span>Customise Invoice Columns with Formulas</span>
                            </div>
                        @endfor
                    </div>
                </div>
            @endfor
            <div class="border border-gray-200 p-5 flex-col flex gap-y-4 rounded-md">
                <div class="text-md font-semibold">Books Pro</div>
                <div class="text-gray-400 text-lg">Free</div>
                <div class="inline-flex items-center gap-x-2">
                        <span>
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32"
                                 xmlns="http://www.w3.org/2000/svg"><path
                                    d="M 8 5 L 8 7 L 12 7 C 13.703125 7 15.941406 8.039063 16.71875 10 L 8 10 L 8 12 L 16.96875 12 C 16.660156 14.609375 13.972656 16 12 16 L 8 16 L 8 18.46875 L 18.25 27 L 21.375 27 L 10.5625 18 L 12 18 C 15.234375 18 18.675781 15.609375 18.96875 12 L 24 12 L 24 10 L 18.8125 10 C 18.507813 8.816406 17.859375 7.804688 17 7 L 24 7 L 24 5 Z"/></svg>
                        </span>
                    <span class="text-xl font-semibold">6000</span>
                </div>
                <div class="text-gray-400 text-sm">per year</div>
                <button
                    class="w-full font-semibold text-sm border border-gray-300 py-2 rounded-md bg-[#3F5AF3] text-white">
                    Upgrade to Premium
                </button>

                <div class="flex-col flex gap-y-4">
                    <div class="text-sm italic text-gray-600 pt-4">Including Everything in Basic Features, Plus</div>
                    @for($i=1; $i<=5; $i++)
                        <div class="inline-flex items-center gap-x-2 text-sm">
                            <x-icons.icon-fill iconfill="check" class="w-5 h-auto"/>
                            <span>Customise Invoice Columns with Formulas</span>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div id="tab2" class="tab-content hidden w-9/12 mx-auto grid grid-cols-4 gap-6 ">
            @for($j=1; $j<=3; $j++)
                <div class="border border-gray-200 p-5 flex-col flex gap-y-4 rounded-md">
                    <div class="text-md font-semibold">Basic</div>
                    <div class="text-gray-400 text-lg">Free</div>
                    <div class="inline-flex items-center gap-x-2">
                        <span>
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32"
                                 xmlns="http://www.w3.org/2000/svg"><path
                                    d="M 8 5 L 8 7 L 12 7 C 13.703125 7 15.941406 8.039063 16.71875 10 L 8 10 L 8 12 L 16.96875 12 C 16.660156 14.609375 13.972656 16 12 16 L 8 16 L 8 18.46875 L 18.25 27 L 21.375 27 L 10.5625 18 L 12 18 C 15.234375 18 18.675781 15.609375 18.96875 12 L 24 12 L 24 10 L 18.8125 10 C 18.507813 8.816406 17.859375 7.804688 17 7 L 24 7 L 24 5 Z"/></svg>
                        </span>
                        <span class="text-xl font-semibold">7500</span>
                    </div>
                    <div class="text-gray-400 text-sm">per year</div>
                    <button
                        class="w-full text-[#3F5AF3] font-semibold text-sm border border-[#3F5AF3]  py-2 rounded-md">
                        Continue with basic
                    </button>

                    <div class="flex-col flex gap-y-4">
                        <div class="text-sm italic text-gray-600 pt-4">Features</div>
                        @for($i=1; $i<=5; $i++)
                            <div class="inline-flex items-center gap-x-2 text-sm">
                                <x-icons.icon-fill iconfill="check" class="w-5 h-auto"/>
                                <span>Customise Invoice Columns with Formulas</span>
                            </div>
                        @endfor
                    </div>
                </div>
            @endfor
            <div class="border border-[#3F5AF3] p-5 flex-col flex gap-y-4 rounded-md">
                <div class="text-md font-semibold">Books Pro</div>
                <div class="text-gray-400 text-lg">Free</div>
                <div class="inline-flex items-center gap-x-2">
                        <span>
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32"
                                 xmlns="http://www.w3.org/2000/svg"><path
                                    d="M 8 5 L 8 7 L 12 7 C 13.703125 7 15.941406 8.039063 16.71875 10 L 8 10 L 8 12 L 16.96875 12 C 16.660156 14.609375 13.972656 16 12 16 L 8 16 L 8 18.46875 L 18.25 27 L 21.375 27 L 10.5625 18 L 12 18 C 15.234375 18 18.675781 15.609375 18.96875 12 L 24 12 L 24 10 L 18.8125 10 C 18.507813 8.816406 17.859375 7.804688 17 7 L 24 7 L 24 5 Z"/></svg>
                        </span>
                    <span class="text-xl font-semibold">17000</span>
                </div>
                <div class="text-gray-400 text-sm">per year</div>
                <button
                    class="w-full font-semibold text-sm border border-gray-300 py-2 rounded-md bg-[#3F5AF3] text-white">
                    Continue with basic
                </button>

                <div class="flex-col flex gap-y-4">
                    <div class="text-sm italic text-gray-600 pt-4">Including Everything in Basic Features, Plus</div>
                    @for($i=1; $i<=5; $i++)
                        <div class="inline-flex items-center gap-x-2 text-sm">
                            <x-icons.icon-fill iconfill="check" class="w-5 h-auto"/>
                            <span>Customise Invoice Columns with Formulas</span>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="text-center text-gray-400 text-sm">*All prices are exclusive of GST</div>
    </div>

    <div class=" w-9/12 mx-auto grid grid-cols-2 gap-6 font-roboto tracking-wider">
        <div class="bg-[#e7eafd] border border-[#3F5AF3] rounded-md p-5 flex-col flex gap-3">
            <div class="w-full">
                <x-icons.icon icon="user-group" class="w-7 h-7 text-[#3F5AF3]"/>
            </div>
            <div class="text-xl font-semibold">Add your Teams to Aaran</div>
            <div class=" text-gray-600 text-sm">
                ₹1,500 per additional user per year
            </div>
            <button x-on:click="open = ! open" class="max-w-max px-6 py-4 bg-[#3F5AF3] text-xs text-white">Talk to us
            </button>
        </div>
        <div class="bg-[#e7eafd] border border-[#3F5AF3] rounded-md p-5 flex-col flex gap-3">
            <div class="w-full">
                <x-icons.icon icon="message-round" class="w-7 h-7 text-[#3F5AF3]"/>
            </div>
            <div class="text-xl font-semibold">Need help finding the right plan for your business?</div>
            <div class=" text-gray-600 text-sm">
                Get a Customised Plan from your Account Manager
            </div>
            <button x-on:click="open = ! open" class="max-w-max px-6 py-4 bg-[#3F5AF3] text-xs text-white">Talk to us
            </button>
        </div>
        <div class="bg-[#e7eafd] border border-[#3F5AF3] rounded-md p-5 flex-col flex gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-7 h-7 text-[#3F5AF3]">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15 8.25H9m6 3H9m3 6-3-3h1.5a3 3 0 1 0 0-6M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            <div class="text-xl font-semibold">100% Refundable</div>
            <div class=" text-gray-600 text-sm">
                If cancelled within 7 days for annual plans and within 30 days for plans longer than 3 years.
            </div>
        </div>
        <div class="bg-[#e7eafd] border border-[#3F5AF3] rounded-md p-5 flex-col flex gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"
                 class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
            </svg>
            <div class="text-xl font-semibold">Fully Transferable</div>
            <div class=" text-gray-600 text-sm">
                Transfer subscription to any other business if you are on 3 years or longer plans
            </div>
        </div>
    </div>


    <div class="font-roboto tracking-wider my-16 flex-col flex gap-y-6">
        <div class=" text-center text-6xl font-semibold">Frequently Asked Questions (FAQ)</div>
        <div class="w-9/12 mx-auto">
            <x-accordion.accordion :heading="'Is the subscription fee refundable?'">
                <div class="bg-gray-50 p-4 rounded-md text-xs">Yes, we offer a 100% refund on annual plans if requested
                    for cancellation within the first 7 days.
                    For longer plans, 100% refunds are available if canceled within 30 days.
                </div>
            </x-accordion.accordion>
            <x-accordion.accordion :heading="'Can I transfer my subscription to another business?'">
                <div class="bg-gray-50 p-4 rounded-md text-xs">You can transfer your Premium subscription to any other
                    business you own or start. Only valid for 3-years or longer plans.
                </div>
            </x-accordion.accordion>
            <x-accordion.accordion :heading="'How many users can I add as managers to my business? '">
                <div class="bg-gray-50 p-4 rounded-md text-xs">Different plans have different limits on the number of
                    users you can add. However, if you want to add more users than your plan permits, please reach out
                    to your account manager OR drop a message on chat support.
                </div>
            </x-accordion.accordion>
            <x-accordion.accordion :heading="'Will the prices be increased in the future?'">
                <div class="bg-gray-50 p-4 rounded-md text-xs">Yes. Incase prices increase, your current plan will be
                    carried forward for you.
                </div>
            </x-accordion.accordion>
            <x-accordion.accordion :heading="'What happens to my data when I want to leave?'">
                <div class="bg-gray-50 p-4 rounded-md text-xs">When you decide to leave Refrens, you have the option to
                    download all your customer data, invoices, quotations, and other documents at any time. This ensures
                    that you have access to your important business information even after discontinuing your use of the
                    platform. Refrens prioritizes data security and allows users to retain their data for their records
                    or for transitioning to another platform if needed.
                </div>
            </x-accordion.accordion>
            <x-accordion.accordion :heading="'What happens if I want to downgrade to the free plan later?'">
                <div class="bg-gray-50 p-4 rounded-md text-xs">No. You are upgrading only 1 business. If you need a bulk
                    plan for multiple businesses please reach out to us at premium@refrens.com.
                </div>
            </x-accordion.accordion>
            <x-accordion.accordion :heading="'I need more help.'">
                <div class="bg-gray-50 p-4 rounded-md text-xs">Please ping us on chat support with your email and phone
                    number details, we will get back to you. Or email us at premium@refrens.com
                </div>
            </x-accordion.accordion>
        </div>
        <button
            class="max-w-max mx-auto font-semibold text-sm border border-gray-300 px-4 py-2 rounded-md bg-[#3F5AF3] text-white">
            Upgrade to Premium
        </button>
    </div>
    <x-web.home.footer/>
    <x-web.home.copyright/>
    <style>
        .tab-button.active {
            background-color: #3F5AF3;
            border-color: white;
            color: white;
        }
    </style>
</div>


<script>

    function showTab(tabId) {
        const tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach((content) => {
            content.classList.add('hidden');
        });

        const selectedTab = document.getElementById(tabId);
        if (selectedTab) {
            selectedTab.classList.remove('hidden');
        }


        const tabButtons = document.querySelectorAll('.tab-button');
        tabButtons.forEach((button) => {
            button.classList.remove('active');
        });

        const clickedButton = document.querySelector(`[onclick="showTab('${tabId}')"]`);
        if (clickedButton) {
            clickedButton.classList.add('active');
        }
    }

    showTab('tab1');
</script>
