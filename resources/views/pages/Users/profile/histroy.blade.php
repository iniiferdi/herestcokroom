@extends('layouts.application')

@section('content')
<x-front.header />

<main class="px-6 w-full flex flex-col xl:flex-row gap-6 mb-8  mt-12">
    <div class="xl:w-1/4 w-full  p-6 rounded-xl border border-100 flex flex-col gap-4">
        <h1 class="font-semibold text-sm text-950 border-b pb-3 border-100">My Account</h1>

        <div class="flex flex-col gap-4 text-[13px] font-medium text-500">
            <a href="{{ route('profile') }}" class="text-950">My Account</a>
            <a href="{{ route('history') }}">History</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
    <div class="flex flex-col gap-6 rounded-xl border border-100 p-6 w-full xl:w-3/4">
        <h1 class="font-semibold text-sm text-950 border-b pb-3 border-100">Order History</h1>

        <form action="{{ route('orders.filter.user') }}" method="POST" class="flex flex-row gap-4 items-center">
            @csrf
            @php
            $status = request('status', 'all');
            @endphp
            <button name="status" value="all"
                class="rounded-full border border-100 font-medium text-[13px] px-4 py-2 {{ $status == 'all' ? 'bg-950 text-white' : 'text-950 bg-white' }}">All
                Orders</button>
            <button name="status" value="new"
                class="rounded-full border border-100 font-medium text-[13px] px-4 py-2 {{ $status == 'new' ? 'bg-950 text-white' : 'text-950 bg-white' }}">New
                Orders</button>
            <button name="status" value="shipped"
                class="rounded-full border border-100 font-medium text-[13px] px-4 py-2 {{ $status == 'shipped' ? 'bg-950 text-white' : 'text-950 bg-white' }}">Shipped
                Orders</button>
            <button name="status" value="cancelled"
                class="rounded-full border border-100 font-medium text-[13px] px-4 py-2 {{ $status == 'cancelled' ? 'bg-950 text-white' : 'text-950 bg-white' }}">Cancelled
                Orders</button>
            <button name="status" value="finish"
                class="rounded-full border border-100 font-medium text-[13px] px-4 py-2 {{ $status == 'finish' ? 'bg-950 text-white' : 'text-950 bg-white' }}">Finish
                Orders</button>
        </form>

        <div class="flex flex-col-reverse gap-6 rounded-xl w-full">

            @foreach ($products as $product)
            <div class="flex flex-col gap-3 xl:flex-row justify-between items-center border border-100 p-4 rounded-lg">

                <div class="flex flex-col">
                    <div class="flex flex-col    w-full  xl:w-1/2">
                        <h1 class="text-base text-950 font-semibold">Vans</h1>
                        <h1 class="text-sm text-300 font-normal">{{ $product->product->name }}</h1>


                    </div>

                    <div class=" w-full xl:w-1/2">
                        <img class="w-full object-contain xl:p-12 2xl:p-6"
                            src="{{ asset('images/product/' . $product->product->images->first()->images) }}" alt="">
                    </div>
                </div>

                <div class="flex flex-col gap-2 w-full xl:w-1/2">
                    <h1 class="text-sm text-950 font-semibold mt-4">Order Details</h1>
                    <div class="flex flex-col gap-1 ">
                        <h1 class="text-[12px] text-950 font-normal">
                            <span class="font-medium">Size : {{ $product->size->name }}</span>
                        </h1>
                        <h1 class="text-[12px] text-950 font-normal">
                            <span class="font-medium">Quantity : {{ $product->quantity }} produk</span>
                        </h1>
                        <h1 class="text-[12px] text-950 font-normal">
                            <span class="font-medium">Price : Rp {{ number_format($product->product->price, 0, '.', '.')
                                }}</span>
                        </h1>
                    </div>

                    <div class="flex flex-row justify-between items-center">
                        <h1 class="text-[12px] text-950 font-normal">
                            <span class="font-medium">Total</span>
                        </h1>
                        <h1 class="text-[12px] text-950 font-normal">
                            <span class="font-medium">Rp {{ number_format($product->quantity * $product->product->price,
                                0,
                                '.', '.') }}</span>
                        </h1>
                    </div>

                    @if($product->status === 'new')
                    <div
                        class="bg-yellow-50  flex flex-row w-full pay-button items-center justify-center px-3 py-3 gap-1  rounded-lg text-950">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.33331 5.30331C9.33331 5.05661 9.33331 4.93325 9.39206 4.82986C9.43901 4.74724 9.53387 4.66577 9.62263 4.63184C9.73371 4.58937 9.83933 4.60551 10.0506 4.63778C10.6325 4.72667 11.1949 4.92328 11.7083 5.21969C12.4304 5.63659 13.03 6.23622 13.4469 6.95831C13.8638 7.6804 14.0833 8.49951 14.0833 9.33331C14.0833 10.1671 13.8638 10.9862 13.4469 11.7083C13.03 12.4304 12.4304 13.03 11.7083 13.4469C10.9862 13.8638 10.1671 14.0833 9.33331 14.0833C8.49951 14.0833 7.6804 13.8638 6.95831 13.4469C6.44491 13.1505 5.99342 12.7617 5.62549 12.3022C5.49192 12.1354 5.42514 12.052 5.40637 11.9346C5.39138 11.8408 5.4145 11.7179 5.46258 11.6359C5.52275 11.5333 5.62958 11.4717 5.84323 11.3483L8.97331 9.54116C9.10446 9.46544 9.17004 9.42758 9.21773 9.37461C9.25993 9.32775 9.2918 9.27254 9.31129 9.21256C9.33331 9.14478 9.33331 9.06906 9.33331 8.91762L9.33331 5.30331Z"
                                fill="#242424" />
                            <circle cx="9.33333" cy="9.33333" r="7.08333" stroke="#242424" stroke-width="1.5" />
                        </svg>



                        <p class="font-semibold text-[12px]">Order awaiting confirmation</p>
                    </div>
                    @endif
                    @if($product->status === 'process')
                    <div
                        class="bg-blue-50  flex flex-row w-full pay-button items-center justify-center px-3 py-3 gap-1  rounded-lg text-950">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.33331 5.30331C9.33331 5.05661 9.33331 4.93325 9.39206 4.82986C9.43901 4.74724 9.53387 4.66577 9.62263 4.63184C9.73371 4.58937 9.83933 4.60551 10.0506 4.63778C10.6325 4.72667 11.1949 4.92328 11.7083 5.21969C12.4304 5.63659 13.03 6.23622 13.4469 6.95831C13.8638 7.6804 14.0833 8.49951 14.0833 9.33331C14.0833 10.1671 13.8638 10.9862 13.4469 11.7083C13.03 12.4304 12.4304 13.03 11.7083 13.4469C10.9862 13.8638 10.1671 14.0833 9.33331 14.0833C8.49951 14.0833 7.6804 13.8638 6.95831 13.4469C6.44491 13.1505 5.99342 12.7617 5.62549 12.3022C5.49192 12.1354 5.42514 12.052 5.40637 11.9346C5.39138 11.8408 5.4145 11.7179 5.46258 11.6359C5.52275 11.5333 5.62958 11.4717 5.84323 11.3483L8.97331 9.54116C9.10446 9.46544 9.17004 9.42758 9.21773 9.37461C9.25993 9.32775 9.2918 9.27254 9.31129 9.21256C9.33331 9.14478 9.33331 9.06906 9.33331 8.91762L9.33331 5.30331Z"
                                fill="#242424" />
                            <circle cx="9.33333" cy="9.33333" r="7.08333" stroke="#242424" stroke-width="1.5" />
                        </svg>



                        <p class="font-semibold text-[12px]">Orders are being prepared</p>
                    </div>
                    @endif
                    @if($product->status === 'finish')
                    <div
                        class="bg-green-50  flex flex-row w-full pay-button items-center justify-center px-3 py-3 gap-1  rounded-lg text-950">




                        <p class="font-semibold text-[12px]">Congratulations, the product has arrived</p>
                    </div>
                    @endif
                    @if($product->status === 'shipped')
                    <div
                        class="bg-orange-50  flex flex-row w-full pay-button items-center justify-center px-3 py-3 gap-1  rounded-lg text-950">




                        <p class="font-semibold text-[12px]">Product is being shipped | for monitoring seller chat
                            seller
                        </p>
                    </div>
                    @endif
                    @if($product->status === 'cancelled')
                    <div
                        class="bg-red-50  flex flex-row w-full pay-button items-center justify-center px-3 py-3 gap-1  rounded-lg text-950">




                        <p class="font-semibold text-[12px]">Chasback chat
                        </p>
                    </div>
                    @endif
                    <div class="flex flex-col 2xl:flex-row items-center gap-3">
                        <a target="_blink" href="https://wa.me/6285727163035?text=Hello,%20I%20would%20like%20to%20inquire%20about%20the%20product%20{{ urlencode($product->product->name) }}%0ASize:%20{{ urlencode($product->size->name) }}%0AQuantity:%20{{ $product->quantity }}%0APrice:%20Rp%20{{ number_format($product->product->price, 0, '.', '.') }}%0ATotal:%20Rp%20{{ number_format($product->quantity * $product->product->price, 0, '.', '.') }}%0A%0AProduct%20Image:%0A{{ urlencode(public_path('images/product/' . $product->product->images->first()->images)) }}"
                            class="bg-green-700 flex flex-row w-full pay-button items-center justify-center px-3 py-3 gap-1 rounded-lg text-white">

                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_201_62)">
                                    <path d="M2.5332 16.5L3.51729 12.9049C2.91004 11.8526 2.59095 10.6597 2.59154 9.43642C2.59329 5.61208 5.70537 2.5 9.52912 2.5C11.3847 2.50058 13.1265 3.22333 14.4367 4.53467C15.7463 5.846 16.4673 7.589 16.4667 9.44283C16.465 13.2678 13.3529 16.3798 9.52912 16.3798C8.36829 16.3793 7.22437 16.0882 6.21112 15.5352L2.5332 16.5ZM6.38145 14.2793C7.35912 14.8597 8.29245 15.2073 9.52679 15.2079C12.7048 15.2079 15.2936 12.6214 15.2954 9.44167C15.2965 6.2555 12.72 3.6725 9.53145 3.67133C6.35112 3.67133 3.76404 6.25783 3.76287 9.437C3.76229 10.7349 4.14262 11.7068 4.78137 12.7235L4.19862 14.8515L6.38145 14.2793ZM13.0239 11.0919C12.9807 11.0196 12.8652 10.9764 12.6914 10.8895C12.5181 10.8026 11.6659 10.3832 11.5066 10.3254C11.348 10.2677 11.2325 10.2385 11.1164 10.4123C11.0009 10.5856 10.6684 10.9764 10.5675 11.0919C10.4665 11.2074 10.365 11.222 10.1918 11.1351C10.0185 11.0482 9.4597 10.8656 8.79762 10.2747C8.28254 9.815 7.93429 9.24742 7.83337 9.07358C7.73245 8.90033 7.82287 8.80642 7.9092 8.72008C7.98737 8.6425 8.08245 8.51767 8.16937 8.41617C8.25745 8.31583 8.28604 8.2435 8.34437 8.12742C8.40212 8.01192 8.37354 7.91042 8.32979 7.8235C8.28604 7.73717 7.93954 6.88375 7.79545 6.53667C7.65429 6.19892 7.51137 6.24442 7.4052 6.23917L7.0727 6.23333C6.9572 6.23333 6.76937 6.2765 6.6107 6.45033C6.45204 6.62417 6.00404 7.043 6.00404 7.89642C6.00404 8.74983 6.62529 9.57408 6.71162 9.68958C6.79854 9.80508 7.9337 11.5563 9.67262 12.307C10.0862 12.4855 10.4094 12.5923 10.6608 12.6722C11.0761 12.804 11.4541 12.7853 11.7528 12.741C12.0859 12.6914 12.7783 12.3216 12.923 11.9168C13.0676 11.5113 13.0676 11.1643 13.0239 11.0919Z" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_201_62">
                                        <rect width="14" height="14" fill="white" transform="translate(2.5 2.5)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <p class="font-semibold text-[12px]">Message the Seller</p>
                        </a>
                        





                        @if($product->status === 'new')
                        <div class="flex flex-col 2xl:flex-row items-center gap-3 w-full">
                            <button id="cancelOrderButton-{{ $product->id }}"
                                class="bg-red-700 flex flex-row w-full pay-button items-center justify-center px-3 py-3 gap-1 rounded-lg text-white w-full mx-auto">
                                <p class="font-semibold text-[12px]">Cancel Order</p>
                            </button>

                            <!-- Modal Background -->
                            <div id="modalBackground-{{ $product->id }}"
                                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                <!-- Modal -->
                                <div class="bg-white rounded-lg p-6 max-w-sm w-full">
                                    <p class="font-bold text-lg mb-4">Are you sure you want to cancel your order?</p>
                                    <div class="flex justify-end gap-3">
                                        <button id="noButton-{{ $product->id }}"
                                            class="bg-gray-500 text-white px-4 py-2 rounded-lg">No</button>
                                        <form id="cancelOrderForm"
                                            action="{{ route('status-cancle', ['id' => $product->id]) }}">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-700 text-white px-4 py-2 rounded-lg">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                            const cancelOrderButton = document.getElementById('cancelOrderButton-{{ $product->id }}');
                            const modalBackground = document.getElementById('modalBackground-{{ $product->id }}');
                            const noButton = document.getElementById('noButton-{{ $product->id }}');
                
                            cancelOrderButton.addEventListener('click', function(event) {
                                event.preventDefault();
                                modalBackground.classList.remove('hidden');
                            });
                
                            noButton.addEventListener('click', function() {
                                modalBackground.classList.add('hidden');
                            });
                        });
                        </script>
                        @endif



                        @if($product->status === 'shipped')
                        <a href="{{ route('status-finish', ['id' => $product->id]) }}"
                            class="bg-yellow-400  flex flex-row w-full pay-button items-center justify-center px-3 py-3 gap-1  rounded-lg text-white">







                            <p class="font-semibold text-[12px]">finished</p>
                        </a>




                        @endif


                        <button
                            class="bg-950 flex flex-row w-full pay-button items-center justify-center px-3 py-3 gap-1 rounded-lg text-white invoiceButton"
                            data-product-id="{{ $product->id }}" data-product-name="{{ $product->product->name }}"
                            data-product-size="{{ $product->size->name }}"
                            data-product-quantity="{{ $product->quantity }}"
                            data-product-price="Rp {{ number_format($product->product->price, 0, '.', '.') }}"
                            data-product-total="Rp {{ number_format($product->quantity * $product->product->price, 0, '.', '.') }}"
                            data-product-image="{{ asset('images/product/' . $product->product->images->first()->images) }}">
                            <p class="font-semibold text-[12px]">Invoice</p>
                        </button>
                    </div>
                </div>


            </div>

            @endforeach

        </div>


    </div>
