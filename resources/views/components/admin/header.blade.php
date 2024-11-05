<header
    class="flex flex-row justify-between items-center  px-6 lg:px-0  lg:mx-6   lg:bg-transparent sticky top-4 xl:hidden z-20  lg:static">

    <div  class="flex flex-row    items-center rounded-full bg-950   p-3">
        <svg id="btn_menu_dropdown" class="cursor-pointer" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M5 7H19" stroke="white" stroke-width="2" stroke-linecap="round" />
            <path d="M5 12H15" stroke="white" stroke-width="2" stroke-linecap="round" />
            <path d="M5 17H11" stroke="white" stroke-width="2" stroke-linecap="round" />
        </svg>
    </div>

    <div class="flex flex-row gap-2 items-center">
        
        <h1 class="font-semibold text-sm text-950 hidden lg:block">{{ auth()->user()->name }}</h1>
    </div>
</header>

