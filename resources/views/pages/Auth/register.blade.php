@extends('layouts.application')

@section('content')
<section class=" w-full min-h-screen flex flex-col justify-center items-center">
    <div class="flex w-full absolute top-0 px-7 xl:px-8 py-4">
        <h1 class="font-bold text-base text-950">Here.Stockroom</h1>
    </div>
    <form action="{{ route('register-store') }}" method="POST"
        class="w-full m-2 flex flex-col gap-5 max-w-sm bg-white border shadow-50 border-100 rounded-xl px-6 py-6">
        @csrf

        <div class="text-left w-full text-950 font-semibold text-base">Register here</div>

        <div class="w-full flex flex-col gap-3">
            <div class="flex flex-col gap-2 w-full">
                <label class="font-semibold text-[12px] text-950" for="name">Name</label>
                <input required type="text" name="name" id="name" placeholder="Jhone Due"
                    class="border border-100 rounded-md px-4 py-3 text-[12px]">
                @error('name')
                <p class="text-[12px] text-red-600">*{{ $message }}</p>
                @enderror
            </div>
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
            <div class="flex flex-col gap-2 w-full">
                <label class="font-semibold text-[12px] text-950" for="confirm_password">Confirm password</label>
                <input required type="password" name="confirm_password" id="confirm_password"
                    placeholder="Your password" class="border border-100 rounded-md px-4 py-3 text-[12px]">
                @error('confirm_password')
                <p class="text-[12px] text-red-600">*{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-2 w-full bg-950 hover:shadow-lg ease-out rounded-md py-3 mt-2">
                <button type="submit" class="font-semibold text-[12px] text-white">Register</button>
            </div>

        </div>

    </form>

    <p class="text-[12px] text-300 font-normal">Do have already a account? <a href="{{ route('login') }}"
            class="text-950 hover:underline">Login</a></p>
</section>
@endsection