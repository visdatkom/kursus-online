@extends('layouts.backend.app', ['title' => 'Course'])

@section('content')
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-lg-4 col-12">
                <div class="card card-dark card-outline shadow-none">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="img-fluid" src="{{ $course->image }}" alt="cover">
                        </div>
                        <h3 class="profile-username text-center">{{ $course->name }}</h3>
                        <p class="text-danger text-center">{{ moneyFormat($course->price) }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Enrolled</b> <span class="float-right text-bold">1,322</span>
                            </li>
                            <li class="list-group-item">
                                <b>Level</b>
                                <span class="float-right text-info">
                                    {{ $course->level }}
                                </span>
                            </li>
                            <li class="list-group-item">
                                <b>Status</b>
                                <span class="float-right text-success">
                                    <i class="fas fa-check"></i> {{ $course->status }}
                                </span>
                            </li>
                            <li class="list-group-item">
                                <b>Episode</b>
                                <span class="float-right text-success">
                                    {{ $course->videos_count }}
                                </span>
                            </li>
                        </ul>
                        <a href="{{ Route('admin.video.create', $course->slug) }}" class="btn btn-dark btn-sm">
                            <i class="fas fa-video mr-1"></i>
                            Add Episode
                        </a>
                        <a href="{{ route('admin.course.edit', $course->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </a>
                        <a href="#" onclick="deleteData({{ $course->id }})" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash mr-1"></i>
                            Delete
                        </a>
                        <form id="delete-form-{{ $course->id }}"
                            action="{{ route('admin.course.destroy', $course->id) }}" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
