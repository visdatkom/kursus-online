@extends('layouts.backend.app', ['title' => 'Course'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">EDIT COURSE</h3>
                </div>
                <form action="{{ route('admin.course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Enter course title" value="{{ $course->name }}">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <option>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($course->category_id == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" id="price"
                                placeholder="Enter course price" value="{{ $course->price }}">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="level">
                                <option value>Choose level</option>
                                <option value="advanced" @selected($course->level == 'advanced')>Advanced</option>
                                <option value="intermediate" @selected($course->level == 'intermediate')>Intermediate</option>
                                <option value="beginner" @selected($course->level == 'beginner')>Beginner</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cover">Cover</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="cover" name="image"
                                        value="{{ $course->image }}">
                                    <label class="custom-file-label" for="cover">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="4" placeholder="Enter course description" name="description">{{ $course->description }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i> Go Back
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check mr-1"></i> Update Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
