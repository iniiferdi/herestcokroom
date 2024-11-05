@extends('layouts.application')

@section('content')
<section class="w-full min-h-screen bg-white   flex flex-row  justify-center items-start mb-8">
  <x-admin.sidebar />
  <main class=" w-full xl:w-4/5 2xl:w-11/12  rounded-xl flex flex-col gap-6 2xl:ml-6 mt-6">
    <x-admin.header />
    <div class="px-6 flex flex-col gap-6 ">
      <article class="flex flex-col gap-1">
        <p>Welcome</p>
        <h1 class="capitalize text-text lg:text-3xl text-2xl font-bold">{{ auth()->user()->name }}</h1>
        <h3 class="capitalize text-text text-sm opacity-75">{{ auth()->user()->role }}</h3>
      </article>

      <div class="flex flex-col  xl:flex-row gap-6 items-center">
        <div class="border w-full flex flex-col gap-1 border-100 rounded-xl p-6">
          <h1 class="text-sm font-medium text-950">Totals Product</h1>
          <h1 class="text-3xl font-semibold text-[#ED7755]">{{ $productTotals }}</h1>
        </div>
        <div class="border w-full flex flex-col gap-1 border-100 rounded-xl p-6">
          <h1 class="text-sm font-medium text-950">Totals Order</h1>
          <h1 class="text-3xl font-semibold text-blue-600">{{ $productOrders }}</h1>
        </div>
        <div class="border w-full flex flex-col gap-1 border-100 rounded-xl p-6">
          <h1 class="text-sm font-medium text-950">Order Finish</h1>
          <h1 class="text-3xl font-semibold text-green-600">{{ $Orderfinish }}</h1>
        </div>
        <div class="border w-full flex flex-col gap-1 border-100 rounded-xl p-6">
          <h1 class="text-sm font-medium text-950">Order Cancelled</h1>
          <h1 class="text-3xl font-semibold text-red-600">{{ $Ordercancelled }}</h1>
        </div>
      </div>



      <div class="w-full  bg-white rounded-xl border border-100 dark:bg-gray-800 p-4 md:p-6">
        <div class="flex justify-between">
          <div>
            <h5 class="leading-none text-2xl font-bold text-950 dark:text-white pb-2">Rp 200.000</h5>
            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Income</p>
          </div>
          <div
            class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
            12%
            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 10 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13V1m0 0L1 5m4-4 4 4" />
            </svg>
          </div>
        </div>
        <div id="area-chart"></div>

      </div>
      <div class="flex flex-col xl:flex-row items-start w-full gap-6">
        <div class="flex flex-col gap-4 rounded-xl border border-100 p-5 w-full xl:w-2/3">
          <h1 class="font-bold text-sm text-950 ">Best selling product</h1>

          @foreach ($topSellingProducts as $topSellingProduct)
          <div class="flex flex-row justify-between gap-12 items-center w-full rounded-md p-4 border border-100">
            
              <div class="w-1/2">
                <img class="w-64 h-fit object-cover"
                src="{{ asset('images/product/' . $topSellingProduct->product->images->first()->images) }}" alt="">
              </div>
            <div class="flex flex-col gap-3   w-1/2">
              <div class="flex flex-row justify-between items-start w-full">
                <div class="flex flex-col  justify-start items-start ">
                  <h1 class="text-sm text-300 font-normal">{{ $topSellingProduct->product->name }}</h1>
                  <h1 class="text-base text-950 font-semibold">Vans</h1>
              </div>
  
              <h1 class="text-sm text-950 font-semibold">Rp {{  number_format($topSellingProduct->product->price, 0, '.', '.') }}</h1>
              </div>
            </div>
          </div>

          @endforeach


        </div>
        <div class="flex flex-col gap-4 rounded-xl border bg-950 border-100 p-5 w-full xl:w-1/3">
          <h1 class="font-bold text-sm text-white ">Stock out</h1>

          @foreach ($stockOuts  as $stockOut)
          <div class="flex flex-row items-end justify-between w-full p-3 rounded-lg border border-600">
            <div class="flex flex-col  justify-start items-start gap-1">
              <h1 class="text-sm text-300 font-normal">{{ $stockOut->product->name }}</h1>
              <div class="flex flex-row items-center gap-3">
                <h1 class="text-sm text-white font-medium">Vans</h1>
               <span class="text-white"> |</span>
              <h1 class="text-sm text-white font-medium">Size : {{ $stockOut->size->name }}</h1>
              </div>
          </div>
          <h1 class="text-sm text-red-700 font-medium">Stock : {{ $stockOut->stock }}</h1>
          </div>
          @endforeach

         
        </div>
      </div>
    </div>




  </main>
</section>




<script>
  const options = {
  chart: {
    height: "100%",
    maxWidth: "100%",
    type: "area",
    fontFamily: "Inter, sans-serif",
    dropShadow: {
      enabled: false,
    },
    toolbar: {
      show: false,
    },
  },
  tooltip: {
    enabled: true,
    x: {
      show: false,
    },
  },
  fill: {
    type: "gradient",
    gradient: {
      opacityFrom: 0.55,
      opacityTo: 0,
      shade: "#ED7755",
      gradientToColors: ["#ED7755"],
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    width: 6,
  },
  grid: {
    show: false,
    strokeDashArray: 4,
    padding: {
      left: 2,
      right: 2,
      top: 0
    },
  },
  series: [
    {
      name: "New users",
      data: [6500, 6418, 6456, 6526, 6356, 6456],
      color: "#ED7755",
    },
  ],
  xaxis: {
    categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
}

if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
  const chart = new ApexCharts(document.getElementById("area-chart"), options);
  chart.render();
}

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
@endsection