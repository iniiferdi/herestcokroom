@extends('layouts.application')

@section('content')



<main class="w-full max-w-5xl flex flex-col justify-center items-center mx-auto mb-8  gap-6">
    <div class=" flex w-full max-w-5xl justify-start">
        <a href="{{route('home')}}" class="font-bold px-6 text-base text-950  pt-4 mt-3 ">Here.Stockroom</a>
    </div>
    <section class="w-full max-w-5xl border-none xl:border border-100 p-6 rounded-xl  flex flex-col gap-4">
        <h1 class="font-semibold text-lg text-950">Order Details</h1>

        <div class="flex flex-row items-start gap-2 justify-start rounded-lg border border-100 w-full p-5">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10.3995 16.4678L10.0496 15.8044L10.0496 15.8044L10.3995 16.4678ZM9.60046 16.4678L9.95035 15.8044L9.95035 15.8044L9.60046 16.4678ZM15.0833 9.16665C15.0833 10.9531 14.19 12.4272 13.0729 13.5735C11.9559 14.7197 10.6737 15.4753 10.0496 15.8044L10.7494 17.1312C11.4417 16.766 12.8764 15.9244 14.1472 14.6204C15.4179 13.3164 16.5833 11.4871 16.5833 9.16665H15.0833ZM9.99999 4.08331C12.8074 4.08331 15.0833 6.3592 15.0833 9.16665H16.5833C16.5833 5.53077 13.6359 2.58331 9.99999 2.58331V4.08331ZM4.91666 9.16665C4.91666 6.3592 7.19254 4.08331 9.99999 4.08331V2.58331C6.36412 2.58331 3.41666 5.53077 3.41666 9.16665H4.91666ZM9.95035 15.8044C9.32629 15.4753 8.04405 14.7197 6.92705 13.5735C5.80998 12.4272 4.91666 10.9531 4.91666 9.16665H3.41666C3.41666 11.4871 4.58204 13.3164 5.85278 14.6204C7.12358 15.9244 8.55823 16.766 9.25056 17.1312L9.95035 15.8044ZM10.0496 15.8044C10.0166 15.8218 9.98334 15.8218 9.95035 15.8044L9.25056 17.1312C9.72148 17.3796 10.2785 17.3796 10.7494 17.1312L10.0496 15.8044ZM11.75 9.16665C11.75 10.1331 10.9665 10.9166 9.99999 10.9166V12.4166C11.7949 12.4166 13.25 10.9616 13.25 9.16665H11.75ZM9.99999 7.41665C10.9665 7.41665 11.75 8.20015 11.75 9.16665H13.25C13.25 7.37172 11.7949 5.91665 9.99999 5.91665V7.41665ZM8.24999 9.16665C8.24999 8.20015 9.03349 7.41665 9.99999 7.41665V5.91665C8.20506 5.91665 6.74999 7.37172 6.74999 9.16665H8.24999ZM9.99999 10.9166C9.03349 10.9166 8.24999 10.1331 8.24999 9.16665H6.74999C6.74999 10.9616 8.20506 12.4166 9.99999 12.4166V10.9166Z"
                    fill="#242424" />
            </svg>
            <div class="flex flex-col gap-1">
                <h2 class="text-950 font-semibold text-sm">Shipping Address</h2>
                @if ($address)
                <p class="text-[#ED7755] text-[12px] font-normal">{{ $address->address }}</p>
                @else
                <p class="text-[#ED7755] text-[12px] font-normal">Please add your address in the <a
                        href="{{ route('profile') }}" class="hover:underline">profile</a>.</p>
                @endif

            </div>


        </div>

        <div class="flex flex-col gap-4 ">
            <h2 class="text-950 font-semibold text-sm">Product Orders</h2>

            @foreach ($paymentItems as $paymentItem)
            @if ($paymentItem->cartItem)
            <div class="flex flex-row justify-between items-center border border-100 p-4 rounded-lg">
                <div class="flex flex-col   w-1/2">
                    <h1 class="text-base text-950 font-semibold">Vans</h1>
                    <h1 class="text-sm text-300 font-normal">{{ $paymentItem->cartItem->product->name }}</h1>

                    <h1 class="text-sm text-950 font-semibold mt-4">Product Details</h1>
                    <div class="flex flex-col gap-1 mt-2">
                        <h1 class="text-[12px] text-950 font-normal"><span class="font-medium">Quantity : </span>{{
                            $paymentItem->quantity }}</h1>
                        <h1 class="text-[12px] text-950 font-normal"><span class="font-medium">Price : Rp </span>{{
                            $paymentItem->cartItem->product->price }}</h1>
                        <h1 class="text-[12px] text-950 font-normal"><span class="font-medium">Size :  </span>{{
                            $paymentItem->cartItem->size->name }}</h1>
                    </div>
                </div>

                <div class="w-1/2">
                    <img class="w-full object-contain xl:p-12 2xl:p-6"
                    src="{{ asset('images/product/' . $paymentItem->cartItem->product->images->first()->images) }}"
                    alt="">
                </div>
            </div>


            @endif
            @endforeach


            <div class="flex flex-row justify-between items-center w-full mt-2">
                <h1 class="text-sm text-950 font-bold">Total : <span class="font-medium">Rp {{
                        number_format($paymentItem->subtotal, 0, ',', '.') }}</span></h1>

                <button
                    class="bg-950 flex flex-row pay-button items-center justify-center px-3 py-3  rounded-lg text-white">
                    <p class="font-semibold text-[12px]">Payment Now</p>
                </button>
            </div>


        </div>
    </section>
</main>


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.pay-button').forEach(function (button) {
            button.addEventListener('click', function () {
                // Ambil nilai snap token dari atribut value tombol
               
               
                
                snap.pay('{{ $payment->snap_tokens }}', {
                    // Optional
                    onSuccess: function (result) {
                        window.location.href = `/success-payment/{{ $payment->id }}`;
                        
                    },
                    // Optional
                    onPending: function (result) {
                        /* You may add your own js here, this is just an example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onError: function (result) {
                        /* You may add your own js here, this is just an example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            });
        });
    });
</script>



@endsection