<div id="portfolio" class="h-screen w-full bg-gray-200 z-30" style=" box-shadow: inset 0 -20px 10px -12px rgba(0, 0, 0, 0.5), inset 0 20px 5px -12px rgba(0, 0, 0, 0.5);">
    
    {{-- Project 1 --}}
    <div class="w-full md:grid  grid-cols-2 transition-transform duration-[3000ms] ease-in-out z-[-1]" id="mainProject">
        <div class="h-screen w-full p-10">
            {{-- Code Project --}}
            <h1 class="text-xs text-center md:ml-10 md:mt-5 w-20 h-24 font-semibold text-slate-400">
                P <br>
                R <br>
                J <br>
                0 <br>
                0 <br>
                1 <br>
            </h1>
            {{-- Code Project --}}
            <div class="md:ml-10 md:mt-[20%] p-1 relative">
                <h1 class="text-7xl font-semibold">My Project</h1>
                <p class="mt-1 font-light text-slate-500">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam provident animi ea assumenda eveniet. Ducimus atque dolore numquam autem? Temporibus distinctio a iste accusamus hic illo nostrum quis amet veritatis.
                </p>
                <a class="font-semibold text-slate-900 pt-5">
                    Read More
                </a>
            </div>
        </div> 
        <div class=" h-screen bg-[#030312] w-[70%] justify-self-end text-white">
            <img src="{{ 'assets/img/newTT.jpeg' }}" alt=""  class="absolute w-[350px] mt-[10%] -ml-[13%]">
            <div>
                <button onclick="changeProject('Up')">
                    <img src="{{ 'assets/img/landing/portfolio/arrowUp.png' }}" alt=""  class="absolute w-20 mt-[4%] ml-72">
                </button>
                <div class="absolute w-20 mt-[13%] ml-80">
                    <span>P</span> <br>
                    <span>r</span> <br>
                    <span>o</span> <br>
                    <span>j</span> <br>
                    <span>e</span> <br>
                    <span>c</span> <br>
                    <span>t</span> <br>
                    <span>1</span>
                </div>
                <button onclick="changeProject('Down')">
                    <img src="{{ 'assets/img/landing/portfolio/arrowDown.png' }}" alt=""  class="absolute w-20 mt-[34%] ml-72">
                </button>
            </div>
        </div>
    </div>

    {{-- Project 2 --}}
    <div class="w-full hidden grid-cols-2 transition-all duration-[3000ms] ease-in-out translate-y-[100%]" id="mainProject2">
        <div class="h-screen w-full p-10">
            {{-- Code Project --}}
            <h1 class="text-xs text-center md:ml-10 md:mt-5 w-20 h-24 font-semibold text-slate-400">
                P <br>
                R <br>
                J <br>
                0 <br>
                0 <br>
                2 <br>
            </h1>
            {{-- Code Project --}}
            <div class="md:ml-10 md:mt-[20%] p-1 relative">
                <h1 class="text-7xl font-semibold">My Project</h1>
                <p class="mt-1 font-light text-slate-500">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam provident animi ea assumenda eveniet. Ducimus atque dolore numquam autem? Temporibus distinctio a iste accusamus hic illo nostrum quis amet veritatis.
                </p>
                <a class="font-semibold text-slate-900 pt-5">
                    Read More
                </a>
            </div>
        </div> 
        <div class=" h-screen bg-[#030312] w-[70%] justify-self-end text-white">
            <img src="{{ 'assets/img/newTT.jpeg' }}" alt=""  class="absolute w-[350px] mt-[10%] -ml-[13%]">
            <div>
                <button onclick="changeProject('Up')">
                    <img src="{{ 'assets/img/landing/portfolio/arrowUp.png' }}" alt=""  class="absolute w-20 mt-[4%] ml-72">
                </button>
                <div class="absolute w-20 mt-[13%] ml-80">
                    <span>P</span> <br>
                    <span>r</span> <br>
                    <span>o</span> <br>
                    <span>j</span> <br>
                    <span>e</span> <br>
                    <span>c</span> <br>
                    <span>t</span> <br>
                    <span>2</span>
                </div>
                <button onclick="changeProject('Down')">
                    <img src="{{ 'assets/img/landing/portfolio/arrowDown.png' }}" alt=""  class="absolute w-20 mt-[34%] ml-72">
                </button>
            </div>
        </div>
    </div>

</div>