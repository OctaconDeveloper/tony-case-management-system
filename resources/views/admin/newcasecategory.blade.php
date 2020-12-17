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
                                <h4 class="card-title">Add New Case Category</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <form class="form form-vertical" method="post" action="/savecasetype">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    @include('layouts.errors')
                                                    @include('layouts.success')
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Case Title</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="last-name-icon" class="form-control" name="case_title" placeholder="Case Title">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-hash"></i>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-icon">Case Description</label>
                                                        <div class="position-relative has-icon-left">
                                                            <textarea class="form-control"  rows="15" placeholder="Case Description" name="case_description"></textarea>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-hash"></i>
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