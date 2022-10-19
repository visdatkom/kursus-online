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
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-none">
                <span class="info-box-icon bg-info">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop nav-icon"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="3" y1="19" x2="21" y2="19"></line>
                        <rect x="5" y="6" width="14" height="10" rx="1">
                        </rect>
                    </svg>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">My Course</span>
                    <span class="info-box-number">{{ $category }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-none">
                <span class="info-box-icon bg-info">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop nav-icon"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="3" y1="19" x2="21" y2="19"></line>
                        <rect x="5" y="6" width="14" height="10" rx="1">
                        </rect>
                    </svg>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Showcase</span>
                    <span class="info-box-number">{{ $category }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-none">
                <span class="info-box-icon bg-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12">
                        </path>
                        <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path>
                    </svg>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Transaction</span>
                    <span class="info-box-number">{{ $category }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
