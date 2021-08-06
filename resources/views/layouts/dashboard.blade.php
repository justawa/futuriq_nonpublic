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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @yield('style')
  </head>
  <body>
    <section>
      <nav class="navbar default-layout col-lg-12 col-12 p-0 d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="#">
          <img class="img-fluid mb-3" src="{{ asset('images/logo-tele2.png') }}">
          <a class="navbar-brand brand-logo-mini" href="#">
          <img class="img-fluid mb-3" src="{{ asset('images/logo-tele2.png') }}"> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">Quick Contact : 999 999 9999</li>
          </ul>
          <form class="ml-auto search-form d-none d-md-block" action="#">
            <div class="form-group">
              <input type="search" class="form-control" placeholder="Search Here / Request ID / Phone / PAN / Name">
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block">
              <img class="img-xs rounded-circle wid45" src="{{ asset('images/image-d.jpg') }}" alt="Profile image">     
            </li>
          </ul>
        </div>
      </nav>
    </section>
    <div class="container-fluid page-body-wrapper">

    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <a href="#" class="nav-link">
            <div class="profile-image">
              <img class="img-xs rounded-circle wid45" src="{{asset('images/image-d.jpg')}}" alt="Profile image">
              <div class="dot-indicator bg-success"></div>
            </div>
            <div class="text-wrapper">
              <p class="profile-name">Sachin Gupta</p>
              <p class="designation">(Aligned RA)</p>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">
          <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('apply.dsc') }}">
          <span class="menu-title">Apply DSC</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('enrolment.dsc.list') }}">
          <span class="menu-title">DSC Queue</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
          <span class="menu-title">Manage eKyc </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
          <span class="menu-title">Transfer Stock</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('partner.create') }}">
          <span class="menu-title">Add Partner</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
          <span class="menu-title">Partner Mgt</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
          <span class="menu-title">Reports</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
          <span class="menu-title">Convert Stock</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
          <span class="menu-title">Submit Grievance</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
          <span class="menu-title">Resubmit App. Rejected by CA</span>
          </a>
        </li>
      </ul>
    </nav>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row page-title-header">
          <div class="col-12">
            <div class="page-header">
              <h4 class="page-title">@yield('page-heading')</h4>
              @yield('quick-side-section')
            </div>
          </div>
        </div>
        @yield('content')
        <div class="row">
          <div class="bg d-flex mt-5 mb-3 mr-3 ml-3 pt-2">
            <div class="col-md-1">
              <img class="img-fluid" src="{{ asset('images/326031.png') }}">
            </div>
            <div class="col-md-11">
              <h4 class="alert-heading">Important Announcement</h4>
              <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            </div>
          </div>
        </div>
      </div>

      <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © {{ date('Y') }}</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> </span>
        </div>
      </footer>

    </div>
  </body>
</html>