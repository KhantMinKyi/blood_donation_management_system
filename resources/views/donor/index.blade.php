@extends('donor.layout')

@section('content')
    <!--Header Section-->
    <div class="container-fluid header-section-wrap">
        @if (session()->has('success'))
            <p class="alert" id="alert-register-message">{{ session()->get('success') }}</p>
        @endif
        <div class="header row" style="padding: 30px 0;">
            <div class="header-text col-md-12 col-lg-6">
                <div class="header-text-wrap">
                    <h1 class="h1">Blood Donation Management System</h1>
                    <h3 class="h3">Donate the blood to save the life</h3>
                    <h3 class="h3">Donate the blood to help the others</h3>
                </div>
            </div>
            <div class="header-photo col-md-12 col-lg-6">
                <img src="{{ asset('img/header.png') }}" alt="Header Photo">
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
                    The Blood Donation Management System (BDMS) is an innovative and comprehensive solution designed to
                    streamline the process of blood donation and management. Developed as a fifth-year thesis project by our
                    group, this system aims to address the inefficiencies in traditional blood donation practices and
                    enhance the experience for donors, recipients, and healthcare providers. BDMS integrates modern
                    technology to manage donor information, schedule donations, track blood inventory, and ensure compliance
                    with regulatory standards. The system is designed to be user-friendly, secure, and scalable, making it
                    an essential tool for hospitals, blood banks, and other medical institutions.
                </p>
                @guest('donor')
                    <a href="#" class="background-section-btn btn btn-primary btn-lg text-center center-aligned">Become a
                        Life Saver!</a>
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
                    <img src="img/binoculars.png" alt="Our Vission" class="img img-responsive" width="168"
                        height="168">
                    <p class="text-center">
                        We are a group of exceptional programmers; our aim is to promote education. If you are a student,
                        then contact us to secure your future. We deliver free international standard video lectures and
                        content. We are also providing services in Web & Software Development.
                    </p>
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <h3 class="text-center red">Our Goal</h3>
                    <img src="img/target.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
                    <p class="text-center">
                        We are a group of exceptional programmers; our aim is to promote education. If you are a student,
                        then contact us to secure your future. We deliver free international standard video lectures and
                        content. We are also providing services in Web & Software Development.
                    </p>
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <h3 class="text-center red">Our Mission</h3>
                    <img src="img/goal.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
                    <p class="text-center">
                        We are a group of exceptional programmers; our aim is to promote education. If you are a student,
                        then contact us to secure your future. We deliver free international standard video lectures and
                        content. We are also providing services in Web & Software Development.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- end aboutus section -->
@endsection

@section('latLong')
    <script>
        const div = document.getElementById('#alert-register-message');
        setTimeout(function() {
            $("#alert-register-message").fadeOut().empty();
        }, 2000);
    </script>
@endsection
