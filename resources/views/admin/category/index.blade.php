@extends('layouts.backend.app', ['title' => 'Category'])

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.category.create') }}" class="btn btn-dark mb-3">
                <i class="fas fa-plus mr-1"></i>
                Add New Category
            </a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Category</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $categories->firstItem() }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <img src="{{ $category->image }}" class="img-fluid" width="20">
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
