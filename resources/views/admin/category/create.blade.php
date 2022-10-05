@extends('layouts.backend.app', ['title' => 'Category'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">CREATE NEW CATEGORY</h3>
                </div>
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Enter category name">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i> Go Back
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check mr-1"></i> Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
