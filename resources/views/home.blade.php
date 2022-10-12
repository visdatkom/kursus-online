@extends('layouts.frontend.app', ['title' => 'Homepage'])

@section('content')
    @include('layouts.frontend.partials.hero')
    <section class="p-8 text-center bg-slate-800 font-semibold text-white text-2xl">
        {{-- 5,750 Orang Telah Belajar Kursus Di IDN Course --}}
        <span class="text-red-500">5,500</span> ORANG TELAH BELAJAR KURSUS DI IDN COURSE
    </section>
    {{-- <section class="p-20 text-center bg-gray-700">
        <h1 class="text-2xl mb-5 font-semibold text-white">
            HOW IT <span class="text-red-500">WORKS</span>
        </h1>
        <p class="mx-44 text-gray-300 font-medium">
            Pelajari keterampilan Pemrograman, dari pemula hingga profesional.
            Kami mencoba membuat kursus dengan berbagai macam studi kasus yang dapat membantu anda menjadi seorang
            Developer Profesional.
        </p>
    </section> --}}
    <section class="bg-slate-600 p-10 w-full">
        <div class="flex flex-col gap-2 text-center items-center mb-10">
            <h1 class="text-2xl text-white font-semibold">COURSE</h1>
            <p class="text-sm text-gray-200 mx-96">
                Kami menyediakan berbagai macam pembahasan dengan studi kasus yang dapat membantu menjadi seorang Developer
                Profesional.
            </p>
            <div class="w-60 bg-slate-800 h-1 mt-2"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 container mx-auto my-5 items-start">
            @foreach ($courses as $course)
                <div class="w-full max-w-sm bg-slate-800 rounded-md shadow-custom">
                    <img class="rounded-t-md" src="{{ $course->image }}" alt="product image">
                    <div class="p-5 text-center">
                        <a href="#" class="text-lg font-semibold text-white hover:text-red-500 hover:underline">
                            {{ $course->name }}
                        </a>
                        <div class="flex justify-between items-center mt-5">
                            <p class="text-white">
                                {{ $course->videos_count }} Episodes
                            </p>
                            <span class="font-mono text-green-500">
                                <sup>Rp</sup> {{ $course->price }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
