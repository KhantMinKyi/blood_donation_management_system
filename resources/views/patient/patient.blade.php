@extends('patient.layout')

@section('content')

    <div class="container-fluid header-section-wrap">
        @if (session()->has('success'))
            <p class="alert" id="alert-register-message">{{ session()->get('success') }}</p>
        @endif
        <div class="patient-container">
            <div class="patient-main-content">
                <h2 class="patient-main-text">Request your blood here</h2>
                <p class="patient-secondary-text">We wish u best of luck in your life</p>
                <div class="patient-btn">
                    <a href="{{ url('/patient/emergencyForm') }}" class="patient-btn-emergency">Emergency Request</a>
                    @auth('patient')
                        <a href="{{ url('/patient/normalForm') }}" class="patient-btn-normal">Normal Request</a>
                    @endauth
                </div> <!--patient-btn-->
            </div> <!--patient-main-content-->
        </div> <!--patient-container-->
    </div>

    <!-- <div class="patient-container patient-clearfix">
                                  <div class="patient-map patient-ft-left">
                                    <h2>Checkout the map here</h2>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.078477054477!2d96.16997827463341!3d16.772770784013396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ec8aa022724b%3A0xc810c8d68d72285a!2sBotahtaung%20Pagoda%20Rd%2C%20Yangon!5e0!3m2!1sen!2smm!4v1688838876549!5m2!1sen!2smm" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                  </div>


                                  <div class="patient-acc patient-ft-right">

                                  @guest('patient')
        <p>Open account now and put your mind at ease.</p>
                                                                    <a href="{{ url('/patient/registerForm') }}" class="patient-btn-acc">Become a patient</a>
    @endguest


                                    @auth('patient')
        <p>Check your history here.</p>
                                                                    <a href="{{ url('/patient/history') }}" class="patient-btn-acc">Check history</a>
    @endauth

                                    <p>Learn more about us by clicking this button.</p>
                                    <a href="{{ url('/patient/aboutUs') }}" class="patient-btn-acc">About us</a>
                                  </div>
                                </div> -->




    <div class="container-fluid vission-goal-mission-section patient-container">
        <div class="row">

            <div class="col-sm-12 col-md-4">
                <a href="{{ url('/patient/aboutUs') }}">
                    <div class="card">
                        <h3 class="text-center red">About Us</h3>
                        <img src="img/about_us.jpg" alt="About Us" class="img img-responsive" width="168" height="168">
                        <p class="text-center">
                            The Blood Donation Management System (BDMS) is an innovative and comprehensive solution designed
                            to streamline the process of blood donation and management. Developed as a fifth-year thesis
                            project by our group, this system aims to address the inefficiencies in traditional blood
                            donation practices and enhance the experience for donors, recipients, and healthcare providers.
                            BDMS integrates modern technology to manage donor information, schedule donations, track blood
                            inventory, and ensure compliance with regulatory standards. The system is designed to be
                            user-friendly, secure, and scalable, making it an essential tool for hospitals, blood banks, and
                            other medical institutions.
                        </p>
                    </div>
                </a>
            </div>

            @guest('patient')
                <div class="col-sm-12 col-md-4">
                    <a href="{{ url('/patient/registerForm') }}">
                        <div class="card">
                            <h3 class="text-center red">Become a patient</h3>
                            <img src="img/patient.jpg" alt="Patient" class="img img-responsive" width="168" height="168">
                            <p class="text-center">
                                We are a group of exceptional programmers; our aim is to promote education. If you are a
                                student, then contact us to secure your future. We deliver free international standard video
                                lectures and content. We are also providing services in Web & Software Development.
                            </p>
                        </div>
                    </a>
                </div>
            @endguest

            @guest('patient')
                <div class="col-sm-12 col-md-4">
                    <a href="{{ url('/patient/signin') }}">
                        <div class="card">
                            <h3 class="text-center red">Sign In to your account</h3>
                            <img src="img/sign.jpg" alt="Sign" class="img img-responsive" width="168" height="168">
                            <p class="text-center">
                                We are a group of exceptional programmers; our aim is to promote education. If you are a
                                student, then contact us to secure your future. We deliver free international standard video
                                lectures and content. We are also providing services in Web & Software Development.
                            </p>
                        </div>
                    </a>
                </div>
            @endguest

            @auth('patient')
                <div class="col-sm-12 col-md-4">
                    <a href="{{ url('/patient/history/' . auth('patient')->user()->id) }}">
                        <div class="card">
                            <h3 class="text-center red">History</h3>
                            <img src="img/history.jpg" alt="History" class="img img-responsive" width="168" height="168">
                            <p class="text-center">
                                The concept of the Blood Donation Management System originated from the increasing need for a
                                more organized and efficient method to manage blood donations. Traditional methods often
                                involved manual record-keeping and communication, leading to errors, delays, and inefficiencies.
                                Recognizing these challenges, our group embarked on this project with the goal of leveraging
                                technology to improve the overall blood donation process. The development began with extensive
                                research into the existing systems, identifying their strengths and weaknesses. Over the course
                                of five years, our team conducted numerous interviews with healthcare professionals, analyzed
                                data from blood banks, and collaborated with software developers to create a system that
                                addresses the identified gaps. The result is a robust and reliable management system that not
                                only simplifies the donation process but also enhances the safety and availability of blood
                                supplies.
                            </p>
                        </div>
                    </a>
                </div>
            @endauth

            @auth('patient')
                <div class="col-sm-12 col-md-4">
                    <a href="{{ url('/patient/notification') }}">
                        <div class="card">
                            <h3 class="text-center red">Notification</h3>
                            <img src="img/noti.jpg" alt="Notification" class="img img-responsive" width="168" height="168">
                            <p class="text-center">
                                A key feature of the Blood Donation Management System is its advanced notification system. This
                                feature ensures that all stakeholders are kept informed and up-to-date throughout the donation
                                process. Donors receive timely reminders about upcoming donation appointments, eligibility
                                periods, and health tips via SMS, email, or app notifications. Healthcare providers and blood
                                bank staff are alerted about new donations, inventory levels, and potential shortages, enabling
                                them to manage supplies more effectively. The system also includes notifications for emergency
                                situations, where immediate blood donations are required, thus facilitating rapid response and
                                saving lives. This comprehensive notification system enhances communication, reduces missed
                                appointments, and ensures a steady and reliable blood supply.
                            </p>
                        </div>
                    </a>
                </div>
            @endauth
        </div>
    </div>






@section('latLong')
    <script>
        const div = document.getElementById('#alert-register-message');
        setTimeout(function() {
            $("#alert-register-message").fadeOut().empty();
        }, 2000);
    </script>
@endsection
