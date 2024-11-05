@extends('layouts.application')

@section('content')
<section class="w-full min-h-screen bg-white flex flex-row justify-center items-start">
    <x-admin.sidebar />
    <main class="w-full xl:w-4/5 2xl:w-11/12 rounded-xl flex flex-col gap-6 2xl:ml-6 mt-6 mb-8">
        <x-admin.header />
        <div class="px-6 flex flex-row justify-between items-center gap-6 w-full">

            <h1 class="font-bold text-base text-950">Reports</h1>

            


           

        </div>

        <div class="flex w-full flex-col items-start gap-6  px-6">

            <div class="w-full flex flex-col gap-4">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-bold text-sm text-950">Order New</h1>


                    <button class="bg-950 text-[13px] text-white rounded-lg px-4 py-2">
                        <a target="_blink" href="{{ route('pdf.order-new.download') }}" class="text-white">Download PDF</a>
                    </button>
                   
                </div>


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
                                    Status
                                </th>
                               


                           

                                
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($Ordernews as $Ordershipped)
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-32 h-12 object-cover"
                                        src="{{ asset('images/product/' . $Ordershipped->product->images->first()->images) }}"
                                        alt="">
                            </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                         
                                    {{ $Ordershipped->user->name }}
                                </th>
                                
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $Ordershipped->product->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $Ordershipped->product->color->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $Ordershipped->size->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $Ordershipped->quantity }}
                                </td>
                                <td class="px-6 capitalize  py-4 ">


                                    
                                    {{ $Ordershipped->status }}
                                
                                    
                                    
                                   
                                </td>


                                


                                
                            </tr>
                            @endforeach
                       
                            
             

                            



                            
                        </tbody>


                    </table>
                </div>

            </div>


            <div class="w-full flex flex-col gap-4">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-bold text-sm text-950">Order Process</h1>
                    <button class="bg-950 text-[13px] text-white rounded-lg px-4 py-2">
                        <a target="_blink" href="{{ route('pdf.order-process.download') }}" class="text-white">Download PDF</a>
                    </button>
                </div>


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
                                    Status
                                </th>
                               


                           

                                
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($Orderprocess as $Ordershipped)
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-32 h-12 object-cover"
                                        src="{{ asset('images/product/' . $Ordershipped->product->images->first()->images) }}"
                                        alt="">
                            </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                         
                                    {{ $Ordershipped->user->name }}
                                </th>
                                
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $Ordershipped->product->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $Ordershipped->product->color->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $Ordershipped->size->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $Ordershipped->quantity }}
                                </td>
                                <td class="px-6 capitalize  py-4 ">


                                    
                                    {{ $Ordershipped->status }}
                                
                                    
                                    
                                   
                                </td>


                                


                                
                            </tr>
                            @endforeach
                       
                            
             

                            



                            
                        </tbody>


                    </table>
                </div>

            </div>


            <div class="w-full flex flex-col gap-4">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-bold text-sm text-950">Order Shippeds</h1>

                    <button class="bg-950 text-[13px] text-white rounded-lg px-4 py-2">
                        <a target="_blink" href="{{ route('pdf.order-shippeds.download') }}" class="text-white">Download PDF</a>
                    </button>
                   
                </div>


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
                                    Status
                                </th>
                               


                           

                                
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($Ordershippeds as $Ordershipped)
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-32 h-12 object-cover"
                                        src="{{ asset('images/product/' . $Ordershipped->product->images->first()->images) }}"
                                        alt="">
                            </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                         
                                    {{ $Ordershipped->user->name }}
                                </th>
                                
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $Ordershipped->product->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $Ordershipped->product->color->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $Ordershipped->size->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $Ordershipped->quantity }}
                                </td>
                                <td class="px-6 capitalize  py-4 ">


                                    
                                    {{ $Ordershipped->status }}
                                
                                    
                                    
                                   
                                </td>


                                


                                
                            </tr>
                            @endforeach
                       
                            
             

                            



                            
                        </tbody>


                    </table>
                </div>

            </div>


            <div class="w-full flex flex-col gap-4">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-bold text-sm text-950">Order Finish</h1>
                    <button class="bg-950 text-[13px] text-white rounded-lg px-4 py-2">
                        <a target="_blink" href="{{ route('pdf.order-finish.download') }}" class="text-white">Download PDF</a>
                    </button>
                </div>
            
                <div class="relative overflow-x-auto border border-100 sm:rounded-lg">
                    <table id="order-table" class="w-full text-sm text-left rtl:text-right text-gray-500 ">            
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
                                    Status
                                </th>
                               


                           

                                
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($Orderfinishs as $Orderfinish)
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-32 h-12 object-cover"
                                        src="{{ asset('images/product/' . $Orderfinish->product->images->first()->images) }}"
                                        alt="">
                            </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                         
                                    {{ $Orderfinish->user->name }}
                                </th>
                                
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $Orderfinish->product->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $Orderfinish->product->color->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $Orderfinish->size->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $Orderfinish->quantity }}
                                </td>
                                <td class="px-6 capitalize  py-4 ">


                                    
                                    {{ $Orderfinish->status }}
                                
                                    
                                    
                                   
                                </td>


                                


                                
                            </tr>
                            @endforeach
                       
                            
             

                            



                            
                        </tbody>


                    </table>
                </div>

                


                



            </div>
            <div class="w-full flex flex-col gap-4">
                <div class="flex flex-row justify-between items-center">
                    <h1 class="font-bold text-sm text-950">Order Cancelled</h1>

                    <button class="bg-950 text-[13px] text-white rounded-lg px-4 py-2">
                        <a target="_blink" href="{{ route('pdf.order-cancelled.download') }}" class="text-white">Download PDF</a>
                    </button>
                   
                </div>


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
                                    Status
                                </th>
                               


                           

                                
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($Ordercancelleds as $Ordercancelled)
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-32 h-12 object-cover"
                                        src="{{ asset('images/product/' . $Ordercancelled->product->images->first()->images) }}"
                                        alt="">
                            </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                         
                                    {{ $Ordercancelled->user->name }}
                                </th>
                                
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $Ordercancelled->product->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $Ordercancelled->product->color->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $Ordercancelled->size->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $Ordercancelled->quantity }}
                                </td>
                                <td class="px-6 capitalize  py-4 ">


                                    
                                    {{ $Ordercancelled->status }}
                                
                                    
                                    
                                   
                                </td>


                                


                                
                            </tr>
                            @endforeach
                       
                            
             

                            



                            
                        </tbody>


                    </table>
                </div>

            </div>
           
            
            
        </div>

    </main>

</section>