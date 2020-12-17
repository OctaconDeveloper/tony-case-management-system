@extends('admin.layouts.app')
@section('content')
@php
    $registrars  = \App\Models\User::whereRole('court-registrar')->get();
    $judges  = \App\Models\User::whereRole('court-judge')->get();
@endphp

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
                                <h4 class="card-title">Add New Court</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <form class="form form-vertical" method="post" action="/savecourt">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    @include('layouts.errors')
                                                    @include('layouts.success')
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Court Type</label>
                                                        <div class="position-relative has-icon-left">
                                                            <select class="form-control" name="type">
                                                                <option value="supreme-court-of-nigeria">Supreme Court</option>
                                                                <option value="court-of-appeal">Court of Appeal</option>
                                                                <option value="federal-high-court">Federal High Court</option>
                                                                <option value="state-high-court">State High Court</option>
                                                                <option value="national-industrial-court">National Industrial Court</option>
                                                                <option value="sharia-court-of-appeal">Sharia Court of Appeal</option>
                                                                <option value="customary-court-of-appeal">Customary COurt of Appeal</option>
                                                                <option value="magistrate-court">Magistrate Court</option>
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-hash"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Address</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="last-name-icon" class="form-control" name="address" placeholder="Court Address">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-hash"></i>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-icon">Town</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="email-id-icon" class="form-control" name="town" placeholder="Court Town">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-hash"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="contact-info-icon">State</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="contact-info-icon" class="form-control" name="state" placeholder="Court State">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-hash"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="password-icon">Court Judge</label>
                                                        <div class="position-relative has-icon-left">
                                                            <select class="form-control" name="court_judge">
                                                                @forelse ($judges as $item)
                                                                <option value="{{$item->id}}">
                                                                    {{ ucfirst($item->last_name).' ' .ucfirst($item->first_name) }}
                                                                </option>
                                                                    
                                                                @empty
                                                                    
                                                                @endforelse
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="password-icon">Court Registrar</label>
                                                        <div class="position-relative has-icon-left">
                                                            <select class="form-control" name="court_registrar">
                                                                @forelse ($registrars as $item)
                                                                <option value="{{$item->id}}">
                                                                    {{ ucfirst($item->last_name).' ' .ucfirst($item->first_name) }}
                                                                </option>
                                                                    
                                                                @empty
                                                                    
                                                                @endforelse
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