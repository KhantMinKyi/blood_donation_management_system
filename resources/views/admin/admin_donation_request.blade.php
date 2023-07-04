<!-- admin blood donation reqeust page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Requests</title>
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

        .success {background-color: #4CAF50;} /* Green */
        .info {background-color: #2196F3;} /* Blue */
        .warning {background-color: #ff9800;} /* Orange */
        .danger {background-color: #f44336;} /* Red */
        .other {background-color: #e7e7e7; color: black;} /* Gray */

    </style>

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-danger">
        <a style="color:white;" class="navbar-brand" href="admin_donation_request.html">Blood Donation Management System</a>


        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="admin_login.html">Logout &nbsp;</a>
                </li>

            </ul>
        </div>
      </nav>
    <br><br>
    <div class="wrapper">
    <div class="sidebar">
        <ul>
            <li><a style="text-decoration:none;" href="admin.blade.php">Home</a></li>
            <li><a style="text-decoration:none;" href="admin_donation_request.blade.php">Donation Request</a></li>
            <li><a style="text-decoration:none;" href="admin_blood_request.blade.php">Blood Request</a></li>
            <li><a style="text-decoration:none;" href="users.blade.php"> Users</a></li>
            <li><a style="text-decoration:none;" href="request_history.blade.php"> Request History</a></li>
            <li><a style="text-decoration:none;" href="donation_history.blade.php"> Donation History</a></li>
            <li><a style="text-decoration:none;" href="inventory.blade.php"> Inventory</a></li>

        </ul>

    </div>
    <div class="main_content">
        <br><br>
        <div class="container">
            <H4 class="text-center">Blood Donation Requests</H4><br>

        <h5 class="text-center" style="color: red;">Records</h5><br>

            <table class="table table-light table-hover table-bordered table-striped">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">Request Id</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Diseases</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>

                <tbody>
                   <td>1</td>
                   <td>16.8.2023</td>
                   <td>1</td>
                   <td>2</td>
                   <td>No</td>
                   <td>Yes</td>
                   <td></td>
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
