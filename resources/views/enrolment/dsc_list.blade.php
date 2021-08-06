@extends('layouts.dashboard')

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
              <div class="col pr-md-0"><input type="text" class="form-control" placeholder=""></div>
              <div class="col pr-md-0 d-flex">
                <label for="">From</label> &nbsp;<input type="date" class="form-control" id="" name="">
              </div>
              <div class="col pr-md-0 d-flex">
                <label for="">To</label> &nbsp;<input type="date" class="form-control" id="" name="">
              </div>
              <div class="col"><a href="#" class="btn-view">View</a></div>
            </div>
            <div class="d-flex justify-content-end bd-highlight mb-3">
              <div class="p-2 bd-highlight">Total No of Records</div>
              <div class="p-2 bd-highlight"><input type="text" class="form-control" placeholder=""></div>
              <div class="p-2 bd-highlight"><a href="#" class="btn-export">Export</a></div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <form id="search_by_application_id" class="row">
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
                    <th scope="col">Select</th>
                    <th scope="col">Application ID</th>
                    <th scope="col">PAN</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">PIN</th>
                    <th scope="col">State</th>
                    <th scope="col">ORG Name</th>
                    <th scope="col">Certificate Class</th>
                    <th scope="col">Certificate Validity</th>
                    <th scope="col">eKYC Id</th>
                    <th scope="col">eSign Status</th>
                    <th scope="col">Video Status</th>
                    <th scope="col">RA Verfication on Status</th>
                    <th scope="col">Action</th>
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
                      <td></td>
                      <td><span class="btn-done"> Done</span> <a class="btn-pending" href=""> Pending</a> <a class="btn-resend" href=""> Resend OTP</a></td>
                      <td>
                        <span class="btn-done"> Done</span> <a class="btn-pending" href=""> Pending</a> <a class="btn-resend" target="_blank" href="{{ route('vidoerecord') }}"> Resend Video Link</a>
                      </td>
                      <td><span class="btn-done"> Done</span> <a class="btn-pending" href=""> Pending</a></td>
                      <td><span class="btn-done"> <i class="fa fa-check" aria-hidden="true"></i></span> <a class="btn-reject" href=""> <i class="fa fa-times" aria-hidden="true"></i></a> <a class="btn-edit" href=""> <i class="fa fa-pencil" aria-hidden="true"></i></a></td>
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
          