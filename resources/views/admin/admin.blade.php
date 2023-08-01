<!-- admin home page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

    <!-- Bootstrap 4 Link CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!--Fontawesome Link CSS Files-->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- Custom Link CSS Files -->
    <link rel="stylesheet" href="{{ asset('admincss/home.css') }}">

    <style>
        .label {
            color: white;
            padding: 8px;
        }

        .success {
            background-color: #4CAF50;
        }

        /* Green */
        .info {
            background-color: #2196F3;
        }

        /* Blue */
        .warning {
            background-color: #ff9800;
        }

        /* Orange */
        .danger {
            background-color: #f44336;
        }

        /* Red */
        .other {
            background-color: #e7e7e7;
            color: black;
        }

        .card-body {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: row-reverse;
            font-weight: bold;

        }

        /* Gray */
    </style>

</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-danger">
        <a style="color:white;" class="navbar-brand" href="admin.html">Blood Donation Management System</a>


        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href={{ url('admin/logout') }}>Logout &nbsp;</a>
                </li>

            </ul>
        </div>
    </nav>
    <br><br>
    <div class="wrapper">
        @include('Admin.Components.sidebar')
        <div class="main_content">

            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <h2>A+ <i class="fas fa-tint"></i></h2>
                                </div>
                                <div>
                                    {{ $count_a_plus }}
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <h2>B+ <i class="fas fa-tint"></i></h2>
                                </div>
                                <div>
                                    {{ $count_b_plus }}
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <h2>O+ <i class="fas fa-tint"></i></h2>
                                </div>
                                <div>
                                    {{ $count_o_plus }}
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <h2>AB+ <i class="fas fa-tint"></i></h2>
                                </div>
                                <div>
                                    {{ $count_ab_plus }}
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <h2>A- <i class="fas fa-tint"></i></h2>
                                </div>
                                <div>
                                    {{ $count_a_minus }}
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <h2>B- <i class="fas fa-tint"></i></h2>
                                </div>
                                <div>
                                    {{ $count_b_minus }}
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <h2>O- <i class="fas fa-tint"></i></h2>
                                </div>
                                <div>
                                    {{ $count_o_minus }}
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <h2>AB- <i class="fas fa-tint"></i></h2>
                                </div>
                                <div>
                                    {{ $count_ab_minus }}
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    {{ $count_users }}
                                </div>
                                <div>
                                    Total Users
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <i class="fas fa-spinner"></i>
                                </div><br>
                                <div>
                                    Pending Requests <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <i class="far fa-check-circle"></i>
                                </div><br>
                                <div>
                                    Approved Requests <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <i class="fas fa-tint xyz"></i>
                                </div><br>
                                <div>
                                    Total Blood Unit (in ml) <br>
                                </div>
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
