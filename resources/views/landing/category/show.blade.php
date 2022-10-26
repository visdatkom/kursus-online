@extends('layouts.frontend.app', ['title' => 'Course'])

@section('content')
    <!-- hero section -->
    <x-landing.hero-section title="Category"
        subtitle="Kumpulan video tutorial dengan category {{ str()->lower($category->name) }}"
        details="Disini kita akan mempelajarinya semua dari awal, jangan terlalu lama berfikir ! karena disi tidak hanya mengajarkan tentang fundamental tetapi dengan studi kasus didalamnya."
        :data="$courses" cardtitle="Course">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2 h-10 w-10 md:w-20 md:h-20"
            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M14 4h6v6h-6z"></path>
            <path d="M4 14h6v6h-6z"></path>
            <circle cx="17" cy="17" r="3"></circle>
            <circle cx="7" cy="7" r="3"></circle>
        </svg>
    </x-landing.hero-section>
    {{-- <div class="w-full bg-slate-700 p-5 md:p-20">
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
    </div> --}}
    <!-- search section -->
    <x-landing.search-section :url="route('category', $category->slug)" />
    <!-- course section -->
    <div class="w-full bg-slate-700 p-3 border border-dashed border-slate-800">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 container mx-auto my-5 items-start">
                @foreach ($courses as $course)
                    <x-landing.course-item :course="$course" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
