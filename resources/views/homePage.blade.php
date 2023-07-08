@extends('layouts.app')

@section('content')

<div class="container-fluid container-fluid-banner">
  <div class="header-img"></div>
  <div class="row header-section">
    <div class="col">
      <div class="header">
        <h1 class="text-center">Donate the blood, save the life</h1>
        <p class="text-center">Donate the blood to help the others.</p>
        <h3 class="text-center">Header Design Coming Soon ..</h3>
        @guest('donor')
        <div class="header-btn-wrap" style="text-align:center; margin-top: 30px;">
        <a href="#" class="btn btn-primary btn-lg" style="background-color: #30a5ff; margin-right: 30px;">Patient Signin</a>
        <a href="{{ url('donor/signin') }}" class="btn btn-primary btn-lg" style="background-color: #30a5ff; margin-right: 30px;">Donor Signin</a>
        </div>
        @endguest
      </div>
    </div>
  </div>
</div>
<!-- header ends -->

<!-- donate section -->
<div class="container-fluid background-section background-wrap-section">
  <div class="row red-background-row">

    <div class="col-md-12">
      <h1 class="text-center" style="color: #000; font-weight: 300;">Blood Donation Management System</h1>
      <hr class="black-bar">
      <p class="text-center pera-text">
        We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.

        We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
      </p>
      @guest('donor')
      <a href="#" class="background-section-btn btn btn-primary btn-lg text-center center-aligned">Become a Life Saver!</a>
      @endguest
    </div>
  </div>
</div>
<!-- end doante section -->


<div class="container-fluid vission-goal-mission-section">
  <div class="row">
    <div class="col-sm-12 col-md-4">
      <div class="card">
        <h3 class="text-center red">Our Vission</h3>
        <img src="img/binoculars.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
        <p class="text-center">
          We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
        </p>
      </div>
    </div>

    <div class="col-sm-12 col-md-4">
      <div class="card">
        <h3 class="text-center red">Our Goal</h3>
        <img src="img/target.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
        <p class="text-center">
          We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
        </p>
      </div>
    </div>

    <div class="col-sm-12 col-md-4">
      <div class="card">
        <h3 class="text-center red">Our Mission</h3>
        <img src="img/goal.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
        <p class="text-center">
          We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
        </p>
      </div>
    </div>
  </div>
</div>

<!-- end aboutus section -->
@endsection