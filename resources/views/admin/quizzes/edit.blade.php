@extends('layouts.backend.app', ['title' => 'Quiz'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('admin.quiz.update', $quiz->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-card-form title="UBAH QUIZ" url="{{ route('admin.quiz.index') }}" titleBtn="Ubah Quiz">
                    <x-input title="Judul" type="text" name="title" placeholder="Masukkan judul quiz"
                        :value="$quiz->title" />
                    <div class="row">
                        <div class="col-6">
                            <x-select title="Kursus" name="course_id">
                                <option selected disabled>Pilih Kursus</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" @selected($course->id == $quiz->course_id)>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>
                        <div class="col-6">
                            <x-input title="Skor Minimum" type="number" name="minimum_score" placeholder="Masukkan skor minimum quiz"
                                :value="$quiz->minimum_score" />
                        </div>
                    </div>
                    <x-textarea title="Deskripsi" name="description" placeholder="Masukkan deskripsi quiz"
                        value="{{ old('description') }}" />
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
