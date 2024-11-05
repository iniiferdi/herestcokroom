<div id="crud-modal_address" tabindex="-1" aria-hidden="true" class="hidden fixed  top-0 right-0 left-0 z-50 w-full h-full">
    <div class="modal-content w-96 bg-white">
        <div class="relative border border-100 rounded-xl w-full max-w-6xl">
      
            <div class="modal-header p-4 md:p-5 border-b rounded-t flex flex-row justify-between">
                <h3 class="text-lg font-semibold text-gray-900">
                    Create New Address
                </h3>
                <button type="button" id="close-modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " id="close-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form action="{{ route('address-store') }}" method="POST" class="p-4 md:p-5 max-w-6xl w-full">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2 px-5">
                <div class="col-span-2 sm:col-span-1">
                    <div class="col-span-2 ">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-950 focus:border-950 block w-full p-2.5 " placeholder="Type name" required="">
                    </div>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <div class="col-span-2 ">
                        <label for="telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telp</label>
                        <input type="text" name="telp" id="telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-950 focus:border-950 block w-full p-2.5 " placeholder="Type telp" required="">
                    </div>
                </div>
                <div class="col-span-2">
                    <label for="address"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <textarea id="address" name="address" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-950 focus:border-950"
                        placeholder="Write address here"></textarea>
                </div>
                </div>
                <button type="submit"
                    class="text-white mx-5 mb-5 inline-flex items-center bg-950 hover:bg-900 focus:ring-4 focus:outline-none focus:ring-950 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Add new Address
                </button>

            
            </form>
        </div>
    </div>
</div>