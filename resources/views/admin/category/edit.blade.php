@extends('layouts.backend.app', ['title' => 'Kategori'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-card-form title="EDIT KATEGORI" url="{{ route('admin.category.index') }}" titleBtn="Update Category">
                    <x-input title="Judul" type="text" name="name" placeholder="Masukkan judul kategori"
                        :value="$category->name" />
                    <x-upload-file title="Gambar" name="image" :value="$category->image" />
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
