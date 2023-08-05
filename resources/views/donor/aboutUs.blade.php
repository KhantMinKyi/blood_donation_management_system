@extends('donor.layout')

@section('content')

<div class="about-section">
  <div class="container-fluid red-background size">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="text-center h2 about-us-text">About Us</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid size">

    <div class="container">
      <div class="row">
        <div class="col-md-6"><img src="{{ asset('img/binoculars.png') }}" alt="Our Vission" class="rounded float-left img-fluid"></div>
        <div class="col-md-6">
          <h2 class="text-center text-dark">Our Vission</h2>
          <hr class="black-bar">
          <p>
            We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
          </p>
          <p>
            We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid white size">
    <div class="container ">
      <div class="container">
        <div class="row ">
          <div class="col-md-6">
            <h2 class="text-center text-dark">Our Goal</h2>
            <hr class="black-bar">
            <p>
              We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
            </p>
            <p>
              We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
            </p>
          </div>
          <div class="col-md-6"><img src="{{ asset('img/target.png') }}" alt="Our Vission" class="rounded img-fluid float-right"></div>
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid size">
    <div class="container">
      <div class="row">
        <div class="col-md-6"><img src="{{ asset('img/goal.png') }}" alt="Our Vission" class="rounded float-left img-fluid"></div>
        <div class="col-md-6">
          <h2 class="text-center text-dark">Our Mission</h2>
          <hr class="black-bar">
          <p>
            We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
          </p>
          <p>
            We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection