@extends('patient.layout')

@section('content')

<div class="container-fluid red-background size signin-section donor-profile">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-12">
    <h2 class="h2 text-center mb-5">{{ $patient->name }} Profile</h2>
      <table class="table table-bordered table-striped">
        <tr>
          <th>Name</th>
          <td>{{ $patient->name }}</td>
        </tr>
        <tr>
          <th>Username</th>
          <td>{{ $patient->user_name }}</td>
        </tr>
        <tr>
          <th>Patient ID</th>
          <td>{{ $patient->patient_id }}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{ $patient->email }}</td>
        </tr>
        <tr>
          <th>Phone</th>
          <td>{{ $patient->phone }}</td>
        </tr>
        <tr>
          <th>Gender</th>
          <td>{{ $patient->gender }}</td>
        </tr>
        <tr>
          <th>Date Of Birth</th>
          <td>{{ $patient->dob }}</td>
        </tr>
        <tr>
          <th>NRC</th>
          <td>{{ $patient->nrc }}</td>
        </tr>
        <tr>
          <th>Blood Type</th>
          <td>{{ $patient->blood_type->name }}</td>
        </tr>
        <tr>
          <th>Status</th>
          <td>{{ $patient->status }}</td>
        </tr>
        <tr>
          <th>City</th>
          <td>{{ $patient->city->name }}</td>
        </tr>
        <tr>
          <th>Township</th>
          <td>{{ $patient->township->name }}</td>
        </tr>
        <tr>
          <th>Remark</th>
          <td>
            @if(!$patient->remark)
              -
            @else {{ $patient->remark }}
            @endif
          </td>
        </tr>
        <tr>
          <th>Disease</th>
          <td>
            @if(!$patient->disease)
              -
            @else {{ $patient->disease }}
            @endif
          </td>
        </tr>
        <tr>
          <th>Address</th>
          <td>{{ $patient->address }}</td>
        </tr>
        <tr>
          <th>Latitude</th>
          <td>{{ $patient->latitude }}</td>
        </tr>
        <tr>
          <th>Longitude</th>
          <td>{{ $patient->longitude }}</td>
        </tr>
      </table>
    </div>
  </div>
</div>

@endsection