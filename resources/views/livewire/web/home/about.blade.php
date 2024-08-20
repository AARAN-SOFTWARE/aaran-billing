<div>
    <!-- About us -->
    <div class="w-full h-[25rem] flex-col flex justify-center items-center font-roboto tracking-wider gap-y-6 pt-12">
        <div class="w-8/12 text-2xl pb-4">About us</div>
        <div class="w-8/12 mx-auto grid-cols-2 grid gap-4">
            <div class="flex-col flex gap-y-6 ">
                <div class="text-xs text-gray-600 leading-5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                    Aenean commodo ligula eget dolor. Aenean massa.
                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <br>
                    Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis
                    enim.
                </div>
                <button class="max-w-max py-2 px-4 border border-black text-xs hover:text-gray-600">Our Team</button>
            </div>
            <div class="flex-col flex gap-y-6 ">
                <div class="text-xs text-gray-600 leading-5">Donec pede justo, fringilla vel, aliquet nec, vulputate
                    eget, arcu. In enim justo, rhoncus ut, imperdiet a,
                    venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. <br>
                    Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula.
                </div>
                <button class="max-w-max py-2 px-4 border border-black text-xs hover:text-gray-600">Get in Touch
                </button>
            </div>
        </div>
    </div>

    <!-- Team  -->

    <div class="grid grid-cols-5 gap-3 p-3 bg-[#35383C]">
        <img src="../../../../images/p1.jpg" alt="" class="animate__animated wow animate__backInLeft" data-wow-duration="2s">
        <img src="../../../../images/p2.jpg" alt="" class="animate__animated wow animate__backInLeft" data-wow-duration="2s">
        <img src="../../../../images/p3.jpg" alt="" class="animate__animated wow animate__bounceInUp" data-wow-duration="2s">
        <img src="../../../../images/p4.jpg" alt="" class="animate__animated wow animate__backInRight" data-wow-duration="2s">
        <img src="../../../../images/p5.jpg" alt="" class="animate__animated wow animate__backInRight" data-wow-duration="2s">
    </div>
    <div class="w-8/12 h-72 mx-auto grid grid-cols-2 justify-center items-center ">
        <div class="flex-col flex gap-y-6">
            <div class="text-3xl">How it started…</div>
            <div class="text-sm text-gray-600 leading-5">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
            </div>
        </div>
        <div class="flex-col flex gap-y-6">
            <div class="text-3xl">Our Philosophy…</div>
            <div class="text-sm text-gray-600 leading-5">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
            </div>
        </div>
    </div>

    <!-- Counter -->
            <div class="grid grid-cols-4 h-40">
        <div class="flex-col bg-gray-50 flex justify-center items-center gap-y-3">
            <div class="flex items-center">
            <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="0.5"
                  class="counter-number purecounter text-3xl"></span>
                <span class="text-lg text-gray-500">&nbsp;Founder</span>
            </div>
            <div class="text-gray-600">Who try to create a new kind of business</div>
        </div>
        <div class="flex-col bg-gray-100 flex justify-center items-center gap-y-3">
            <div class="flex items-center ">
                <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="0.5"
                      class="counter-number purecounter text-3xl"></span>
                <span class="text-lg text-gray-500">&nbsp;Employees</span>
            </div>
            <div class="text-gray-600">Who cater to your every whim</div>
        </div>
        <div class="flex-col bg-gray-200 flex justify-center items-center gap-y-3">
            <div class="flex items-center ">
                <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="0.5"
                      class="counter-number purecounter text-3xl"></span>
                <span class="text-lg text-gray-500"> <span class="text-3xl">/7</span> Support</span>
            </div>
            <div class="text-gray-600">You got any issues? Get in touch!</div>
        </div>
        <div class="flex-col bg-gray-300 flex justify-center items-center gap-y-3">
            <div class="flex items-center ">
                <span data-purecounter-start="0" data-purecounter-end="758" data-purecounter-duration="0.5"
                      class="counter-number purecounter text-3xl"></span>
                <span class="text-lg text-gray-500">&nbsp; Projects</span>
            </div>
            <div class="text-gray-600">We got the experience! Use it!</div>
        </div>
    </div>

    <x-web.home.footer />
    <x-web.home.copyright />

</div>


<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
<script>
    new PureCounter();
</script>

