@extends('donor.layout')

@section('content')

<div class="container-fluid red-background size signin-section donor-profile">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-12">
    <h2 class="h2 text-center mb-5">{{ $donor->name }} Profile</h2>
      <table class="table table-bordered table-striped">
        <tr>
          <th>Name</th>
          <td>{{ $donor->name }}</td>
        </tr>
        <tr>
          <th>Username</th>
          <td>{{ $donor->user_name }}</td>
        </tr>
        <tr>
          <th>Donor ID</th>
          <td>{{ $donor->donor_id }}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{ $donor->email }}</td>
        </tr>
        <tr>
          <th>Phone</th>
          <td>{{ $donor->phone }}</td>
        </tr>
        <tr>
          <th>Gender</th>
          <td>{{ $donor->gender }}</td>
        </tr>
        <tr>
          <th>Date Of Birth</th>
          <td>{{ $donor->dob }}</td>
        </tr>
        <tr>
          <th>NRC</th>
          <td>{{ $donor->nrc }}</td>
        </tr>
        <tr>
          <th>Blood Type</th>
          <td>{{ $donor->blood_type->name }}</td>
        </tr>
        <tr>
          <th>Status</th>
          <td>{{ $donor->status }}</td>
        </tr>
        <tr>
          <th>City</th>
          <td>{{ $donor->city->name }}</td>
        </tr>
        <tr>
          <th>Township</th>
          <td>{{ $donor->township->name }}</td>
        </tr>
        <tr>
          <th>Remark</th>
          <td>
            @if(!$donor->remark)
              -
            @else {{ $donor->remark }}
            @endif
          </td>
        </tr>
        <tr>
          <th>Disease</th>
          <td>
            @if(!$donor->disease)
              -
            @else {{ $donor->disease }}
            @endif
          </td>
        </tr>
        <tr>
          <th>Address</th>
          <td>{{ $donor->address }}</td>
        </tr>
        <tr>
          <th>Latitude</th>
          <td>{{ $donor->latitude }}</td>
        </tr>
        <tr>
          <th>Longitude</th>
          <td>{{ $donor->longitude }}</td>
        </tr>
      </table>
    </div>
  </div>
</div>

@endsection