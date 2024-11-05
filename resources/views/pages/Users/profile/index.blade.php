@extends('layouts.application')

@section('content')
<x-front.header />

<main class="px-6 w-full flex flex-col xl:flex-row gap-6  mt-12 mb-12 ">
    <div class="xl:w-1/4 w-full  p-6 rounded-xl border border-100 flex flex-col gap-4">
        <h1 class="font-semibold text-sm text-950 border-b pb-3 border-100">My Account</h1>

        <div class="flex flex-col gap-4 text-[13px] font-medium text-500">
            <a href="{{ route('profile') }}" class="text-950">My Account</a>
            <a href="{{ route('history') }}">History</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
    <div class="flex flex-col gap-6 rounded-xl border border-100 p-6 xl:w-3/4 w-full">
        <h1 class="font-semibold text-sm text-950 border-b pb-3 border-100">Contact information</h1>

        <div class="flex flex-col gap-4 xl:gap-0 xl:flex-row justify-between items-start w-full">
            <div class="flex flex-col gap-4 text-[13px] font-medium text-500">
                <div class="flex flex-row gap-4 items-center text-[13px] font-normal text-950">
                    <p>Name</p> <span>:</span>
                    <p>{{ auth()->user()->name }}</p>
                </div>
                <div class="flex flex-row gap-4 items-center text-[13px] font-normal text-950">
                    <p>Email</p> <span>:</span>
                    <p>{{ auth()->user()->email }}</p>
                </div>
            </div>

          
        </div>
        <h1 class="font-semibold text-sm text-950 border-b pb-3 border-100">Shipping address</h1>

        @foreach ($addresss as $address)
        <div class="flex flex-col xl:flex-row justify-between items-start gap-4 xl:gap-0 xl:items-center w-full">
            <div class="flex flex-col gap-4 text-[13px] font-medium text-500">
                <p class="text-[13px] font-semibold text-950">Address</p>
         
                    <p class="text-[13px] font-normal text-950">{{$address->name}} <span>{{ $address->telp }}</span></p>
                    <p class="text-[13px] font-normal text-950">{{$address->address}}</p>
     
            </div>

            <div class="flex flex-row gap-3 items-center">
                <div  class=" bg-[#ED7755] bg-opacity-20 rounded-md py-1 px-3 text-[12px] text-[#ED7755] font-normal">Changed</div>
                
            </div>
        </div>
        @endforeach


        <x-fornt.modal.crud-address/>

        
        

        @if(($address ?? null) === null)
    <button id="btn_modal_address" class="rounded-md py-2 px-3 text-[12px] text-white font-normal w-fit bg-950">Add Address</button>
@endif

    </div>
</main>


<script>
    function setupModalHandlers(modalId, btnId) {
        const modal = document.getElementById(modalId);
        const btn = document.getElementById(btnId);
        const closeModal = modal.querySelector('#close-modal');

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
    }

    setupModalHandlers('crud-modal_address', 'btn_modal_address');
    
</script>
@endsection