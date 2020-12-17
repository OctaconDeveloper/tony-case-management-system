@extends('admin.layouts.app')
@section('content')
@php
if (Session::has('notice'))
{
    $notice = Session::get('notice');
}
else 
{
    $notice = null;
}
@endphp

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <h2 class="card-title">Register new case proceedings</h2>
                    @if (!$notice)
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Enter Court NoticeID</h4>
                                </div> 
                                <div class="card-content">
                                <div class="card-body"> 
                                    <form class="form form-vertical" method="post" action="/searchnotice">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    @include('layouts.errors')
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" name="notice_id" placeholder="Enter Notice ID" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div class="position-relative has-icon-left">
                                                            <button class="btn btn-md btn-success">
                                                                Search Notice
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($notice)

                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <form class="form form-vertical" method="post" action="/savecase">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    @include('layouts.errors')
                                                    @include('layouts.success')
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">TITLE OF NOTICE</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Provide a title for the notice</small>
                                                            <input type="text" id="last-name-icon" class="form-control" value="{{ strtoupper($notice->title_of_notice ?? '')  }}" readonly>
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
                                                            @php
                                                                $array = explode(",", $notice->plaintiffs ?? '');
                                                                $plaintiffs= '';
                                                                if($array)
                                                                {
                                                                    foreach($array as $key => $arr)
                                                                    {
                                                                        $plaintiffs.= ($key+1).'. '. ucwords($arr)."\n";
                                                                    }
                                                                }
                                                            @endphp
                                                            <textarea class="form-control" rows="5" style="resize: none" readonly>{!! $plaintiffs !!} </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">PLAINTIFF's COUNSEL</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Solicitor of the palintiff seperated by comma</small>
                                                        @php
                                                            $array = explode(",", $notice->plaintiffs_counsel ?? '');
                                                            $plaintiffs_counsel= '';
                                                            if($array)
                                                            {
                                                                foreach($array as $key => $arr)
                                                                {
                                                                    $plaintiffs_counsel.= ($key+1).'. '. ucwords($arr)."\n";
                                                                }
                                                            }
                                                        @endphp
                                                            <textarea class="form-control" rows="5" style="resize: none" readonly>{!! $plaintiffs_counsel !!} </textarea>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">PLAINTIFF COUNSEL'S CHAMBER</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Law firm that the plaintiff's lawyer(s) belongs to</small>
                                                            <textarea class="form-control" rows="3" style="resize: none" readonly>{{$notice->plaintiffs_counsel_chanber ?? ''}}</textarea>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">DEFENDANTS</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Enter defendant's names seperated by comma</small>
                                                        @php
                                                            $array = explode(",", $notice->defendants ?? '');
                                                            $defendants= '';
                                                            if($array)
                                                            {
                                                                foreach($array as $key => $arr)
                                                                {
                                                                    $defendants.= ($key+1).'. '. ucwords($arr)."\n";
                                                                }
                                                            }
                                                        @endphp
                                                            <textarea class="form-control" rows="5" style="resize: none" readonly>{!! $defendants !!} </textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">DEFENDANT's COUNSEL</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Solicitor of the palintiff seperated by comma</small>
                                                            <textarea class="form-control" name="defendants_counsel" rows="5" style="resize: none" required placeholder="(E.g) Tony Stark, Bello Ahmmed, Ngozi Aliegbu"></textarea>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">DEFENDANT COUNSEL'S CHAMBER</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Law firm that the plaintiff's lawyer(s) belongs to</small>
                                                            <textarea class="form-control" name="defendants_counsel_chanber" required rows="5" style="resize: none" placeholder="MM Adamu Lega Chambers"></textarea>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-icon">DESCRIPTION</label>
                                                        <div class="position-relative has-icon-left">
                                                            <small style="color:red">Incase of multiple descriptions, seperate each description by a comma.</small>
                                                            <textarea rows="7" class="form-control" style="resize:none" readonly>{{ $notice->description?? '' }} </textarea>
                                                        </div>
                                                        <input type="hidden" name="notice_id" value="{{$notice->id}}" />
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
                    @endif
                </div>
            </section>
        </div>
    </div>
</div>
</div>
    

@endsection