<header class="flex flex-row w-full items-center justify-between border-b-[1.5px] border-100  py-4 shadow-50 sticky top-0 bg-white z-50">
    <div class="w-1/6">
        <a href="{{ route('home') }}" class="font-bold text-base text-950 pl-6">Here.Stockroom</a>
    </div>

    <div class=" hidden xl:hidden gap-1 items-center border border-100 py-2 px-3 rounded-md w-1/2">
        <button class="" type="button">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="6.875" cy="6.875" r="4.375" stroke="#D1D1D1" stroke-width="1.5"/>
                <path d="M12.5 12.5L10.625 10.625" stroke="#D1D1D1" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                
                
        </button>
        <input class="text-[12px] w-full font-medium text-950 outline-none " type="text" placeholder="Type to search here" aria-label="Search">
        
    </div>

    @if(auth()->check())
    <div class="flex flex-row gap-3 items-center justify-end pr-6 w-1/6">
        <a href="{{ route('profile') }}"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.4394 17.5392C16.0596 16.4761 15.2226 15.5366 14.0583 14.8666C12.894 14.1965 11.4675 13.8333 9.99992 13.8333C8.53236 13.8333 7.10581 14.1965 5.94151 14.8666C4.77722 15.5366 3.94025 16.4761 3.56041 17.5392" stroke="#242424" stroke-width="1.5" stroke-linecap="round"/>
            <ellipse cx="9.99984" cy="7.16668" rx="3.33333" ry="3.33333" stroke="#242424" stroke-width="1.5" stroke-linecap="round"/>
            </svg></a>
            

            {{-- <a href=""><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.70881 12.0902L9.50266 17.5329C9.6478 17.6692 9.72038 17.7374 9.7993 17.772C9.92718 17.828 10.0727 17.828 10.2005 17.772C10.2795 17.7374 10.352 17.6692 10.4972 17.5329L16.291 12.0902C17.9212 10.5588 18.1191 8.03884 16.7481 6.27173L16.4903 5.93946C14.8501 3.82549 11.5579 4.18002 10.4055 6.59472C10.2427 6.93581 9.75716 6.93581 9.59436 6.59472C8.44189 4.18002 5.14969 3.8255 3.50954 5.93946L3.25174 6.27173C1.88071 8.03884 2.07867 10.5588 3.70881 12.0902Z" stroke="#242424" stroke-width="1.5"/>
                </svg></a> --}}
                
                <a href="{{ route('cart') }}"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.6665 7.16666L6.6665 6.33333C6.6665 4.49238 8.15889 2.99999 9.99984 2.99999V2.99999C11.8408 2.99999 13.3332 4.49238 13.3332 6.33332L13.3332 7.16666" stroke="#242424" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M12.5 12.1667V10.5" stroke="#242424" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M7.5 12.1667V10.5" stroke="#242424" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M3.33325 10.7778C3.33325 9.26725 3.33325 8.51199 3.72036 7.98404C3.841 7.81951 3.9861 7.67441 4.15063 7.55377C4.67858 7.16666 5.43384 7.16666 6.94436 7.16666H13.0555C14.566 7.16666 15.3213 7.16666 15.8492 7.55377C16.0137 7.67441 16.1588 7.81951 16.2795 7.98404C16.6666 8.51199 16.6666 9.26725 16.6666 10.7778V11.3333C16.6666 13.8256 16.6666 15.0718 16.1307 16C15.7796 16.6081 15.2747 17.113 14.6666 17.4641C13.7384 18 12.4922 18 9.99992 18V18C7.50761 18 6.26145 18 5.33325 17.4641C4.72517 17.113 4.22022 16.6081 3.86915 16C3.33325 15.0718 3.33325 13.8256 3.33325 11.3333V10.7778Z" stroke="#242424" stroke-width="1.5"/>
                    </svg></a>
                    
                                    
            
    </div>

    @else

    <div class="flex flex-row gap-1 items-center justify-end pr-6 text-950 text-[12px] font-medium">
        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.5077 12.4275C11.2418 11.6833 10.6559 11.0256 9.84093 10.5566C9.02592 10.0876 8.02733 9.83334 7.00004 9.83334C5.97275 9.83334 4.97416 10.0876 4.15915 10.5566C3.34415 11.0256 2.75827 11.6833 2.49239 12.4275" stroke="#242424" stroke-width="1.5" stroke-linecap="round"/>
            <circle cx="7.00008" cy="5.16668" r="2.33333" stroke="#242424" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
            
        <div class="">
            <a href="{{ route('login') }}" class="hover:underline">Masuk</a>
        <span>/</span>
        <a href="{{ route('register') }}" class="hover:underline">Daftar</a>
        </div>
    </div>

    @endif
</header>