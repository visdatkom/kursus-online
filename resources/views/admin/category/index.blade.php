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
                    <h1 class="card-title">LIST CATEGORY</h1>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $i => $category)
                                <tr>
                                    <td>{{ $categories->firstItem() + $i }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <img src="{{ $category->image }}" class="img-fluid" width="20">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="#" onclick="deleteData({{ $category->id }})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $category->id }}"
                                            action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                            style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
