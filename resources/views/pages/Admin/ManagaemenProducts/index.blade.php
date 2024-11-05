@extends('layouts.application')

@section('content')
<section class="w-full min-h-screen bg-white flex flex-row justify-center items-start">
    <x-admin.sidebar />
    <main class="w-full xl:w-4/5 2xl:w-11/12 rounded-xl flex flex-col gap-6 2xl:ml-6 mt-6 mb-8">
        <x-admin.header />
        <div class="px-6 flex flex-col gap-6 w-full">

            <h1 class="font-bold text-base text-950">Managemen Products</h1>

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

            <div class="flex w-full flex-col items-start gap-6">
                <div class="w-full flex flex-col gap-4">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="font-bold text-sm text-950">Categories</h1>
                        <div id="btn_modal_category"
                            class="border border-100 rounded-full flex justify-center items-center px-4 py-2 bg-950 cursor-pointer">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 5L10 15" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M15 10L5 10" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-row gap-3 items-center flex-wrap">
                        @foreach ($categories as $category)
                        <div
                            class="border border-100 rounded-full flex flex-row gap-2 justify-center items-center px-4 py-2">
                            <p class="font-medium text-[13px] text-950">{{ $category->name }}</p>
                            <a href="{{ route('destroy-category', ['id' => $category->id]) }}">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 3L3 10" stroke="#242424" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M3 3L10 10" stroke="#242424" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        @endforeach
                        <x-admin.modal.category-crud />
                    </div>
                </div>

                <div class="w-full flex flex-col gap-4">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="font-bold text-sm text-950">Sizes</h1>
                        <div id="btn_modal_size"
                            class="border border-100 rounded-full flex justify-center items-center px-4 py-2 bg-950 cursor-pointer">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 5L10 15" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M15 10L5 10" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-row gap-3 items-center flex-wrap">
                        @foreach ($sizes as $size)
                        <div
                            class="border border-100 rounded-full flex flex-row gap-2 justify-center items-center px-4 py-2">
                            <p class="font-medium text-[13px] text-950">{{ $size->name }}</p>
                            <a href="{{ route('destroy-size', ['id' => $size->id]) }}">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 3L3 10" stroke="#242424" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M3 3L10 10" stroke="#242424" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        @endforeach
                        <x-admin.modal.size-crud />
                    </div>
                </div>

                <div class="w-full flex flex-col gap-4">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="font-bold text-sm text-950">Colors</h1>
                        <div id="btn_modal_color"
                            class="border border-100 rounded-full flex justify-center items-center px-4 py-2 bg-950 cursor-pointer">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 5L10 15" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M15 10L5 10" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-row gap-3 items-center flex-wrap">
                        @foreach ($colors as $color)
                        <div
                            class="border border-100 rounded-full flex flex-row gap-2 justify-center items-center px-4 py-2">
                            <div class="w-4 h-4 rounded-md border border-100"
                                style="background-color: {{ $color->hex }};"></div>
                            <p class="font-medium text-[13px] text-950">{{ $color->name }}</p>
                            <a href="{{ route('destroy-color', ['id' => $color->id]) }}">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 3L3 10" stroke="#242424" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M3 3L10 10" stroke="#242424" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        @endforeach
                        <x-admin.modal.color-crud />
                    </div>
                </div>

                <div class="w-full flex flex-col gap-4">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="font-bold text-sm text-950">Products</h1>
                        <div id="btn_modal_product"
                            class="border border-100 rounded-full flex justify-center items-center px-4 py-2 bg-950 cursor-pointer">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 5L10 15" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M15 10L5 10" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>


                    <div class="relative overflow-x-auto border border-100 sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Product Image
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
                                            Category
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
                                            Price
                                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg></a>
                                        </div>
                                    </th>


                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)


                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                        @if($product->images->isNotEmpty())
                                        <img class="w-32 h-12 object-cover"
                                            src="{{ asset('images/product/' . $product->images->first()->images) }}"
                                            alt="">
                                        @else
                                        <p>No image available</p>
                                        @endif

                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $product->color->name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $product->category->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Rp {{ $product->price }}
                                    </td>



                                    <td class="px-6 py-4 text-right flex flex-row items-center gap-2">
                                        <div id="btn_modal_productupdate" data-id="{{ $product->id }}"
                                            class="font-medium cursor-pointer text-blue-600 dark:text-blue-500 hover:underline">
                                            Edit</div>
                                        <span class="text-100">|</span>
                                        <a href="{{ route('destroy-product', ['id' => $product->id]) }}"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                                    </td>
                                </tr>
                                @endforeach


                                <x-admin.modal.product-crud />
                                <x-admin.modal.product-update />



                            </tbody>


                        </table>
                    </div>

                </div>



                <div class="w-full flex flex-col gap-4">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="font-bold text-sm text-950">Products Stock</h1>
                    </div>



                    <div class="flex flex-col xl:flex-row w-full flex-wrap ">
                        @foreach ($products as $product)
                        <div
                            class="w-full 2xl:w-[482px] xl:w-[486px] flex-wrap h-96 mx-2 my-3 p-6 rounded-xl border border-100 flex flex-col gap-3 ">
                            <div
                                class="flex flex-col xl:flex-row justify-between items-start xl:items-center border-b border-100 pb-3">
                                <div class="flex flex-col">
                                    <h1 class="text-sm text-300 font-normal">{{ $product->name }}</h1>
                                    <h1 class="text-base text-950 font-semibold">Vans</h1>
                                </div>
                                @if ($product->images->isNotEmpty())
                                <img class="w-56 object-contain"
                                    src="{{ asset('images/product/' . $product->images->first()->images) }}"
                                    alt="{{ $product->name }}">
                                @endif
                            </div>

                            <div class="flex flex-row justify-between w-full">
                                <div class="w-1/3 flex flex-col items-center border-r border-100">
                                    <p class="text-950 text-[12px] font-semibold">Size</p>
                                    @foreach ($productsStock[$product->id] as $stock)
                                    <p class="text-400 text-[12px] font-medium">{{ optional($stock->size)->name ?? 'N/A'
                                        }}</p>
                                    @endforeach
                                </div>
                                <div class="w-1/3 flex flex-col items-center">
                                    <p class="text-950 text-[12px] font-semibold">Stock</p>
                                    @foreach ($productsStock[$product->id] as $stock)
                                    <p
                                        class="text-{{ $stock->stock <= 0 ? 'red-500' : '400' }} text-[12px] font-medium">
                                        {{ $stock->stock }}</p>
                                    @endforeach
                                </div>
                                <div class="w-1/3 flex flex-col items-center">
                                    <p class="text-950 text-[12px] font-semibold">Action</p>
                                    @foreach ($productsStock[$product->id] as $stock)
                                    <div class="flex flex-row items-center gap-2">
                                        <button id="btn_modal_stock_{{ $stock->id }}_upgrade"
                                            class="text-blue-500 text-[12px] font-semibold">Stock</button>
                                        <x-admin.modal.stock-crud-upgrade :stock="$stock" />
                                        <a href="{{ route('destroy-stock', ['id' => $stock->id]) }}"
                                            class="text-red-500 text-[12px] font-semibold">Delete</a>
                                    </div>


                                    @endforeach
                                </div>
                            </div>

                            <button id="btn_modal_stock_{{ $product->id }}"
                                class="bg-950 text-white text-[13px] py-2 rounded-lg mt-2 font-medium">Add</button>
                        </div>

                        <div class="text-transparent">
                            <x-admin.modal.stock-crud :product="$product" />
                        </div>
                        @endforeach
                    </div>





                </div>




            </div>



        </div>
        </div>
    </main>
