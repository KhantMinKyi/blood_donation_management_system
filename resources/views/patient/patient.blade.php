@extends('layouts.app')

@section('content')

  <div class="patient-container">
    <div class="patient-main-content">
     <h2 class="patient-main-text">Request your blood here</h2>
     <p class="patient-secondary-text">We wish u best of luck in your life</p>
     <div class="patient-btn">
      <a href="{{ url('/patient/emergencyForm') }}" class="patient-btn-emergency">Emergency Request</a>
      <a href="{{ url('/patient/normalForm') }}" class="patient-btn-normal">Normal Request</a>
     </div> <!--patient-btn-->
    </div> <!--patient-main-content-->
  </div> <!--patient-container-->

  <div class="patient-container patient-clearfix">
    <div class="patient-map patient-ft-left">
      <h2>Checkout the map here</h2>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.078477054477!2d96.16997827463341!3d16.772770784013396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ec8aa022724b%3A0xc810c8d68d72285a!2sBotahtaung%20Pagoda%20Rd%2C%20Yangon!5e0!3m2!1sen!2smm!4v1688838876549!5m2!1sen!2smm" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div> <!--patient-map-->

    <div class="patient-acc patient-ft-right">
      <h2>Don't have an account yet?</h2>

      <p>Open account now and put your mind at ease.</p>
      <a href="{{ url('/patient/registerForm') }}" class="patient-btn-acc">Become a patient</a>

      <p>Check your history here.</p>
      <a href="{{ url('/patient/history') }}" class="patient-btn-acc">Check history</a>

      <p>Learn more about us by clicking this button.</p>
      <a href="#" class="patient-btn-acc">About us</a>
    </div>
  </div> <!--patient-container-->