@extends('layouts.backend.app', ['title' => 'Kursus'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('member.course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-card-form title="EDIT KURSUS" url="{{ route('member.course.index') }}" titleBtn="Update Kursus">
                    <div class="card-body">
                        <x-input title="Judul" type="text" name="name" placeholder="Masukkan judul kursus"
                            value="{{ $course->name }}" />
                        <div class="row">
                            <div class="col-6">
                                <x-select title="Category" name="category_id">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($course->category_id == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="col-6">
                                <x-input title="Demo" type="text" name="demo" placeholder="Masukkan demo url kursus"
                                    value="{{ $course->demo }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <x-input title="Harga" type="number" name="price" placeholder="Masukkan harga kursus"
                                    value="{{ $course->price }}" />
                            </div>
                            <div class="col-6">
                                <x-input title="Diskon" type="number" name="discount" placeholder="Masukkan diskon kursus"
                                    value="{{ $course->discount }}" />
                            </div>
                        </div>
                        <x-upload-file title="Cover" name="image" value="{{ $course->image }}" />
                        <x-textarea title="Deskripsi" name="description" placeholder="Masukkan deskripsi kursus"
                            value="">
                            {{ $course->description }}</x-textarea>
                    </div>
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
