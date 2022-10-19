@extends('layouts.backend.app', ['title' => 'Review'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h1 class="card-title">LIST REVIEW</h1>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Course</th>
                                <th>User</th>
                                <th>Rating</th>
                                <th>Review</th>
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
                </div>
            </div>
        </div>
    </div>
@endsection
