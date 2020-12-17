@extends('admin.layouts.app')
@section('content')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <div class="col-md-8 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Password</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <form class="form form-vertical" method="post" action="/savepassword">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    @include('layouts.errors')
                                                    @include('layouts.success')
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">First Name</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="first-name-icon" class="form-control" readonly value="{{ auth()->user()->first_name}}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Last Name</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="last-name-icon" class="form-control" readonly value="{{ auth()->user()->last_name}}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-icon">Email</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="email" id="email-id-icon" class="form-control" readonly value="{{ auth()->user()->email}}">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-mail"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="contact-info-icon">New Password</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="password" id="contact-info-icon" class="form-control" name="password" placeholder="New Password">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="contact-info-icon">Confirm Password</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="password" id="contact-info-icon" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Update Password</button>
                                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</div>
    

@endsection