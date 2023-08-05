<!-- admin login page-->
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Donation Management System </title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

    <!-- Bootstrap 4 Link CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!--Fontawesome Link CSS Files-->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- Custom Link CSS Files -->
    <link rel="stylesheet" href="{{ asset('admincss/index.css') }}">

</head>

<body>
    <!-- admin login form -->
    <div class="bs-example">
        <nav style="background-color: #113768;" class="navbar navbar-expand-md navbar-dark fixed-top">
            <a style="color:white;" class="navbar-brand">Blood Donation Management System</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">


                <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="admin.blade.php"></a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <br><br><br>
            <div class="card card-5">
                <div style="background-color:#113768;" class="card-heading">
                    <h2 class="title">Admin Login</h2>
                </div>
                <div class="card-body">
                    <form style="align-content: center; width: 100%; " action={{ url('admin/login') }} method="post">
                        @csrf
                        <div class="form-row">
                            <div class="name">Username</div>
                            <div class="value">
                                <input type="text" class="form-control" name="user_name" placeholder="Username"
                                    required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required>
                            </div>
                        </div>
                        <div align='center'>

                            <input style="background-color: #113768;"type="submit" class="btn btn--radius-2"
                                name="submit" value="Login">

                        </div>
                    </form>
                    <div align='center'>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- JQuery File -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>

    <!-- BootStrap JS File-->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Fontawesome Icon JS-->
    <script defer src="{{ asset('js/all.js') }}"></script>

</body>

</html>
