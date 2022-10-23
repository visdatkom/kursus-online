@extends('layouts.backend.app', ['title' => 'Dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="alert alert-dark">
                <i class="fas fa-user mr-1"></i> Selamat Datang Kembali,
                <span class="text-danger">
                    {{ Auth::user()->name }}
                </span>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-lightblue">
                <div class="inner">
                    <h3>
                        {{ $course }}
                    </h3>
                    <p>Course</p>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop" width="48"
                        height="48" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="3" y1="19" x2="21" y2="19"></line>
                        <rect x="5" y="6" width="14" height="10" rx="1"></rect>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3>
                        {{ $showcase }}
                    </h3>
                    <p>Showcase</p>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-source-code " width="48"
                        height="48" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14.5 4h2.5a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-10a3 3 0 0 1 -3 -3v-5"></path>
                        <path d="M6 5l-2 2l2 2"></path>
                        <path d="M10 9l2 -2l-2 -2"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3>
                        {{ $review }}
                    </h3>
                    <p>Review</p>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-2" width="48"
                        height="48" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3">
                        </path>
                        <line x1="8" y1="9" x2="16" y2="9"></line>
                        <line x1="8" y1="13" x2="14" y2="13"></line>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>
                        {{ $transaction }}
                    </h3>
                    <p>Transaction</p>
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
        @can('author')
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-tax"
                            width="48" height="48" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="9" y1="14" x2="15" y2="8"></line>
                            <circle cx="9.5" cy="8.5" r=".5" fill="currentColor"></circle>
                            <circle cx="14.5" cy="13.5" r=".5" fill="currentColor"></circle>
                            <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2"></path>
                        </svg>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
