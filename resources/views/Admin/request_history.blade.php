<!-- all the blood request user has specified -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request History</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{-- search js --}}
   <script src="{{asset('admin_js/script.js')}}"></script>
    <!-- Bootstrap 4 Link CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!--Fontawesome Link CSS Files-->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- Custom Link CSS Files -->
    <link rel="stylesheet" href="{{ asset('admincss/home.css') }}">

    <link rel="stylesheet" href="{{ asset('admincss/search.css') }}">


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

        /* Gray */
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-danger">
        <a style="color:white;" class="navbar-brand" href="request_history.html">Blood Donation Management System </a>


        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href={{ url('admin/logout') }}>Logout &nbsp; </a>
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
                <H4 class="text-center">Blood Request History</H4><br>

                <h5 class="text-center" style="color: red;"> Records</h5><br>

                <div class="form-group float-right">
                    <input type="text" class="search form-control" placeholder="What you looking for?">
                </div>
                <span class="counter float-right"></span>
                <table class="table table-light table-hover table-bordered table-striped results">
                    <thead class="bg-info">
                        <tr>
                            <th>No</th>
                            <th scope="col">Request ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Reasons</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>

                        </tr>
                        <tr class="warning no-result">
                            <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td scope="col">R0001</td>
                            <td scope="col">NN</td>
                            <td scope="col">1</td>
                            <td scope="col">Accident</td>
                            <td scope="col">Active</td>
                            <td scope="col">Action</td>
                        </tr>
                    </tbody>

                </table>

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
