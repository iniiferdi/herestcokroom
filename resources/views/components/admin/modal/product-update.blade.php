<div id="crud-modal_updateproduct" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 right-0 left-0 z-50 w-full h-full flex items-center justify-center">
    <div class="modal-content w-96 bg-white rounded-xl border border-gray-300">
        <div class="relative w-full max-w-6xl">
            <div class="modal-header p-4 md:p-5 border-b rounded-t flex flex-row justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Edit Product</h3>
                <button type="button" id="close-modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form id="update-product-form" action="{{ route('products.update', ['id' => 'PLACEHOLDER_ID']) }}" method="POST" class="p-4 md:p-5" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="product_id" id="edit-product-id">
                <div class="grid gap-4 mb-4 grid-cols-2 px-5">
                    <div class="col-span-2">
                        <label for="edit-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="edit-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="edit-price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="text" name="price" id="edit-price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="edit-category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="edit-category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-span-2 ">
                        <label for="edit-color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                        <select id="edit-color" name="color_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="">Select color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 w-full">
                        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</p>
                        <div class="mb-2 ">
                            <div id="image-update-preview" class=" flex  w-full flex-row flex-wrap items-center gap-2">
                                <!-- Images will be appended here -->
                            </div>
                        </div>
                    
                    
                    </div>
                    <div class="flex flex-row items-center w-full gap-5 flex-wrap justify-between"
                    id="image-container-update">
                    <label for="images-update" id="upload-label-update" class="block text-sm font-medium text-gray-900">
                        <div class="flex items-center space-x-4">
                            <div id="image-preview-update"
                                class="border border-100 rounded-md flex justify-center items-center cursor-pointer w-[150px] h-16">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 5L10 15" stroke="#242424" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M15 10L5 10" stroke="#242424" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </label>

                    <input type="file" id="images-update"
                        class="bg-gray-50 border border-gray-300 hidden text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 p-2.5"
                        multiple>
                    <input type="file" name="images[]" id="images1-update"
                        class="bg-gray-50 border border-gray-300 hidden text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 p-2.5"
                        multiple>
                    <input type="file" name="images[]" id="images2-update"
                        class="bg-gray-50 border border-gray-300 hidden text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 p-2.5"
                        multiple>
                    <input type="file" name="images[]" id="images3-update"
                        class="bg-gray-50 border border-gray-300 hidden text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 p-2.5"
                        multiple>
                </div>
                    </div>
                    <div class="col-span-2 px-6">
                        <label for="edit-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                        <textarea id="edit-description" name="description" rows="4" class="block p-2.5 w-full  text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-950 focus:border-950" placeholder="Write product description here"></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white mx-5 mb-5 inline-flex items-center mt-4 bg-950 hover:bg-900 focus:ring-4 focus:outline-none focus:ring-950 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Update Product
                </button>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageInput = document.getElementById('images-update');
        const imageContainer = document.getElementById('image-container-update');
        const uploadLabel = document.getElementById('upload-label-update');
        const inputFields = ['images1-update', 'images2-update', 'images3-update'].map(id => document.getElementById(id));
        let imageCount = 0;

        imageInput.addEventListener('change', function () {
            const files = Array.from(imageInput.files);
            if (imageCount + files.length > 3) {
                alert('You can only upload up to 3 images.');
                return;
            }

            files.forEach((file, index) => {
                if (imageCount >= 3) {
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('w-[150px]', 'p-3', 'h-16', 'object-cover', 'border', 'border-100', 'rounded-md');
                    imageContainer.insertBefore(img, uploadLabel);

                    // Add file to one of the hidden input fields
                    const dt = new DataTransfer();
                    dt.items.add(file);
                    inputFields[imageCount].files = dt.files;

                    imageCount++;
                    if (imageCount >= 3) {
                        uploadLabel.classList.add('hidden');
                    }
                }
                reader.readAsDataURL(file);
            });
        });
    });
</script>





