@extends('layouts.dashboard')
@extends('layouts.app')
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
  height: 1.3rem;
  left: 50%;
  position: absolute;
  top: 0px;
  transform: translateX(-50%);
  width: 1.3rem;
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

.badge-success {
    color: #fff;
    background-color: #38c172;
    position: relative;
    /* left: 40%; */
    z-index: 9;
    border-radius: 50%;
    width: 1.3rem;
    height: 1.3rem;
    top: -4px;
    line-height: 1.5;
    padding-top: 5px;
}
a .badge-danger {
  color: #fff;
    background-color: #ca1a1a;
    position: relative;
    left: 16%;
    z-index: 9;
    border-radius: 50%;
    width: 1.4rem;
    height: 1.3rem;
    top: -23px;
    line-height: 1.5;
    padding-top: 5px;
  }
.badge-danger{
    color: #fff;
    background-color: #ca1a1a;
    position: relative;
    /* left: 40%; */
    z-index: 9;
    border-radius: 50%;
    width: 1.3rem;
    height: 1.3rem;
    top: -4px;
    line-height: 1.5;
    padding-top: 5px;
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
                  {{-- <a href="#!" class="">Form Submission</a> --}}
                  <span id="check" class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span><a href="#!" class="" >Form Submission</a>
                </li>
                <li class="step-item">
                  @if(!empty($enrolment->mobile_verified))
                  <span id="check" class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span><a href="#!" class="" data-toggle="modal" data-target="#verifyphone">Mobile Verification</a>
                  @else
                    <span class="badge badge-danger" data-toggle="modal" data-target="#verifyphone"><i class="fa fa-times" aria-hidden="true"></i></span><a href="#!" class="" data-toggle="modal" data-target="#verifyphone">Mobile Verification</a>
                  @endif
                
                </li>
                <li class="step-item">
                  @if(!empty($enrolment->email_verified))
                  <span id="check" class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span><a href="#!" class="" data-toggle="modal" data-target="#verifyModal">Email Verification</a>
                  @else
                    <span class="badge badge-danger" data-toggle="modal" data-target="#verifyModal"><i class="fa fa-times" aria-hidden="true"></i></span><a href="#!" class="" data-toggle="modal" data-target="#verifyModal">Email Verification</a>
                  @endif
                  </li>
                <li class="step-item active">
                  {{-- <a href="{{ route('vidoerecord') }}" class="">Video Recording</a> --}}
                  @if(!empty($enrolment->video_file))
                  <span id="check" class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span><a href="#!" class="">Video Recording</a>
                  @else
                    <a href="{{ route('vidoerecord') }}" class=""><span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i></span>Video Recording</a>
                  @endif
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
          <div class="form-group" id="email_div">
            <input type="text" id="email" name="verifier" class="form-control" placeholder="Your Email" />
          </div>
          <div class="form-group d-none" id="otp_div">
            <input type="text" id="otp" name="verifier" class="form-control" placeholder="Enter Otp" />
          </div>
          <div class="row">
            <div class="col-3">
               <button id="send_otp" type="button" class="btn btn-primary" onclick="sendOtp()">Send OTP</button>
            </div>
            <div class="col-2">
               <button id="verify" type="button" class="btn btn-primary" onclick="verify_email({{ $enrolment->application_id }})" disabled>Verify</button>
            </div>
          </div>
          
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

<script type="text/javascript">
 function sendOtp(){
    var emailButtonClasses = document.getElementById("email_div").classList;
    var otpButtonClasses = document.getElementById("otp_div").classList;
    let email = document.getElementById('email').value;
    	$.ajax({
	      type: "POST",
	      url: '{{route('send_otp')}}',
	      datatype: 'json',
	      data: {
		        "_token": "{{ csrf_token() }}",
		        "email": email,
	        },
	      success: function (data) {
          if(data == 1){
            $("#otp_error").html(
          `<span style="color: green">OTP sent succesfully</span>`
             );
           emailButtonClasses.add("d-none");
           otpButtonClasses.remove("d-none");
           otpButtonClasses.add("d-block");
           document.getElementById("send_otp").disabled = "true";
           document.getElementById("verify").removeAttribute("disabled");

          }
          else{
            $("#otp_error").html(
              `<span style="color: red">Please provide valid EmailId</span>`
             );
          }
			  
	      },
	      complete: function () {
	      },
	      error: function () {
	      }
	  });
  }

  function verify_email(id){
    //  document.getElementById('send_otp').style.visibility = "hidden";
    // document.getElementById('verify').style.visibility = "visible";
    let email = document.getElementById('email').value;
    let otp = document.getElementById('otp').value;
    console.log(id);
    	$.ajax({
	      type: "POST",
	      url: '{{route('verify_email')}}',
	      datatype: 'json',
	      data: {
		        "_token": "{{ csrf_token() }}",
		        "email": email,
            "otp": otp,
	        },
	      success: function (data) {
         if(data == 1){
            window.location.replace(window.location.origin + '/enrolment/completed-steps/' + id);
            
          }
          else{
            $("#otp_error").html(
              `<span style="color: red">Invalid Otp,Try Again</span>`
             );
          }
			  
	      },
	      complete: function () {
	      },
	      error: function () {
	      }
	  });
  }

  </script>

<div id="verifyphone" class="modal fade" role="dialog">
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
          <div class="form-group" id="phone_div">
            <input type="text" id="phone" name="verifier" class="form-control" placeholder="Your phone number" />
          </div>
          <div class="form-group d-none" id="otp_div1">
            <input type="text" id="otp1" name="verifier" class="form-control" placeholder="Enter Otp" />
          </div>
          <div class="row">
            <div class="col-3">
               <button id="send_otp1" type="button" class="btn btn-primary" onclick="sendOtp1()">Send OTP</button>
            </div>
            <div class="col-2">
               <button id="verify1" type="button" class="btn btn-primary" onclick="verify_phone({{ $enrolment->application_id }})" disabled>Verify</button>
            </div>
          </div>
          
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

<script type="text/javascript">

 function sendOtp1(){
    var emailButtonClasses = document.getElementById("phone_div").classList;
    var otpButtonClasses = document.getElementById("otp_div1").classList;
    let phone = document.getElementById('phone').value;
    	$.ajax({
	      type: "POST",
	      url: '{{route('send_otp')}}',
	      datatype: 'json',
	      data: {
		        "_token": "{{ csrf_token() }}",
		        "email": phone,
	        },
	      success: function (data) {
          if(data == 1){
            $("#otp_error").html(
          `<span style="color: green">OTP sent succesfully</span>`
             );
           emailButtonClasses.add("d-none");
           otpButtonClasses.remove("d-none");
           otpButtonClasses.add("d-block");
           document.getElementById("send_otp1").disabled = "true";
           document.getElementById("verify1").removeAttribute("disabled");

          }
          else{
            $("#otp_error").html(
              `<span style="color: red">Please provide valid EmailId</span>`
             );
          }
			  
	      },
	      complete: function () {
	      },
	      error: function () {
	      }
	  });
  }

  function verify_phone(id){
    //  document.getElementById('send_otp').style.visibility = "hidden";
    // document.getElementById('verify').style.visibility = "visible";
    let phone = document.getElementById('phone').value;
    let otp = document.getElementById('otp1').value;
    console.log(id);
    	$.ajax({
	      type: "POST",
	      url: '{{route('verify_phone')}}',
	      datatype: 'json',
	      data: {
		        "_token": "{{ csrf_token() }}",
		        "email": phone,
            "otp": otp,
	        },
	      success: function (data) {
         if(data == 1){
            window.location.replace(window.location.origin + '/enrolment/completed-steps/' + id);
            
          }
          else{
            $("#otp_error").html(
              `<span style="color: red">Invalid Otp,Try Again</span>`
             );
          }
			  
	      },
	      complete: function () {
	      },
	      error: function () {
	      }
	  });
  }

</script>