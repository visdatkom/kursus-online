@extends('layouts.backend.app', ['title' => 'Article'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">CREATE NEW ARTICLE</h3>
                </div>
                <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Enter article title">
                        </div>
                        <div class="form-group">
                            <label for="image">Cover</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="cover">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
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
                                    <label>Tags</label>
                                    <div class="select2-purple">
                                        <select class="select2" multiple="multiple" data-placeholder="Select a State"
                                            data-dropdown-css-class="select2-purple" style="width: 100%;" name="tags[]">
                                            <option>Choose Tags</option>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Teaser</label>
                            <textarea class="form-control" rows="4" placeholder="Enter article teaser" name="teaser"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea id="markdown" name="body" rows="4"></textarea>
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
