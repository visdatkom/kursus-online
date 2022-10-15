@extends('layouts.backend.app', ['title' => 'Role'])

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card card-dark">
                <div class="card-header">
                    <h1 class="card-title">LIST ROLE</h1>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $i => $role)
                                <tr>
                                    <td>{{ $roles->firstItem() + $i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @endforeach
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#modal-default{{ $role->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <div class="modal fade" id="modal-default{{ $role->id }}">
                                            <div class="modal-dialog">
                                                <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit role</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Role Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    id="name" placeholder="Enter role name"
                                                                    value="{{ $role->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="permissions">Permissions</label>
                                                                <div class="select2-purple">
                                                                    <select class="select2" multiple="multiple"
                                                                        data-placeholder="Select Permissions"
                                                                        data-dropdown-css-class="select2-purple"
                                                                        style="width: 100%;" name="permissions[]">
                                                                        @foreach ($permissions as $permission)
                                                                            <option value="{{ $permission->id }}"
                                                                                @selected($role->permissions()->find($permission->id))>
                                                                                {{ $permission->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fas fa-check mr-1"></i> Update role
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <a href="#" onclick="deleteData({{ $role->id }})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $role->id }}"
                                            action="{{ route('admin.role.destroy', $role->id) }}" method="POST"
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
                    <h3 class="card-title">CREATE NEW ROLE</h3>
                </div>
                <form action="{{ route('admin.role.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Enter role name">
                        </div>
                        <div class="form-group">
                            <label for="permissions">Permissions</label>
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" data-placeholder="Select Permissions"
                                    data-dropdown-css-class="select2-purple" style="width: 100%;" name="permissions[]">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check mr-1"></i> Create Role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
