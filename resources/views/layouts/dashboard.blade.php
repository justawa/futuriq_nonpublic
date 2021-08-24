<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="generator" content="">
        <title>Futuriq | Dashboard</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
		<link href="css/style1.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

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
              <a class="nav-link" href="{{ route('home') }}">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                <span class="menu-title">Apply DSC</span>
              </a>
			  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('saurav.ind')}}">Ind </a></li>
            <li><a class="dropdown-item" href="{{route('saurav.org')}}">ORG GOV</a></li>
            <li><a class="dropdown-item" href="{{route('saurav.orggovnon')}}">ORG NON </a></li>
            <li><a class="dropdown-item" href="{{route('saurav.orggovdgst')}}">ORG DGST </a></li>

            <li><a class="dropdown-item" href="#">Manage eKyc </a></li>
            {{-- <li><a class="dropdown-item" href="#">Manage eKyc </a></li> --}}
            {{-- <li><a class="dropdown-item" href="#">Manage eKyc </a></li> --}}

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
		
		  {{-- <div class="container-fluid page-body-wrapper"> --}}
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">@yield('page-heading')</h4>
                  {{-- @yield('quick-side-section') --}}
                </div>
              </div>
            </div>
        @yield('content')
      
       
      </section>
    </body>
  </html>