</section>

<script>
    function setupModalHandlers(modalId, btnId, closeModalId = null) {
        const modal = document.getElementById(modalId);
        const btn = document.getElementById(btnId);
        const closeModal = closeModalId ? document.getElementById(closeModalId) : modal.querySelector('#close-modal');

        if (modal && btn && closeModal) {
            btn.onclick = function() {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('modal-open');
            }

            closeModal.onclick = function() {
                modal.classList.add('hidden');
                document.body.classList.remove('modal-open');
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.classList.add('hidden');
                    document.body.classList.remove('modal-open');
                }
            }
        } else {
            console.error(`Element(s) not found: modalId=${modalId}, btnId=${btnId}, closeModalId=${closeModalId}`);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {

        @foreach ($products as $product)
    @foreach ($productsStock[$product->id] as $stock)
       
            setupModalHandlers('crud-modal_stock_{{ $stock->id }}_upgrade', 'btn_modal_stock_{{ $stock->id }}_upgrade', 'close-modal_{{ $stock->id }}_upgrade');
      
    @endforeach
@endforeach

        @foreach ($products as $product)
           setupModalHandlers('crud-modal_stock_{{ $product->id }}', 'btn_modal_stock_{{ $product->id }}', 'close-modal_{{ $product->id }}');
        @endforeach

        setupModalHandlers('crud-modal_category', 'btn_modal_category');
        setupModalHandlers('crud-modal_size', 'btn_modal_size');
        setupModalHandlers('crud-modal_color', 'btn_modal_color');
        setupModalHandlers('crud-modal_product', 'btn_modal_product');
        setupModalHandlers('crud-modal_updateproduct', 'btn_modal_productupdate');
    });
