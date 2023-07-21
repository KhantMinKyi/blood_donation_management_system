<!-- admin blood reqeust page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Request</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

    <!-- Bootstrap 4 Link CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!--Fontawesome Link CSS Files-->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- Custom Link CSS Files -->
    <link rel="stylesheet" href="{{ asset('admincss/home.css') }}">
    <style>
        hr {
            margin: 3px;
            margin-bottom: 20px;
        }

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

        .patient-div {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            margin-right: 80px;
            margin-left: 80px;
        }

        .patient-info {
            border: 1px solid #c3c3c3;
            width: 100%;
            margin: 5px;
            padding: 10px;
            border-radius: 10px;
        }

        .patient-map {
            width: 100%;
            margin: 5px;
            padding: 10px;
        }

        .map {
            height: 100%;
        }

        .header-donor {
            text-align: center;
        }

        .donor-div {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            margin-right: 80px;
            margin-left: 80px;
        }

        .donor-map {
            height: 150px;
            width: 100%;
        }

        .donor-info {
            border: 1px solid #c3c3c3;
            width: 100%;
            margin: 5px;
            padding: 10px;
            border-radius: 10px;
        }

        .buttom-div {
            float: right;
            margin-bottom: 5px;
        }

        .buttom-div:hover {
            color: white;
        }

        .buttom {
            padding: 8px;
            border: 1px solid #4CAF50;
            border-radius: 10px;
            margin-right: 0;
            margin-bottom: 10px;
            color: #4CAF50;
        }

        .buttom:hover {
            color: white;
            background-color: #4CAF50;
            box-shadow: 1px 1px #c4c4c4;
            cursor: pointer;
        }

        .buttom:focus {
            outline: none;
        }

        .distance {
            text-align: center;
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
                <H4 class="text-center">Blood Requests</H4><br>

                <h5 class="text-center" style="color: red;"> Records</h5><br>

                <table class="table table-light table-hover table-bordered table-striped">
                    <thead class="bg-info">
                        <tr>


                            <th scope="col">Request ID</th>
                            <th scope="col">Request Date</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Reasons</th>
                            <th scope="col">Status</th>
                            <th scope="col">Type</th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                {{ $report->id }}
                            </td>
                            <td>{{ $report->report_date_time }}</td>
                            @if (isset($report->patient))
                                <td>{{ $report->patient->patient_id }}</td>
                            @else
                                <td>Not User </td>
                            @endif
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->remark }}</td>
                            <td>{{ $report->status }}</td>
                            <td>{{ Str::upper($report->type) }}</td>
                        </tr>

                    </tbody>

                </table>
            </div>
            <div class="patient-div">
                <div class="patient-info">
                    <div class="form-group">
                        <label for="" class="text-sm">Patient Name </label>
                        <input type="text" name="" class="form-control" value={{ $report->patient_name }}
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Patient Age</label>
                        <input type="text" name="" class="form-control" value={{ $report->patient_age }}
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Patient Diseases</label>
                        <input type="text" name="" class="form-control" value={{ $report->diseases }}
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Patient Remark</label>
                        <input type="text" name="" class="form-control" value={{ $report->remark }} disabled>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Patient Blood Type</label>
                        <input type="text" name="" class="form-control" value={{ $report->blood_type->name }}
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Patient Phone Number</label>
                        <input type="text" name="" class="form-control" value={{ $report->phone }} disabled>
                    </div>
                    @if (isset($report->patient))
                        <div class="form-group">
                            <label for="" class="text-sm">Patient ID</label>
                            <input type="text" name="" class="form-control"
                                value={{ $report->patient->patient_id }} disabled>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-sm">City</label>
                            <input type="text" name="" class="form-control"
                                value={{ $report->patient->city->name }} disabled>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-sm">Township</label>
                            <input type="text" name="" class="form-control"
                                value={{ $report->patient->township->name }} disabled>
                        </div>
                    @endif
                </div>
                <div class="patient-map">
                    <div>
                        <h4>Patient Location</h4>
                        <h6>{{ $report->distance_patient . 'Km Away from Hsopital' }} </h6>
                        <hr>
                    </div>
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.9640634569155!2d96.15333890175206!3d16.77846342968354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ec8182d104e5%3A0x348434ab8f230295!2sDIAMOND%20BEAUTY!5e0!3m2!1sen!2smm!4v1689825340891!5m2!1sen!2smm"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>
            </div>
            <hr>
            <div>
                <h4 class="header-donor">Near Donors</h4>
                <div class="donor-div">
                    @foreach ($near_donors as $near_donor)
                        <div class="donor-info">
                            <div class="distance">
                                <h6>{{ $near_donor->distance_hospital . 'Km Away from Hsopital' }} </h6>
                            </div>
                            <div class="buttom-div">
                                <form action={{ url('/admin/report_donor') }} method="post">
                                    @csrf
                                    <input type="hidden" value={{ $report->id }} name="admin_report_id">
                                    <input type="hidden" value={{ $near_donor->id }} name="donor_id">
                                    <button class="buttom" type="submit">Contact</button>
                                </form>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Donor Age</label>
                                <input type="text" name="" class="form-control"
                                    value={{ $near_donor->name }} disabled>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Donor Blood Type</label>
                                <input type="text" name="" class="form-control"
                                    value={{ $near_donor->blood_type->name }} disabled>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Donor Phone Number</label>
                                <input type="text" name="" class="form-control"
                                    value={{ $near_donor->phone }} disabled>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Donor Status</label>
                                <input type="text" name="" class="form-control text-success"
                                    value={{ $near_donor->status }} disabled>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Donor Diseases</label>
                                <input type="text" name="" class="form-control"
                                    value={{ $near_donor->diseases ? $near_donor->diseases : 'Clear' }} disabled>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Donor Remark</label>
                                <input type="text" name="" class="form-control"
                                    value={{ $near_donor->remark }} disabled>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Donor Township</label>
                                <input type="text" name="" class="form-control"
                                    value={{ $near_donor->township->name }} disabled>
                            </div>
                            <div>
                                <iframe class="donor-map"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.9640634569155!2d96.15333890175206!3d16.77846342968354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ec8182d104e5%3A0x348434ab8f230295!2sDIAMOND%20BEAUTY!5e0!3m2!1sen!2smm!4v1689825340891!5m2!1sen!2smm"
                                    width="600" height="450" style="border:0;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    @endforeach
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