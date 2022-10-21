@extends('layouts.backend.app', ['title' => 'Category'])

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.transaction.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search transaction by status.."
                        value="{{ request()->search }}" name="search">
                    <span class="input-group-append">
                        <button type="button" class="btn btn-dark">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h1 class="card-title">LIST TRANSACTION</h1>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Invoice</th>
                                <th>Email</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $i => $transaction)
                                <tr>
                                    <td>{{ $transactions->firstItem() + $i }}</td>
                                    <td>{{ $transaction->invoice }}</td>
                                    <td>{{ $transaction->user->email }}</td>
                                    <td>
                                        <sup>Rp</sup> {{ moneyFormat($transaction->grand_total) }}
                                    </td>
                                    <td>
                                        @if ($transaction->status == 'pending')
                                            <span class="badge badge-danger">{{ $transaction->status }}</span>
                                        @elseif($transaction->status == 'success')
                                            <span class="badge badge-success">{{ $transaction->status }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $transaction->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.transaction.show', $transaction->id) }}"
                                            class="btn btn-primary btn-sm">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end">{{ $transactions->links() }}</div>
        </div>
    </div>
@endsection
