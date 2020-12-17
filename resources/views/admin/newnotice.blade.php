@extends('admin.layouts.app')
@section('content')
@php
    $courts  = \App\Models\Court::all();
    $cases  = \App\Models\CaseCategory::all();
@endphp

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
                                <h4 class="card-title">Issue a new notice of appearance</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <form class="form form-vertical" method="post" action="/savenotice">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    @include('layouts.errors')
                                                    @include('layouts.success')
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="password-icon">COURT</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Select the court juridiction for the notice</small>
                                                            <select class="form-control" name="court">
                                                                @forelse ($courts as $item)
                                                                <option value="{{$item->id}}">
                                                                    {{ ucwords(str_replace("-"," ", $item->type)).' (' .ucfirst($item->state).')' }}
                                                                </option>
                                                                     
                                                                @empty
                                                                    
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="password-icon">CASE TYPE</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Select the case type for the notice</small>
                                                            <select class="form-control" name="case_type">
                                                                @forelse ($cases as $item)
                                                                <option value="{{$item->id}}">
                                                                    {{ ucwords(str_replace("-"," ", $item->name)) }}
                                                                </option>
                                                                     
                                                                @empty
                                                                    
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">DATE OF APPEARANCE</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Enter the date of first hearing</small>
                                                            <input type="date" id="last-name-icon" class="form-control" name="date_of_appearance" placeholder="12/09/2026">
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">PLAINTIFFS</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Enter plaintiff's names seperated by comma</small>
                                                            <textarea class="form-control" name="plaintiffs" rows="3" style="resize: none" placeholder="(E.g) Tony Stark, Bello Ahmmed, Ngozi Aliegbu"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">PLAINTIFF's COUNSEL</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Solicitor of the palintiff seperated by comma</small>
                                                            <textarea class="form-control" name="plaintiffs_counsel" rows="3" style="resize: none" placeholder="(E.g) Tony Stark, Bello Ahmmed, Ngozi Aliegbu"></textarea>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">PLAINTIFF COUNSEL'S CHAMBER</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Law firm that the plaintiff's lawyer(s) belongs to</small>
                                                            <textarea class="form-control" name="plaintiffs_counsel_chanber" rows="3" style="resize: none" placeholder="MM Adamu Lega Chambers"></textarea>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">DEFENDANTS</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Enter defendant's names seperated by comma</small>
                                                            <textarea class="form-control" name="defendants" rows="3" style="resize: none" placeholder="(E.g) Tony Stark, Bello Ahmmed, Ngozi Aliegbu"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">TITLE OF NOTICE</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Provide a title for the notice</small>
                                                            <input type="text" id="last-name-icon" class="form-control" name="title_of_notice" placeholder="Title of Notice">
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-icon">DESCRIPTION</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Incase of multiple descriptions, seperate each description by a comma.</small>
                                                            <textarea rows="7" class="form-control" style="resize:none" name="description" placeholder="(E.g) The defendant stole my money, The defendant sexually abused me."></textarea>
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