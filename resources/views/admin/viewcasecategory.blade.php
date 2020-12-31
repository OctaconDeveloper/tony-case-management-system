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
                                <h4 class="card-title">Case Categories</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr> 
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Slug</th>
                                                    <th>Description</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($cases as $key => $item)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{ ucfirst($item->name)}}</td>
                                                        <td>{{ $item->slug}}</td>
                                                        <td>{{ ucfirst($item->description)}}</td>
                                                        @if (isAdmin())
                                                            <td>
                                                                <a href="/deletecasecategory/{{ $item->id}}">
                                                                    <button class="btn-sm btn btn-danger" title="Delete {{ ucfirst($item->name) }}">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </a>
                                                            </td>
                                                        @endif
                                                        
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

@endsection