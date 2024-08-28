@extends('layouts.backend.app', ['title' => 'Ulasan'])

@section('content')
    <div class="row">
        <div class="col-12">
            <x-input-search :url="route('admin.review.index')" placeholder="Search..." />
        </div>
        <div class="col-12">
            <x-card title="DAFTAR FEEDBACK">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>KURSUS</th>
                            <th>USER</th>
                            <th>PERINGKAT</th>
                            <th>FEEDBACK</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $i => $review)
                            <tr>
                                <td>{{ $reviews->firstItem() + $i }}</td>
                                <td>{{ $review->course->name }}</td>
                                <td>{{ $review->user->name }}</td>
                                <td>{{ $review->rating }}</td>
                                <td>{{ $review->review }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-card>
            <div class="d-flex justify-content-end">
                {{ $reviews->links() }}
            </div>
        </div>
    </div>
@endsection
