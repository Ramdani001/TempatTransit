<nav id="navbar" class="z-50 py-2 px-4 fixed top-0 w-full" x-data="{navOpen : true}">
    {{-- <div class="container mx-auto "> --}}
        <div class="flex justify-between">
            <a href="#hero">
                <img src="{{ '/assets/img/Tempattransit-logo.png' }}" class="w-52 order-1 sm:order-2">
            </a>
            <ion-icon @click="navOpen = ! navOpen" name="reorder-three" class="text-biru lg:hidden text-4xl order-2 sm:order-1"></ion-icon>
            <div class="order-2 self-center hidden lg:block">
                <ul class="flex gap-16 ">
                    <li class="text-white font-bold text-sm font-Circular"><a href="#aboutUs">About Us</a></li>
                    <li class="text-white font-normal text-sm font-Circular opacity-50"><a href="#prices">Prices</a></li>
                    <li class="text-white font-normal text-sm font-Circular opacity-50"><a href="#portfolio">Portofolio</a></li>
                    <li class="text-white font-normal text-sm font-Circular opacity-50"><a href="#partners">Partner</a></li>
                </ul>
            </div>
            <div class="order-3 hidden sm:block">
                <button class="grow font-bold text-white px-6 py-4  rounded-full text-sm">Login</button>
            </div>
        </div> 
        {{-- Navbar --}}
        <div x-show="navOpen" x-data="{open : false}" class="fixed bottom-0 w-full right-0 left-0 p-4 bg-blue-950 bg-opacity-50 lg:hidden"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90">
            <ul class="flex justify-between">
                <li>
                    <button class="flex justify-center flex-col items-center gap-1">
                        <ion-icon name="globe-outline" class="text-2xl  text-white"></ion-icon>
                        <span class="text-white text-base font-bold">About Us</span>
                    </button>
                </li>
                <li>
                    <button class="flex justify-center flex-col items-center gap-1">
                        <ion-icon name="pricetags-outline" class="text-white text-2xl opacity-50"></ion-icon>
                        <span class="text-white text-base opacity-50 font-normal">Prices</span>
                    </button>
                </li>
                <li>
                    <button class="flex justify-center flex-col items-center gap-1">
                        <ion-icon name="book-outline" class="text-white text-2xl opacity-50"></ion-icon>
                        <span class="text-white text-base opacity-50 font-normal">Portofolio</span>
                    </button>
                </li>
                <li>
                    <button class="flex justify-center flex-col items-center gap-1">
                        <ion-icon name="people-outline" class="text-white text-2xl opacity-50"></ion-icon>
                        <span class="text-white text-base opacity-50 font-normal">Partner</span>
                    </button>
                </li>
                <li>
                    <button @click="open = !open" class="flex justify-center flex-col items-center gap-1">
                        <ion-icon name="reorder-three-outline" class="text-white text-2xl opacity-50"></ion-icon>
                        <span class="text-white text-base opacity-50 font-normal">More</span>
                    </button>
                </li>
            </ul>
            <div x-show="open" class="absolute bottom-24 left-1/2 -translate-x-1/2 flex gap-4 w-3/4"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">
                <button class="grow font-bold bg-white px-8 py-4 text-black rounded-full text-sm">Login</button>
            </div>
        </div>
    </div>
</nav>