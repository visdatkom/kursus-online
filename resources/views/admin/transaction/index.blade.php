@extends('layouts.backend.app', ['title' => 'Category'])

@section('content')
    <div class="row">
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
                                <th>Customer</th>
                                <th>Course</th>
                                <th class="text-right">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $i => $transaction)
                                <tr>
                                    <td>{{ $transactions->firstItem() + $i }}</td>
                                    <td>{{ $transaction->invoice }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>
                                        @foreach ($transaction->details as $transactionDetails)
                                            {{ $transactionDetails->course->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ moneyFormat($transaction->grand_total) }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="font-weight-bold text-uppercase">
                                    Grand Total
                                </td>
                                <td class="font-weight-bold text-success text-right">
                                    {{ moneyFormat($grandTotal) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
