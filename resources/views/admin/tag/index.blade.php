@extends('layouts.backend.app', ['title' => 'Tags'])

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card card-dark">
                <div class="card-header">
                    <h1 class="card-title">LIST TAGS</h1>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Tag Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $i => $tag)
                                <tr>
                                    <td>{{ $tags->firstItem() + $i }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#modal-default">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <div class="modal fade" id="modal-default">
                                            <div class="modal-dialog">
                                                <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Tag</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Tag Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    id="name" placeholder="Enter tag name"
                                                                    value="{{ $tag->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fas fa-check mr-1"></i> Update Tag
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <a href="#" onclick="deleteData({{ $tag->id }})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $tag->id }}"
                                            action="{{ route('admin.tag.destroy', $tag->id) }}" method="POST"
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
        <div class="col-4">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">CREATE NEW TAG</h3>
                </div>
                <form action="{{ route('admin.tag.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tag Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Enter tag name">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check mr-1"></i> Create Tag
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
