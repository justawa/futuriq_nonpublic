@extends('layouts.dashboard')
@section('page-heading', 'Dashboard')

{{-- @section('quick-side-section')
<div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
  <ul class="quick-links ml-auto">
    <li><a href="#">Login Time : 12:00 AM</a></li>
  </ul>
</div>
@endsection --}}

@section('content')
<div class="row mt-3">
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h4 class="card-title mb-3">Stock View</h4>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Certificate Class</th>
                    <th>1Yr</th>
                    <th>2Yrs</th>
                    <th>3Yrs</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Class 3 General</td>
                    <td>923</td>
                    <td>923</td>
                    <td>923</td>
                  </tr>
                  <tr>
                    <td>Class 3 General</td>
                    <td>923</td>
                    <td>923</td>
                    <td>923</td>
                  </tr>
                  <tr>
                    <td>Class 3 General</td>
                    <td>923</td>
                    <td>923</td>
                    <td>923</td>
                  </tr>
                  <tr>
                    <td>Class 3 General</td>
                    <td>923</td>
                    <td>923</td>
                    <td>923</td>
                  </tr>
                  <tr>
                    <td>Class 3 General</td>
                    <td>923</td>
                    <td>923</td>
                    <td>923</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body text-center">
            <img class="img-fluid" src="{{ asset('images/chart.jpg') }}">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



            
          
          