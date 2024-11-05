@extends('layouts.application')

@section('content')
<section class="w-full min-h-screen bg-white flex flex-row justify-center items-start">
    <x-admin.sidebar />
    <main class="w-full xl:w-4/5 2xl:w-11/12 rounded-xl flex flex-col gap-6 2xl:ml-6 mt-6 mb-6">
        <x-admin.header />
        <div class="px-6 flex flex-col gap-6 w-full">

            <h1 class="font-bold text-base text-950">Orders</h1>

            <form action="{{ route('orders.filter') }}" method="POST" class="flex flex-row gap-4 items-center">
                @csrf
                @php
                    $status = request('status', 'all');
                @endphp
                <button name="status" value="all" class="rounded-full border border-100 font-medium text-[13px] px-4 py-2 {{ $status == 'all' ? 'bg-950 text-white' : 'text-950 bg-white' }}">All Orders</button>
                <button name="status" value="new" class="rounded-full border border-100 font-medium text-[13px] px-4 py-2 {{ $status == 'new' ? 'bg-950 text-white' : 'text-950 bg-white' }}">New Orders</button>
                <button name="status" value="shipped" class="rounded-full border border-100 font-medium text-[13px] px-4 py-2 {{ $status == 'shipped' ? 'bg-950 text-white' : 'text-950 bg-white' }}">Shipped Orders</button>
                <button name="status" value="cancelled" class="rounded-full border border-100 font-medium text-[13px] px-4 py-2 {{ $status == 'cancelled' ? 'bg-950 text-white' : 'text-950 bg-white' }}">Cancelled Orders</button>
                <button name="status" value="finish" class="rounded-full border border-100 font-medium text-[13px] px-4 py-2 {{ $status == 'finish' ? 'bg-950 text-white' : 'text-950 bg-white' }}">Finish Orders</button>
            </form>
            



           
            


            @if (session('success'))
            <div id="success-message"
                class="animate-slide-in-right w-full m-2 shadow-emerald-300 z-50 shadow flex text-[12px] bottom-0 right-0 xl:mr-6 xl:mb-6 fixed flex-row mx-auto justify-between items-center gap-5 max-w-sm bg-emerald-300 text-emerald-600 border border-emerald-600 rounded-md px-3 py-3">
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



            <div class="w-full flex flex-col gap-4">



                <div class="relative overflow-x-auto border border-100 sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Customers
                                </th>
                                
                                <th scope="col" class="px-6 py-3">
                                    Product name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Color
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Size
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Quantity
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>


                           

                                
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($orders as $order)
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-32 h-12 object-cover"
                                        src="{{ asset('images/product/' . $order->product->images->first()->images) }}"
                                        alt="">
                            </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                    {{ $order->user->name }}

                                </th>
                                
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $order->product->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $order->product->color->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $order->size->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->quantity }} product
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ number_format($order->product->price, 0, '.', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ number_format($order->quantity * $order->product->price, 0, '.', '.') }}
                                </td>
                                <td class="px-6 capitalize  py-4 @if($order->status === 'pending')
                                    text-yellow-500

                                    @elseif($order->status === 'process')
                                    text-blue-500
                                    @elseif($order->status === 'shipped')
                                    text-indigo-500
                                    @elseif($order->status === 'cancelled')
                                    text-red-500
                                    @elseif($order->status === 'finish')
                                    text-green-500
                                    @endif">


                                    
                                    {{ $order->status }}
                                
                                    
                                    
                                   
                                </td>


                                @if($order->status === 'new')
                                <td class="px-6 py-4">
                                    <a href="{{route('status-new', ['id' => $order->id])}}" class="bg-blue-500 text-white text-[13px] px-3 py-2 rounded-lg">Confirm</a>
                                </td>
                                @endif
                                @if($order->status === 'process')
                                <td class="px-6 py-4">
                                    <a href="{{ route('status-shipped', ['id' => $order->id]) }}" class="bg-green-500 text-white text-[13px] px-3 py-2 rounded-lg">Send</a>
                                </td>
                                @endif


                                
                            </tr>
                            @endforeach

                            



                            
                        </tbody>


                    </table>
                </div>

            </div>

        </div>
    </main>

</section>