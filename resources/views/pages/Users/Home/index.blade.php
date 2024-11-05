@extends('layouts.application')

@section('content')
<main class="w-full flex flex-col min-h-screen ">

    <x-front.header />


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



    <section class="w-full flex flex-row items-start 2xl:gap-6 xl:gap-12">
        <div class="xl:w-1/5 2xl:w-1/6  xl:block hidden">
            <aside
                class="fixed hidden w-full xl:flex flex-col  gap-6 xl:w-1/5 2xl:w-1/6 py-5 border-r-[1.5px] border-100 shadow-100 px-6 h-screen">
                <form id="filterForm" method="GET" class="flex flex-col gap-6">
                    {{-- Filter Category --}}
                    <div class="flex flex-col gap-3 cursor-pointer">
                        <div id="btn-click" class="flex flex-row items-center w-full justify-between">
                            <h2 class="text-sm font-semibold text-950">Categories</h2>
                            <svg id="arrow-icon" width="15" height="15" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="transition-transform rotate-0">
                                <path d="M3.75 9.375L7.5 5.625L11.25 9.375" stroke="#242424" stroke-width="1.5"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                        <div id="elemen_input"
                            class="flex flex-col gap-3 overflow-hidden transition-max-height max-h-96">
                            @foreach ($categorys as $category)
                            <div class="flex flex-row items-center gap-2">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                    class="w-3 h-3 appearance-none border border-100 rounded checked:border-2 checked:border-950"
                                    onchange="this.form.submit()">
                                <label class="text-[13px] font-medium text-600">{{ $category->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- End Filter Category --}}

                    {{-- Filter Size --}}
                    <div class="flex flex-col gap-3 cursor-pointer">
                        <div class="flex flex-row items-center w-full justify-between">
                            <h2 class="text-sm font-semibold text-950">Size</h2>
                        </div>
                        <div class="flex flex-row flex-wrap gap-3 w-full">
                            @foreach ($sizes as $sizeItem)
                            <div id="size_container_{{ $sizeItem->id }}"
                                class="flex flex-row justify-center items-center gap-2 border border-100 rounded w-7 xl:px-4 2xl:px-[21px] py-2">
                                <input type="checkbox" name="sizes[]" value="{{ $sizeItem->id }}"
                                    class="w-3 h-3 hidden appearance-none border border-100 rounded checked:border-2 checked:border-950"
                                    onchange="this.form.submit()" id="size_check_box_{{ $sizeItem->id }}">
                                <label class="text-[13px] font-medium text-950 cursor-pointer"
                                    for="size_check_box_{{ $sizeItem->id }}">{{ $sizeItem->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- End Filter Size --}}
                </form>
            </aside>

        </div>

        <div class="w-full xl:w-11/12 py-6 2xl:ml-10 2xl:mr-6 xl:mx-6 min-h-screen flex flex-col gap-4">
            <div class="flex flex-row justify-between w-full items-center px-6 xl:p-0">
                <h1 class="text-950 font-semibold text-lg">Products</h1>
                {{-- Filter Sort by Price --}}
                <div id="btn_clik_priceSort" class="flex flex-col gap-1 items-center cursor-pointer relative">
                    <div class="flex flex-row gap-2 items-center">
                        <p class="font-semibold text-[13px] text-950">Sort by Price</p>
                        <svg id="svg_arrow" width="15" height="16" viewBox="0 0 15 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="transition-transform duration-300">
                            <path d="M11.25 6.125L7.5 9.875L3.75 6.125" stroke="#242424" stroke-width="1.5"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                    <div id="ElPrice"
                        class="absolute border border-100 rounded-md w-[200px] right-[2px] hidden xl:flex flex-col gap-2 top-7 backdrop-blur-md transition-all duration-300 transform scale-95 opacity-0">
                        <form id="priceSortForm" action="{{ route('home-flters') }}" method="POST">
                            @csrf
                            <p class="font-semibold px-3 pt-2 text-[13px] text-950">Price</p>
                            <div class="flex flex-row items-center gap-2 border-b border-100 py-1 px-3">
                                <input type="radio" name="price_range" value="500.000-1000000"
                                    class="w-3 h-3 appearance-none border border-100 rounded"
                                    onchange="document.getElementById('priceSortForm').submit()">
                                <label class="text-[13px] font-medium text-600">500.000 - 1.000.000</label>
                            </div>
                            <div class="flex flex-row items-center gap-2 border-b border-100 py-1 px-3">
                                <input type="radio" name="price_range" value="1000000-5000000"
                                    class="w-3 h-3 appearance-none border border-100 rounded"
                                    onchange="document.getElementById('priceSortForm').submit()">
                                <label class="text-[13px] font-medium text-600">1.000.000 - 5.000.000</label>
                            </div>
                            <div class="flex flex-row items-center gap-2 border-b border-100 py-1 px-3">
                                <input type="radio" name="price_range" value="5000000-8000000"
                                    class="w-3 h-3 appearance-none border border-100 rounded"
                                    onchange="document.getElementById('priceSortForm').submit()">
                                <label class="text-[13px] font-medium text-600">5.000.000 - 8.000.000</label>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- End Filter Sort by Price --}}
            </div>


            {{-- Product List --}}
            <div class="flex flex-row gap-6 items-center flex-wrap w-full xl:p-0 px-6">
                @foreach ($products as $product)
                <div
                    class="2xl:w-[365px] xl:h-640 2xl:h-80 rounded-xl xl:w-[325px] w-full md:w-[245px] border border-100 flex flex-col gap-3 py-6">
                    <div class="flex flex-row gap-3 w-full justify-start items-center">
                        <div id="bar" class="w-[4px] bg-950 h-9 rounded-full"></div>
                        <div class="flex flex-col">
                            <h1 class="text-sm text-300 font-normal">{{ $product->name }}</h1>
                            <h1 class="text-base text-950 font-semibold">Vans</h1>
                        </div>
                    </div>

                    {{-- Thumbnail --}}
                    <div id="productCard">
                        <img id="mainThumbnail-{{ $product->id }}"
                            class="h-36 max-w-full cursor-pointer p-3 object-bottom rounded-lg w-full"
                            src="{{ asset('images/product/' . $product->images->first()->images) }}" alt="">
                    </div>
                    {{-- End Thumbnail --}}

                    <div class="w-full px-3 flex flex-row justify-between items-center">
                        <div class="flex flex-col">
                            <h2 class="text-[12px] text-300 font-normal">Price</h2>
                            <h2 class="text-sm text-950 font-semibold">Rp {{ number_format($product->price, 0, ',', '.')
                                }}</h2>
                        </div>

                        {{-- Image --}}
                        <div class="flex flex-row gap-3 items-center rounded">
                            @foreach ($product->images->slice(-2) as $image)
                            <div
                                class="w-12 cursor-pointer border border-100 h-10 items-center justify-center flex p-1 rounded-md">
                                <img class="w-full object-cover clickableImage"
                                    data-main-thumbnail="mainThumbnail-{{ $product->id }}"
                                    src="{{ asset('images/product/' . $image->images) }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        {{-- End Image --}}
                    </div>
                </div>
                @endforeach
            </div>
            {{-- End Product List --}}
        </div>




        <!-- Sidebar -->
        <form method="POST" action="{{ route('add-cart') }}" id="sidebar"
            class="fixed justify-between items-center w-full flex-col gap-6 xl:w-[355px] 2xl:w-[393px] py-5 border-l-[1.5px] bg-white border-100 shadow-100 px-6 min-h-screen right-0 hidden transform translate-x-full transition-transform duration-300 ease-in-out">
            @csrf
            <div class="flex flex-col gap-5">
                <!-- slidebar container -->
                <div class="w-full relative overflow-hidden group">
                    <!-- Images Container -->
                    <div id="imageSlider" class="flex transition-transform duration-300 ease-in-out">
                        <!-- Images will be populated by JavaScript -->
                    </div>
                    <!-- Prev and Next Buttons -->
                    <button type="button" id="prevButton"
                        class="absolute left-0 top-1/2 transform -translate-y-1/2 rounded-full bg-white text-white p-2 hidden group-hover:block">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.375 11.25L5.625 7.5L9.375 3.75" stroke="#242424" stroke-width="1.5"
                                stroke-linecap="round" />
                        </svg>
                    </button>
                    <button type="button" id="nextButton"
                        class="absolute right-0 top-1/2 transform -translate-y-1/2 rounded-full bg-white text-white p-2 hidden group-hover:block">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.625 3.75L9.375 7.5L5.625 11.25" stroke="#242424" stroke-width="1.5"
                                stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
                <!-- Image Indicators -->
                <div class="flex justify-center mt-1 xl:m-0">
                    <div
                        class="indicator w-[6px] h-[6px] bg-gray-100 rounded-full mx-1 cursor-pointer transition-all duration-300">
                    </div>
                    <div
                        class="indicator w-[6px] h-[6px] bg-gray-100 rounded-full mx-1 cursor-pointer transition-all duration-300">
                    </div>
                    <div
                        class="indicator w-[6px] h-[6px] bg-gray-100 rounded-full mx-1 cursor-pointer transition-all duration-300">
                    </div>
                </div>
                <!-- end slidebar container -->

                <div class="flex flex-col w-full items-center mt-4 xl:m-0">
                    <h1 class="text-lg text-950 font-semibold">Vans</h1>
                    <h1 class="text-lg text-950 font-semibold hidden product-description">Product Name</h1>
                    <h1 class="text-[12px] text-300 font-normal product-name">Product Description</h1>
                </div>

                <div class="flex flex-col gap-3 mt-4 xl:m-0" x-data="{ showSize: true, showDescription: true }">
                    <!-- btn size -->
                    <div class="flex flex-row justify-between cursor-pointer items-center w-full"
                        @click="showSize = !showSize">
                        <h1 class="font-semibold text-sm text-900">Select Size</h1>
                        <svg :class="{'transform rotate-180': !showSize}" class="transition-transform duration-300"
                            width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.75 9.375L7.5 5.625L11.25 9.375" stroke="#242424" stroke-width="1.5"
                                stroke-linecap="round" />
                        </svg>
                    </div>

                    <!-- elemen yang ditampilkan -->
                    <div x-show="showSize" x-transition class="flex flex-row flex-wrap gap-5 w-full size-options">
                        <!-- Sizes will be populated by JavaScript -->
                    </div>
                </div>

                <div class="flex flex-col gap-3 mt-3 xl:m-0" x-data="{ showDescription: true }">
                    <!-- btn des -->
                    <div class="flex flex-row justify-between cursor-pointer items-center w-full"
                        @click="showDescription = !showDescription">
                        <h1 class="font-semibold text-sm text-900">Description</h1>
                        <svg :class="{'transform rotate-180': !showDescription}"
                            class="transition-transform duration-300" width="15" height="15" viewBox="0 0 15 15"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.75 9.375L7.5 5.625L11.25 9.375" stroke="#242424" stroke-width="1.5"
                                stroke-linecap="round" />
                        </svg>
                    </div>

                    <!-- elemen yang ditampilkan -->
                    <div x-show="showDescription" x-transition
                        class="flex flex-row flex-wrap gap-5 w-full max-h-[200px] overflow-y-auto">
                        <p class="text-400 text-[12px] font-normal product-full-description">Product Full Description
                        </p>
                    </div>
                </div>

                <input type="hidden" name="product_id" id="product_id" value="">

            </div>

            <button type="submit"
                class="bg-950 flex flex-row items-center px-3 box-shadowrr py-3 w-11/12 mx-auto absolute bottom-16 right-4 rounded-lg text-white btn-add">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 8L8 7C8 4.79086 9.79086 3 12 3V3C14.2091 3 16 4.79086 16 7L16 8" stroke="white"
                        stroke-width="1.5" stroke-linecap="round" />
                    <path d="M15 14V12" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M9 14V12" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M4 12C4 10.1144 4 9.17157 4.58579 8.58579C5.17157 8 6.11438 8 8 8H16C17.8856 8 18.8284 8 19.4142 8.58579C20 9.17157 20 10.1144 20 12V13C20 16.7712 20 18.6569 18.8284 19.8284C18.8284 19.8284 18.8284 19.8284 18.8284 19.8284C17.6569 21 15.7712 21 12 21V21C8.22876 21 6.34315 21 5.17157 19.8284C5.17157 19.8284 5.17157 19.8284 5.17157 19.8284C4 18.6569 4 16.7712 4 13V12Z"
                        stroke="white" stroke-width="1.5" />
                </svg>
                <p class="font-semibold text-[12px] mx-auto product-price btn-add">Rp 800.000 - Add to Cart</p>
            </button>
        </form>







    </section>







