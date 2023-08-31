<!-- admin blood reqeust page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reported Blood Request</title>

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

        .donor_btn {
            padding: 6px 8px;
            border-radius: 6px;
            cursor: pointer;
            color: #f44336;
            border: 1px solid #f44336;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-danger">
        <a style="color:white;" class="navbar-brand" href="admin_blood_request.blade.php">Blood Donation Management
            System</a>


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
                <H4 class="text-center">Reported Blood Requests</H4><br>

                <h5 class="text-center" style="color: red;"> Reports</h5><br>

                <table class="table table-light table-hover table-bordered table-striped">
                    <thead class="bg-info">
                        <tr>


                            <th scope="col">Request ID</th>
                            <th scope="col">Request Date</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Blood Type</th>
                            <th scope="col">Reasons</th>
                            <th scope="col">Type</th>
                            <th scope="col">Donor Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td>
                                    <a href={{ url('/admin/admin_reported_blood_request/' . $report->id) }}>
                                        {{ 'BD_DR0000' . $report->id }}
                                    </a>
                                </td>
                                <td>{{ date('d.m.Y', strToTime($report->report_date_time)) }}</td>
                                @if (isset($report->patient))
                                    <td>{{ $report->patient->patient_id }}</td>
                                @else
                                    <td>Not User </td>
                                @endif
                                <td>{{ $report->admin_report->blood_type->name }}</td>
                                <td>{{ $report->remark }}</td>
                                <td>{{ Str::upper($report->type) }}</td>
                                <td>
                                    <span class="donor_btn"
                                        @if ($report->donor_confirm === 'done') style="border: 1px solid #4CAF50;color:#4CAF50" @endif>
                                        {{ $report->donor_confirm }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach

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
