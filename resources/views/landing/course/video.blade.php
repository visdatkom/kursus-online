@extends('layouts.frontend.app', ['title' => 'Homepage'])

@section('content')
    <div class="w-full bg-slate-700 p-5 md:p-20">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-4">
                <div class="col-span-12 md:col-span-7">
                    <div class="aspect-w-16 aspect-h-9 md:aspect-w-10 md:aspect-h-5 border rounded-lg">
                        <iframe src="https://www.youtube.com/embed/{{ $video->video_code }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen class="rounded-lg"></iframe>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-5">
                    <div class="p-0 md:p-4">
                        <h1 class="text-white text-base font-semibold">{{ $course->name }}</h1>
                        <p class="text-sm text-gray-400 mb-2 text-justify">{{ $course->description }}</p>
                        <div class="flex flex-row justify-end gap-2 pb-5">
                            <p class="text-xs text-gray-400">{{ $course->videos->count() }} Episodes</p>
                            <a href="" class="text-xs text-gray-400 underline hover:text-blue-400">
                                {{ $course->category->name }}
                            </a>
                        </div>
                        <div class="h-80 overflow-y-auto">
                            @foreach ($videos as $video)
                                <div
                                    class="p-4 text-gray-100 {{ request()->segment(3) == $video->episode ? 'border rounded-lg bg-slate-800' : '' }}">
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('course.video', [$course->slug, $video->episode]) }}"
                                            class="flex flex-row items-center">
                                            @if (request()->segment(3) == $video->episode)
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-player-play w-5 h-5 text-green-500 fill-green-500"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M7 4v16l13 -8z"></path>
                                                </svg>
                                            @endif
                                            <p class="text-xs md:text-sm ml-2 hover:text-red-500">
                                                {{ $video->episode }}. {{ $video->name }}
                                            </p>
                                        </a>
                                        <div class="text-xs md:text-sm">
                                            @if ($video->intro == 0)
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-lock-open w-5 h-5" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <rect x="5" y="11" width="14" height="10"
                                                        rx="2"></rect>
                                                    <circle cx="12" cy="16" r="1"></circle>
                                                    <path d="M8 11v-5a4 4 0 0 1 8 0"></path>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-lock text-red-500 w-5 h-5"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <rect x="5" y="11" width="14" height="10"
                                                        rx="2"></rect>
                                                    <circle cx="12" cy="16" r="1"></circle>
                                                    <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                                </svg>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="p-4 flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 rounded-lg bg-slate-800 text-white hover:scale-110 hover:duration-200 flex items-center gap-2 text-sm border">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket w-5 h-5"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="7 10 12 4 17 10"></polyline>
                                <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                <circle cx="12" cy="15" r="2"></circle>
                            </svg>
                            Beli Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
