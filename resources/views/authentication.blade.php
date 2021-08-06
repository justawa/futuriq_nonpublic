@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card border-primary mb-3">
      <div class="card-header bg-primary text-white text-center">eSign Authentication</div>
      <div class="card-body">
        <table class="table">
          <tr>
            <td>ASP ID</td>
            <th>FTR-{{ $enrolment->application_id }}</th>
            <td>Transaction ID</td>
            <th>furq:esign{{ $enrolment->mobile }}:00{{ $enrolment->id }}</th>
          </tr>
          <tr>
            <td>ASP Name</td>
            <th>For RA Portal DSC Esign</th>
            <td>Current Time</td>
            <th>{{ date("Y-m-d H:i:s") }}</th>
          </tr>
        </table>

        <p><strong>Document Details: </strong></p>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Document Information</th>
              <th>Document Hash</th>
              <th>Document URL</th>
            </tr>
          </thead>
          <tr>
            <td>1</td>
            <th>eKYC User Agreement for eSign</th>
            <td>{{ $token1 }}</td>
            <th><a href="">View</a></th>
          </tr>
          <tr>
            <td>2</td>
            <th>DSC Application(pdf) for eSign</th>
            <td>{{ $token2 }}</td>
            <th><a target="_blank" href="{{ route('enrolment.offline.kyc', $enrolment->application_id) }}">View</a></th>
          </tr>
        </table>

        <div class="row">
          <div class="col-12">
            <div class="form-group row">
              <label for="email" class="col-md-2 col-form-label text-md-right">Signer ID</label>
              <div class="col-md-6">
                <input id="signer_id" type="text" class="form-control" value="{{ $enrolment->pan }}@pan.futuriq" readonly>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Enter OTP</label>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Enter OTP"> <a href="">Resend OTP</a>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Enter PIN</label>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Enter PIN">
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-body">
            <div class="text-center"><input type="radio" checked /> I hereby authorize futuriQ to: </div>
            <p>Use my KYC account information to authenticate my identity and to eSign in accordance with the provisions of the IT Act and allied rules and regulations of the CCA notified thereunder and for no other purpose</p>
            <p>I understand that the personal data provided by me will be stored by futuriQ till such time as mentioned in guidelines of CCA and the IT Act.</p>
          </div>
        </div>
        <button type="button" class="btn btn-primary">Sign Documents</button> <button type="button" class="btn btn-danger">Cancel</button>
      </div>
    </div>
  </div>
@endsection