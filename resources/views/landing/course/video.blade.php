@extends('layouts.frontend.app', ['title' => 'Homepage'])

@section('content')
    <div class="w-full bg-slate-700 p-5 md:p-20">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4 md:gap-20">
                <div class="md:col-span-2">
                    <div class="flex flex-row gap-4 text-xs justify-center md:justify-start mt-4">
                        <div class="text-slate-400 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list w-5 h-5"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="9" y1="6" x2="20" y2="6"></line>
                                <line x1="9" y1="12" x2="20" y2="12"></line>
                                <line x1="9" y1="18" x2="20" y2="18"></line>
                                <line x1="5" y1="6" x2="5" y2="6.01"></line>
                                <line x1="5" y1="12" x2="5" y2="12.01"></line>
                                <line x1="5" y1="18" x2="5" y2="18.01"></line>
                            </svg>
                            {{ $course->videos()->count() }} Episode
                        </div>
                        <div class="text-slate-400 flex items-center gap-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users w-5 h-5"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                            </svg>
                            2 Member
                        </div>
                        <div class="text-slate-400 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-2 w-5 h-5"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3">
                                </path>
                                <line x1="8" y1="9" x2="16" y2="9"></line>
                                <line x1="8" y1="13" x2="14" y2="13"></line>
                            </svg> 10 Review
                        </div>
                    </div>
                    <h1 class="text-lg font-semibold lg:text-2xl py-4 text-white text-center md:text-start">
                        {{ $course->name }}
                    </h1>
                    <p class="text-sm text-center md:text-base md:text-justify text-gray-400">{{ $course->description }}</p>
                    <div class="mt-5">
                        <h1 class="text-3xl md:text-6xl text-green-500 font-mono text-center md:text-start">
                            <sup>Rp</sup> {{ $course->price }}
                        </h1>
                        <div class="flex flex-row gap-4 items-center my-6 justify-center md:justify-start">
                            <button type="submit"
                                class="px-4 py-2 rounded-lg bg-slate-800 text-white hover:scale-110 duration-200 flex items-center gap-2 text-sm border">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket w-5 h-5"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="7 10 12 4 17 10"></polyline>
                                    <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                    <circle cx="12" cy="15" r="2"></circle>
                                </svg>
                                Beli Sekarang
                            </button>
                            <a href=""
                                class="px-4 py-2 rounded-lg bg-red-800 text-white hover:scale-110 duration-200 flex items-center gap-2 text-sm border">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-youtube h-5 w-5" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="5" width="18" height="14" rx="4">
                                    </rect>
                                    <path d="M10 9l5 3l-5 3z"></path>
                                </svg>
                                Lihat Demo
                            </a>
                        </div>
                    </div>
                </div>
                <div class="aspect-w-16 aspect-h-9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->video_code }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
