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
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Administrator Lists</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr> 
                                                    <th>#</th>
                                                    <th>Last Name</th>
                                                    <th>First Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Role</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($users as $key=> $item)
                                                    <tr>
                                                        <td>{{$key + 1}}</td>
                                                        <td>{{ ucfirst($item->last_name)}}</td>
                                                        <td>{{ ucfirst($item->first_name)}}</td>
                                                        <td>{{ ucfirst($item->email)}}</td>
                                                        <td>{{ $item->phone}}</td>
                                                        <td>{{ ucwords(str_replace("-"," ", $item->role))}}</td>
                                                        <td>
                                                            <a href="/deleteuser/{{ $item->id}}">
                                                                <button class="btn-sm btn btn-danger" title="Delete {{ucfirst($item->email)}}">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                                @empty
                                                    
                                                @endforelse
                                            </tbody>
                                            <tfoot>
                                                <th></th>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Role</th>
                                                <th></th>
                                                <th></th>
                                            </tfoot>
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

@endsection