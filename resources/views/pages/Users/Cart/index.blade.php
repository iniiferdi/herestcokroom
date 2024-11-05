@extends('layouts.application')

@section('content')
<div class="w-1/6 mt-6">
    <a href="{{route('home')}}" class="font-bold text-base text-950 pl-6 pt-4 mt-4 ">Here.Stockroom</a>
</div>

<main class="flex flex-col xl:flex-row justify-between px-6 w-full gap-6 mt-12 ">
    @if (session('success'))
    <div id="success-message"
        class="animate-slide-in-right w-full m-2 shadow-emerald-300 shadow flex text-[12px] bottom-0 right-0 xl:mr-6 xl:mb-6 fixed flex-row mx-auto justify-between items-center gap-5 max-w-sm bg-emerald-300 text-emerald-600 border border-emerald-600 rounded-md px-3 py-3">
        <div>
            <span class="font-semibold">Success</span>
            <p>{{ session('success') }}</p>
        </div>
        <svg id="close-button" class="cursor-pointer" width="15" height="15" viewBox="0 0 15 15" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M11.25 3.75L3.75 11.25" stroke="#059669" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3.75 3.75L11.25 11.25" stroke="#059669" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>
    <audio id="success-sound" src="{{ asset('sounds/success.mp3') }}" preload="auto"></audio>
    <script>
        document.getElementById('success-sound').play();
            document.getElementById('close-button').addEventListener('click', function() {
                document.getElementById('success-message').style.display = 'none';
            });
            setTimeout(() => {
                document.getElementById('success-message').style.display = 'none';
            }, 4000);
    </script>
    @endif

    <div class="xl:w-3/5 w-full flex flex-col gap-6">
        <div class="flex flex-col gap-4">
            <h1 class="font-semibold text-lg text-950">Cart</h1>

            <div class="flex flex-row items-start gap-2 justify-start rounded-xl border border-100 w-full p-5">
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
                    <p class="text-[#ED7755] text-[12px] font-normal">Please add your address in the <a href="{{ route('profile') }}" class="hover:underline">profile</a>.</p>
                    @endif

                </div>
            </div>
        </div>

        <div class="flex flex-col w-full rounded-xl border border-50 bg-[#F9F9F9] p-5 gap-4">
            <h2 class="text-950 font-semibold text-sm">Here.Stockroom</h2>
            @foreach ($cart_items as $cart_item)
            <div class="flex flex-col xl:flex-row w-full items-start bg-white rounded-lg p-4 xl:h-52 2xl:h-72 h-fit py-8 gap-8 cart-item"
                data-id="{{ $cart_item->id }}">
                <div class="flex flex-row items-center justify-between w-full xl:hidden">
                    <input type="checkbox"
                        class="w-4 h-4 appearance-none border border-100 rounded checked:border-2 checked:border-950 cursor-pointer item-checkbox xl:hidden"
                        data-id="{{ $cart_item->id }}">
                    <a href="{{ route('destroy-cart', ['id' => $cart_item->id]) }}">
                        <svg class="xl:hidden" width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 4.5L4.5 13.5" stroke="#242424" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M4.5 4.5L13.5 13.5" stroke="#242424" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
                <div class="flex flex-col justify-between w-full xl:w-2/6 h-full">
                    <input type="checkbox"
                        class="w-4 h-4 appearance-none border border-100 rounded checked:border-2 checked:border-950 cursor-pointer item-checkbox hidden xl:block"
                        data-id="{{ $cart_item->id }}">
                    <img class="w-full object-contain"
                        src="{{ asset('images/product/' . $cart_item->product->images->first()->images) }}" alt="">
                </div>
                <div class="xl:w-4/6 w-full flex flex-col gap-3">
                    <div class="flex flex-row items-start justify-between">
                        <div class="flex flex-col">
                            <h1 class="text-sm text-300 font-normal">{{ $cart_item->product->name }}</h1>
                            <h1 class="text-base text-950 font-semibold">Vans</h1>
                        </div>
                        <a href="{{ route('destroy-cart', ['id' => $cart_item->id]) }}">
                            <svg class="hidden xl:block cursor-pointer" width="18" height="18" viewBox="0 0 18 18"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5 4.5L4.5 13.5" stroke="#242424" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M4.5 4.5L13.5 13.5" stroke="#242424" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <h1 class="text-sm text-950 font-normal"><span class="font-medium">Size : </span>{{
                        $cart_item->size->name }}</h1>

                       
                    <div class="flex flex-row items-center justify-between border-b border-gray-200 py-2">
                        <div class="relative">
                            <select
                                class="appearance-none border border-gray-300 rounded-md pl-3 pr-8 py-2 text-center text-gray-500 text-sm focus:outline-none focus:border-blue-500 qty-select"
                                name="qty" id="qty-{{ $cart_item->id }}" data-cart-item-id="{{ $cart_item->id }}">
                                <option value="1" {{ $cart_item->quantity == 1 ? ' selected' : '' }}>1</option>
                                <option value="2" {{ $cart_item->quantity == 2 ? ' selected' : '' }}>2</option>
                                <option value="3" {{ $cart_item->quantity == 3 ? ' selected' : '' }}>3</option>
                                <option value="4" {{ $cart_item->quantity == 4 ? ' selected' : '' }}>4</option>
                                <option value="5" {{ $cart_item->quantity == 5 ? ' selected' : '' }}>5</option>
                            </select>
                        </div>
                        <h1 class="text-sm text-gray-900 font-semibold">Rp <span class="price"
                                id="price-{{ $cart_item->id }}">{{ number_format($cart_item->product->price, 0, ',', '.')
                                }}</span></h1>
                    </div>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <form method="POST" action="{{ route('payments') }}" class="xl:w-2/5 w-full h-fit flex flex-col gap-5 mb-12">
        @csrf
        <h2 class="text-950 font-semibold text-sm">Order Quantity</h2>
        <div class="border border-100 w-full p-5 rounded-xl flex flex-col gap-3">
            <div class="flex flex-row justify-between items-center border-b border-100 pb-3">
                <h1 class="text-[13px] text-950 font-semibold">Subtotal (<span id="subtotal-items">0</span> produk)</h1>
                <h1 class="text-[13px] text-950 font-semibold">Rp <span id="subtotal-price">0</span></h1>
            </div>
            <div class="flex flex-row justify-between items-end border-b border-100 py-3">
                <div class="flex flex-col gap-1">
                    <h1 class="text-[13px] text-950 font-medium">Delivery</h1>
                    <h1 class="text-[12px] text-300 font-normal">From Here.Stockroom</h1>
                </div>
                <h1 class="text-[12px] text-300 font-normal">Calculated at checkout</h1>
            </div>
            <div class="flex flex-row justify-between items-center py-3">
                <h1 class="text-[13px] text-950 font-medium">Total</h1>
                <h1 class="text-[13px] text-950 font-medium">Rp <span id="total-price">0</span></h1>
            </div>
            <input type="hidden" id="sub_total_payment" name="sub_total_payment" value="">
            <input type="hidden" id="total_payment" name="total_payment" value="">
            <input type="hidden" id="cart_item_id" name="cart_item_id" value="">
            <input type="hidden" id="qty" name="qty" value="">
            <input type="hidden" id="size_id" name="size_id" value="{{ $cart_item->size->id ?? '' }}">


            <button type="submit"
                class="bg-950 flex flex-row items-center justify-center px-3 py-3 w-full rounded-lg text-white">
                <p class="font-semibold text-[12px]">Continue to Payment</p>
            </button>
        </div>
    </form>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const selects = document.querySelectorAll('.qty-select');
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const subtotalItemsElement = document.getElementById('subtotal-items');
    const subtotalPriceElement = document.getElementById('subtotal-price');
    const totalPriceElement = document.getElementById('total-price');
    const subTotalPaymentInput = document.getElementById('sub_total_payment');
    const totalPaymentInput = document.getElementById('total_payment');
    const cartItemIdInput = document.getElementById('cart_item_id');
    const qtyInput = document.getElementById('qty');

    function formatCurrency(amount) {
    return amount.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function formatForServer(amount) {
    return amount.toString().replace(/\./g, '').replace(',', '.');
}

function updateOrderSummary() {
    let subtotalItems = 0;
    let subtotalPrice = 0;
    let cartItemIds = [];
    let quantities = [];

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            const cartItemId = checkbox.getAttribute('data-id');
            const qtySelect = document.getElementById(`qty-${cartItemId}`);
            const priceElement = document.getElementById(`price-${cartItemId}`);
            const price = parseFloat(priceElement.textContent.replace(/\./g, '').replace(',', '.'));
            const quantity = parseInt(qtySelect.value);

            subtotalItems += quantity;
            subtotalPrice += price * quantity;

            cartItemIds.push(cartItemId);
            quantities.push(quantity);
        }
    });

    subtotalItemsElement.textContent = subtotalItems;
    subtotalPriceElement.textContent = formatCurrency(subtotalPrice);
    totalPriceElement.textContent = formatCurrency(subtotalPrice);

    // Update hidden inputs with formatted values for the server
    subTotalPaymentInput.value = formatForServer(subtotalPrice);
    totalPaymentInput.value = formatForServer(subtotalPrice); // Assuming total payment is same as subtotal for now
    cartItemIdInput.value = cartItemIds.join(',');
    qtyInput.value = quantities.join(',');
}


    

    function updateCartItemQuantity(cartItemId, newQty) {
        return fetch(`/update-cart-item-qty/${cartItemId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ qty: newQty })
        })
        .then(response => response.json());
    }

    selects.forEach(select => {
        select.addEventListener('change', function() {
            const cartItemId = this.getAttribute('data-cart-item-id');
            const newQty = this.value;
            select.disabled = true; // Disable while processing

            updateCartItemQuantity(cartItemId, newQty)
                .then(data => {
                    if (data.success) {
                        updateOrderSummary();
                    } else {
                        alert('Failed to update quantity');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                })
                .finally(() => {
                    select.disabled = false; // Re-enable after processing
                });
        });
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateOrderSummary();
        });
    });

    updateOrderSummary();
});

</script>

@endsection