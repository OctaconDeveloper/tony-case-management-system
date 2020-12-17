@extends('admin.layouts.app')
@section('content')
@php
    $judges  = \App\Models\User::whereRole('court-judge')->get();
@endphp


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">

            <div class="card-header">
                <h4 class="card-title">{{ ucwords(str_replace("-"," ", $id->type))}}</h4>
            </div>

            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <div class="col-md-4 col-12">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-icon">Court Type</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="last-name-icon" class="form-control" name="address" value="{{ ucwords(str_replace("-"," ", $id->type))}}" readonly>
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
                                                        <input type="text" id="last-name-icon" class="form-control" name="address" value="{{ucfirst($id->address)}}" readonly>
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
                                                        <input type="text" id="email-id-icon" class="form-control" name="town" value="{{ucfirst($id->town)}}" readonly>
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
                                                        <input type="text" id="contact-info-icon" class="form-control" name="state" value="{{ucfirst($id->state)}}" readonly>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-hash"></i>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-icon">Court Registrar</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="contact-info-icon" class="form-control" name="state" 
                                                        value="{{ucfirst($id->registrar->last_name)." ".ucfirst($id->registrar->first_name)}}" 
                                                        readonly>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 
                    <div class="col-md-8 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Court Judges</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#dark">
                                        Add Judge
                                    </button>

                                    <div class="table-responsive">

                                        @include('layouts.errors')
                                        @include('layouts.success')
                                        
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr> 
                                                    <th>#</th>
                                                    <th>Last Name</th>
                                                    <th>First Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($id->judges  as $key=> $item)
                                                    <tr>
                                                        <td>{{$key + 1}}</td>
                                                        <td>{{ ucfirst($item->last_name)}}</td>
                                                        <td>{{ ucfirst($item->first_name)}}</td>
                                                        <td>{{ ucfirst($item->email)}}</td>
                                                        <td>{{ $item->phone}}</td>
                                                        <td>
                                                            <a href="/removejudge/{{$id->id}}/{{ $item->id}}">
                                                                <button class="btn-sm btn btn-danger" title="Delete {{ucfirst($item->email)}}">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                                @empty
                                                    
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            </div> 
        </div>
    </div>

        <div class="modal fade text-left" id="dark" tabindex="-1" role="dialog" aria-labelledby="myModalLabel150" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark white">
                        <h5 class="modal-title" id="myModalLabel150">Add New Judge</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/savejudge">
                        @csrf
                        <div class="modal-body">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-icon">Court Type</label>
                                    <div class="position-relative has-icon-left">
                                        <input hidden name="court_id" value="{{$id->id}}"/>
                                        <input type="text" id="last-name-icon" class="form-control" name="address" value="{{ ucwords(str_replace("-"," ", $id->type))}}" readonly>
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark" >Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

  
@endsection