</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoryButton = document.getElementById('btn-click'); // Perubahan disini, perbaiki nama ID
        const priceSortButton = document.getElementById('btn_clik_priceSort');

        categoryButton.addEventListener('click', function () {
            const categoryInput = document.getElementById('elemen_input');
            const arrowIcon = document.getElementById('arrow-icon');
            categoryInput.classList.toggle('max-h-96');
            categoryInput.classList.toggle('max-h-0');
            arrowIcon.classList.toggle('rotate-0');
            arrowIcon.classList.toggle('rotate-180');
        });

        priceSortButton.addEventListener('click', function () { // Perubahan disini, sesuaikan nama variabel dengan ID yang benar
            const priceDropdown = document.getElementById('ElPrice');
            const svgArrow = document.getElementById('svg_arrow');
            if (priceDropdown.classList.contains('hidden')) {
                priceDropdown.classList.remove('hidden');
                setTimeout(() => {
                    priceDropdown.classList.remove('scale-95');
                    priceDropdown.classList.remove('opacity-0');
                }, 10);
                svgArrow.classList.add('rotate-180');
            } else {
                priceDropdown.classList.add('scale-95');
                priceDropdown.classList.add('opacity-0');
                setTimeout(() => {
                    priceDropdown.classList.add('hidden');
                }, 300);
                svgArrow.classList.remove('rotate-180');
            }
        });

        // Add event listeners to close the dropdown when clicking outside
        document.addEventListener('click', function (e) {
            const priceDropdown = document.getElementById('ElPrice');
            const priceSortButton = document.getElementById('btn_clik_priceSort');
            if (!priceSortButton.contains(e.target) && !priceDropdown.contains(e.target)) {
                priceDropdown.classList.add('scale-95');
                priceDropdown.classList.add('opacity-0');
                setTimeout(() => {
                    priceDropdown.classList.add('hidden');
                }, 300);
                document.getElementById('svg_arrow').classList.remove('rotate-180');
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const productCards = document.querySelectorAll('#productCard');
    const sidebar = document.getElementById('sidebar');
    const productIdInput = document.getElementById('product_id');

    productCards.forEach(card => {
        card.addEventListener('click', function () {
            const productId = this.querySelector('img').id.split('-')[1]; // Extract product ID from the image ID
            productIdInput.value = productId; // Set the value of the hidden input

            fetch(`/product/${productId}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Log data to check if sizes are received
                    // Populate sidebar with product details
                    document.querySelector('#sidebar .product-name').textContent = data.name;
                    document.querySelector('#sidebar .product-description').textContent = data.description;
                    document.querySelector('#sidebar .product-full-description').textContent = data.description;
                    const productPriceElement = document.querySelector('#sidebar .product-price');

                    const price = data.price;

                    const formattedPrice = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0
}).format(price);


                    productPriceElement.textContent = formattedPrice;

                    // Populate image slider
                    const imageSlider = document.getElementById('imageSlider');
                    imageSlider.innerHTML = ''; // Clear existing images
                    data.images.forEach(image => {
                        const img = document.createElement('img');
                        img.src = `/images/product/${image}`;
                        img.classList.add('w-full', 'object-cover', 'rounded-lg');
                        imageSlider.appendChild(img);
                    });

                    // Populate size options
                    const sizeOptions = document.querySelector('.size-options');
                    sizeOptions.innerHTML = ''; // Clear existing sizes
                    data.sizes.forEach(size => {
                        console.log(size); // Log each size to check if the data is correct
                        const div = document.createElement('div');
                        div.classList.add('flex', 'flex-row', 'justify-center', 'items-center', 'gap-2', 'border', 'border-100', 'rounded', 'xl:w-[45px]', 'w-1/5', '2xl:w-[52px]', 'xl:h-11', '2xl:h-12', 'xl:px-4', '2xl:px-[21px]', 'py-2', 'cursor-pointer', 'size-option');
                        div.dataset.sizeId = size.id; // Store size id for easier access

                        const input = document.createElement('input');
                        input.type = 'radio';
                        input.name = 'size';
                        input.id = `check_box_${size.id}`;
                        input.value = size.id;
                        input.classList.add('hidden', 'appearance-none');
                        input.disabled = size.stock <= 0; // Disable if stock is 0 or less

                        const label = document.createElement('label');
                        label.classList.add('text-sm', 'font-medium', 'text-950', 'cursor-pointer');
                        label.htmlFor = `check_box_${size.id}`;
                        label.textContent = size.name;

                        div.appendChild(input);
                        div.appendChild(label);
                        sizeOptions.appendChild(div);

                        if (size.stock > 0) {
                            // Add event listener for changing background color
                            div.addEventListener('click', function () {
                                // Deselect all other size options
                                document.querySelectorAll('.size-option').forEach(option => {
                                    option.classList.remove('bg-950', 'text-white');
                                    option.querySelector('label').classList.remove('text-white');
                                    option.querySelector('input').checked = false;
                                });

                                // Select the clicked size option
                                input.checked = true;
                                div.classList.add('bg-950', 'text-white');
                                label.classList.add('text-white');
                            });
                        } else {
                            label.classList.add('text-gray-400'); // Change color to indicate disabled state
                        }
                    });

                    // Show the sidebar with animation
                    sidebar.classList.remove('hidden');
                    requestAnimationFrame(() => {
                        sidebar.classList.remove('translate-x-full');
                    });
                })
                .catch(error => console.error('Error fetching product data:', error));
        });
    });

    // Close sidebar when clicking outside of it
    document.addEventListener('click', function (event) {
        if (!sidebar.contains(event.target) && !event.target.closest('#productCard')) {
            sidebar.classList.add('translate-x-full');
            setTimeout(() => {
                sidebar.classList.add('hidden');
            }, 300); // Match this duration with the transition duration
        }
    });

    document.getElementById('prevButton').addEventListener('click', function () {
        const slider = document.getElementById('imageSlider');
        slider.scrollBy({ left: -slider.clientWidth, behavior: 'smooth' });
    });

    document.getElementById('nextButton').addEventListener('click', function () {
        const slider = document.getElementById('imageSlider');
        slider.scrollBy({ left: slider.clientWidth, behavior: 'smooth' });
    });
});



</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slider = document.getElementById('imageSlider');
        const images = slider.getElementsByTagName('img');
        const indicators = document.getElementsByClassName('indicator');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
        let currentIndex = 0;

        function updateSlider() {
            slider.style.transform = `translateX(-${currentIndex * 100 / images.length}%)`;
            Array.from(indicators).forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentIndex);
            });

            // Hide or show buttons based on the current index
            prevButton.style.display = currentIndex === 0 ? 'none' : 'block';
            nextButton.style.display = currentIndex === images.length - 1 ? 'none' : 'block';
        }

        prevButton.addEventListener('click', function () {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });

        nextButton.addEventListener('click', function () {
            if (currentIndex < images.length - 1) {
                currentIndex++;
                updateSlider();
            }
        });

        Array.from(indicators).forEach((indicator, index) => {
            indicator.addEventListener('click', function () {
                currentIndex = index;
                updateSlider();
            });
        });

        updateSlider();
    });
</script>



<script>
    document.querySelectorAll('.clickableImage').forEach(img => {
        img.addEventListener('click', function() {
            const mainThumbnail = document.getElementById(this.dataset.mainThumbnail);
            const tempSrc = mainThumbnail.src;
            mainThumbnail.src = this.src;
            this.src = tempSrc;
        });
    });
</script>






<script>
    document.addEventListener('DOMContentLoaded', function () {
            const elemenInput = document.getElementById('elemen_input');
            const arrowIcon = document.getElementById('arrow-icon');
            let isVisible = true;

            document.getElementById('btn-click').addEventListener('click', function () {
                if (isVisible) {
                    elemenInput.classList.remove('max-h-96');
                    elemenInput.classList.add('max-h-0');
                    arrowIcon.classList.remove('rotate-0');
                    arrowIcon.classList.add('rotate-180');
                } else {
                    elemenInput.classList.remove('max-h-0');
                    elemenInput.classList.add('max-h-96');
                    arrowIcon.classList.remove('rotate-180');
                    arrowIcon.classList.add('rotate-0');
                }
                isVisible = !isVisible;
            });
        });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const containers = document.querySelectorAll('div[id^="container_"]');
        
        containers.forEach(container => {
            const checkbox = container.querySelector('input[type="checkbox"]');
            
            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    container.classList.add('border-checked');
                } else {
                    container.classList.remove('border-checked');
                }
            });

            // Ensure the correct border on page load (if checkbox is pre-checked)
            if (checkbox.checked) {
                container.classList.add('border-checked');
            }
        });
    });
</script>
@endsection