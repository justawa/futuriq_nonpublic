@extends('layouts.dashboard')

@section('page-heading', 'Add Partner')

@section('content')
<div class="row mt-3">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{ route('partner.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="d-flex justify-content-between">
                <h4 class="card-title">Add Partner</h4>
              </div>
              <hr>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> Type </div>
                <div class="col-lg-8">
                  <select class="form-control" name="type">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                  </select>
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> PAN </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="APAPG6697Q" name="pan">
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> Name </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Sachin Gupta" name="name">
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> Email </div>
                <div class="col-lg-8">
                  <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> Phone </div>
                <div class="col-lg-8">
                  <input type="tel" class="form-control" placeholder="Phone" name="phone">
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> Address </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Address" name="address">
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> PIN Code </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="110023" name="pincode">
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> State </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="State" name="state">
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> GST No </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="GST No" name="gst_no">
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> ORG Name </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="ORG Name" name="org_name">
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> Upload ID and Address Proof & GST Cert </div>
                <div class="col-lg-8">
                  <input type="file" id="myfile" name="proof_file">
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"> Comment </div>
                <div class="col-lg-8">
                  <textarea type="text" class="form-control" placeholder="Comment" name="comment"></textarea>
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"><a href="#" class="btn-genrate" type="submit">Generate OTP</a> </div>
                <div class="col-lg-8"><input type="text" class="form-control" placeholder="OTP"></div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-lg-4"><button class="btn-form" type="submit">Submit</button> </div>
                <div class="col-lg-8  text-right"><button class="btn-form" type="submit">Submit but OTP Later</button></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection