@extends('layouts.backend.app', ['title' => 'Category'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card-form title="CREATE NEW CATEGORY" url="{{ route('admin.category.index') }}" titleBtn="Create Category">
                    <x-input title="Title" type="text" name="name" placeholder="Enter category title" value="" />
                    <x-upload-file title="Image" name="image" value="" />
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
