@extends('layouts.application')

@section('content')
<section class="w-full min-h-screen bg-white flex flex-row justify-center items-start">
    <x-admin.sidebar />
    <main class="w-full xl:w-4/5 2xl:w-11/12 rounded-xl flex flex-col gap-6 2xl:ml-6 mt-6 mb-8">
        <x-admin.header />
        <div class="px-6 flex flex-col gap-6 w-full">

            <h1 class="font-bold text-base text-950">Customers</h1>

        </div>

        <div class="flex w-full flex-col items-start gap-6  px-6">

            <div class="w-full flex flex-col gap-4">
          


                <div class="relative overflow-x-auto border border-100 sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 w-full ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Role
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($users as $user)
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                    {{ $user->name }}

                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->email }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->role }}
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