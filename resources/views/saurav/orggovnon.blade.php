<<<<<<< HEAD
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="generator" content="">
        <title>dashboard</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
		<link href="css/style1.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body>
  <section>
      <nav class="navbar default-layout col-lg-12 col-12 p-0 d-flex flex-row" >
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="#">
            <img class="img-fluid mb-1" src="photo/logo-tele2.png">
          <a class="navbar-brand brand-logo-mini" href="#">
            <img class="img-fluid mb-1" src="photo/logo-tele2.png"> </a>
        </div>
        <div class="navbar-menu-wrapper  align-items-center">
		
		<ul class="navbar-nav ml-auto" style="float:right;">
            <li class="nav-item dropdown d-none d-xl-inline-block" style="margin-top: 0px;">
                <img class="img-xs rounded-circle wid45" src="photo/image-d.jpg" alt="Profile image">     
            </li>
          </ul>
		<form class="ml-auto search-form" action="#" style="float:right;">
            <div class="form-group">
              <input type="search" class="form-control" placeholder="Search Here / Request ID / Phone / PAN / Name">
            </div>
          </form>
          
          <ul class="navbar-nav" style="float:left;" id="navbarNavDarkDropdown">
            <!--<li class="nav-item font-weight-semibold d-none d-lg-block">Quick Contact : 999 999 9999</li>-->
			<li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                <span class="menu-title">Apply DSC</span>
              </a>
			  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
          <li><a class="dropdown-item" href="{{route('saurav.ind')}}">Ind </a></li>
          {{-- <li><a class="dropdown-item" href="{{route('saurav.orggov')}}">org</a></li> --}}
          <li><a class="dropdown-item" href="{{route('saurav.orggovnon')}}">org </a></li>  
          <li><a class="dropdown-item" href="#">Manage eKyc </a></li>
          </ul>
			  
            </li>
           
			<li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Partner Mgt</span>
              </a>
            </li>
			 <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                <span class="menu-title">Reports</span>
              </a>
			  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">DSC Queue </a></li>
			<li><a class="dropdown-item" href="#">Resubmit App. Rejected by CA</a></li>
          </ul>
			  
            </li>
		
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                <span class="menu-title">Stock</span>
              </a>
			  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Convert Stock </a></li> 
			<li><a class="dropdown-item" href="#">Transfer Stock </a></li> 
			</ul>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Submit Grievance</span>
              </a>
            </li>
          </ul>
          
        </div>
      </nav>
		</section>
		  <div class="container-fluid page-body-wrapper">
     
		<div class="main-panel">
          <div class="content-wrapper">
          
           
         
            <div class="row mt-3">
             <div class="col-lg-12 border"> 
                  <div class="org-div"><h4 class="org-heading"><i class="fa fa-university" aria-hidden="true"></i> Org Non Gov</h4></div>
				   <div class="row">
                  <div class="col-md-6 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <form  method="post" enctype="multipart/form-data" action="">
                          @csrf
                          {{-- {{ csrf_field() }} --}}
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Certificate Type </div>
                          <div class="col-lg-8">
						  <select class="selectpicker form-control" name="certification_type">
                <option>Select</option>
                <option value="Signing">Signing</option>
								<option value="Encryption">Encryption</option>
								<option value="Combo">Combo</option>
                             </select>
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Validity</div>
                          <div class="col-lg-8">
                            <div class="form-check-inline">
                             <input type="radio" name="validity" id="radio1"><label class="form-check-label" for="radio1">1Year</label>
                            </div>
                          <div class="form-check-inline">
                           <input type="radio" name="validity" id="radio2"><label class="form-check-label" for="radio2">2Year</label>
						  </div>
                          </div>
						</div>
					            

                        <div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Organization Type </div>
                          <div class="col-lg-8">
						  <select class="selectpicker form-control" name="orgtype">
                <option value="">Select</option>
								<option value="Proprietorship">Proprietorship</option>
								<option value="Partnership Firm">Partnership Firm</option>
								<option value="Corporate Entities">Corporate Entities</option>
								<option value="AOP/BOI">AOP/BOI</option>
								<option value="LLP">LLP</option>
								<option value="NGO/TRUST">NGO/TRUST</option>
								<option value="Banking Organization">Banking Organization</option>
                             </select>
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> GST No </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="gstno" placeholder="049237987982324">
							{{-- <div class="form-check-inline mt-3">
                           <input type="checkbox" name="radio" id="radio5">&nbsp;&nbsp;<label class="form-check-label" for="radio5">Combo</label>
						  </div> --}}
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Govt Organisation name </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="govorgno" placeholder="yousecure ">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Department Name </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="departmentname" placeholder="yousecure accounting">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Org PAN  </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="orgpan" placeholder="yousecure">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Org Address </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="orgaddress" placeholder="Address">
                          </div>
                        </div>
					
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Upload Org documents </div>
                          <div class="col-lg-8">
                             <input type="file" name="orgdocument">
                          </div>
                        </div>
						
                       <!-- <div class="row mt-3 mb-3">
                          <div class="col-lg-12">
						  Enrolment of Authorized signatory
						  <div class="mt-3 mb-3">
                            <div class="form-check-inline">
                             <input type="radio" name="radio" id="radio6" value="red"> &nbsp;<label class="form-check-label" for="radio6">Already having ekyc account with this organisation 
                          </div>
						  </div>
                          </div>
						</div>-->
						<div class="d-flex mt-3 mb-3 justify-content-end">
						<a href="" class="btn-form" >Submit</a>
                        </div>
                      </div>
                    
                  
                </div>
              </div>
               <div class="col-md-6 grid-margin">
			    
                    <div class="card myButton">
                      <div class="card-body">

                     <h2> <a href="{{ url()->previous() }}">&#8249;</a> </h2>
                        
                        <h5>Enrolment of Applicant</h5>
						
                        <div class="row mt-3 mb-3">
						<div class="col-lg-12">
                          <div class="form-check-inline mb-3">
                             <input type="radio" name="radio" id="existing1" value="existing1"> &nbsp;<label class="form-check-label" for="existing1">Use Existing Kyc 
                          
						  </div>
						  <br>
						  <div class="form-check-inline mb-3">
                             <input type="radio" name="radio" id="new-create" value="new-create"> &nbsp;<label class="form-check-label" for="new-create">Create New 
                          
						  </div>
						  
                          </div>
                          <div class=" col-lg-12 existing1 box">
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4">User KYC Id</div>
						 <div class="col-lg-8"> <input type="text" class="form-control mb-3" name="kycid" placeholder="@username "></div>
						 </div>
						 <div class="row mt-3 mb-3">
                          <div class="col-lg-4">KYC Pin</div>
						 <div class="col-lg-8"> <input type="text" class="form-control" name="kycpin" placeholder="Enter Pin"></div>
						 </div>
                              
							    <div class="d-flex mt-3 mb-3 justify-content-end">
					        	<a href="" class="btn-form">Login</a>
                              </div>

							
							</div>
							
                          </div>
						</div>
					
						
                    </div>

                    <div class="card same mt-3 mb-3 auth-sig">
                      <div class="card-body">
                     <h2> <a href="{{ url()->previous() }}">&#8249;</a> </h2>

						<h5>Enrolment of Authorized signatory</h5>
                        <div class="row mt-3 mb-3">
                          <div class="col-lg-12">
                            <div class="form-check-inline mb-3">
                             <input type="radio" name="radio" id="Already" value="Already"> &nbsp;<label class="form-check-label" for="Already">Already having ekyc account with this organisation 
                          
						  </div><br>
						  <div class="form-check-inline mb-3">
                             <input type="radio" name="radio" id="existing" value="existing"> &nbsp;<label class="form-check-label" for="existing">Login with existing Kyc 
                          
						  </div>
						  <br>
						  <div class="form-check-inline mb-3">
                             <input type="radio" name="radio" id="new-create" value="new-create"> &nbsp;<label class="form-check-label" for="new-create">Create New 
                          
						  </div>
						  
                          </div>
						</div>
						<div class="existing box">
						<div class="row mt-3 mb-3">

                          <div class="col-lg-4"> Enter Ekyc Account Id </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="ekycid" placeholder="@username ">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Enter Pin </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="ekycpin" placeholder="Pin">
                          </div>
                        </div>
						<div class="d-flex mt-3 mb-3 justify-content-end">
						<a href="javascript:void(0)" class="btn-form login-otp">Login</a>
                        </div>
						</div>
						<div class="genrat-otp box">
						<div class="row mt-3 mb-3">
						  {{-- <div class="col-lg-4"> Enter OTP </div> --}}
                          {{-- <div class="col-lg-4"> <input type="text" class="form-control" placeholder="Enter OTP"> </div> --}}
                          <div class="col-lg-4">
                            {{-- <a href="last.html" class="btn-genrate" type="submit">Generate OTP</a>  --}}
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
						{{-- <div class="col-lg-4"> Enter OTP </div> --}}
                          {{-- <div class="col-lg-8"> <input type="text" class="form-control" placeholder="Use Authorised signatory DSC "> </div> --}}
                        </div>
						
						<div class="d-flex mt-3 mb-3 justify-content-end">
						{{-- <a href="" class="btn-form" type="submit">Submit</a> --}}
                        </div>
						</div>
						</div>
                    </div>
					<!--<div class="card mt-3 mb-3" >
                      <div class="card-body">
						Enrolment of Authorized signatory
                        <div class="row mt-3 mb-3">
                          <div class="col-lg-12">
                            <div class="form-check-inline">
                             <input type="checkbox" name="" id="radio1"> &nbsp;<label class="form-check-label" for="radio1">Already having ekyc account with this organisation 
                          </label>
						  </div>
                          </div>
						</div>
					
						
						<div class="row mt-3 mb-3">
						  <div class="col-lg-4"> Enter OTP </div>
                          <div class="col-lg-4"> <input type="text" class="form-control" placeholder="Enter OTP"> </div>
                          <div class="col-lg-4">
                            <a href="last.html" class="btn-genrate" type="submit">Generate OTP</a> 
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
						<div class="col-lg-4"> Enter OTP </div>
                          <div class="col-lg-8"> <input type="text" class="form-control" placeholder="Use Authorised signatory DSC "> </div>
                        </div>
						
						<div class="d-flex mt-3 mb-3 justify-content-end">
						<a href="" class="btn-form" type="submit">Submit</a>
                        </div>
                        </div>
						
                    
                  
                </div>-->
                    <div class="card mb-3 pan new-create" style="display:none;">
                      <div class="card-body">
					  
					  <div class="row">
              <h2> <a href="{{ url()->previous() }}">&#8249;</a> </h2>

                          <div class="col-lg-12"><h5> New User</h5> 
						  <hr>
						  </div>
						  
                        </div>
                     
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> PAN </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="pan" placeholder="APAPG6697Q">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Organisation Name </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="orgname" placeholder="Sachin Gupta">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Mobile </div>
                          <div class="col-lg-8">
                            <input type="tel" class="form-control" name="mobile" placeholder="Phone" required>
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Email </div>
                          <div class="col-lg-8">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> DOB </div>
                          <div class="col-lg-8">
							<input type="date" class="form-control" id="birthday" name="birthday">
                          </div>
                        </div>
                        <div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Gender </div>
                        <div class="col-lg-8">
                          <select class="selectpicker form-control" name="gender">
                                            <option>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female"> Female</option>
                            <option value="Other"> Other</option>
                        
                                         </select>
                                      </div>
                                    </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> KYC PIN </div>
                          <div class="col-lg-4">
                            <input type="text" class="form-control" name="userkycpin" placeholder="KYC Pin">
                          </div>
						  <div class="col-lg-4">
                            <input type="text" class="form-control" name="userkycpinconfirm" placeholder="Confirm Pin">
                          </div>
                        </div>
						
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Upload photo</div>
                          <div class="col-lg-8">
                            <input type="file" id="myfile" name="photo_file">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Upload PAN</div>
                          <div class="col-lg-8">
                            <input type="file"  name="pan_file">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Upload ORG ID</div>
                          <div class="col-lg-8">
                            <input type="file"  name="orgid_file">
                          </div>
                        </div>
						
						{{--  <a href="{{route('saurav.last')}}"> --}}
						<div class="row mt-3 mb-3">
						 <div class="col-lg-4">
                <button class="btn-form" type="submit">
                   Submit </button>
              </div>
						 {{-- <div class="col-lg-8  text-right"><a href="" class="btn-form" >Submit but Verify Later</a></div> --}}
						</div>
                      </div>
                    </div>
                  </div>
                </form>
                  
                 
          <!-- <div class="mt-3 col-md-6">
                <div class="row">
                  
                  <div class="col-md-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
						Enrolment of Authorized signatory
                        <div class="row mt-3 mb-3">
                          <div class="col-lg-12">
                            <div class="form-check-inline">
                             <input type="checkbox" name="" id="radio1"> &nbsp;<label class="form-check-label" for="radio1">Already having ekyc account with this organisation 
                          
						  </div>
                          </div>
						</div>
					
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Enter Ekyc Account Id </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="@username ">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Enter Pin </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Pin">
                          </div>
                        </div>
						<div class="d-flex mt-3 mb-3 justify-content-end">
						<a href="" class="btn-form" type="submit">Login</a>
                        </div>
                        </div>
						
                    </div>
                  </div>
                  
                </div>
              </div>-->
			
			
			  <div class="col-12 mt-3">
                <div class="row">
                  
                  
                  
                </div>
              </div>
			
			  
              
            </div>
            <!-- <div class="row">
             <div class="bg d-flex mt-5 mb-3 mr-3 ml-3 pt-2">
				  <div class="col-md-1">
				  <img class="img-fluid" src="326031.png">
				  </div>
			<div class="col-md-11">
               <h4 class="alert-heading">Important Announcement</h4>
               <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
             </div> 
             </div>
            </div>-->
			
          </div></div></div>
          
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> </span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        
        <script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
	 $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".pan").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
		<script>


