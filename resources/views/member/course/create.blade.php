@extends('layouts.backend.app', ['title' => 'Kursus'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('member.course.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card-form title="BUAT KURSUS BARU" url="{{ route('member.course.index') }}" titleBtn="Buat Kursus">
                    <div class="card-body">
                        <x-input title="Judul" type="text" name="name" placeholder="Masukkan judul kursus"
                            value="{{ old('name') }}" />
                        <div class="row">
                            <div class="col-6">
                                <x-select title="Category" name="category_id">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="col-6">
                                <x-input title="Demo" type="text" name="demo" placeholder="Masukkan demo url kursus"
                                    value="{{ old('demo') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <x-input title="Harga" type="number" name="price" placeholder="Masukkan harga kursus"
                                    value="{{ old('price') }}" />
                            </div>
                            <div class="col-6">
                                <x-input title="Diskon" type="number" name="discount" placeholder="Masukkan diskon kursus"
                                    value="{{ old('discount') }}" />
                            </div>
                        </div>
                        <x-upload-file title="Cover" name="image" value="{{ old('image') }}" />
                        <x-textarea title="Deskripsi" name="description" placeholder="Masukkan deskripsi kursus"
                            value="{{ old('description') }}" />
                    </div>
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
