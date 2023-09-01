@extends('donor.layout')

@section('content')

<div class="container-fluid red-background size signin-section donor-history">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-12">
    <h2 class="h2 text-center mb-5">Donation History Page</h2>
    <table class="table table-bordered table-striped">
        @foreach($history as $record)
        <tr>
          <th>No</th>
          <th>Hospital</th>
          <th>Patient</th>
          <th>Donated Date</th>
        </tr>
        <tr>
          <td>{{ $record->id }}</td>
          <td>{{ $record->hospital_name }}</td>
          <td>{{ $record->patient_name }}</td>
          <td>{{ \Carbon\Carbon::parse($record->created_at)->toDateString() }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>

@endsection