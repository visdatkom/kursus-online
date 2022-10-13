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
                    <div class="p-4">
                        <h1 class="text-white text-base font-semibold">{{ $course->name }}</h1>
                        <p class="text-sm text-gray-400 mb-2 text-justify">{{ $course->description }}</p>
                        <div class="flex flex-row justify-end gap-2 pb-5">
                            <p class="text-xs text-gray-400">{{ $course->videos->count() }} Episodes</p>
                            <a href="" class="text-xs text-gray-400 underline hover:text-blue-400">
                                {{ $course->category->name }}
                            </a>
                        </div>
                        <div class="h-60 overflow-y-auto">
                            @foreach ($videos as $video)
                                <div
                                    class="p-4 text-gray-100 {{ request()->segment(3) == $video->episode ? 'border rounded-lg bg-slate-800' : '' }}">
                                    <div class="flex justify-between hover:text-red-500">
                                        <a href="{{ route('course.video', [$course->slug, $video->episode]) }}"
                                            class="flex flex-row items-center">
                                            @if ($video->intro == 0)
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-free-rights w-5 h-5 text-green-500"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="9"></circle>
                                                    <path
                                                        d="M13.867 9.75c-.246 -.48 -.708 -.769 -1.2 -.75h-1.334c-.736 0 -1.333 .67 -1.333 1.5c0 .827 .597 1.499 1.333 1.499h1.334c.736 0 1.333 .671 1.333 1.5c0 .828 -.597 1.499 -1.333 1.499h-1.334c-.492 .019 -.954 -.27 -1.2 -.75">
                                                    </path>
                                                    <path d="M12 7v2"></path>
                                                    <path d="M12 15v2"></path>
                                                    <path d="M6 6l1.5 1.5"></path>
                                                    <path d="M16.5 16.5l1.5 1.5"></path>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-coin w-5 h-5 text-red-500"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="9"></circle>
                                                    <path
                                                        d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1">
                                                    </path>
                                                    <path d="M12 7v10"></path>
                                                </svg>
                                            @endif
                                            <p class="text-xs md:text-sm ml-2">
                                                {{ $video->episode }}. {{ $video->name }}
                                            </p>
                                        </a>
                                        <div class="text-xs md:text-sm">
                                            {{ $video->duration }} Menit
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
