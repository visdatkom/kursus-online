@extends('layouts.backend.app', ['title' => 'Quiz'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('admin.quiz.questions.store', $quiz->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card class="p-4" title="BUAT PERTANYAAN BARU">
                    <div class="mb-4">
                        <x-textarea title="Pertayaan" type="text" name="question_text" placeholder="Masukan pertanyaan" :value="old('question_text')"/>
                    </div>
                    <label>Pilihan Jawaban</label>
                    <hr/>
                    <div id="answer-columns">
                        <div class="mb-4 answer-column">
                            <div class="row">
                                <div class="col-8">
                                    <x-input title="Jawaban" type="text" name="answers[0][choice_text]" placeholder="Masukkan jawaban pertanyaan" :value="old('answers.0.choice_text')"/>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <x-select title="Tandai Jawaban" name="answers[0][is_correct]">
                                            <option selected disabled>Tandai Sebagai Jawaban</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                         </x-select>
                                    </div>
                                </div>
                                <div class="col-1" style="margin-top:34px;">
                                    <button type="button" class="btn btn-danger btn-sm remove-column">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="add-column" type="button" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah Kolom Jawaban
                    </button>
                    <hr/>
                    <a href="{{ route('admin.quiz.questions.index', $quiz->id) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-check mr-1"></i> Simpan Data
                    </button>
                </x-card>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            let answerCount = 1;

            $('#add-column').on('click', function() {
                $('#answer-columns').append(`
                    <div class="mb-4 answer-column">
                        <div class="row">
                            <div class="col-8">
                                <x-input title="Jawaban" type="text" name="answers[${answerCount}][choice_text]" placeholder="Masukkan jawaban pertanyaan" :value="old('answers.${answerCount}.choice_text')"/>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <x-select title="Pilih Sebagai jawaban Benar" name="answers[${answerCount}][is_correct]">
                                        <option selected disabled>Pilih Sebagai jawaban Benar</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </x-select>
                                </div>
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <button type="button" class="btn btn-danger btn-sm remove-column">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `);
                answerCount++;
            });

            $(document).on('click', '.remove-column', function() {
                $(this).closest('.answer-column').remove();
            });
        });
    </script>
@endpush
