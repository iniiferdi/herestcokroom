@extends('layouts.application')

@section('content')
<section class=" w-full min-h-screen flex flex-col justify-center items-center">
    <div class="flex w-full absolute top-0 px-7 xl:px-8 py-4">
        <h1 class="font-bold text-base text-950">Here.Stockroom</h1>
    </div>
    @if (session('error'))
    <div id="error-message"
        class="w-full m-2 shadow-red-300 shadow flex text-[12px] top-16 xl:top-36 absolute flex-row justify-between items-center gap-5 max-w-sm bg-red-300 text-red-600 border  border-red-600 rounded-md px-3 py-3">
        <div class="">
            <span class="font-semibold">Error</span>
            <p>{{ session('error') }}</p>
        </div>

        <svg id="close-button" class="cursor-pointer" width="15" height="15" viewBox="0 0 15 15" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M11.25 3.75L3.75 11.25" stroke="#DC2626" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3.75 3.75L11.25 11.25" stroke="#DC2626" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>

    <script>
        document.getElementById('close-button').addEventListener('click', function() {
            document.getElementById('error-message').style.display = 'none';
        });
    </script>
    @endif

    <form action="{{ route('login-store') }}" method="POST"
        class="w-full m-2 flex flex-col gap-5 max-w-sm bg-white border shadow-50 border-100 rounded-xl px-6 py-6">
        @csrf

        <div class="text-left w-full text-950 font-semibold text-base">Welcome Back</div>

        <a href="{{ route('redirect') }}"
            class="w-full flex flex-row gap-2 hover:bg-50 cursor-pointer ease-in-out justify-center items-center rounded-md border border-100 py-3">
            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_49_192)">
                    <path
                        d="M14.9929 8.14967C14.9929 7.49416 14.9418 7.01581 14.8314 6.51974H7.64941V9.4784H11.8651C11.7801 10.2137 11.3211 11.321 10.3012 12.065L10.2869 12.1641L12.5577 13.9975L12.715 14.0139C14.1599 12.6231 14.9929 10.5768 14.9929 8.14967Z"
                        fill="#4285F4" />
                    <path
                        d="M7.64941 15.945C9.71473 15.945 11.4486 15.2363 12.715 14.0139L10.3012 12.065C9.65525 12.5345 8.7883 12.8623 7.64941 12.8623C5.62658 12.8623 3.90973 11.4716 3.29771 9.54932L3.20801 9.55726L0.846797 11.4618L0.815918 11.5513C2.07381 14.1556 4.65762 15.945 7.64941 15.945Z"
                        fill="#34A853" />
                    <path
                        d="M3.29771 9.5493C3.13623 9.05324 3.04277 8.5217 3.04277 7.97251C3.04277 7.42326 3.13623 6.89177 3.28922 6.39571L3.28494 6.29006L0.894141 4.35492L0.815918 4.3937C0.297481 5.47443 0 6.68805 0 7.97251C0 9.25697 0.297481 10.4705 0.815918 11.5513L3.29771 9.5493Z"
                        fill="#FBBC05" />
                    <path
                        d="M7.64941 3.08269C9.08578 3.08269 10.0547 3.72934 10.6072 4.26974L12.766 2.07286C11.4401 0.788397 9.71473 0 7.64941 0C4.65762 0 2.07381 1.78937 0.815918 4.39371L3.28922 6.39573C3.90973 4.47347 5.62658 3.08269 7.64941 3.08269Z"
                        fill="#EB4335" />
                </g>
                <defs>
                    <clipPath id="clip0_49_192">
                        <rect width="15" height="16" fill="white" />
                    </clipPath>
                </defs>
            </svg>


            <p class="text-[12px] font-medium  text-950">Login with Google</p>
        </a>

        <div class="w-full flex items-center text-[12px] ">
            <div class="flex-grow border-t border-gray-100"></div>
            <span class="mx-2 text-300">Or login with Email</span>
            <div class="flex-grow border-t border-gray-100"></div>
        </div>


        <div class="w-full flex flex-col gap-3">
            <div class="flex flex-col gap-2 w-full">
                <label class="font-semibold text-[12px] text-950" for="email">Email</label>
                <input required type="text" name="email" id="email" placeholder="jhone@gmail.com"
                    class="border border-100 rounded-md px-4 py-3 text-[12px]">
                @error('email')
                <p class="text-[12px] text-red-600">*{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-2 w-full">
                <label class="font-semibold text-[12px] text-950" for="password">Password</label>
                <input required type="password" name="password" id="password" placeholder="Your password"
                    class="border border-100 rounded-md px-4 py-3 text-[12px]">
                @error('password')
                <p class="text-[12px] text-red-600">*{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-2 w-full bg-red-600 hover:shadow-lg ease-out rounded-md py-3 mt-2">
                <button type="submit" class="font-semibold text-[12px] text-white">Login</button>
            </div>
        </div>

    </form>

    <p class="text-[12px] text-300 font-normal">Don’t have already a account? <a href="{{ route('register') }}"
            class="text-950 hover:underline">Regsiter</a></p>
</section>


@endsection