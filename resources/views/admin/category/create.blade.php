@extends('layouts.backend.app', ['title' => 'Kategori'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card-form title="BUAT KATEGORI BARU" url="{{ route('admin.category.index') }}" titleBtn="Create Category">
                    <x-input title="Judul" type="text" name="name" placeholder="Masukkan judul kategori"
                        :value="old('name')" />
                    <x-upload-file title="Gambar" name="image" :value="old('image')" />
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
