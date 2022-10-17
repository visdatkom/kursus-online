@extends('layouts.backend.app', ['title' => 'Showcase'])

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.showcase.create') }}" class="btn btn-dark mb-3">
                <i class="fas fa-plus mr-1"></i>
                Add New Showcase
            </a>
            <div class="card card-dark">
                <div class="card-header">
                    <h1 class="card-title">LIST SHOWCASE</h1>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($showcases as $i => $showcase)
                                <tr>
                                    <td>{{ $showcases->firstItem() + $i }}</td>
                                    <td>{{ $showcase->name }}</td>
                                    <td>
                                        <img src="{{ $showcase->image }}" class="img-fluid" width="20">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.showcase.edit', $showcase->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="#" onclick="deleteData({{ $showcase->id }})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $showcase->id }}"
                                            action="{{ route('admin.showcase.destroy', $showcase->id) }}" method="POST"
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
