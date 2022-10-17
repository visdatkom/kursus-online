@extends('layouts.backend.app', ['title' => 'Course'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h1 class="card-title">
                        MY COURSE
                    </h1>
                </div>
                <div class="card-body">
                    <form action="" method="GET" class="mb-3 mt-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by course title...">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-info btn-flat">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </span>
                        </div>
                    </form>
                    <hr>
                    @foreach ($courses as $data)
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <img src="{{ $data->course->image }}" class="mr-3 shadow-custom w-100">
                            </div>
                            <div class="col-md-9 mb-3 text-dark">
                                <h5 class="mt-2">{{ $data->course->name }}</h5>
                                <!--mobile -->
                                <div class="d-block d-md-none d-lg-none button-app mt-3">
                                    <a href="{{ route('course.show', $data->course->slug) }}"
                                        class="btn shadow btn-dark btn-md mb-2 w-100">
                                        <i class="fas fa-play mr-1"></i>
                                        Lanjutkan Belajar
                                    </a>
                                    <a href="/" class="btn shadow-custom btn-primary btn-md mb-2 w-100">
                                        <i class="fas fa-comments mr-1"></i>
                                        Review Course
                                    </a>
                                </div>
                                <!-- end mobile -->
                                <!-- desktop -->
                                <div class="d-none d-md-block d-lg-block button-app mt-3">
                                    <a href="{{ route('course.show', $data->course->slug) }}"
                                        class="btn shadow btn-dark btn-md mb-2">
                                        <i class="fas fa-play mr-1"></i>
                                        Lanjutkan Belajar
                                    </a>
                                    <a href="/" class="btn shadow-custom btn-primary btn-md mb-2">
                                        <i class="fas fa-comments mr-1"></i>
                                        Review Course
                                    </a>
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
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <div class="d-flex justify-content-end">{{ $courses->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