</main>


<!-- Modal Structure -->
<div id="invoiceModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-6 max-w-md w-full">
        <div id="modalContent" class="modal-content">
            <!-- Product details will be inserted here -->
        </div>
        <div class="flex flex-row justify-end items-end w-full gap-3 mt-2">
            <button id="downloadPdfButton" class="bg-950 text-white text-[12px] px-4 py-2 rounded-lg mt-4">Download
                PDF</button>
            <button id="closeModalButton"
                class="bg-red-700 text-white text-[12px] px-4 py-2 rounded-lg mt-4">Close</button>
        </div>
    </div>
</div>








<script>
    document.addEventListener('DOMContentLoaded', function () {
        const invoiceButtons = document.querySelectorAll('.invoiceButton');
        const invoiceModal = document.getElementById('invoiceModal');
        const modalContent = document.getElementById('modalContent');
        const closeModalButton = document.getElementById('closeModalButton');
        const downloadPdfButton = document.getElementById('downloadPdfButton');

        let currentInvoiceData = {};

        invoiceButtons.forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');
                const productName = this.getAttribute('data-product-name');
                const productSize = this.getAttribute('data-product-size');
                const productQuantity = this.getAttribute('data-product-quantity');
                const productPrice = this.getAttribute('data-product-price');
                const productTotal = this.getAttribute('data-product-total');
                const productImage = this.getAttribute('data-product-image');

                currentInvoiceData = {
                    productId,
                    productName,
                    productSize,
                    productQuantity,
                    productPrice,
                    productTotal,
                    productImage
                };

                modalContent.innerHTML = `
                <div class="flex flex-col gap-4"> 
                    <h1 class="text-lg font-bold">Invoice</h1>
                    
                    <div class="flex flex-col">
                    <img class="w-full px-12 py-4 h-fit border border-100 rounded-xl" src="${productImage}" alt="${productName}" class="w-full h-auto mb-4">
                    <div class="flex flex-col gap-3">
                         <h1 class="text-sm text-950 font-semibold mt-4">Order Details</h1>
                    <div class="flex flex-col gap-1">
                    <div class="flex flex-row justify-between">
                    <p class="text-[12px] text-950 font-normal">Product ID: </p>
                    <p class="text-[12px] text-950 font-normal">${productId}</p>    
                    </div>
                    <div class="flex flex-row justify-between">
                    <p class="text-[12px] text-950 font-normal">Product Name: </p>
                    <p class="text-[12px] text-950 font-normal">${productName}</p>
                     </div>
                    <div class="flex flex-row justify-between">
                    <p class="text-[12px] text-950 font-normal">Size: </p>
                    <p class="text-[12px] text-950 font-normal">${productSize}</p>
                     </div>
                    <div class="flex flex-row justify-between">
                    <p class="text-[12px] text-950 font-normal">Quantity: </p>
                    <p class="text-[12px] text-950 font-normal">${productQuantity}</p>
                     </div>
                    <div class="flex flex-row justify-between">
                    <p class="text-[12px] text-950 font-normal">Price: </p>
                    <p class="text-[12px] text-950 font-normal">${productPrice}</p>
                     </div>
                   
                    <div class="flex flex-row justify-between mt-2">
                     <h1 class="text-[12px] font-bold text-950">Total: </h1>
                     <h1 class="text-[12px] font-bold text-950">${productTotal}</h1>
                     </div>
                   </div>   
                    </div>   
                    </div>
                </div>
                `;

                invoiceModal.classList.remove('hidden');
            });
        });

        closeModalButton.addEventListener('click', function () {
            invoiceModal.classList.add('hidden');
        });

        downloadPdfButton.addEventListener('click', function () {
            html2canvas(document.querySelector('.modal-content')).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF();
                pdf.addImage(imgData, 'PNG', 10, 10, 180, 240);
                pdf.save(`invoice_${currentInvoiceData.productId}.pdf`);
            });
        });
    });
</script>


@endsection