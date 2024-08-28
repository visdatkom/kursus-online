@extends('layouts.backend.app', ['title' => 'Episode'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('member.video.store', $course->slug) }}" method="POST">
                @csrf
                <x-card-form title="BUAT EPISODE BARU" :url="route('member.video.index', $course->id)" titleBtn="Buat Episode">
                    <x-input title="Judul" name="name" type="text" placeholder="Masukkan judul episode" :value="old('name')" />
                    <div class="row">
                        <div class="col-6">
                            <x-input title="Episode" name="episode" type="text" placeholder="Masukkan episode video"
                                :value="old('episode')" />
                        </div>
                        <div class="col-6">
                            <x-input title="Url Video" name="video_code" type="text" placeholder="Masukkan url video"
                                :value="old('video_code')" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="duration">Tipe</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="intro" value="0" checked>
                            <label class="form-check-label">Free</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="intro" value="1">
                            <label class="form-check-label">Premium</label>
                        </div>
                    </div>
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
