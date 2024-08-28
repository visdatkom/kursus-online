@extends('layouts.frontend.app', ['title' => 'Kursus'])

@section('content')
    <!-- hero section -->
    <x-landing.hero-section title="Kursus"
        subtitle="Kumpulan video tutorial yang dapat membantu proses belajar anda secara sistematis"
        details=""
        :data="$courses" cardtitle="Kursus">
        
        @slot('details')
        <p class="text-gray-400 leading-relaxed">
            Disini kita akan mempelajarinya semua dari awal, jangan terlalu lama berfikir! karena disini tidak hanya mengajarkan tentang fundamental tetapi dengan studi kasus didalamnya.
        </p>
        <ul class="text-gray-400 leading-relaxed">
            <li><span>• Struktur Dasar Halaman Web (HTML)</span></li>
            <li><span>• Desain dan Layout (CSS)</span></li>
            <li><span>• Dasar-Dasar Pemrograman (JavaScript)</span></li>
            <li><span>• Pengenalan MVC (Laravel)</span></li>
            <li><span>• Komponen UI Siap Pakai (Bootstrap)</span></li>
            <li><span>• Seleksi dan Manipulasi Elemen (jQuery)</span></li>
            <li><span>• Pengenalan API (API)</span></li>
        </ul>
    @endslot

        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop w-10 h-10 md:w-20 md:h-20"
            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <line x1="3" y1="19" x2="21" y2="19"></line>
            <rect x="5" y="6" width="14" height="10" rx="1"></rect>
        </svg>
        
    </x-landing.hero-section>
    <!-- search section -->
    <x-landing.search-section :url="route('course.index')" />
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
