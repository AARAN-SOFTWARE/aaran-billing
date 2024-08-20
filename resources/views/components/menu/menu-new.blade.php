<nav x-data="{ mobileMenuIsOpen: false }" @click.away="mobileMenuIsOpen = false"
     class="fixed w-full z-20 bg-white sm:bg-black/25 flex items-center md:justify-evenly justify-between border-b border-neutral-300 px-6 py-4 dark:border-neutral-700 "
     aria-label="penguin ui menu">
    <!-- Brand Logo -->
    <a href="#" class="text-2xl font-bold text-neutral-900 dark:text-white gap-4 inline-flex items-center">
        <spn>
            <x-assets.logo.brand logo="{{ \App\Helper\ConvertTo::toLower(config('aadmin.brand'))}}"/>
        </spn>
        <span class="text-white">{{ \App\Helper\ConvertTo::toUpper(config('aadmin.brand'))}}</span>
        <!-- <img src="./your-logo.svg" alt="brand logo" class="w-10" /> -->
    </a>
    <!-- Desktop Menu -->
    <ul class="hidden items-center gap-6 md:flex">
        <li><a href="{{route('home')}}"
               class="font-bold text-white underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-white dark:hover:text-white"
               aria-current="page">Home</a></li>
        <li><a href="{{route('about')}}"
               class="font-medium text-white underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">About</a>
        </li>
        <li><a href="#"
               class="font-medium text-white underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">Blog</a>
        </li>
        <li><a href="{{route('contact')}}"
               class="font-medium text-white underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">Contact</a>
        </li>
        @if (Route::has('login'))
            @auth
                <li><a href="{{route('dashboard')}}"
               class="font-medium text-white underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">Dashboard</a>
                </li>
                <li><a href="{{route('logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="font-medium text-white underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            @else
                <li><a href="{{route('login')}}"
                       class="font-semibold text-white underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">Login</a>
                </li>
            @endauth
           @endif
    </ul>
    <!-- Mobile Menu Button -->
    <button @click="mobileMenuIsOpen = !mobileMenuIsOpen" :aria-expanded="mobileMenuIsOpen"
            :class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-40' : null" type="button"
            class="flex text-neutral-600 dark:text-neutral-300 md:hidden" aria-label="mobile menu"
            aria-controls="mobileMenu">
        <svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true"
             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
        <svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true"
             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
        </svg>
    </button>
    <!-- Mobile Menu -->
    <ul x-cloak x-show="mobileMenuIsOpen"
        x-transition:enter="transition motion-reduce:transition-none ease-out duration-300"
        x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0"
        x-transition:leave="transition motion-reduce:transition-none ease-out duration-300"
        x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu"
        class="fixed  overflow-y-auto inset-x-0 top-0 z-30 flex flex-col divide-y divide-neutral-300 rounded-b-md border-b border-neutral-300 bg-neutral-50 px-6 pb-6 pt-20 dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-900 md:hidden">
        <li class="py-4"><a href="#" class="w-full text-lg font-bold text-black focus:underline dark:text-white"
                            aria-current="page">Products</a></li>
        <li class="py-4"><a href="#"
                            class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Pricing</a>
        </li>
        <li class="py-4"><a href="#"
                            class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Blog</a>
        </li>
        @if (Route::has('login'))
            @auth
                <li class="py-4"><a href="{{route('dashboard')}}"
                       class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Dashboard</a>
                </li>
                <li class="py-4"><a href="{{route('logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            @else
                <li class="py-4"><a href="{{route('login')}}"
                       class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Login</a>
                </li>
            @endauth
        @endif
    </ul>
</nav>
