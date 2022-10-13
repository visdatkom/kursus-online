@extends('layouts.frontend.app', ['title' => 'Homepage'])

@section('content')
    <div class="w-full py-10 bg-gray-500">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-8">
                    <div class="border rounded-lg overflow-hidden">
                        <div class="bg-white border-b px-4 py-3 text-gray-700 font-medium flex items-center">
                            Keranjang Anda
                        </div>
                        <div class="overflow-x-auto relative">
                            <table class="w-full text-sm text-left text-gray-500 divide-y divide-gray-200">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 w-0"></th>
                                        <th scope="col" class="px-4 py-3">Nama Barang</th>
                                        <th scope="col" class="px-4 py-3 text-right">Jumlah</th>
                                        <th scope="col" class="px-4 py-3 w-0">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="py-3 px-4 whitespace-nowrap" colspan="4">
                                            <div class="flex items-center justify-center h-96">
                                                <div class="text-center flex flex-col items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-basket" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="7 10 12 4 17 10"></polyline>
                                                        <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z">
                                                        </path>
                                                        <circle cx="12" cy="15" r="2"></circle>
                                                    </svg>
                                                    <div class="mt-5">
                                                        Keranjang Anda Kosong
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr classname="bg-blue-50 text-blue-900 font-semibold">
                                        <td class="py-3 px-4 whitespace-nowrap"></td>
                                        <td class="py-3 px-4 whitespace-nowrap">Total</td>
                                        <td class="py-3 px-4 whitespace-nowrap text-right text-teal-500">
                                            0 Item
                                        </td>
                                        <td class="py-3 px-4 whitespace-nowrap"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4">
                    <form action="http://inventory.appdev.my.id/transaction" method="POST">
                        <input type="hidden" name="_token" value="pA3aqHVMQdzHO7yuv6ZsWvceuSQpisFNBxhHM8vu">
                        <div class="border rounded-lg overflow-hidden">
                            <div class="bg-white border-b px-4 py-3 text-gray-700 font-medium flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-file-invoice mr-1" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                    </path>
                                    <line x1="9" y1="7" x2="10" y2="7"></line>
                                    <line x1="9" y1="13" x2="15" y2="13"></line>
                                    <line x1="13" y1="17" x2="15" y2="17"></line>
                                </svg>
                                Konfirmasi Pesanan
                            </div>
                            <div class="p-4 bg-white">
                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-col gap-y-2">
                                        <label class="text-base text-gray-700">
                                            Nama Lengkap
                                        </label>
                                        <input type="text"
                                            class="rounded-md border p-2 text-sm text-gray-700 focus:outline-none bg-gray-100 cursor-not-allowed"
                                            value="Administrator" name="name" readonly="">
                                    </div>
                                    <div class="flex flex-col gap-y-2">
                                        <label class="text-base text-gray-700">
                                            Email
                                        </label>
                                        <input type="email"
                                            class="rounded-lg border p-2 text-sm text-gray-700 focus:outline-none bg-gray-100 cursor-not-allowed"
                                            value="admin@gmail.com" name="email" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            <button class="text-white bg-sky-900 hover:bg-sky-800 rounded-lg w-full p-2" type="submit">
                                Order Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
