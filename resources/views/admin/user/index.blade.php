@extends('layouts.backend.app', ['title' => 'Role'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h1 class="card-title">LIST USER</h1>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#modal-default{{ $user->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <div class="modal fade" id="modal-default{{ $user->id }}">
                                            <div class="modal-dialog">
                                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit user</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Full Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    id="name" placeholder="Enter user name"
                                                                    value="{{ $user->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="role">Role</label>
                                                                <select name="roles[]" class="form-control">
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->id }}">
                                                                            {{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fas fa-check mr-1"></i> Update user
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <a href="#" onclick="deleteData({{ $user->id }})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
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
