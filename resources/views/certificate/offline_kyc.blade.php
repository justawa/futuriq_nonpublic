<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Offline KYC</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h2 class="text-center text-uppercase">Futuriq</h2>
        <p>offline KYC</p>
        <div class="row">
          <div class="col-md-2">
            <div class="card">
              <div class="card-header text-white bg-info">Application ID</div>
              <div class="card-body">
                {{ $enrolment->application_id }}
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header text-white bg-info">Class</div>
              <div class="card-body">{{ $enrolment->certification_class }}</div>
            </div>
            <div class="card">
              <div class="card-header text-white bg-info">Application Type</div>
              <div class="card-body">{{ $enrolment->user_type }}</div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header text-white bg-info">Certificate Type</div>
              <div class="card-body">{{ $enrolment->type }}</div>
            </div>
            <div class="card">
              <div class="card-header text-white bg-info">Validity</div>
              <div class="card-body">{{ $enrolment->validity }}</div>
            </div>
          </div>
        </div>
      
        <div class="mt-5">
          <fieldset class="border p-2">
            <legend class="w-auto text-white bg-info p-1">Subscriber Details</legend>
            <div class="row">
              <div class="col-md-8">
                <p><strong>Applicant Name:</strong> {{ $enrolment->name }}</p>
                <p><strong>PAN:</strong> {{ $enrolment->pan }}</p>
                <p><strong>Date Of Birth:</strong> {{ $enrolment->birthday }}</p>
                <p><strong>Gender:</strong> {{ $enrolment->gender }}</p>
                <p><strong>Aadhaar:</strong> N/A</p>
                <p><strong>Mobile:</strong> {{ $enrolment->mobile }}</p>
                <p><strong>Email ID:</strong> {{ $enrolment->email }}</p>
                <p><strong>Address:</strong> {{ $enrolment->address }}</p>
                <p><strong>City:</strong> {{ $enrolment->city }}</p>
                <p><strong>State:</strong> {{ $enrolment->state }}</p>
                <p><strong>Pincode:</strong> {{ $enrolment->pincode }}</p>
                <p><strong>EKYC Code:</strong> {{ md5($enrolment->name) }}</p>
              </div>
              <div class="col-md-4">
                <img class="img-fluid" src="{{ asset('storage/'.$enrolment->photo_file) }}" />
              </div>
            </div>
          </fieldset>
        </div>
      
        <div class="mt-5">
        <fieldset class="border p-2">
          <legend class="w-auto text-white bg-info p-1">Declaration by Applicant</legend>
          <ul>
            <li>I confirm that the information provided by me in the digital signature application form is correct. I am aware that Section 71 of the IT act stipulates that if anyone makes a misrepresentation or suppresses any material fact from the CCA or CA for obtaining any DSC, such person shall be punishable with imprisonment up to 2 years or with fine up to one lakh rupees or with both.</li>
          
            <li>I give my consent to VSign to use my KYC Account data for the purpose of this digital signature application & also consent to receiving SMS and eMail communication from VSign regarding this application from time to time. I also allow VSign to publish my certificate information in their repository.</li>
            
            <li>I have read and understood and agree to the terms and condtions mentioned in the VSign CPS & the  subscriber agreement.</li>
          </ul>
        </fieldset>
        </div>
      
        <div class="row mt-5">
          <div class="col-md-6">
            <fieldset class="border p-2 bg-success">
              {{-- <legend class="w-auto text-white bg-info p-1">Applicant Signature</legend> --}}
              <p><strong>Date:</strong> </p>
              <p><strong>Place:</strong> </p>
              @if(isset($resp_docsignature3)) 
              {{ $resp_docsignature3 }}
              @endif
            </fieldset>
          </div>
          <div class="col-md-6">
            <fieldset class="border p-2">
              {{-- <legend class="w-auto text-white bg-info p-1">Registration Authority Details</legend> --}}
              <p>{{ $enrolment->email }}</p>
              <p><strong>RA Code:</strong> {{ $enrolment->name }}</p>
              <p>{{ $enrolment->mobile }}</p>
            </fieldset>
          </div>
        </div>
      </div>  
    </div>
  </div>
</body>
</html>