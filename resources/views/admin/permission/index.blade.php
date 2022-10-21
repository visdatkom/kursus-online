@extends('layouts.backend.app', ['title' => 'Permission'])

@section('content')
    <div class="row">
        <div class="col-8">
            <form action="{{ route('admin.permission.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search permission by name.."
                        value="{{ request()->search }}" name="search">
                    <span class="input-group-append">
                        <button type="button" class="btn btn-dark">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <div class="card card-dark">
                <div class="card-header">
                    <h1 class="card-title">LIST PERMISSION</h1>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $i => $permission)
                                <tr>
                                    <td>{{ $permissions->firstItem() + $i }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#modal-default">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <div class="modal fade" id="modal-default">
                                            <div class="modal-dialog">
                                                <form action="{{ route('admin.permission.update', $permission->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit permission</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Permission Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    id="name" placeholder="Enter permission name"
                                                                    value="{{ $permission->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fas fa-check mr-1"></i> Update permission
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <a href="#" onclick="deleteData({{ $permission->id }})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $permission->id }}"
                                            action="{{ route('admin.permission.destroy', $permission->id) }}" method="POST"
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
                    <h3 class="card-title">CREATE NEW PERMISSION</h3>
                </div>
                <form action="{{ route('admin.permission.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Permission Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Enter permission name">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check mr-1"></i> Create Permission
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