$(document).ready(function(){
  $("#new-create").click(function(){
    $(".myButton, .auth-sig").hide();
  });
   $("#existing").click(function(){
    $(".myButton").hide();
  });
  $("#existing1").click(function(){
    $(".auth-sig").hide();
  });
  
  $(".create").click(function(){
    $(".pan").show();
  });
  $(".login-otp").click(function(){
    $(".existing ").hide();
  });
   $(".login-otp").click(function(){
    $(".genrat-otp").show();
  });
  
});
</script>
   </body>
=======
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="generator" content="">
        <title>dashboard</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
		<link href="css/style1.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body>
  <section>
      <nav class="navbar default-layout col-lg-12 col-12 p-0 d-flex flex-row" >
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="#">
            <img class="img-fluid mb-1" src="photo/logo-tele2.png">
          <a class="navbar-brand brand-logo-mini" href="#">
            <img class="img-fluid mb-1" src="photo/logo-tele2.png"> </a>
        </div>
        <div class="navbar-menu-wrapper  align-items-center">
		
		<ul class="navbar-nav ml-auto" style="float:right;">
            <li class="nav-item dropdown d-none d-xl-inline-block" style="margin-top: 0px;">
                <img class="img-xs rounded-circle wid45" src="photo/image-d.jpg" alt="Profile image">     
            </li>
          </ul>
		<form class="ml-auto search-form" action="#" style="float:right;">
            <div class="form-group">
              <input type="search" class="form-control" placeholder="Search Here / Request ID / Phone / PAN / Name">
            </div>
          </form>
          
          <ul class="navbar-nav" style="float:left;" id="navbarNavDarkDropdown">
            <!--<li class="nav-item font-weight-semibold d-none d-lg-block">Quick Contact : 999 999 9999</li>-->
			<li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                <span class="menu-title">Apply DSC</span>
              </a>
			  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
          <li><a class="dropdown-item" href="{{route('saurav.ind')}}">Ind </a></li>
          {{-- <li><a class="dropdown-item" href="{{route('saurav.orggov')}}">org</a></li> --}}
          <li><a class="dropdown-item" href="{{route('saurav.orggovnon')}}">org</a></li>  
          <li><a class="dropdown-item" href="#">Manage eKyc </a></li>
          </ul>
			  
            </li>
           
			<li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Partner Mgt</span>
              </a>
            </li>
			 <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                <span class="menu-title">Reports</span>
              </a>
			  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">DSC Queue </a></li>
			<li><a class="dropdown-item" href="#">Resubmit App. Rejected by CA</a></li>
          </ul>
			  
            </li>
		
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                <span class="menu-title">Stock</span>
              </a>
			  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Convert Stock </a></li> 
			<li><a class="dropdown-item" href="#">Transfer Stock </a></li> 
			</ul>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Submit Grievance</span>
              </a>
            </li>
          </ul>
          
        </div>
      </nav>
		</section>
		  <div class="container-fluid page-body-wrapper">
     
		<div class="main-panel">
          <div class="content-wrapper">
          
           
         
            <div class="row mt-3">
             <div class="col-lg-12 border"> 
                  <div class="org-div"><h4 class="org-heading"><i class="fa fa-university" aria-hidden="true"></i> Org Non Gov</h4></div>
				   <div class="row">
                  <div class="col-md-6 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <form  method="post" enctype="multipart/form-data" action="">
                          @csrf
                          {{-- {{ csrf_field() }} --}}
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Certificate Type </div>
                          <div class="col-lg-8">
						  <select class="selectpicker form-control" name="certification_type">
                <option>Select</option>
                <option value="Signing">Signing</option>
								<option value="Encryption">Encryption</option>
								<option value="Combo">Combo</option>
                             </select>
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Validity</div>
                          <div class="col-lg-8">
                            <div class="form-check-inline">
                             <input type="radio" name="validity" id="radio1"><label class="form-check-label" for="radio1">1Year</label>
                            </div>
                          <div class="form-check-inline">
                           <input type="radio" name="validity" id="radio2"><label class="form-check-label" for="radio2">2Year</label>
						  </div>
                          </div>
						</div>
					            

                        <div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Organization Type </div>
                          <div class="col-lg-8">
						  <select class="selectpicker form-control" name="orgtype">
                <option value="">Select</option>
								<option value="Proprietorship">Proprietorship</option>
								<option value="Partnership Firm">Partnership Firm</option>
								<option value="Corporate Entities">Corporate Entities</option>
								<option value="AOP/BOI">AOP/BOI</option>
								<option value="LLP">LLP</option>
								<option value="NGO/TRUST">NGO/TRUST</option>
								<option value="Banking Organization">Banking Organization</option>
                             </select>
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> GST No </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="gstno" placeholder="049237987982324">
							{{-- <div class="form-check-inline mt-3">
                           <input type="checkbox" name="radio" id="radio5">&nbsp;&nbsp;<label class="form-check-label" for="radio5">Combo</label>
						  </div> --}}
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Govt Organisation name </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="govorgno" placeholder="yousecure ">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Department Name </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="departmentname" placeholder="yousecure accounting">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Org PAN  </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="orgpan" placeholder="yousecure">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Org Address </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="orgaddress" placeholder="Address">
                          </div>
                        </div>
					
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Upload Org documents </div>
                          <div class="col-lg-8">
                             <input type="file" name="orgdocument">
                          </div>
                        </div>
						
                       <!-- <div class="row mt-3 mb-3">
                          <div class="col-lg-12">
						  Enrolment of Authorized signatory
						  <div class="mt-3 mb-3">
                            <div class="form-check-inline">
                             <input type="radio" name="radio" id="radio6" value="red"> &nbsp;<label class="form-check-label" for="radio6">Already having ekyc account with this organisation 
                          </div>
						  </div>
                          </div>
						</div>-->
						<div class="d-flex mt-3 mb-3 justify-content-end">
						<a href="" class="btn-form" >Submit</a>
                        </div>
                      </div>
                    
                  
                </div>
              </div>
               <div class="col-md-6 grid-margin">
			    
                    <div class="card myButton">
                      <div class="card-body">

                     <h2> <a href="{{ url()->previous() }}">&#8249;</a> </h2>
                        
                        <h5>Enrolment of Applicant</h5>
						
                        <div class="row mt-3 mb-3">
						<div class="col-lg-12">
                          <div class="form-check-inline mb-3">
                             <input type="radio" name="radio" id="existing1" value="existing1"> &nbsp;<label class="form-check-label" for="existing1">Use Existing Kyc 
                          
						  </div>
						  <br>
						  <div class="form-check-inline mb-3">
                             <input type="radio" name="radio" id="new-create" value="new-create"> &nbsp;<label class="form-check-label" for="new-create">Create New 
                          
						  </div>
						  
                          </div>
                          <div class=" col-lg-12 existing1 box">
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4">User KYC Id</div>
						 <div class="col-lg-8"> <input type="text" class="form-control mb-3" name="kycid" placeholder="@username "></div>
						 </div>
						 <div class="row mt-3 mb-3">
                          <div class="col-lg-4">KYC Pin</div>
						 <div class="col-lg-8"> <input type="text" class="form-control" name="kycpin" placeholder="Enter Pin"></div>
						 </div>
                              
							    <div class="d-flex mt-3 mb-3 justify-content-end">
					        	<a href="" class="btn-form">Login</a>
                              </div>

							
							</div>
							
                          </div>
						</div>
					
						
                    </div>

                    <div class="card same mt-3 mb-3 auth-sig">
                      <div class="card-body">
                     <h2> <a href="{{ url()->previous() }}">&#8249;</a> </h2>

						<h5>Enrolment of Authorized signatory</h5>
                        <div class="row mt-3 mb-3">
                          <div class="col-lg-12">
                            <div class="form-check-inline mb-3">
                             <input type="radio" name="radio" id="Already" value="Already"> &nbsp;<label class="form-check-label" for="Already">Already having ekyc account with this organisation 
                          
						  </div><br>
						  <div class="form-check-inline mb-3">
                             <input type="radio" name="radio" id="existing" value="existing"> &nbsp;<label class="form-check-label" for="existing">Login with existing Kyc 
                          
						  </div>
						  <br>
						  <div class="form-check-inline mb-3">
                             <input type="radio" name="radio" id="new-create" value="new-create"> &nbsp;<label class="form-check-label" for="new-create">Create New 
                          
						  </div>
						  
                          </div>
						</div>
						<div class="existing box">
						<div class="row mt-3 mb-3">

                          <div class="col-lg-4"> Enter Ekyc Account Id </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="ekycid" placeholder="@username ">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Enter Pin </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="ekycpin" placeholder="Pin">
                          </div>
                        </div>
						<div class="d-flex mt-3 mb-3 justify-content-end">
						<a href="javascript:void(0)" class="btn-form login-otp">Login</a>
                        </div>
						</div>
						<div class="genrat-otp box">
						<div class="row mt-3 mb-3">
						  {{-- <div class="col-lg-4"> Enter OTP </div> --}}
                          {{-- <div class="col-lg-4"> <input type="text" class="form-control" placeholder="Enter OTP"> </div> --}}
                          <div class="col-lg-4">
                            {{-- <a href="last.html" class="btn-genrate" type="submit">Generate OTP</a>  --}}
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
						{{-- <div class="col-lg-4"> Enter OTP </div> --}}
                          {{-- <div class="col-lg-8"> <input type="text" class="form-control" placeholder="Use Authorised signatory DSC "> </div> --}}
                        </div>
						
						<div class="d-flex mt-3 mb-3 justify-content-end">
						{{-- <a href="" class="btn-form" type="submit">Submit</a> --}}
                        </div>
						</div>
						</div>
                    </div>
					<!--<div class="card mt-3 mb-3" >
                      <div class="card-body">
						Enrolment of Authorized signatory
                        <div class="row mt-3 mb-3">
                          <div class="col-lg-12">
                            <div class="form-check-inline">
                             <input type="checkbox" name="" id="radio1"> &nbsp;<label class="form-check-label" for="radio1">Already having ekyc account with this organisation 
                          </label>
						  </div>
                          </div>
						</div>
					
						
						<div class="row mt-3 mb-3">
						  <div class="col-lg-4"> Enter OTP </div>
                          <div class="col-lg-4"> <input type="text" class="form-control" placeholder="Enter OTP"> </div>
                          <div class="col-lg-4">
                            <a href="last.html" class="btn-genrate" type="submit">Generate OTP</a> 
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
						<div class="col-lg-4"> Enter OTP </div>
                          <div class="col-lg-8"> <input type="text" class="form-control" placeholder="Use Authorised signatory DSC "> </div>
                        </div>
						
						<div class="d-flex mt-3 mb-3 justify-content-end">
						<a href="" class="btn-form" type="submit">Submit</a>
                        </div>
                        </div>
						
                    
                  
                </div>-->
                    <div class="card mb-3 pan new-create" style="display:none;">
                      <div class="card-body">
					  
					  <div class="row">
              <h2> <a href="{{ url()->previous() }}">&#8249;</a> </h2>

                          <div class="col-lg-12"><h5> New User</h5> 
						  <hr>
						  </div>
						  
                        </div>
                     
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> PAN </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="pan" placeholder="APAPG6697Q">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Organisation Name </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="orgname" placeholder="Sachin Gupta">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Mobile </div>
                          <div class="col-lg-8">
                            <input type="tel" class="form-control" name="mobile" placeholder="Phone" required>
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Email </div>
                          <div class="col-lg-8">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> DOB </div>
                          <div class="col-lg-8">
							<input type="date" class="form-control" id="birthday" name="birthday">
                          </div>
                        </div>
                        <div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Gender </div>
                        <div class="col-lg-8">
                          <select class="selectpicker form-control" name="gender">
                                            <option>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female"> Female</option>
                            <option value="Other"> Other</option>
                        
                                         </select>
                                      </div>
                                    </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> KYC PIN </div>
                          <div class="col-lg-4">
                            <input type="text" class="form-control" name="userkycpin" placeholder="KYC Pin">
                          </div>
						  <div class="col-lg-4">
                            <input type="text" class="form-control" name="userkycpinconfirm" placeholder="Confirm Pin">
                          </div>
                        </div>
						
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Upload photo</div>
                          <div class="col-lg-8">
                            <input type="file" id="myfile" name="photo_file">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Upload PAN</div>
                          <div class="col-lg-8">
                            <input type="file"  name="pan_file">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Upload ORG ID</div>
                          <div class="col-lg-8">
                            <input type="file"  name="orgid_file">
                          </div>
                        </div>
						
						{{--  <a href="{{route('saurav.last')}}"> --}}
						<div class="row mt-3 mb-3">
						 <div class="col-lg-4">
                <button class="btn-form" type="submit">
                   Submit </button>
              </div>
						 {{-- <div class="col-lg-8  text-right"><a href="" class="btn-form" >Submit but Verify Later</a></div> --}}
						</div>
                      </div>
                    </div>
                  </div>
                </form>
                  
                 
          <!-- <div class="mt-3 col-md-6">
                <div class="row">
                  
                  <div class="col-md-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
						Enrolment of Authorized signatory
                        <div class="row mt-3 mb-3">
                          <div class="col-lg-12">
                            <div class="form-check-inline">
                             <input type="checkbox" name="" id="radio1"> &nbsp;<label class="form-check-label" for="radio1">Already having ekyc account with this organisation 
                          
						  </div>
                          </div>
						</div>
					
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Enter Ekyc Account Id </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="@username ">
                          </div>
                        </div>
						<div class="row mt-3 mb-3">
                          <div class="col-lg-4"> Enter Pin </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Pin">
                          </div>
                        </div>
						<div class="d-flex mt-3 mb-3 justify-content-end">
						<a href="" class="btn-form" type="submit">Login</a>
                        </div>
                        </div>
						
                    </div>
                  </div>
                  
                </div>
              </div>-->
			
			
			  <div class="col-12 mt-3">
                <div class="row">
                  
                  
                  
                </div>
              </div>
			
			  
              
            </div>
            <!-- <div class="row">
             <div class="bg d-flex mt-5 mb-3 mr-3 ml-3 pt-2">
				  <div class="col-md-1">
				  <img class="img-fluid" src="326031.png">
				  </div>
			<div class="col-md-11">
               <h4 class="alert-heading">Important Announcement</h4>
               <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
             </div> 
             </div>
            </div>-->
			
          </div></div></div>
          
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> </span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        
        <script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
	 $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".pan").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
		<script>


$(document).ready(function(){
  $("#new-create").click(function(){
    $(".myButton, .auth-sig").hide();
  });
   $("#existing").click(function(){
    $(".myButton").hide();
  });
  $("#existing1").click(function(){
    $(".auth-sig").hide();
  });
  
  $(".create").click(function(){
    $(".pan").show();
  });
  $(".login-otp").click(function(){
    $(".existing ").hide();
  });
   $(".login-otp").click(function(){
    $(".genrat-otp").show();
  });
  
});
</script>
   </body>
>>>>>>> f3121b13c863e42a234e44bc91fd1cb7feee1f3d
</html>