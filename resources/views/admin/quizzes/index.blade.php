@extends('layouts.backend.app', ['title' => 'Quiz'])

@section('content')
    <div class="row">
        <div class="col-12">
            <x-button-create title="TAMBAH QUIZ BARU" :url="route('admin.quiz.create')" />
            <x-card title="DAFTAR QUIZ">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Kursus</th>
                            <th>Total Pertanyaan</th>
                            <th>Skor minimum</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizez as $i => $quiz)
                            <tr>
                                <td>{{ $quizez->firstItem() + $i }}</td>
                                <td>{{ $quiz->course->name }}</td>
                                <td>{{ $quiz->questions_count }}</td>
                                <td>{{ $quiz->minimum_score }}</td>
                                <td>
                                    <a href="{{ Route('admin.quiz.questions.index', $quiz->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-list"></i>
                                        Tambah Soal
                                    </a>
                                    <x-button-edit :url="route('admin.quiz.edit', $quiz->id)" />
                                    <x-button-delete :id="$quiz->id" :url="route('admin.quiz.destroy', $quiz->id)" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-card>
            <div class="d-flex justify-content-end">{{ $quizez->links() }}</div>
        </div>
    </div>
@endsection
