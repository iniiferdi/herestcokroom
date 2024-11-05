<div id="crud-modal_stock_{{ $stock->id }}_upgrade" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 right-0 left-0 z-50 w-full h-full flex items-center justify-center">
    <div class="modal-content w-96 bg-white rounded-xl border border-gray-300">
        <div class="relative w-full max-w-6xl">
            <div class="modal-header p-4 md:p-5 border-b rounded-t flex flex-row justify-between">
                <h3 class="text-lg font-semibold text-gray-900">
                    Update Stock for {{ $stock->size->name ?? '-' }}
                </h3>
                <button type="button" id="close-modal_{{ $stock->id }}_upgrade" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center close-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form action="{{ route('update-stock', ['id' => $stock->id]) }}" class="p-4 md:p-5" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $stock->product_id }}">
                <div class="grid gap-4 mb-4 grid-cols-2 px-5">
                    <div class="col-span-2">
                        <label for="stock_4" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
                        <input type="number" name="stock" id="stock_4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="0" required>
                    </div>
                </div>
                <button type="submit" class="text-white mx-5 mb-5 inline-flex items-center bg-950 hover:bg-900 focus:ring-4 focus:outline-none focus:ring-950 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update Stock
                </button>
            </form>
        </div>
    </div>
</div>