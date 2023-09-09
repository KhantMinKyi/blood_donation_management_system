<!--Header Section Starts-->

<!DOCTYPE html>

<head>
  <title>Blood Donation Management System - BDMS</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Blood Donation Website">
  <meta name="author" content="Fifth Year IT Group 2">

  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

  <!-- Bootstrap 4 Link CSS Files -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

  {{-- Map Css --}}
  <link rel="stylesheet" href="{{ asset('admincss/home.css') }}">
  <link rel="stylesheet" href="src/leaflet.css" />
  <link rel="stylesheet" href="dist/leaflet-locationpicker.src.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

  <!--Fontawesome Link CSS Files-->
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

  <!--Style Link CSS Files-->
  <link rel="stylesheet" href="{{ asset('css/user-styles.css') }}">

  <!-- Custom Link CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/user-custom.css') }}">

  <!-- Donar Link CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/donar.css') }}">

  <!-- Search Link CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/search.css') }}">

  <!-- Signin Link CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/signin.css') }}">

  <!-- About Link CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/about.css') }}">

  <!-- Patient Link CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/patient.css') }}">

  <!-- Register Link CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">

  {{-- Map Css --}}
  <!--<link rel="stylesheet" href="{{ asset('admincss/home.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('src/leaflet.css') }}" />-->
  <!--<link rel="stylesheet" href="{{ asset('dist/leaflet-locationpicker.src.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />-->-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  
  <style>
    .map-wrapper {
      text-align: center;
      padding-left: 30%;
    }
    #map {
      width: 60%;
      height: 400px;
      text-align: center;
    }
  </style>

</head>

