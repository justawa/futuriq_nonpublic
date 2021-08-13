@extends('layouts.dashboard')
@section('page-heading', 'Apply DSC')
@section('content')
<div class="row">
  <div class="col-md-12">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
          <div>{{$error}}</div>
      @endforeach
    @endif
    <form method="post" action="{{ route('enrolment.store') }}" enctype="multipart/form-data">
      @csrf
      <div id="step1">
        <section>
          <div class="form">
            {{-- <form > --}}
              <h1>Enrolment Form</h1>
              <hr/>
              <section>
              </div>
              
        
              <div id="step2">
                <section>
                  <div class="form">
                    {{-- <form> --}}
               
                      <h5 class="pb-4">Select Certificate Details</h5>
                      <div class="mb-4">
                        <div class="row mb-3">
                          <div class="col-lg-4">Certification Class</div>
                          <div class="col-lg-8">
                            <select class="selectpicker form-control" name="certification_class">
                              <option value="">Select</option>
                              <option value="Class 1">Class 1</option>
                              <option value="Class 3">Class 3</option>
                              <option value="Ekyc-Class 3">Ekyc-Class 3</option>
                            </select>
                            <p id="certification_class_error"></p>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-lg-4">User Type</div>
                          <div class="col-lg-8">
                            <select class="selectpicker form-control" name="user_type">
                              <option value="">Select</option>
                              <option value="Individual">Individual</option>
                            </select>
                            <p id="user_type_error"></p>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-lg-4">Vaildity</div>
                          <div class="col-lg-8">
                            <select class="selectpicker form-control" name="validity">
                              <option value="">Select</option>
                              <option value="1 Year">1 Year</option>
                              <option value="2 Year">2 Year</option>
                            </select>
                            <p id="validity_error"></p>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-lg-4">Nationality</div>
                          <div class="col-lg-8">
                            <select class="selectpicker form-control" name="nationality">
                              <option value="">Select</option>
                              <option value="India">India</option>
                            </select>
                            <p id="nationality_error"></p>
                          </div>
                        </div>
                      
                        <div class="row mb-3">
                          <div class="col-lg-4">Ekyc Type</div>
                          <div class="col-lg-8">
                          
                            <div class="form-check-inline">
                              <input type="radio" name="ekyc_type" id="kyc_type2" value="Pan" checked /><label
                                class="form-check-label"
                                for="kyc_type2"
                                >Pan
                              </label>
                            </div>
                            <p id="ekyc_type_error"></p>
                          </div>
                        </div>
                        <div class="text-right">
                          {{-- <a href="pan.html" class="btn-form">Next</a> --}}
                          <button type="button" class="btn-form" id="move_step3">Next</button>
                        </div>
                      </div>
                    {{-- </form> --}}
                  </div>
                </section>
                <hr/>
              </div>
        
              <div id="step3" style="display: none;">
                <section>
                  <div class="form">
                    {{-- <form> --}}
                      <div class="row">
                        <div class="col-lg-6">KYC Type : <b>PAN KYC</b></div>
                        <div class="col-lg-6">
                          Certificate Details :
                          <b>Class 1, Individual, Signature, 1 year</b>
                        </div>
                      </div>
                      <hr />
                      <h5 class="pb-4">Applicant Details</h5>
                      <div class="mb-4">
                        <div class="row">
                          <div class="col-lg-7 border-right">
                            <!-----pan select--->
                            <div class="row mb-3">
                              <div class="col-lg-4">Pan</div>
                              <div class="col-lg-8">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Pan Number"
                                  name="pan"
                                  />
                                  <p id="pan_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">Name</div>
                              <div class="col-lg-8">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Name"
                                  name="name"
                                  />
                                  <p id="name_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">Email</div>
                              <div class="col-lg-8">
                                <input
                                  type="email"
                                  class="form-control"
                                  placeholder="Email"
                                  name="email"
                                  />
                                  <p id="email_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">Mobile</div>
                              <div class="col-lg-8">
                                <input
                                  type="tel"
                                  class="form-control"
                                  placeholder="Mobile Number"
                                  name="mobile"
                                  />
                                  <p id="mobile_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">Date of Birth</div>
                              <div class="col-lg-8">
                                <input
                                  type="date"
                                  id="birthday"
                                  class="form-control"
                                  name="birthday"
                                  />
                                  <p id="birthday_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">Gender</div>
                              <div class="col-lg-8">
                                <div class="form-check-inline">
                                  <input type="radio" name="gender" id="gender1" value="male" /><label
                                    class="form-check-label"
                                    for="gender1"
                                    >Male
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <input type="radio" name="gender" id="gender2" value="female" /><label
                                    class="form-check-label"
                                    for="gender2"
                                    >Female
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <input type="radio" name="gender" id="gender3" value="other" /><label
                                    class="form-check-label"
                                    for="gender3"
                                    >Other
                                  </label>
                                </div>
                                <p id="gender_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">Pincode</div>
                              <div class="col-lg-8">
                                <input
                                  type="tel"
                                  class="form-control"
                                  placeholder="Pincode"
                                  name="pincode"
                                  />
                                  <p id="pincode_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">State</div>
                              <div class="col-lg-8">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="State"
                                  name="state"
                                  />
                                  <p id="state_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">City</div>
                              <div class="col-lg-8">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="City"
                                  name="city"
                                  />
                                  <p id="city_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">Address</div>
                              <div class="col-lg-8">
                                <textarea
                                  class="form-control"
                                  placeholder="Address"
                                  name="address"
                                  ></textarea>
                                  <p id="address_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">Remark</div>
                              <div class="col-lg-8">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Remark"
                                  name="remark"
                                  />
                                  <p id="remark_error"></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-5">
                            <h6>Account Authentication</h6>
                            <hr />
                            <div class="row mb-3">
                              <div class="col-lg-12 mb-3">Ekyc Pin</div>
                              <div class="col-lg-12 mb-3">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Set Pin"
                                  name="ekyc_pin"
                                  />
                                  <p id="ekyc_pin_error"></p>
                              </div>
                              <div class="col-lg-12">
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Confirm Pin"
                                  name="c_ekyc_pin"
                                  />
                                  <p id="c_ekyc_pin_error"></p>
                              </div>
                            </div>
                            <h6>Upload Documents for KYC</h6>
                            <hr />
                            <div class="row mb-3">
                              <div class="col-lg-4">Applicant Photo</div>
                              <div class="col-lg-8">
                                <input type="file" id="photo_file" name="photo_file" />
                                <p id="photo_file_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">Pan Card</div>
                              <div class="col-lg-8">
                                <input type="file" id="pan_file" name="pan_file" />
                                <p id="pan_file_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4">Address Proof</div>
                              <div class="col-lg-8">
                                <input type="file" id="address_file" name="address_file" />
                                <p id="address_file_error"></p>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-12">
                                <div class="bg-light p-2">
                                  Section 71 of IT Act stipulates that if anyone makes a
                                  misrepresentation or suppresses any material fact from the
                                  CCA or CA for obtaining any DSC such person shall be
                                  punishable with imprisonment up to 2 years or with fine up
                                  to one lakh rupees or with both.
                                </div>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-12">
                                <input type="checkbox" id="scales" name="scales" /> I agree
                                to the term & conditions as mentioned in the subscriber
                                agreement for creating the Ekyc account
                              </div>
                            </div>
                            <div class="text-right">
                              <button type="button" class="btn-form" id="move_step4">Next</button>
                            </div>
                          </div>
                        </div>
                        <!-----pan end---->
                      </div>
                    {{-- </form> --}}
                  </div>
                </section>
                <hr/>
              </div>
        
              <div id="step4" style="display: none;">
                <section>
                  <div class="form">
                  {{-- <form> --}}
                    <!-----<div class="row">
                      <div class="col-lg-6">KYC Type : <b>PAN KYC</b></div>
                      <div class="col-lg-6"> Certificate Details : <b>Class 1, Individual, Signature, 1 year</b></div>
                      </div>
                                  <hr>-->
                    <h5>Applicant Details</h5>
                    <hr>
                    <div class="mb-4">
                      <div class="row">
                        <div class="col-lg-9 border-right">
                          <!-----pan select--->
                          <div class="row mb-3">
                            <div class="col-lg-4"> Pan </div>
                            <div class="col-lg-8">
                              : <span id="put_pan"></span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-lg-4"> Name </div>
                            <div class="col-lg-8">
                              : <span id="put_name"></span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-lg-4"> Mobile </div>
                            <div class="col-lg-8">
                              : <span id="put_mobile"></span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-lg-4"> Date of Birth </div>
                            <div class="col-lg-8">
                              : <span id="put_birthday"></span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-lg-4"> Gender </div>
                            <div class="col-lg-8">
                                : <span id="put_gender"></span>
                            </div>
                            </div>
                          <div class="row mb-3">
                            <div class="col-lg-4"> Pincode</div>
                            <div class="col-lg-8">
                              : <span id="put_pincode"></span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-lg-4"> State</div>
                            <div class="col-lg-8">
                              : <span id="put_state"></span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-lg-4"> City</div>
                            <div class="col-lg-8">
                              : <span id="put_city"></span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-lg-4"> Address</div>
                            <div class="col-lg-8">
                              : <span id="put_address"></span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-lg-4"> Remark</div>
                            <div class="col-lg-8">
                              : <span id="put_remark"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="row mb-3">
                            <div class="col-12 ">
                              <img id="applicant_photo" class="img-fluid" src="{{ asset('images/image-d.jpg') }}">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-----pan end---->
                      <h5 class="pt-4">Certificate Details</h5>
                      <hr>
                      <div class="mb-4">
                        <div class="row mb-3">
                          <div class="col-lg-4"> Certification Class</div>
                          <div class="col-lg-8">
                            :  <span id="put_certification_class"></span>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-lg-4"> User Type </div>
                          <div class="col-lg-8">
                            : <span id="put_user_type"></span>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-lg-4"> Vaildity </div>
                          <div class="col-lg-8">
                            : <span id="put_validity"></span>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-lg-4"> Nationality </div>
                          <div class="col-lg-8">
                            : <span id="put_nationality"></span>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-12 ">
                            <div class="bg-light p-2">
                              Section 71 of IT Act stipulates that if anyone makes a misrepresentation or suppresses any material fact from the CCA or CA for obtaining any DSC such person shall be punishable with imprisonment up to 2 years or with fine up to one lakh rupees or with both.
                            </div>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-12">
                            <input type="checkbox" id="scales" name="scales" > I agree to the term & conditions as mentioned in the subscriber agreement for creating the Ekyc account
                          </div>
                        </div>
                        <div class="text-right">
                          <button class="btn-form" type="submit">Submit & eSign DSC</button>
                          <button class="btn-form" type="button">Submit & eSign DSC Later</button>
                        </div>
                      </div>
                  {{-- </form> --}}
                  </div>
                </section>
              </div>
            </form>
        
          </div>
        
        </div>
        @endsection