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
    {{-- Map Css --}}
    <link rel="stylesheet" href="{{ asset('admincss/home.css') }}">
    <link rel="stylesheet" href="src/leaflet.css" />
    <link rel="stylesheet" href="dist/leaflet-locationpicker.src.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
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
            height: 90%;
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

        .modal {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        .modal-content {
            top: 35%;
            margin: auto;
            width: 40%;
            padding: 10px;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            width: 40px;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .model_div {
            text-align: center;
        }

        .model_btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 3%;

        }

        .btn_phone {
            border: 1.5px solid #4CAF50;
            padding: 8px 12px;
            border-radius: 10px;
            margin: 15px;
            cursor: pointer;
            background-color: white;
        }

        .btn_phone:hover {
            background-color: #4CAF50;
            box-shadow: #000;
        }

        .btn_phone:focus,
        .btn_cancel_report:focus,
        .btn_cancel:focus {
            outline: none;
        }

        .btn_cancel {
            border: 1.5px solid #f44336;
            padding: 8px 12px;
            border-radius: 10px;
            margin: 15px;
            cursor: pointer;
        }

        .btn_cancel:hover {
            background-color: #f44336;
            box-shadow: #000;
        }

        .btn_cancel_report {
            border: 1.5px solid #f44336;
            padding: 8px 12px;
            border-radius: 10px;
            cursor: pointer;
            background-color: white;
        }

        .btn_cancel_report:hover {
            background-color: #f44336;
            box-shadow: #000;
        }

        .btn_cancel_report_back {
            border: 1.5px solid #2196F3;
            padding: 8px 12px;
            border-radius: 10px;
            cursor: pointer;
            background-color: white;
        }

        .btn_cancel_report_back:hover {
            background-color: #2196F3;
            box-shadow: #000;
        }

        .cancel_model_btn_div {
            display: flex;
            justify-content: center;
            gap: 8%;
            margin-bottom: 20px;
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
                <div id="cancelModel" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="model_div">
                            <span class="close" onclick=closeCancelModel()>&times;</span>
                            <div style="margin-top: 20px;margin-left: 40px;">
                                <h6>Are You Sure Want to Cancel</h6>
                            </div>
                            <div class="cancel_model_btn_div">
                                <form action="/admin/admin_cancel_report" method="POST">
                                    @csrf
                                    <input type="hidden" name="admin_report_id" value="">
                                    <input type="hidden" name="report_type" value="cancel">
                                    <input type="submit" value="Cancel Report" class="btn_cancel_report">
                                </form>
                                <button class="btn_cancel_report_back" onclick=closeCancelModel()>Go Back</button>
                            </div>

                        </div>
                    </div>
                </div>
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
                            <th scope="col">Type</th>
                            <th scope="col">Appoint Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                {{ 'BD_PR0000' . $report->id }}
                            </td>
                            <td>{{ $report->report_date_time }}</td>
                            @if (isset($report->patient))
                                <td>{{ $report->patient->patient_id }}</td>
                            @else
                                <td>Not User </td>
                            @endif
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->remark }}</td>
                            <td>{{ Str::upper($report->type) }}</td>
                            <td>{{ $report->date_of_appointment ? date('d-m-yy', strToTime($report->date_of_appointment)) : '-' }}
                            </td>
                            <td>{{ $report->status }}</td>
                            {{-- <td>
                                <form action={{ url('/admin/report_donor') }} method="post">
                                    @csrf
                                    <input type="hidden" value={{ $report->id }} name="admin_report_id">
                                    <button class="btn_cancel_report">Cancel</button>
                                </form>
                            </td> --}}
                            <td>
                                <button onclick=cancelModel() class="btn_cancel_report">Cancel</button>
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>
            <div class="patient-div">
                <div class="patient-info">
                    <div class="form-group">
                        <label for="" class="text-sm">Patient Name </label>
                        <input type="text" name="" class="form-control" value="{{ $report->patient_name }}"
                            disabled>
                    </div>
                    {{-- <div class="form-group">
                        <label for="" class="text-sm">Patient Age</label>
                        <input type="text" name="" class="form-control" value={{ $report->patient_age }}
                            disabled>
                    </div> --}}
                    <div class="form-group">
                        <label for="" class="text-sm">Patient Diseases</label>
                        <input type="text" name="" class="form-control" value="{{ $report->diseases }}"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Patient Remark</label>
                        <input type="text" name="" class="form-control"
                            value={{ $report->remark ? $report->remark : '-' }} disabled>
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
                        <h6><b>{{ $report->distance_patient . ' Km Away from Hospital' }}</b> </h6>
                        <hr>
                    </div>
                    <div class="map">
                        <div id="map" class="map"></div>
                    </div>

                </div>
            </div>
            <div>


            </div>
            <hr>
            <div>
                <h4 class="header-donor">Near Donors</h4>
                <div class="donor-div">
                    @foreach ($near_donors as $key => $near_donor)
                        <div class="donor-info">
                            <div class="distance">
                                <h6><b>{{ $near_donor->distance_hospital . ' Km Away from Hospital' }}</b> </h6>
                            </div>
                            <div class="buttom-div">
                                <button class="buttom"
                                    onclick="showModel({{ $key }},{{ $near_donor->latitude }},{{ $near_donor->longitude }})">Contact</button>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Donor Name</label>
                                <input type="text" name="" class="form-control"
                                    value="{{ $near_donor->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Donor Name</label>
                                <input type="text" name="" class="form-control"
                                    value=" {{ $near_donor->latitude }}" disabled>
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
                                    value="{{ $near_donor->remark }}" disabled>

                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Donor Township</label>
                                <input type="text" name="" class="form-control"
                                    value={{ $near_donor->township->name }} disabled>
                            </div>
                            <!-- The Modal -->
                            <div id="myModal{{ $key }}" class="modal">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close" onclick="closeModel({{ $key }})">&times;</span>
                                    <div class="model_div">
                                        <div>
                                            <h6>Contact To User - {{ $near_donor->name }}</h6>
                                            <h6>ဆက်သွယ်ရန်ဖုန်းနံပါတ် - {{ $near_donor->phone }}</h6>
                                            <h6>အနီးဆုံး အကွာအဝေး - {{ $near_donor->distance_hospital . 'Km' }}</h6>
                                            <h6>ဆက်သွယ်ရန် သွေးအလှုရှင်၏ လိပ်စာ - {{ $near_donor->address }}</h6>
                                        </div>
                                        <div>
                                            <div id="donor-map{{ $key }}" class="donor-map"></div>
                                        </div>
                                        <div class="model_btn">
                                            <form action={{ url('/admin/report_donor') }} method="post">
                                                @csrf
                                                <input type="hidden" value={{ $report->id }}
                                                    name="admin_report_id">
                                                <input type="hidden" value={{ $near_donor->id }} name="donor_id">
                                                <input type="hidden" value="website" name="report_type">
                                                <button class="btn_phone">Webiste Contact</button>
                                            </form>
                                            <form action={{ url('/admin/report_donor') }} method="post">
                                                @csrf
                                                <input type="hidden" value={{ $report->id }}
                                                    name="admin_report_id">
                                                <input type="hidden" value={{ $near_donor->id }} name="donor_id">
                                                <input type="hidden" value="phone" name="report_type">
                                                <button class="btn_phone">Phone Contact</button>
                                            </form>
                                            <a class="btn_cancel"
                                                onclick="closeModel({{ $key }})">Cancel</a>
                                        </div>
                                    </div>
                                </div>
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

    {{-- Start Map CDN Script --}}
    <script defer src="{{ asset('js/all.js') }}"></script>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="src/jquery.min.js"></script>
    <script src="src/leaflet.js"></script>
    <script src="dist/leaflet-locationpicker.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet-src.js"
        integrity="sha512-fpi1rrlFr2rHd73hMSMXVnwSHViuYx19zS0NDn6awKeMuQZk7JU4UpyR44bSqGZxzDMzBnVEewram7ZGwhRbZQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet-src.js.map"></script>
    {{-- End Map CDN Script --}}
    <script>
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
        var patientIcon = new L.Icon({
            iconUrl: '{{ asset('img/patient_logo.png') }}',
            iconSize: [30, 30],
            iconAnchor: [20, 20],
            popupAnchor: [1, -14],
        });

        function showModel(key, donorLat, donorLong) {
            var modal = document.getElementById("myModal" + key);
            modal.style.display = "block";
            var map = L.map('donor-map' + key).setView([{{ $report->latitude }}, {{ $report->longitude }}], 10);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            L.marker([donorLat, donorLong], {
                    icon: patientIcon
                }).addTo(map)
                .bindPopup('Patient Location')
                .openPopup();
            L.marker([{{ $report->admin->hospital->latitude }}, {{ $report->admin->hospital->longitude }}], {
                    icon: hospitalIcon
                }).addTo(
                    map)
                .bindPopup('Hospital Location')
                .openPopup();
        }

        function closeModel(key) {
            var modal = document.getElementById("myModal" + key);
            modal.style.display = "none";
        }
    </script>
    {{-- Close Model --}}
    <script>
        function cancelModel() {
            var modal = document.getElementById("cancelModel");
            modal.style.display = "block";
        }

        function closeCancelModel() {
            var modal = document.getElementById("cancelModel");
            modal.style.display = "none";
        }
    </script>
    <script>
        // When the user clicks anywhere outside of the modal, close it
        var modal = document.getElementByClassName("modal");
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    {{-- Map Script --}}
    <script>
        var hospitalIcon = new L.Icon({
            iconUrl: '{{ asset('img/hospital_logo.png') }}',
            iconSize: [20, 31],
            iconAnchor: [20, 31],
            popupAnchor: [1, -14]
        });
        var patientIcon = new L.Icon({
            iconUrl: '{{ asset('img/patient_logo.png') }}',
            iconSize: [30, 30],
            iconAnchor: [20, 20],
            popupAnchor: [1, -14],
        });
        var map = L.map('map').setView([{{ $report->latitude }}, {{ $report->longitude }}], 10);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([{{ $report->latitude }}, {{ $report->longitude }}], {
                icon: patientIcon
            }).addTo(map)
            .bindPopup('Patient Location')
            .openPopup();
        L.marker([{{ $report->admin->hospital->latitude }}, {{ $report->admin->hospital->longitude }}], {
                icon: hospitalIcon
            }).addTo(map)
            .bindPopup('Hospital Location')
            .openPopup();
    </script>

</body>

</html>
