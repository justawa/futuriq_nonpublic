@extends('layouts.app')
<link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
		<link href="css/style1.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
@section('style')
<style>
  #lightbox .modal-content {
    display: inline-block;
    text-align: center;   
  }

  #lightbox .close {
    opacity: 1;
    color: rgb(255, 255, 255);
    background-color: rgb(25, 25, 25);
    padding: 5px 8px;
    border-radius: 30px;
    border: 2px solid rgb(255, 255, 255);
    position: absolute;
    top: -15px;
    right: -55px;
    z-index:1032;
  }

  a {
    color: #0060B6;
    text-decoration: none;
}

a:hover {
    color:#00A0C6; 
    text-decoration:none; 
    cursor:pointer;  
}

#view_video {
   background-color: aquamarine;
}
</style>
@endsection

@section('page-heading', 'DSC Queue')

@section('content')
<div class="row mt-3">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row row-cols-auto mb-3">
              <div class="col pr-md-0">Quick Seach</div>
              <div class="col pr-md-0">
                <select class="selectpicker form-control">
                  <option>Name</option>
                  <option>PAN</option>
                  <option>Phone</option>
                  <option>Email</option>
                  <option>ORG Name</option>
                  <option>eSign Pending</option>
                  <option>eSign & Video Pending</option>
                  <option>Video Pending</option>
                  <option>RA Verification Pending</option>
                </select>
              </div>
              <div class="col pr-md-0"><input type="text" class="form-control" placeholder="" name="search"></div>
              <div class="col pr-md-0 d-flex">
                <label for="">From</label> &nbsp;<input type="date" class="form-control" id="" name="">
              </div>
              <div class="col pr-md-0 d-flex">
                <label for="">To</label> &nbsp;<input type="date" class="form-control" id="" name="">
              </div>
              <div class="col"><a href="#" class="btn-view">View</a></div></div>
            </div>
            <div class="d-flex justify-content-end bd-highlight mb-3">
              <div class="p-2 bd-highlight">Total No of Records</div>
              <div class="p-2 bd-highlight"><input type="text" class="form-control" placeholder=""></div>
              <div class="p-2 bd-highlight"><a href="#" class="btn-export">Export</a></div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <form name="searchform" action="{{ route('enrolment.all_list') }}" method="get">
                  {{ csrf_field() }}
                  <div class="col-md-9">
                    <div class="form-group">
                      <input type="text" name="application_id" placeholder="Application ID" class="form-control" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Find</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                  <tr>
                     <th>Select</th>
                     <th>PAN</th>
                     <th>Name</th>
								     <th>eMail ID</th>
								     <th>Phone</th>
								     <th>PIN </th>
								     <th>State</th>
								     <th>ORG Name</th>
								     <th>Certificate Class</th>
								     <th>Certificate Validity</th>
								     <th>eKYC ID</th>
								     <th>Applicant VIDEO</th>
								     <th>Auth.Signatory Video and Docs</th>
								     <th>L2 Approval</th>
                  </tr>
                </thead>
                <tbody id="dsc-list-dynamic-body">
                  @if($enrolments->count() > 0)
                    @foreach($enrolments as $enrolment)

                    <tr>
                      <td><input type="checkbox" /></td>
                      <td><a href="{{ route('enrolment.steps.completed', $enrolment->application_id) }}">{{ $enrolment->application_id }}</a></td>
                      <td>{{ $enrolment->pan }}</td>
                      <td>{{ $enrolment->name }}</td>
                      <td></td>
                      <td>{{ $enrolment->mobile }}</td>
                      <td>{{ $enrolment->pin }}</td>
                      <td>{{ $enrolment->state }}</td>
                      <td></td>
                      <td>{{ $enrolment->certification_class }}</td>
                      <td>{{ $enrolment->validity }}</td>
                      <td>
                         @if(empty($enrolment->video_approval_status))
                          <a class="btn btn-primary btn-sm" href="{{ url('enrolment/change_status/' . "vid_status" . "/" . $enrolment->id ."/" . "1") }}">
                              <span class="badge badge-success">Done</span>                           
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ url('enrolment/change_status/' . "vid_status" . "/" . $enrolment->id ."/" . "2") }}">
                             <span class="badge badge-danger">Rejected</span>
                          </a>
                        @else
                                @if($enrolment->video_approval_status == "1")
                                    <span class="badge badge-success">Done</span>
                                @else 
                                    <span class="badge badge-danger">Rejected</span>

                                @endif                         
                          @endif
                      </td>
                      
                        <td>
                         {{-- @if(empty($enrolment->signature_approval_status))
                          <a class="btn btn-primary btn-sm" href="{{ url('enrolment/change_status/' . "sig_status" . "/" . $enrolment->id ."/" . "1") }}">
                              <span class="badge badge-success">Done</span>                           
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ url('enrolment/change_status/' . "sig_status" . "/" . $enrolment->id ."/" . "2") }}">
                             <span class="badge badge-danger">Pending</span>
                          </a>
                        @else
                                @if($enrolment->signature_approval_status == "1")
                                    <span class="badge badge-success">Done</span>
                                @else 
                                    <span class="badge badge-danger">Pending</span>

                                @endif                         
                          @endif --}}
                                    <span class="badge badge-success">Done</span>
                                    <span class="badge badge-danger">Pending</span>


                      </td>

                       <td>
                         {{-- @if(empty($enrolment->l2_approval_status))
                          <a class="btn btn-primary btn-sm" href="{{ url('enrolment/change_status/' . "l2_status" . "/" . $enrolment->id ."/" . "1") }}">
                              <span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>                           
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ url('enrolment/change_status/' . "l2_status" . "/" . $enrolment->id ."/" . "2") }}">
                             <span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                          </a>
                        @else
                                @if($enrolment->l2_approval_status == "1")
                                    <span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                                @else 
                                    <span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>

                                @endif                         
                          @endif --}}

                                    <span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    <span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>

                      </td>
                              </tr>
                    @endforeach
                  @else
                    <tr><td colspan="15">No Enrolments</td></tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="modal-content">
            <div class="modal-body">
                <img class="img-fluid" src="" alt="" />
            </div>
        </div>
    </div>
</div>
@endsection
          