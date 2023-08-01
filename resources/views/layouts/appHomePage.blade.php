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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <nav id="mainNav" class="navbar fixed-top navbar-default navbar-expand-lg navbar-dark bg-light">
    <a class="navbar-brand logo-text" href="{{ url('/') }}">Blood Donation Management System</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

    </div>
  </nav>

  <!--End of Header Section-->

  <!--Content or Body Section Starts-->

  @yield('content')

  <!--End of Content or Body Section-->

  <!--Footer Section Starts-->

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
  @yield('latLong')
  </div>
</body>

</html>


<!--End of Footer Section-->