<body>
    <nav id="mainNav" class="navbar fixed-top navbar-default navbar-expand-lg navbar-dark bg-light">
        <a class="navbar-brand logo-text" href="{{ url('/') }}">Blood Donation Management System</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            </ul>

            <ul class="navbar-nav form-inline my-2 my-lg-0 donor-nav">



                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/patient') }}">Home</a>
                </li>

                <!-- @auth('donor')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/donor/bloodRequest') }}">Blood Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/donor/history/' . auth('donor')->user()->id) }}">History</a>
                    </li>
                @endauth -->

                @auth('patient')
                <li class="nav-item">
                        <a class="nav-link" href="{{ url('/patient/history') }}">History</a>
                    </li>
                @endauth

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/patient/aboutUs') }}">About Us</a>
                </li>

                <!-- @guest('donor')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/donor/signin') }}">Donor Signin</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/donor/registerForm') }}">Donor Register</a>
                    </li>
                @endguest -->

                @guest('patient')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/patient/signin') }}">Patient Signin</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/patient/registerForm') }}">Patient Register</a>
                    </li>
                @endguest

                <!-- @auth('donor')
                    <li class="nav-item dropdown nav-item-dropdownlist donor-nav-item-dropdownlist">
                        <a class="nav-link dropdown-toggle donor-nav-link-dropdown" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth('donor')->user()->name }}

                        </a>
                        <div class="dropdown-menu donor-navbar-dropdown" aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href='{{ url("donor/profile/" . auth('donor')->user()->id) }}'><i class="fa fa-user"
                                    aria-hidden="true"></i>
                                    Profile</a>

                            <a class="dropdown-item" href="{{ url("donors/" . auth('donor')->user()->id) . "/edit" }}"><i class="fa fa-edit" aria-hidden="true"></i>
                                Update Profile</a>

                            <a class="dropdown-item" href="{{ url('donor/logout') }}">
                                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>

                                Logout</a>
                        </div>
                    </li>
                @endauth -->

                @auth('patient')
                    <li class="nav-item dropdown nav-item-dropdownlist donor-nav-item-dropdownlist">
                        <a class="nav-link dropdown-toggle donor-nav-link-dropdown" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth('patient')->user()->name }}
                        </a>
                        <div class="dropdown-menu donor-navbar-dropdown" aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href="{{ url("patient/profile/" . auth('patient')->user()->id) }}"><i class="fa fa-user"
                                    aria-hidden="true"></i>Profile</a>

                            <a class="dropdown-item" href="{{ url("patients/" . auth('patient')->user()->id) . "/edit" }}"><i class="fa fa-edit"
                                    aria-hidden="true"></i>
                                Update Profile</a>

                            <a class="dropdown-item" href="{{ url('patient/logout') }}">
                                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>

                                Logout</a>
                        </div>
                    </li>
                @endauth


            </ul>
        </div>
    </nav>

    <!--End of Header Section-->

  <!--Content or Body Section Starts-->

  <div class="container-fluid red-background size signin-section donor-profile">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8 col-sm-12">
        <h2 class="h2 text-center mb-5">Notification Detail Page</h2>
        <h4 class="h4 text-center mb-5">{{ $donor->name }}'s Information</h4>
        <table class="table table-bordered table-striped">
          <tr>
            <th>Name</th>
            <td>{{ $donor->name }}</td>
          </tr>
          <tr>
            <th>Username</th>
            <td>{{ $donor->user_name }}</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>{{ $donor->email }}</td>
          </tr>
          <tr>
            <th>Phone</th>
            <td>{{ $donor->phone }}</td>
          </tr>
          <tr>
            <th>Gender</th>
            <td>{{ $donor->gender }}</td>
          </tr>
          <tr>
            <th>Date Of Birth</th>
            <td>{{ $donor->dob }}</td>
          </tr>
          <tr>
            <th>Blood Type</th>
            <td>{{ $donor->blood_type->name }}</td>
          </tr>
          <tr>
            <th>Status</th>
            <td>{{ $donor->status }}</td>
          </tr>
          <tr>
            <th>City</th>
            <td>{{ $donor->city->name }}</td>
          </tr>
          <tr>
            <th>Township</th>
            <td>{{ $donor->township->name }}</td>
          </tr>
          <tr>
            <th>Remark</th>
            <td>
              @if(!$donor->remark)
              -
              @else {{ $donor->remark }}
              @endif
            </td>
          </tr>
          <tr>
            <th>Disease</th>
            <td>
              @if(!$donor->disease)
              -
              @else {{ $donor->disease }}
              @endif
            </td>
          </tr>
          <tr>
            <th>Address</th>
            <td>{{ $donor->address }}</td>
          </tr>
          <tr>
            <th>Latitude</th>
            <td>{{ $donor->latitude }}</td>
          </tr>
          <tr>
            <th>Longitude</th>
            <td>{{ $donor->longitude }}</td>
          </tr>
        </table>
      </div>
    </div>
  

    <h4 class="h4 text-center my-5">Location Map between You, Donor and Hospital</h4>
      <div class="map-wrapper">
      <div id="map"></div>
      </div>
   
  </div>

  <footer class="user-footer-section">
    <!--footer-copyright section-->
    <div class="footer-copyright">
      <p>BDMS
      </p>
    </div>
    <!--end of footer-copyright section-->
    <!--footer-address section-->
    <div class="footer-address">
      <div class="footer-address-phone">
        <p>reach us @ 09786362734</p>
      </div>
      <div class="footer-address-email">
        <p>blooddonationproject@gmail.com</p>
      </div>
    </div>


    <!--end of footer-address section-->
    <!--footer-logo section-->
    <div class="footer-logo">
      <i class="fa-brands fa-square-facebook"></i>
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-square-twitter"></i>
      <i class="fa-brands fa-youtube"></i>
    </div>
    <!--end of footer-logo section-->
  </footer>
  <!--end of Footer Section-->
  <!-- end contact us section -->

  <!-- JQuery File -->
  <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>

  <!-- BootStrap JS File-->
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

  <!-- Fontawesome Icon JS-->
  <script defer src="{{ asset('js/all.js') }}"></script>

  {{-- Start Map CDN Script --}}
  <script defer src="{{ asset('js/all.js') }}"></script>
  <script src="http://code.jquery.com/jquery.min.js"></script>
  <script src="src/jquery.min.js"></script>
  <script src="src/leaflet.js"></script>
  <script src="{{ asset('dist/leaflet-locationpicker.min.js') }}"></script>
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet-src.js" integrity="sha512-fpi1rrlFr2rHd73hMSMXVnwSHViuYx19zS0NDn6awKeMuQZk7JU4UpyR44bSqGZxzDMzBnVEewram7ZGwhRbZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet-src.js.map"></script>
  {{-- End Map CDN Script --}}

  {{-- Map Script --}}
  <script>
    var patientIcon = new L.Icon({
            iconUrl: '{{ asset('img/patient_logo.png') }}',
            iconSize: [30, 30],
            iconAnchor: [20, 20],
            popupAnchor: [1, -14],
        });
        var hospitalIcon = new L.Icon({
            iconUrl: '{{ asset('img/hospital_logo.png') }}',
            iconSize: [20, 31],
            iconAnchor: [20, 31],
            popupAnchor: [1, -14]
        });
        var donorIcon = new L.Icon({
            iconUrl: '{{ asset('img/donor_logo.png') }}',
            iconSize: [20, 30],
            iconAnchor: [20, 30],
            popupAnchor: [1, -14],
        });
const map = L.map('map');
map.setView([{{ auth('patient')->user()->latitude }}, {{ auth('patient')->user()->longitude }}], 12);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
L.marker([{{ auth('patient')->user()->latitude }}, {{ auth('patient')->user()->longitude }}], {icon: patientIcon})
            .addTo(map)
            .bindPopup('You')
            .openPopup();

L.marker([{{ $hospitalLat }}, {{ $hospitalLong }}], {icon: hospitalIcon})
            .addTo(map)
            .bindPopup('Hospital')
            .openPopup();

 L.marker([{{ $donor->latitude }}, {{ $donor->longitude }}], {icon: donorIcon})
            .addTo(map)
            .bindPopup('Donor')
            .openPopup();
           
  </script>
  {{-- End of Map Script --}}
</body>
</html>
<!--End of Footer Section-->