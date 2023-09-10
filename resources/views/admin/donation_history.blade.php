<!-- donation request history of the user in the system -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation History</title>
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

        /* Gray */
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-danger">
        <a style="color:white;" class="navbar-brand" href="donation_history.html">Blood Donation Management System</a>


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
                <H4 class="text-center">Blood Donation History</H4><br>

                <h5 class="text-center" style="color: red;">Records</h5><br>

                <table class="table table-light table-hover table-bordered table-striped">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col">Donation Id</th>
                            <th scope="col">Donor Name</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Blood Type</th>
                            <th scope="col">Complete Time</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (isset($donation_records))
                            @foreach ($donation_records as $donation_record)
                                <td>
                                    <a href={{ url('/admin/donation_history_detail/' . $donation_record->id) }}>
                                        {{ 'BD_DHR0000' . $donation_record->id }}
                                    </a>
                                </td>
                                <td>{{ $donation_record->donor->name }}</td>
                                @if (isset($donation_record->patient))
                                    <td>{{ $donation_record->patient->name }}</td>
                                @else
                                    <td>{{ $donation_record->admin_report->patient_name }} </td>
                                @endif
                                <td>{{ $donation_record->admin_report->blood_type->name }} </td>
                                <td>{{ date('H:m A', strToTime($donation_record->created_at)) }}</td>
                                <td>{{ date('d.m.Y', strToTime($donation_record->created_at)) }}</td>
                            @endforeach
                        @endif
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
