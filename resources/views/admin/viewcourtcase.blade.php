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
                                <h4 class="card-title">Court Cases</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr> 
                                                    <th>#</th>
                                                    <th>Case No.</th>
                                                    <th>Case</th>
                                                    <th>Judge</th>
                                                    <th>Plaintiff(s)</th>
                                                    <th>Defendant(s)</th>
                                                    <th>Status</th> 
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>  
                                            <tbody>
                                                @forelse ($cases as $key => $item)
                                                     <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{ $item->court_file_no }}</td>
                                                        <td>{{ ucfirst($item->title_of_notice)}}</td>
                                                        <td>
                                                            @if($item->judge)
                                                                {{ 
                                                                    $item->judge ? ucfirst($item->judge->last_name).' '. ucfirst($item->judge->first_name): null
                                                                }}
                                                            @endif
                                           
                                                        </td>
                                                        <td>{{ ucwords($item->plaintiffs)}} </td>
                                                        <td>{{ ucwords($item->defendants)}} </td>
                                                        <td>
                                                            <?php 
                                                            switch ($item->status) {
                                                                case 0: print_r("In Progress");
                                                                    break;
                                                                
                                                                case 1: print_r("Case Adjourned");
                                                                    break;
                                                                    
                                                                case 2: print_r("Case Closed");
                                                                    break;
                                                                
                                                                default:
                                                                    print_r("In Progress");
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td> 
                                                            @if ($item->status < 2)
                                                            <button class="btn-sm btn btn-outline-dark opemModal" onClick="openModal('{{$item->court_file_no }}','{{$item->id }}')"  data-toggle="modal" data-target="#dark">
                                                               Update Case 
                                                            </button>
                                                                
                                                            @endif
                                                            
                                                        </td>
                                                        <td>
                                                            <a href="/viewcase/{{ $item->id}}" target="_blank"> 
                                                                    <button class="btn-sm btn btn-success" title="View {{ucwords(str_replace("-"," ", $item->court_file_no))}}">
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
                <h5 class="modal-title" id="myModalLabel150">Update Court Case</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/updatecase">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="first-name-icon">Case Number</label>
                            <div class="position-relative has-icon-left">
                                <input type="hidden" name="court_case_id" id="court_case_id" />
                                <input type="text" id="court_case_file" class="form-control" name="court_case_file" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="password-icon">Summary</label>
                            <div class="position-relative has-icon-left">
                                <textarea class="form-control" name="summary" required rows="9" style="resize: none" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="password-icon">Case Status</label>
                            <div class="position-relative has-icon-left">
                                <select class="form-control" name="status" required>
                                    <option value="0">In Progress</option>
                                    <option value="1">Case Adjourned</option>
                                    <option value="2">Case Closes</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="modal-footer">
                    <button type="submit" class="btn btn-dark" >Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('jquery.min.js') }}" ></script>
<script tyle="text/javascript"> 
  

    function openModal($casefile,$caseid)
    {
        document.getElementById("court_case_id").value = $caseid;
        document.getElementById("court_case_file").value = $casefile;
        
    }
</script>