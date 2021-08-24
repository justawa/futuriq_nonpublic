@extends('layouts.dashboard')
@extends('layouts.app')
@section('style')
<style>
.step {
  list-style: none;
  margin: .2rem 0;
  width: 100%;
}

.step .step-item {
  -ms-flex: 1 1 0;
  flex: 1 1 0;
  margin-top: 0;
  min-height: 1rem;
  position: relative; 
  text-align: center;
}

.step .step-item:not(:first-child)::before {
  background: #0069d9;
  content: "";
  height: 2px;
  left: -50%;
  position: absolute;
  top: 9px;
  width: 100%;
}

.step .step-item a {
  color: #acb3c2;
  display: inline-block;
  padding: 20px 10px 0;
  text-decoration: none;
}

.step .step-item a::before {
  background: #0069d9;
  border: .1rem solid #fff;
  border-radius: 50%;
  content: "";
  display: block;
  height: .9rem;
  left: 50%;
  position: absolute;
  top: .2rem;
  transform: translateX(-50%);
  width: .9rem;
  z-index: 1;
}

.step .step-item.active a::before {
  background: #fff;
  border: .1rem solid #0069d9;
}

.step .step-item.active ~ .step-item::before {
  background: #e7e9ed;
}

.step .step-item.active ~ .step-item a::before {
  background: #e7e9ed;
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
                    <th scope="col">Application ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">PAN</th>
                    <th scope="col">Aadhaar</th>
                    <th scope="col">KYC ID</th>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Form Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="list-dynamic-body">
                  <tr>
                    <td>{{ $enrolment->application_id }}</td>
                    <td>{{ $enrolment->name }}</td>
                    <td>{{ $enrolment->email }}</td>
                    <td>{{ $enrolment->pan }}</td>
                    <td>{{ $enrolment->aadhar_no }}</td>
                    <td>{{ $enrolment->pan.'@futuriq.in' }}</td>
                    <td>NA</td>
                    <td>{{ $enrolment->mobile }}</td>
                    <td>{{ $enrolment->created_at }}</td>
                    <td>Pending</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="my-5"> 
              <ul class="step d-flex flex-nowrap">
                <li class="step-item">
                  <a href="#!" class="">Form Submission</a>
                </li>
                <li class="step-item">
                  <a href="#!" class="" data-toggle="modal" data-target="#verifyModal">Mobile Verification</a>
                </li>
                <li class="step-item">
                  <a href="#!" class="" data-toggle="modal" data-target="#verifyModal">Email Verification</a>
                </li>
                <li class="step-item active">
                  <a href="{{ route('vidoerecord') }}" class="">Video Recording</a>
                </li>
                <li class="step-item">
                  <a href="#!" class="">ESign</a>
                </li>
                <li class="step-item">
                  <a href="#!" class="">Enrolment Status</a>
                </li>
                <li class="step-item">
                  <a href="#!" class="">RA Verification</a>
                </li>
                <li class="step-item">
                  <a href="#!" class="">CA Approval</a>
                </li>
                <li class="step-item">
                  <a href="#!" class="">Download</a>
                </li>
              </ul>
            </div>

            <div class="card">
              <div class="card-header text-center">Enrolment Reasons</div>
              <div class="card-body">
                <table class="table table-bordered">
                  <tr>
                    <th>Enrolment ID</th>
                    <th></th>
                  </tr>
                  <tr>
                    <th>Enrolment Status:</th>
                    <th>Enrolment Type: PAN KYC Enrolment Status: Pending Approval</th>
                  </tr>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="verifyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Verify</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <input type="text" name="verifier" class="form-control" placeholder="Your Email" />
          </div>
          <button id="send-otp" type="button" class="btn btn-link btn-sm">Send OTP</button>
          <p id="otp_error"></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $("#send-otp").on("click", function() {
      $(this).attr("disabled", true);
      const verifier = $('input[name="email"]').val();
      $("#email_otp_error").html("");
      console.log("sending request....", verifier);
      if (verifier) {
        sendOtp(verifier);
      } else {
        $("#email_otp_error").html(
          `<span style="color: red">Please provide valid email</span>`
        );
        $(this).attr("disabled", false);
      }
    });
    function sendOtp(verifier) {
      $.ajax({
        url: "/send/otp",
        type: "POST",
        data: { verifier: verifier },
        success: function(response) {
          $("#otp_error").html(
            `<span style="color: ${response.success ? "green" : "red"}">${response.message}</span>`
          );
        }
      });
    }
  });
</script>
@endsection