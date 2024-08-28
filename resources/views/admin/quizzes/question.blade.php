@extends('layouts.backend.app', ['title' => 'Quiz'])

@section('content')
    <a href="{{ route('admin.quiz.index') }}" class="btn btn-danger mb-3">
        <i class="fas fa-arrow-left mr-1"></i> KEMBALI
    </a>
    <x-button-create title="TAMBAH PERTANYAAN BARU" :url="route('admin.quiz.questions.create', $quiz->id)"/>

    <x-card title="DAFTAR PERTANYAAN">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Pertayaan</th>
                    <th>Jawaban</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quiz->questions as $i => $question)
                    <tr>
                        <td>
                            {{ $question->title }}
                        </td>
                        <td>
                            @foreach($question->options as $option)
                                <span class="badge {{ $option->is_correct ? 'badge-success' : 'badge-danger' }}">
                                    <i class="fa {{ $option->is_correct ? 'fa-check' : 'fa-times' }}"></i>
                                    {{ $option->title }}
                                </span>
                            @endforeach
                        </td>
                        <td>
                            <x-button-edit :url="route('admin.quiz.questions.edit', [$quiz->id, $question->id])" />
                            <x-button-delete :id="$question->id" :url="route('admin.quiz.questions.destroy', [$quiz->id, $question->id])" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>
@endsection
