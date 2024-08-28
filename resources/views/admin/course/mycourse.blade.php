@extends('layouts.backend.app', ['title' => 'Kursus'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h1 class="card-title">
                        Kursus saya
                    </h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.mycourse') }}" method="GET" class="mb-3 mt-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari judul kursus..."
                                value="{{ request()->search }}" name="search">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-info">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </span>
                        </div>
                    </form>
                    <hr>
                    @forelse ($courses as $data)
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <img src="{{ $data->course->image }}" class="mr-3 shadow-custom w-100">
                            </div>
                            <div class="col-md-9 mb-3 text-dark">
                                <h5 class="mt-2">{{ $data->course->name }}</h5>
                                <!--mobile -->
                                <div class="d-block d-md-none d-lg-none mt-3">
                                    <a href="{{ route('course.show', $data->course->slug) }}"
                                        class="btn shadow btn-dark btn-md mb-2 w-100">
                                        <i class="fas fa-play mr-1"></i>
                                        Lanjutkan Belajar
                                    </a>
                                    <button type="button" class="btn btn-primary btn-md mb-2 w-100" data-toggle="modal"
                                        data-target="#modal-default{{ $data->course->id }}">
                                        <i class="fas fa-comments mr-1"></i> Ulasan Kursus
                                    </button>
                                    <div class="modal fade" id="modal-default{{ $data->course->id }}">
                                        <div class="modal-dialog">
                                            <form action="{{ route('admin.review', $data->course->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ulasan Kursus</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <x-select name="rating" title="Peringkat">
                                                            <option value="1">1 </option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </x-select>
                                                        <x-textarea title="Ulasan" name="review"
                                                            value="{{ old('review') }}" placeholder="" />
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button class="btn btn-success" type="submit">
                                                            <i class="fas fa-check mr-1"></i> Simpan Ulasan
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end mobile -->
                                <!-- desktop -->
                                <div class="d-none d-md-block d-lg-block mt-3">
                                    <a href="{{ route('course.show', $data->course->slug) }}"
                                        class="btn shadow btn-dark btn-md mb-2">
                                        <i class="fas fa-play mr-1"></i>
                                        Lanjutkan Belajar
                                    </a>
                                    <button type="button" class="btn btn-primary btn-md mb-2" data-toggle="modal"
                                        data-target="#modal-lg{{ $data->course->id }}">
                                        <i class="fas fa-comments mr-1"></i> Ulasan Kursus
                                    </button>
                                    <div class="modal fade" id="modal-lg{{ $data->course->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <form action="{{ route('admin.review', $data->course->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ulasan Kursus</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <x-select name="rating" title="Peringkat">
                                                            <option value="1">1 </option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </x-select>
                                                        <x-textarea title="Ulasan" name="review"
                                                            value="{{ old('review') }}" placeholder="" />
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button class="btn btn-success" type="submit">
                                                            <i class="fas fa-check mr-1"></i> Simpan Ulasan
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal-default{{ $data->course->id }}">
                                        <div class="modal-dialog">
                                            <form action="{{ route('admin.review', $data->course->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ulasan Kursus</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <x-select name="rating" title="Peringkat">
                                                            <option value="1">1 </option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </x-select>
                                                        <x-textarea title="Ulasan" name="review"
                                                            value="{{ old('review') }}" placeholder="" />
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button class="btn btn-success" type="submit">
                                                            <i class="fas fa-check mr-1"></i> Simpan Ulasan
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @if($data->course->quizes)
                                        <a href="{{ route('admin.mycourse.quiz', $data->course->id) }}" class="btn btn-success btn-md mb-2">
                                            <i class="fa fa-info mr-1"></i> Quiz
                                        </a>
                                    @else
                                        <button disabled class="btn btn-success btn-md mb-2">
                                            <i class="fa fa-info mr-1"></i> Quiz
                                        </button>
                                    @endif
                                    @php
                                        $scoreQuiz = $score[$data->course->id.'-'.$data->transaction->user_id] ?? null;
                                        $canPrintCertificate = $scoreQuiz && $scoreQuiz['score'] >= $scoreQuiz['minimum_score'];
                                    @endphp
                                    @if($canPrintCertificate)
                                        <a href="{{ route('admin.mycourse.certificate', $data->course->id) }}" target="_blank" class="btn btn-info btn-md mb-2">
                                            <i class="fas fa-print mr-1"></i> Cetak Sertifikat
                                        </a>
                                    @else
                                        <button disabled class="btn btn-info btn-md mb-2">
                                            <i class="fas fa-print mr-1"></i> Cetak Sertifikat
                                        </button>
                                    @endif
                                </div>
                                <!-- end desktop -->
                                <hr>
                                <div class="mt-2">
                                    Licensed to :
                                    <p>
                                        <b>{{ $data->transaction->user->name }}</b>
                                        <i>({{ $data->transaction->user->email }})</i>
                                        — {{ $data->transaction->created_at->format('d-m-Y H:i:s') }}
                                    </p>
                                </div>
                                <div class="mt-2">
                                    Catatan :
                                    <p class="text-danger">
                                        Untuk membuka sertifikat silahkan selesaikan kuis terlebih dahulu..
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @empty
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <img src="{{ asset('course.svg') }}" class="img-fluid" width="60%">
                            </div>
                        </div>
                    @endforelse
                    <div class="d-flex justify-content-end">{{ $courses->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
