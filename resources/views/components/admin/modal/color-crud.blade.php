<div id="crud-modal_color" tabindex="-1" aria-hidden="true" class="hidden fixed  top-0 right-0 left-0 z-50 w-full h-full">
    <div class="modal-content w-96 bg-white">
        <div class="relative border border-100 rounded-xl w-full max-w-6xl">
      
            <div class="modal-header p-4 md:p-5 border-b rounded-t flex flex-row justify-between">
                <h3 class="text-lg font-semibold text-gray-900">
                    Create New Color
                </h3>
                <button type="button" id="close-modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " id="close-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form action="{{ route('store-color') }}" method="POST" class="p-4 md:p-5 max-w-6xl w-full">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 ">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-950 focus:border-950 block w-full p-2.5" placeholder="Type color name" required>
                    </div>
                    <div class="col-span-2 ">
                        <label for="hex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hex Code</label>
                        <input type="text" name="hex" id="hex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-950 focus:border-950 block w-full p-2.5" placeholder="#000000" pattern="#[a-fA-F0-9]{6}" required>
                    </div>
                    <div class="col-span-2">
                        <label for="color-picker" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pick a Color</label>
                        <input type="color" id="color-picker" class="bg-gray-50 border border-100 text-gray-900 text-sm rounded-lg focus:ring-950 focus:border-950 block w-full h-10 p-2.5 cursor-pointer" style="appearance: none; -webkit-appearance: none; -moz-appearance: none;">
                    </div>
                    
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-950 hover:bg-900 focus:ring-4 focus:outline-none focus:ring-950 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Add new color
                </button>
            </form>
            
            <script>
                document.getElementById('color-picker').addEventListener('input', function() {
                    document.getElementById('hex').value = this.value;
                });
            </script>
            
        </div>
    </div>
</div>