@extends('patient.layout')

@section('content')

<div class="container-fluid red-background size signin-section blood-request">
@if(session()->has('success'))
  <p class="alert" id="alert-register-message">{{ session()->get('success') }}</p>
  @endif
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-12">
      @php
      $data = 0;
      @endphp
      <h2 class="h2 text-center">Notifications ({{ count($blood_request) }})</h2>
      @foreach($blood_request as $bloodRequest)
      @php
        $data += 1;
      @endphp
      <div class="card">
        <div class="card-body">
          {{ $bloodRequest->donor->name }} accepted your request. <br> <br>
          <a href='{{ url("/patient/notificationDetail/$bloodRequest->id") }}' class="btn btn-secondary mr-3">Detail</a>
        </div>
      </div>
      @endforeach
      @if ($data == 0) 
      <table class="table table-bordered table-striped mt-5">
        <tr>
          <td>Nothing yet !</td>
        </tr>
      </table>
      @endif
    </div>
  </div>
</div>

@endsection

@section('latLong')
<script>
  const div = document.getElementById('#alert-register-message');
  setTimeout(function() {
    $("#alert-register-message").fadeOut().empty();
  }, 5000);
</script>
@endsection