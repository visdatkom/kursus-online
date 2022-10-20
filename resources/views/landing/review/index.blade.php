@extends('layouts.frontend.app', ['title' => 'Review'])

@section('content')
    <div class="w-full bg-slate-700 p-5 md:p-20">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4 md:gap-20">
                <div class="md:col-span-2">
                    <h1 class="text-3xl font-semibold lg:text-5xl text-white text-center md:text-start flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-message-2 w-10 h-10 md:w-20 md:h-20" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3">
                            </path>
                            <line x1="8" y1="9" x2="16" y2="9"></line>
                            <line x1="8" y1="13" x2="14" y2="13"></line>
                        </svg>
                        Review
                    </h1>
                    <p class="mt-1 text-sm leading-relaxed md:text-xl md:text-start text-gray-300">
                        Kumpulan review dari para member yang sudah membeli premium disini
                    </p>
                    <p class="py-2 leading-relaxed text-xs text-justify md:text-sm md:text-start text-gray-400 max-w-4xl">
                        Disini review yang diberikan kami tampilkan secara menyeluruh tanpa adanya perubahan review agar
                        kami semakin baik dalam menyajikan konten - konten premium maupun gratis.
                    </p>
                </div>
                <div
                    class="hidden md:flex md:text-center md:justify-center md:items-center md:row-auto mx-auto sm:mx-0 md:col-span-1">
                    <div
                        class="border p-2 rounded-3xl border-slate-600 h-96 w-80 flex flex-col justify-center bg-slate-800 shadow-lg shadow-slate-900">
                        <div class="flex flex-col gap-2">
                            <span class="text-8xl text-gray-200 font-semibold">{{ $reviews->count() }}</span>
                            <span class="text-6xl text-gray-300 font-semibold">Review</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full bg-slate-800 p-3 border border-dashed border-slate-700">
        <div class="container mx-auto">
            <div class="flex justify-end items-center">
                <div class="flex flex-row items-center gap-2">
                    <input type="text" placeholder="Cari Review.."
                        class="p-2 rounded-lg text-white bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 text-sm border border-slate-700" />
                    <div class="relative" x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false"
                            class="flex items-center gap-2 text-sm text-white border p-2 rounded-lg bg-slate-800 border-slate-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter w-5 h-5"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                                </path>
                            </svg>
                            Filter
                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!isOpen"
                                class="icon icon-tabler icon-tabler-chevron-down w-4 h-4" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" x-cloak x-show="isOpen"
                                class="icon icon-tabler icon-tabler-chevron-up w-4 h-4" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="6 15 12 9 18 15"></polyline>
                            </svg>
                        </button>
                        <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
                            class="absolute font-normal bg-slate-800 shadow overflow-hidden rounded-lg w-20 border border-slate-700 mt-2 py-1 right-0 z-20">
                            <li>
                                <a href="#"
                                    class="flex items-center p-3 hover:text-blue-500 rounded-lg text-sm text-white">
                                    Terbaru
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full bg-slate-700 p-3 border border-dashed border-slate-800">
        <div class="container mx-auto">
            <div class="flex flex-row overflow-x-auto md:grid md:grid-cols-3 gap-4 items-start">
                @foreach ($reviews as $review)
                    <div class="min-w-full bg-slate-800 rounded-lg border border-slate-600">
                        <div class="flex justify-between p-4">
                            <div class="flex space-x-4">
                                <div>
                                    <img src="{{ $review->user->avatar }}" alt=""
                                        class="object-cover w-12 h-12 rounded-full border">
                                </div>
                                <div>
                                    <h4 class="font-bold text-white">{{ $review->user->name }}</h4>
                                    <span class="text-xs text-gray-400">
                                        {{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2 text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-star fill-yellow-500 w-5 h-5" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                    </path>
                                </svg>
                                <span class="text-xl font-bold">
                                    {{ $review->rating }}
                                </span>
                            </div>
                        </div>
                        <div class="p-4 space-y-2 text-sm text-gray-300 border-t border-dashed border-slate-700">
                            <p class="text-justify">
                                {{ $review->review }}
                            </p>
                        </div>
                        <div class="p-4 border-t border-dashed border-slate-700 text-gray-300 text-sm flex flex-col gap-2">
                            <p class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-message-2 w-5 h-5" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3">
                                    </path>
                                    <line x1="8" y1="9" x2="16" y2="9"></line>
                                    <line x1="8" y1="13" x2="14" y2="13"></line>
                                </svg>
                                Review Course :
                            </p>
                            <a href="{{ route('course.show', $review->course->slug) }}"
                                class="underline underline-offset-1 font-semibold">
                                {{ $review->course->name }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
