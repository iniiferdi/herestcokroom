@extends('layouts.application')

@section('content')
<main class="w-full max-w-5xl flex flex-col justify-center items-center mx-auto mb-8  gap-6 px-6">
    <div class=" flex w-full max-w-5xl justify-start xl:p-0 ">
        <a href="{{route('home')}}" class="font-bold text-base text-950  pt-4 mt-1 ">Here.Stockroom</a>
    </div>

    <section class="w-full max-w-5xl   border border-100 p-6 rounded-xl  flex flex-col gap-2   ">
        <h1 class="font-bold text-lg text-950   ">Payment Successfully</h1>
        <p class="text-[13px]">Congratulations! Your payment was successful. Thank you for shopping with us. We will
            process your order shortly. If you need any further assistance, our team is ready to help.</p>
        {{-- <img src="{{ asset('svg/success-payment.svg') }}" alt=""> --}}

        <div class="flex flex-row gap-3 items-center mt-2 w-full">
            <a href="{{ route('home') }}"
                class="bg-950  flex flex-row pay-button items-center justify-center px-3 py-3 gap-1  rounded-lg text-white">
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.79999 9.03164C3.79999 7.95675 3.79999 7.4193 4.01727 6.94688C4.23455 6.47446 4.64261 6.1247 5.45873 5.42517L6.2504 4.7466C7.72552 3.4822 8.46308 2.85001 9.34165 2.85001C10.2202 2.85001 10.9578 3.4822 12.4329 4.7466L13.2246 5.42517C14.0407 6.1247 14.4488 6.47446 14.666 6.94688C14.8833 7.4193 14.8833 7.95675 14.8833 9.03164V12.3886C14.8833 13.8814 14.8833 14.6278 14.4196 15.0915C13.9558 15.5553 13.2094 15.5553 11.7167 15.5553H6.96665C5.47387 15.5553 4.72748 15.5553 4.26374 15.0915C3.79999 14.6278 3.79999 13.8814 3.79999 12.3886V9.03164Z" stroke="white" stroke-width="1.5"/>
                    <path d="M11.3208 15.5553V11.8053C11.3208 11.253 10.8731 10.8053 10.3208 10.8053H8.36249C7.8102 10.8053 7.36249 11.253 7.36249 11.8053V15.5553" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    
                    
                    
                <p class="font-semibold text-[12px]">Home</p>
            </a>
            <a href="{{ route('history') }}"
                class="bg-950  flex flex-row pay-button items-center justify-center px-3 py-3 gap-1  rounded-lg text-white">
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.33331 5.30331C9.33331 5.05661 9.33331 4.93325 9.39206 4.82986C9.43901 4.74724 9.53387 4.66577 9.62263 4.63184C9.73371 4.58937 9.83933 4.60551 10.0506 4.63778C10.6325 4.72667 11.1949 4.92328 11.7083 5.21969C12.4304 5.63659 13.03 6.23622 13.4469 6.95831C13.8638 7.6804 14.0833 8.49951 14.0833 9.33331C14.0833 10.1671 13.8638 10.9862 13.4469 11.7083C13.03 12.4304 12.4304 13.03 11.7083 13.4469C10.9862 13.8638 10.1671 14.0833 9.33331 14.0833C8.49951 14.0833 7.6804 13.8638 6.95831 13.4469C6.44491 13.1505 5.99342 12.7617 5.62549 12.3022C5.49192 12.1354 5.42514 12.052 5.40637 11.9346C5.39138 11.8408 5.4145 11.7179 5.46258 11.6359C5.52275 11.5333 5.62958 11.4717 5.84323 11.3483L8.97331 9.54116C9.10446 9.46544 9.17004 9.42758 9.21773 9.37461C9.25993 9.32775 9.2918 9.27254 9.31129 9.21256C9.33331 9.14478 9.33331 9.06906 9.33331 8.91762L9.33331 5.30331Z" fill="white"/>
                    <circle cx="9.33333" cy="9.33333" r="7.08333" stroke="white" stroke-width="1.5"/>
                    </svg>
                    
                    
                    
                <p class="font-semibold text-[12px]">Order History</p>
            </a>
        </div>
    </section>

</main>
@endsection