@extends('layouts.app')

@section('content')

<div class="container-fluid container-fluid-banner">
    <div class="header-img"></div>
    <div class="row header-section">
        <div class="col">

            <div class="header">
                <h1 class="text-center">Donate the blood, save the life</h1>
                <p class="text-center">Donate the blood to help the others.</p>
            </div>


            <h1 class="text-center">Search The Donors</h1>
            <hr class="white-bar text-center">

            <form action="#" method="get" class="form-inline text-center header-select row d-flex justify-content-center" style="padding: 40px 0px 0px 5px;">
                <div class="form-group text-center justify-content-center col-sm-12 col-lg-4 col-md-6">

                    <select style="width: 220px; height: 45px;" name="city" id="city" class="form-control demo-default mx-auto" required>
                        <option value="">Search By Township</option>
                        <optgroup title="Western Yangon" label="&raquo; Western Yangon"></optgroup>
                        <option value="Kamaryut">Kamaryut</option>
                        <option value="Kyauktada">Kyauktada</option>
                        <option value="Kyimyindine">Kyimyindine</option>
                        <option value="Sangyoung">Sangyoung</option>
                        <option value="Seikkan">Seikkan</option>
                        <option value="Pabedann">Pabedann</option>
                        <option value="Bahann">Bahann</option>
                        <option value="Lanmadaw">Lanmadaw</option>
                        <optgroup title="Southern Yangon" label="&raquo; Southern Yangon"></optgroup>
                        <option value="Kawhmu">Kawhmu</option>
                        <option value="Kyauktan">Kyauktan</option>
                        <option value="Kungyangonn">Kungyangonn</option>
                        <option value="Kayan">Kayan</option>
                        <option value="Dalla">Dalla</option>
                        <option value="Thongwa">Thongwa</option>
                        <option value="Thanlyin">Thanlyin</option>
                        <optgroup title="Northern Yangon" label="&raquo; Northern Yangon"></optgroup>
                        <option value="Taikkyi">Taikkyi</option>
                        <option value="Htantabin">Htantabin</option>
                        <option value="Shwepyitha">Shwepyitha</option>
                        <option value="Hlinethaya">Hlinethaya</option>
                        <option value="Hlegu">Hlegu</option>
                        <option value="Mingalataungnyunt">Mingalataungnyunt</option>
                        <option value="Insein">Insein</option>
                        <optgroup title="Eastern Yangon" label="&raquo; Eastern Yangon"></optgroup>
                        <option value="Tarmwe">Tarmwe</option>
                        <option value="South Okkalapa">South Okkalapa</option>
                        <option value="Dawbon">Dawbon</option>
                        <option value="Pazundaung">Pazundaung</option>
                        <option value="Botahtaung">Botahtaung</option>
                        <option value="Mingalataungnyunt">Mingalataungnyunt</option>
                        <option value="Yankin">Yankin</option>
                    </select>
                </div>
                <div class="form-group center-aligned col-sm-12 col-lg-4 col-md-6">
                    <select name="blood_group" id="blood_group" style="padding: 0 20px; width: 220px; height: 45px;" class="form-control demo-default text-center margin10px mx-auto">
                    <option value="">Search By Blood Type</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>

                    </select>
                </div>
                <div class="form-group center-aligned col-sm-12 col-lg-4 col-md-12 justify-content-center mx-auto">
                   
                    <button type="submit" class="btn btn-lg btn-background-blue" @auth('donor') @else disabled @endauth>Search Data</button>
                    
                </div>
            </form>
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
            <a href="#" class="background-section-btn btn btn-primary btn-lg text-center center-aligned">Become a Life Saver!</a>
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