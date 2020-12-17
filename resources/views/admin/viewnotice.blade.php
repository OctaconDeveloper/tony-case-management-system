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
                                <h4 class="card-title">Court Notices</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr> 
                                                    <th>#</th>
                                                    <th>Suit No.</th>
                                                    <th>Title</th>
                                                    <th>Judge</th>
                                                    <th>Court</th>
                                                    <th>Town</th> 
                                                    <th>State</th> 
                                                    <th>Registrar</th>
                                                    <th>Date</th> 
                                                    <th></th>
                                                </tr>
                                            </thead>  
                                            <tbody>
                                                @forelse ($notices as $key => $item)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{ $item->case_file_no }}</td>
                                                        <td>{{ ucfirst($item->title_of_notice)}}</td>
                                                        <td>
                                                            @if($item->judge)
                                                                {{ 
                                                                    $item->judge ? ucfirst($item->judge->last_name).' '. ucfirst($item->judge->first_name): null
                                                                }}
                                                            @else 
                                                            <button class="btn-sm btn btn-outline-dark opemModal" onClick="openModal('{{$item->case_file_no }}','{{$item->id }}','{{$item->court_name->judges }}')"  data-toggle="modal" data-target="#dark">
                                                                Assign Judge
                                                            </button>
                                                            @endif
                                           
                                                        </td>
                                                        <td>{{ ucwords(str_replace("-"," ", $item->court_name->type))}} </td>
                                                        <td>{{ ucfirst($item->court_name->town)}}</td>
                                                        <td>{{ ucfirst($item->court_name->state)}}</td>
                                                        <td>
                                                            {{ 
                                                                $item->registrar ? ucfirst($item->registrar->last_name).' '. ucfirst($item->registrar->first_name): null
                                                            }}
                                                        </td>
                                                        <td>{{ ucfirst($item->date_of_appearance)}}</td>
                                                        <td>
                                                            <a href="/viewnotice/{{ $item->id}}" target="_blank"> 
                                                                <button class="btn-sm btn btn-success" title="View {{ucwords(str_replace("-"," ", $item->case_file_no))}}">
                                                                    <i class="fa fa-eye"></i>
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
                <h5 class="modal-title" id="myModalLabel150">Assign a Judge to this notice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/addjudge">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="first-name-icon">Suit Number</label>
                            <div class="position-relative has-icon-left">
                                <input type="hidden" name="notice_id" id="notice_id" />
                                <input type="text" id="notice_case_file" class="form-control" name="notice_case_file" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="password-icon">Available Judge</label>
                            <div class="position-relative has-icon-left">
                                <select class="form-control" name="court_judge" id="court_judge">
                                </select> 
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

<script src="{{ asset('jquery.min.js') }}" ></script>
<script tyle="text/javascript"> 
  

    function openModal($casefile,$caseid,$arrayOfCourt)
    {
        document.getElementById("notice_id").value = $caseid;
        document.getElementById("notice_case_file").value = $casefile;
        select = document.getElementById('court_judge');
        $arrayCourt = JSON.parse($arrayOfCourt);
        for (var i = 1; i<= $arrayCourt.length; i++){
            var opt = document.createElement('option');
            opt.value = $arrayCourt[i].id;
            opt.innerHTML = $arrayCourt[i].first_name+' '+$arrayCourt[i].last_name;
            select.appendChild(opt);
        }
    }
</script>