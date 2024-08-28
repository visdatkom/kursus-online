@extends('layouts.backend.app', ['title' => 'Projek'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('member.showcase.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card-form title="BUAT PROJEK BARU" :url="route('member.showcase.index')" titleBtn="Buat Projek">
                    <x-input title="Judul" name="title" type="text" placeholder="Masukkan nama projek"
                        :value="old('title')" />
                    <x-select title="Kursus" name="course_id">
                        <option value>Pilih Kursus</option>
                        @foreach ($courses as $data)
                            <option value="{{ $data->course->id }}">
                                {{ $data->course->name }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-upload-file title="Cover" name="cover" :value="old('cover')" />
                    <x-textarea title="Deskripsi" name="description" placeholder="Masukkan deskripsi projek"
                        :value="old('description')" />
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
