<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Finish Table</title>
    <style>
        .w-full {
            width: 100%;
        }
        .flex {
            display: flex;
        }
        .flex-col {
            flex-direction: column;
        }
        .flex-row {
            flex-direction: row;
        }
        .gap-4 {
            gap: 1rem;
        }
        .justify-between {
            justify-content: space-between;
        }
        .items-center {
            align-items: center;
        }
        .font-bold {
            font-weight: bold;
        }
        .text-sm {
            font-size: 0.875rem;
        }
        .text-950 {
            color: #1a202c;
        }
        .relative {
            position: relative;
        }
        .overflow-x-auto {
            overflow-x: auto;
        }
        .border {
            border-width: 1px;
        }
        .border-100 {
            border-color: #edf2f7;
        }
        .sm\\:rounded-lg {
            border-radius: 0.5rem;
        }
        .text-left {
            text-align: left;
        }
        .rtl\\:text-right {
            text-align: right;
        }
        .text-gray-500 {
            color: #6b7280;
        }
        .text-xs {
            font-size: 0.75rem;
        }
        .text-gray-700 {
            color: #374151;
        }
        .uppercase {
            text-transform: uppercase;
        }
        .bg-gray-50 {
            background-color: #f9fafb;
        }
        .bg-white {
            background-color: #ffffff;
        }
        .dark\\:bg-gray-800 {
            background-color: #1f2937;
        }
        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        .py-3, .py-4 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }
        .font-medium {
            font-weight: 500;
        }
        .whitespace-nowrap {
            white-space: nowrap;
        }
        .dark\\:text-white {
            color: #ffffff;
        }
        .capitalize {
            text-transform: capitalize;
        }
        .w-32 {
            width: 8rem;
        }
        .h-12 {
            height: 3rem;
        }
        .object-cover {
            object-fit: cover;
        }
        .w-3 {
            width: 0.75rem;
        }
        .h-3 {
            height: 0.75rem;
        }
        .ms-1\\.5 {
            margin-left: 0.375rem;
        }
    </style>
</head>
<body style="font-family: inter">
    <div class="w-full flex flex-col gap-4">
        <div class="flex flex-row justify-between items-center">
            <h1 class="font-bold text-sm text-950">Order Process</h1>
        </div>

        <div class="relative overflow-x-auto border border-100 sm:rounded-lg">
            <table id="order-table" class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Product Image</th>
                        <th scope="col" class="px-6 py-3">Customers</th>
                        <th scope="col" class="px-6 py-3">Product name</th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Color
                                
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Size
                               
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Quantity
                               
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Total</th>
                    </tr>
                </thead>

              
                <tbody>
                   @foreach ($orderProcess as $orderFinishe)
                  
               
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-32 h-12 object-cover" src="{{ public_path('images/product/' . $orderFinishe->product->images->first()->images) }}" alt="Product Image">
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                            {{ $orderFinishe->user->name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $orderFinishe->product->name }}
                        </th>
                        <td class="px-6 py-4"> {{ $orderFinishe->product->color->name }}</td>
                        <td class="px-6 py-4">{{ $orderFinishe->size->name }}</td>
                        <td class="px-6 py-4">{{ $orderFinishe->quantity }} product</td>
                        <td style="text-color:blue;" class="px-6 capitalize py-4">Rp {{ number_format($orderFinishe->product->price, 0, '.', '.') }}</td>
                        <td style="text-color:red;" class="px-6 capitalize py-4">Rp {{ number_format($orderFinishe->quantity * $orderFinishe->product->price, 0, '.', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
