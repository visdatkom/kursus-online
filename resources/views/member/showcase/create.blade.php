@extends('layouts.backend.app', ['title' => 'Showcase'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">CREATE NEW SHOWCASE</h3>
                </div>
                <form action="{{ route('member.showcase.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Enter showcase name">
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <select class="form-control" name="course_id">
                                <option>Choose Course</option>
                                @foreach ($courses as $data)
                                    <option value="{{ $data->course->id }}">
                                        {{ $data->course->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cover">Cover</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="cover" name="cover">
                                    <label class="custom-file-label" for="cover">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="4" placeholder="Enter showcase description" name="description"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('member.showcase.index') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i> Go Back
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check mr-1"></i> Create Showcase
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
