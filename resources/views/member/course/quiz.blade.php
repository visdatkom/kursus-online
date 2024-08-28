@extends('layouts.backend.app', ['title' => 'Quiz'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <form action="{{ route('member.mycourse.quiz.store', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card class="p-4" title="Quiz">
                    @foreach ($quiz->questions as $key => $question)
                        <div class="mb-2">{{ $key + 1 }} - {{ $question->title }}</div>
                        <div class="mb-4 question">
                            @foreach($question->options as $key1 => $option)
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="radio-{{ $key }}-{{ $key1 }}"
                                            name="answers[{{ $question->id }}]" value="{{ $option->id }}" @if($loop->first) checked @endif>
                                        <label for="radio-{{ $key }}-{{ $key1 }}" class="custom-control-label">{{ $option->title }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <a href="{{ route('member.mycourse') }}" class="btn btn-danger btn-sm mr-1">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                    <button class="btn btn-primary btn-sm mr-1" type="submit">
                        <i class="fa fa-check"></i> Simpan Jawaban
                    </button>
                </x-card>
            </form>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Hasil Quiz Terakhir</h3>
                </div>
                <div class="card-body">
                    Untuk membuka sertifikat, anda harus memiliki score minimal <span class="text-danger">
                        <b>{{ $quiz->minimum_score }}</b>
                    </span>
                    <hr/>
                    <p class="card-text">
                        Score Anda:
                        @if($quizAttempt)
                        <b class="{{ $quizAttempt->score < $quiz->minimum_score ? 'text-danger' : 'text-success' }}">
                            {{ $quizAttempt->score }}
                        </b>
                        @else
                            <b class="text-danger">Anda belum mengerjakan quiz ini</b>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    document.querySelectorAll('input[type="radio"]').forEach((radio) => {
        radio.addEventListener('change', (event) => {
            const parentQuestion = event.target.closest('.question');
            const firstRadio = parentQuestion.querySelector('input[type="radio"]');

            if (!event.target.checked) {
                parentQuestion.querySelectorAll('input[type="radio"]').forEach((radio) => {
                    radio.checked = false;
                });
                firstRadio.checked = true;
            }
        });
    });
</script>
@endpush
