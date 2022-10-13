@extends('layouts.backend.app', ['title' => 'Article'])

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.article.create') }}" class="btn btn-dark mb-3">
                <i class="fas fa-plus mr-1"></i>
                Add New Article
            </a>
            <div class="card card-dark">
                <div class="card-header">
                    <h1 class="card-title">LIST ARTICLE</h1>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Title</th>
                                <th>Tags</th>
                                <th>Category</th>
                                <th>Type Article</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
