@extends('layouts.backend.app', ['title' => 'Video'])

@section('content')
    <a href="{{ route('member.course.index') }}" class="btn btn-danger mb-3">
        <i class="fas fa-arrow-left mr-1"></i> KEMBALI
    </a>
    <x-button-create title="TAMBAH EPISODE BARU" :url="route('member.video.create', $course->slug)" />

    <x-card title="DAFTAR EPISODE EPISODE - {{ $course->name }}">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="10">EPS</th>
                    <th>JUDUL</th>
                    <th>TIPE</th>
                    <th>AKSI</th>
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
                            <x-button-edit :url="route('member.video.edit', [$course->slug, $video->id])" />
                            <x-button-delete :id="$video->id" :url="route('member.video.destroy', $video->id)" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>
@endsection