</script>








<script>
    const btnMenuDropdown = document.getElementById('btn_menu_dropdown');
  const sideMenu = document.getElementById('sidemenu');
  const btnCLose = document.getElementById('btn_close');
  
  
  btnMenuDropdown.addEventListener('click', () => {
  
      sideMenu.classList.toggle('hidden');
  });
  btnCLose.addEventListener('click', () => {
  
      sideMenu.classList.toggle('hidden');
  });
  
  // Tambahkan event listener untuk klik di luar sidemenu untuk menyembunyikannya
  document.addEventListener('click', (event) => {
      const isClickInside = sideMenu.contains(event.target);
      if (!isClickInside && !event.target.matches('#btn_menu_dropdown')) {
          sideMenu.classList.add('hidden');
      }
  });
</script>

<script>
    document.querySelectorAll('#btn_modal_productupdate').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const productId = this.getAttribute('data-id');

        // Fetch product data from server
        fetch(`/admin/managemen-products/products-show/${productId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Populate the form with product data
                document.getElementById('edit-product-id').value = data.id;
                document.getElementById('edit-name').value = data.name;
                document.getElementById('edit-price').value = data.price;
                document.getElementById('edit-description').value = data.description;

                // Display images
                const imageContainer = document.getElementById('image-update-preview');
                imageContainer.innerHTML = ''; // Clear existing images
                data.images.forEach(imageUrl => {
                    const imgElement = document.createElement('img');
                    imgElement.src = `/images/product/${imageUrl}`;
                    imgElement.alt = 'Product Image';
                    imgElement.classList.add( 'h-[60px]', 'object-cover', 'w-[102px]' ,'p-2', 'border', 'border-100', 'rounded-md' );
                    imageContainer.appendChild(imgElement);
                });

                // Update the select options for category
                let categorySelect = document.getElementById('edit-category');
                let categoryOption = categorySelect.querySelector(`option[value="${data.category_id}"]`);
                if (!categoryOption) {
                    categoryOption = new Option(data.category_name, data.category_id, true, true);
                    categorySelect.add(categoryOption);
                } else {
                    categoryOption.selected = true;
                }

                // Update the select options for color
                let colorSelect = document.getElementById('edit-color');
                let colorOption = colorSelect.querySelector(`option[value="${data.color_id}"]`);
                if (!colorOption) {
                    colorOption = new Option(data.color_name, data.color_id, true, true);
                    colorSelect.add(colorOption);
                } else {
                    colorOption.selected = true;
                }

                // Set the action attribute of the form
                let updateForm = document.getElementById('update-product-form');
                updateForm.action = updateForm.action.replace('PLACEHOLDER_ID', data.id);

                // Show the modal
                document.getElementById('crud-modal_updateproduct').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error fetching product data:', error);
                alert('Error fetching product data. Please try again.');
            });
    });
});

</script>
@endsection