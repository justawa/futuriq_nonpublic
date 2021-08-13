<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="generator" content="">
        <title>form</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/last/style.css" rel="stylesheet">
    </head>
    <body>
	<section>
  <div class="text-center"><img class="img-fluid mb-3" src="photo/logo-tele.png"></div></section>
  <section>
        <div class="form">
            <form>
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
                           : <span >{{$org->pan}}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4"> Name </div>
                        <div class="col-lg-8">
                          : <span >{{ $org->orgname}}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4"> Mobile </div>
                        <div class="col-lg-8">
                          :<span >{{ $org->mobile}}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4"> Date of Birth </div>
                        <div class="col-lg-8">
                           : <span>{{ $org->birthday}}</span>
                        </div>
                    </div>
                   <!----- <div class="row mb-3">
                        <div class="col-lg-4"> Gender </div>
                        <div class="col-lg-8">
                            <div class="form-check-inline">
                                <input type="radio" name="radio" id="male"><label class="form-check-label" for="male">Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" name="radio" id="female"><label class="form-check-label" for="female">Female
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" name="radio" id="other"><label class="form-check-label" for="other">Other
                                </label>
                            </div>
                        </div>
                    </div>-->
                    <div class="row mb-3">
                        <div class="col-lg-4"> Email</div>
                        <div class="col-lg-8">
                          :<span >{{ $org->email}}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4"> Gender</div>
                        <div class="col-lg-8">
                            :<span>{{ $org->gender}}</span> 
                        </div>
                    </div>
                    <div class="row mb-3">
                        {{-- <div class="col-lg-4"> City</div> --}}
                        <div class="col-lg-8">
                            <!-----<input type="text" class="form-control" placeholder="City">-->
                        </div>
                    </div>
                    <div class="row mb-3">
                        {{-- <div class="col-lg-4"> Address</div> --}}
                        <div class="col-lg-8">
                            <!-----<textarea class="form-control" placeholder="Address"></textarea>-->
                        </div>
                    </div>
                    <div class="row mb-3">
                        {{-- <div class="col-lg-4"> Remark</div> --}}
                        <div class="col-lg-8">
                            <!-----<input type="text" class="form-control" placeholder="Remark">--->
                        </div>
                    </div>
					</div>
					
					<div class="col-lg-3">
					<div class="row mb-3">
                        <div class="col-12 ">
						<img class="img-fluid" src="{{asset('picphoto/'.$org->photo_file)}}">
						</div>
					</div>
					
					</div>
					</div>
                    <!-----pan end---->
                    
                <h5 class="pt-4">Certificate Details</h5>
				<hr>
                <div class="mb-4">
                    <div class="row mb-3">
                        {{-- <div class="col-lg-4"> Certification Class</div> --}}
                        <div class="col-lg-8">
                          <!----- <select class="selectpicker form-control">
							    <option>Select</option>
                                <option>Class 1</option>
                                <option>Class 3</option>
                                <option>Ekyc-Class 3</option>
                            </select>-->
                        </div>
                    </div>
                    <div class="row mb-3">
                        {{-- <div class="col-lg-4"> User Type </div> --}}
                        <div class="col-lg-8">
                          <!-----  <select class="selectpicker form-control">
                                <option>Select</option>
                                <option>Individual</option>
                            </select>-->
                        </div>
                    </div>
                    <div class="row mb-3">
                        {{-- <div class="col-lg-4"> Vaildity </div> --}}
                        <div class="col-lg-8">
                           <!----- <select class="selectpicker form-control">
                                <option>Select</option>
                                <option>1 Year</option>
                                <option>2 Year</option>
                            </select>-->
                        </div>
                    </div>
                    <div class="row mb-3">
                        {{-- <div class="col-lg-4"> Nationality </div> --}}
                        <div class="col-lg-8">
                        <!-----    <select class="selectpicker form-control">
                                <option>Select</option>
                                <option>India</option>
                            </select>-->
                        </div>
                    </div>
                   
					
                   <div class="row mb-3">
                        <div class="col-12 ">
						<div class="bg-light p-2">
                            Section 71 of IT Act stipulates that if anyone makes a misrepresentation or suppresses any material fact from the CCA or CA for obtaining any DSC such person shall be punishable with imprisonment up to 2 years or with fine up to one lakh rupees or with both.
                        </div></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <input type="checkbox" id="scales" name="scales" > I agree to the term & conditions as mentioned in the subscriber agreement for creating the Ekyc account
                        </div>
                    </div>
                    <div class="text-right">
					<button class="btn-form" type="submit">Submit & eSign DSC</button>
					<button class="btn-form" type="submit">Submit & eSign DSC</button>
					</div>
                </div>
            </form>
        </div>
		</section>
    </body>
</html>