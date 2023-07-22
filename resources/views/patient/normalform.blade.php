@extends('layouts.app')

@section('content')

<div class="container-fluid red-background size signin-section">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-12">
      <h2 class="h2 text-center">Request form for Normal Patient</h2>
      <div class="card">
        <div class="card-header">{{ __('Normal Blood Request Page') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ url('/patient/report_admin') }}">
            @csrf

            <input type="hidden" name="type" value="normal">

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Date Of Appointment') }}</label>

              <div class="col-md-6">
                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="doa" required>

                @error('doa')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Diseases') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control @error('disease') is-invalid @enderror" name="diseases" required>

                @error('diseases')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Remark') }}</label>

              <div class="col-md-6">
                <textarea name="remark" cols="30" rows="3" class="form-control @error('remark') is-invalid @enderror"></textarea>

                @error('remark')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div id="lat-long-div">
              <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end">{{ __('Latitude') }}</label>

                <div class="col-md-6">
                  <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" id="latId" required readonly>

                  @error('latitude')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end">{{ __('Longitude') }}</label>

                <div class="col-md-6">
                  <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" id="longId" required readonly>

                  @error('longitude')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="button" class="btn btn-primary" onclick="getLocation()">
                  {{ __('Get Location') }}
                </button>
                <button type="submit" class="btn btn-primary">
                  {{ __('Request') }}
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('latLong')
<script>
  var lat = document.getElementById("latId");
  var long = document.getElementById("longId");

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      lat.value = "Geolocation is not supported by this browser.";
    }
  }

  function showPosition(position) {
    document.getElementById("lat-long-div").style.display = "block";
    lat.value = position.coords.latitude;
    long.value = position.coords.longitude;
  }
</script>

@endsection