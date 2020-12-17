@php
    $notice_count = \App\Models\Notice::count();
    $court_count = \App\Models\Court::count();
    $case_count = \App\Models\CourtCase::count();
@endphp
@extends('admin.layouts.app')
        @section('content')

        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- Dashboard Analytics Start -->
                    <section id="dashboard-analytics">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="card bg-analytics text-white">
                                    <div class="card-content">
                                        <div class="card-body text-center">
                                            <img src="{{ asset('app-assets/images/elements/decore-left.png')}}" class="img-left" alt="
                card-img-left">
                                            <img src="{{ asset('app-assets/images/elements/decore-right.png')}}" class="img-right" alt="
                card-img-right">
                                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                                <div class="avatar-content">
                                                    <i class="feather icon-award white font-large-1"></i>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <h1 class="mb-2 text-white">Welcome, {{ ucfirst(auth()->user()->first_name)}}  {{ ucfirst(auth()->user()->last_name)}}  </h1>

                                                <h2 class="mb-2 text-white">
                                                    {{ ucwords(str_replace("-", " ", auth()->user()->role)) }}
                                                </h2>
                                                <p class="m-auto w-75">
                                                    {{ Date('jS F Y')}}
                                                </p>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                                <div class="avatar bg-rgba-primary p-50 m-0">
                                                    <div class="avatar-content">
                                                        <i class="feather icon-users text-primary font-medium-5"></i>
                                                    </div>
                                                </div>
                                                <h2 class="text-bold-700 mt-1 mb-25">{{ number_format($notice_count) }}</h2>
                                                <p class="mb-0">Number of Court Notices</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                                <div class="avatar bg-rgba-primary p-50 m-0">
                                                    <div class="avatar-content">
                                                        <i class="feather icon-users text-primary font-medium-5"></i>
                                                    </div>
                                                </div>
                                                <h2 class="text-bold-700 mt-1 mb-25">{{ number_format($court_count) }}</h2>
                                                <p class="mb-0">Number of Courts</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                                <div class="avatar bg-rgba-primary p-50 m-0">
                                                    <div class="avatar-content">
                                                        <i class="feather icon-users text-primary font-medium-5"></i>
                                                    </div>
                                                </div>
                                                <h2 class="text-bold-700 mt-1 mb-25">{{ number_format($case_count) }}</h2>
                                                <p class="mb-0">Number of Court Cases</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Dashboard Analytics end -->
    
                </div>
            </div>
        </div>
        @endsection