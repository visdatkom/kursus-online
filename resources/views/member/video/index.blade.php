@extends('layouts.backend.app', ['title' => 'Video'])

@section('content')
    <div class="mb-3">
        <a href="{{ route('member.course.index') }}" class="btn btn-danger">
            <i class="fas fa-arrow-left mr-1"></i> Go Back
        </a>
        <a href="{{ route('member.video.create', $course->slug) }}" class="btn btn-dark">
            <i class="fas fa-plus mr-1"></i>
            Add New Episode
        </a>
    </div>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">List Episode - {{ $course->name }}</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Episode</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $i => $video)
                        <tr>
                            <td>{{ $video->episode }}</td>
                            <td>{{ $video->name }}</td>
                            <td>
                                <span class="badge badge-{{ $video->intro == 1 ? 'danger' : 'primary' }}">
                                    {{ $video->intro == 1 ? 'premium' : 'free' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('member.video.edit', [$course->slug, $video->id]) }}"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit
                                </a>
                                <a href="#" onclick="deleteData({{ $video->id }})" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash mr-1"></i>
                                    Delete
                                </a>
                                <form id="delete-form-{{ $video->id }}"
                                    action="{{ route('member.video.destroy', $video->id) }}" method="POST"
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
@endsection
