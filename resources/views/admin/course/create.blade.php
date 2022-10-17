@extends('layouts.backend.app', ['title' => 'Course'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">CREATE NEW COURSE</h3>
                </div>
                <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Enter course title">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id">
                                        <option>Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="demo">Demo</label>
                                    <input type="text" name="demo" class="form-control" id="demo"
                                        placeholder="Enter course demo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control" id="price"
                                        placeholder="Enter course price">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input type="number" name="discount" class="form-control" id="discount"
                                        placeholder="Enter course discount">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cover">Cover</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="cover" name="image">
                                    <label class="custom-file-label" for="cover">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="4" placeholder="Enter course description" name="description"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i> Go Back
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check mr-1"></i> Create Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
