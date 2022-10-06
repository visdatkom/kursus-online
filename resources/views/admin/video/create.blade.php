@extends('layouts.backend.app', ['title' => 'Video'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">CREATE NEW VIDEO</h3>
                </div>
                <form action="{{ route('admin.video.store', $course->slug) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Enter video title">
                        </div>
                        <div class="form-group">
                            <label for="videocode">Video Code</label>
                            <input type="text" name="video_code" class="form-control" id="videocode "
                                placeholder="Enter video code">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="episode">Episode</label>
                                    <input type="number" name="episode" class="form-control" id="episode"
                                        placeholder="Enter video episode">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="number" name="duration" class="form-control" id="duration "
                                        placeholder="Enter video duration">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="duration">Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="intro" value="0" checked>
                                <label class="form-check-label">Free</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="intro" value="1">
                                <label class="form-check-label">Premium</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.course.index') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i> Go Back
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check mr-1"></i> Create Video
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
