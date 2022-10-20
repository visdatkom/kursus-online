@extends('layouts.frontend.app', ['title' => 'Course'])

@section('content')
    <div class="w-full bg-slate-700 p-5 md:p-20">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4 md:gap-20">
                <div class="md:col-span-2">
                    <h1 class="text-3xl font-semibold lg:text-5xl text-white text-center md:text-start flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-category-2 h-10 w-10 md:w-20 md:h-20" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 4h6v6h-6z"></path>
                            <path d="M4 14h6v6h-6z"></path>
                            <circle cx="17" cy="17" r="3"></circle>
                            <circle cx="7" cy="7" r="3"></circle>
                        </svg>
                        Category
                    </h1>
                    <p class="mt-1 text-sm leading-relaxed md:text-xl md:text-start text-gray-300">
                        Kumpulan video tutorial dengan category <span class="underline">{{ $category->name }}</span>
                    </p>
                    <p class="py-2 leading-relaxed text-xs text-justify md:text-sm md:text-start text-gray-400 max-w-4xl">
                        Disini kita akan mempelajarinya semua dari awal, jangan terlalu lama berfikir ! karena disi tidak
                        hanya mengajarkan tentang <i>fundamental</i> tetapi dengan studi kasus didalamnya.
                    </p>
                </div>
                <div
                    class="hidden md:flex md:text-center md:justify-center md:items-center md:row-auto mx-auto sm:mx-0 md:col-span-1">
                    <div
                        class="border p-2 rounded-3xl border-slate-600 h-96 w-80 flex flex-col justify-center bg-slate-800 shadow-lg shadow-slate-900">
                        <div class="flex flex-col gap-2">
                            <span class="text-8xl text-gray-200 font-semibold">{{ $courses->count() }}</span>
                            <span class="text-6xl text-gray-300 font-semibold">Course</span>
                            <span class="text-2xl text-gray-300 font-semibold underline underline-offset-4">
                                {{ $category->name }}
                            </span>
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
                    <input type="text" placeholder="Cari Course.."
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
                            <li>
                                <a href="#"
                                    class="flex items-center p-3 hover:text-blue-500 rounded-lg text-sm text-white">
                                    Populer
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 container mx-auto my-5 items-start">
                @foreach ($courses as $course)
                    <div class="bg-slate-800 rounded-lg shadow-custom">
                        <img class="rounded-t-lg" src="{{ $course->image }}" alt="product image">
                        <div class="p-4 md:p-5 text-center">
                            <a href="{{ route('course.show', $course->slug) }}"
                                class="text-lg font-semibold text-white hover:text-red-500 hover:underline">
                                {{ $course->name }}
                            </a>
                            <div class="flex flex-row gap-3 text-xs justify-center my-4">
                                <div class="text-slate-400 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-list w-5 h-5" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="9" y1="6" x2="20" y2="6"></line>
                                        <line x1="9" y1="12" x2="20" y2="12"></line>
                                        <line x1="9" y1="18" x2="20" y2="18"></line>
                                        <line x1="5" y1="6" x2="5" y2="6.01"></line>
                                        <line x1="5" y1="12" x2="5" y2="12.01"></line>
                                        <line x1="5" y1="18" x2="5" y2="18.01"></line>
                                    </svg>
                                    {{ $course->videos_count }} Episode
                                </div>
                                <div class="text-slate-400 flex items-center gap-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-users w-5 h-5" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                    </svg>
                                    {{ $course->enrolled }} Member
                                </div>
                                <div class="text-slate-400 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-message-2 w-5 h-5" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3">
                                        </path>
                                        <line x1="8" y1="9" x2="16" y2="9"></line>
                                        <line x1="8" y1="13" x2="14" y2="13"></line>
                                    </svg>
                                    {{ $course->reviews_count }} Review
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-5">
                                <span class="text-base p-1.5 border bg-red-500 text-white rounded font-semibold">
                                    Discount {{ $course->discount }}%
                                </span>
                                <div class="flex flex-col">
                                    <span class="line-through text-rose-500 font-mono">
                                        <sup>Rp</sup>{{ moneyFormat($course->price) }}
                                    </span>
                                    <span class="text-green-500 font-mono">
                                        <sup>Rp</sup>{{ moneyFormat(discount($course->price, $course->discount)) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
