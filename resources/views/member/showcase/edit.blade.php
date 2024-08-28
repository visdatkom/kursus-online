@extends('layouts.backend.app', ['title' => 'Projek'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('member.showcase.update', $showcase->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-card-form title="EDIT PROJEK" :url="route('member.showcase.index')" titleBtn="Update Projek">
                    <x-input title="Judul" name="title" type="text" placeholder="Masukkan nama projek"
                        :value="$showcase->title" />
                    <x-select title="Kursus" name="course_id">
                        <option>Pilih Kursus</option>
                        @foreach ($courses as $data)
                            <option value="{{ $data->course->id }}" @selected($showcase->course_id == $data->course->id)>
                                {{ $data->course->name }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-upload-file title="Cover" name="cover" :value="$showcase->cover" />
                    <x-textarea title="Deskripsi" name="description" placeholder="Masukkan deskripsi projek"
                        value="">
                        {{ $showcase->description }}</x-textarea>
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
