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
                                <h4 class="card-title">Create Administrator</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <form class="form form-vertical" method="post" action="/saveuser">
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
                                                            <input type="text" id="first-name-icon" class="form-control" name="first_name" placeholder="First Name">
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
                                                            <input type="text" id="last-name-icon" class="form-control" name="last_name" placeholder="Last Name">
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
                                                            <input type="email" id="email-id-icon" class="form-control" name="email" placeholder="Email">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-mail"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="contact-info-icon">Phone Number</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="number" id="contact-info-icon" class="form-control" name="phone_number" placeholder="Phone Number">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-smartphone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="password-icon">User Category</label>
                                                        <div class="position-relative has-icon-left">
                                                            <select class="form-control" name="user_category">
                                                                <option value="court-registrar">Court Registrar</option>
                                                                <option value="court-judge"> Court Judge</option>
                                                                <option value="admin">Administrator</option>
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
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