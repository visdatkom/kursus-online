@extends('layouts.backend.app', ['title' => 'Revenue'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info">
                <i class="fas fa-info-circle mr-1"></i> INFORMASI : Pembagian revenue adalah 70% dan 30%.
                <hr>
                <p>
                    Untuk member dengan permission membuat coruse, akan mendapatkan pembagian 70% dan pihak Laradev
                    mendapatkan 30%.
                </p>
                <p>
                    Kemudian total earning tersebut akan dikurangi (admin fee / TAX).
                </p>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>
                        {{ $revenues->count() }}
                    </h3>
                    <p>Total Orders</p>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt" width="48"
                        height="48" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>
                        <sup>Rp</sup> {{ moneyFormat($revenueTransaction) }}
                    </h3>
                    <p>Total Transaction</p>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt" width="48"
                        height="48" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>
                        <sup>Rp</sup> {{ moneyFormat($revenueEarning) }}
                    </h3>
                    <p>Total Earning</p>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="48"
                        height="48" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                        <circle cx="14" cy="14" r="2"></circle>
                        <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>
                        <sup>Rp</sup> {{ moneyFormat($revenueTax) }}
                    </h3>
                    <p>Total Earning (After Tax)</p>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-tax" width="48"
                        height="48" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="9" y1="14" x2="15" y2="8"></line>
                        <circle cx="9.5" cy="8.5" r=".5" fill="currentColor"></circle>
                        <circle cx="14.5" cy="13.5" r=".5" fill="currentColor"></circle>
                        <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2"></path>
                    </svg>
                </div>
            </div>
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
                            @foreach ($revenues as $i => $revenue)
                                <tr>
                                    <td>{{ $revenues->firstItem() + $i }}</td>
                                    <td>{{ $revenue->transaction->invoice }}</td>
                                    <td>{{ $revenue->transaction->user->email }}</td>
                                    <td>
                                        <sup>Rp</sup> {{ moneyFormat($revenue->price) }}
                                    </td>
                                    <td>
                                        @if ($revenue->transaction->status == 'pending')
                                            <span class="badge badge-danger">{{ $revenue->transaction->status }}</span>
                                        @elseif($revenue->transaction->status == 'success')
                                            <span class="badge badge-success">
                                                {{ $revenue->transaction->status }}</span>
                                        @else
                                            <span class="badge badge-warning">
                                                {{ $revenue->transaction->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $revenue->created_at }}</td>
                                    <td>
                                        <a href="{{ route('member.revenue.show', $revenue->transaction->id) }}"
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
            <div class="d-flex justify-content-end">{{ $revenues->links() }}</div>
        </div>
    </div>
@endsection
