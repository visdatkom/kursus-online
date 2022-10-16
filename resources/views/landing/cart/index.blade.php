@extends('layouts.frontend.app', ['title' => 'Homepage'])

@section('content')
    <div class="w-full p-2 md:p-16 bg-gray-500">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-8">
                    <div class="border rounded-lg overflow-hidden">
                        <div class="bg-white border-b px-4 py-3 text-gray-700 font-medium flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket w-5 h-5"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="7 10 12 4 17 10"></polyline>
                                <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                <circle cx="12" cy="15" r="2"></circle>
                            </svg>
                            Keranjang Saya
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
                                    @forelse ($carts as $i=> $cart)
                                        <tr>
                                            <td class="py-3 px-4 whitespace-nowrap">
                                                {{ $i + 1 }}
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap">
                                                {{ $cart->course->name }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap text-right font-mono">
                                                <sup>Rp</sup> {{ moneyFormat($cart->price) }}
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap text-right text-red-500">
                                                <a href="#" onclick="deleteData({{ $cart->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-eraser w-5 h-5" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3">
                                                        </path>
                                                        <path d="M18 13.3l-6.3 -6.3"></path>
                                                    </svg>
                                                </a>
                                                <form id="delete-form-{{ $cart->id }}"
                                                    action="{{ route('cart.destroy', $cart->id) }}" method="POST"
                                                    style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        @empty
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
                                                            <path
                                                                d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z">
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
                                    @endforelse
                                    <tr classname="bg-blue-50 text-blue-900 font-semibold">
                                        <td class="py-3 px-4 whitespace-nowrap"></td>
                                        <td class="py-3 px-4 whitespace-nowrap">Total</td>
                                        <td class="py-3 px-4 whitespace-nowrap text-right text-green-500 font-mono">
                                            <sup>Rp</sup> {{ moneyFormat($total) }}
                                        </td>
                                        <td class="py-3 px-4 whitespace-nowrap"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4">
                    <form action="{{ route('checkout.store') }}" method="get">
                        <div class="border rounded-lg overflow-hidden">
                            <div class="bg-white border-b px-4 py-3 text-gray-700 font-medium flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt w-5 h-5"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2">
                                    </path>
                                </svg>
                                Konfirmasi Pesanan
                            </div>
                            <div class="p-4 bg-white">
                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-col gap-y-2">
                                        <label class="text-base text-gray-700 font-medium">
                                            Nama Lengkap
                                        </label>
                                        <input type="text"
                                            class="rounded-md border p-2 text-sm text-gray-700 focus:outline-none bg-gray-100 cursor-not-allowed"
                                            value="{{ $user->name }}" name="name" readonly="">
                                    </div>
                                    <div class="flex flex-col gap-y-2">
                                        <label class="text-base text-gray-700 font-medium">
                                            Email
                                        </label>
                                        <input type="email"
                                            class="rounded-lg border p-2 text-sm text-gray-700 focus:outline-none bg-gray-100 cursor-not-allowed"
                                            value="{{ $user->email }}" name="email" readonly="">
                                    </div>
                                    <div class="flex flex-col gap-y-2">
                                        <label class="text-base text-gray-700 font-medium">
                                            Total Bayar
                                        </label>
                                        <input type="email"
                                            class="rounded-lg border p-2 text-sm text-gray-700 focus:outline-none bg-gray-100 cursor-not-allowed"
                                            value="{{ $total }}" name="grand_total" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            <button class="text-white bg-slate-800 hover:bg-slate-900 rounded-lg w-full p-2">
                                Lanjutkan Ke Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
