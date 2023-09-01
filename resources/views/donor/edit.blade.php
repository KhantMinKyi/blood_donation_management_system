@extends('donor.layout')

@section('content')

<div class="container-fluid red-background size signin-section">
  <div class="row justify-content-center">
  <div class="col-lg-6 col-md-8 col-sm-12">
      <h2 class="h2 text-center">Edit {{ $donor->name }} Profile</h2>
      <div class="card">
        <div class="card-header">{{ __('Donor Register Page') }}</div>

        <div class="card-body">
          <form method="POST" action='{{ url("/donor/update/$donor->id") }}'>
            @csrf

            <div class="row mb-3">
              <input type="hidden" name="donor_id" value="{{ $donor->id }}">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $donor->name }}" required>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ $donor->user_name }}" required>

                @error('user_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

              <div class="col-md-6">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $donor->email }}" required>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>


            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $donor->password }}" required autocomplete="current-password" value="">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

              <div class="col-md-6">
                <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $donor->phone }}" required>

                @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

              <div class="col-md-6">
                <select name="gender" class="form-control">
                  <option value="{{ $donor->gender }}">{{ $donor->gender }}</option>
                  @if($donor->gender == "male") 
                  <option value="female">female</option>
                  @endif
                  @if($donor->gender == "female") 
                  <option value="male">male</option>
                  @endif
                </select>

                @error('gender')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Date Of Birth') }}</label>

              <div class="col-md-6">
                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $donor->dob }}" required>

                @error('dob')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('NRC') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control @error('nrc') is-invalid @enderror" name="nrc" value="{{ $donor->nrc }}" required>

                @error('nrc')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Your Status') }}</label>

              <div class="col-md-6">
                <select name="status" class="form-control">
                <option value="{{ $donor->status }}">{{ $donor->status }}</option>
                  @if($donor->status == "active") 
                  <option value="away">away</option>
                  @endif
                  @if($donor->gender == "away") 
                  <option value="active">active</option>
                  @endif
                </select>

                @error('status')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Blood Type') }}</label>

              <div class="col-md-6">
                <select name="blood_type_id" class="form-control">
                <option value="{{ $blood_types->id }}">{{ $blood_types->name }}</option>
                @foreach($all_blood_types as $allBloodTypes) 
                @if ($allBloodTypes->id != $blood_types->id)
                <option value="{{ $allBloodTypes->id }}">{{ $allBloodTypes->name }}</option>
                @endif
                @endforeach 
                </select>

                @error('blood_type_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>



            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

              <div class="col-md-6">
                <select name="city_id" class="form-control">
                <option value="{{ $donorCity->id }}">{{ $donorCity->name }}</option>
                @foreach($allCity as $cityData) 
                @if ($cityData->id != $donor->city_id)
                <option value="{{ $cityData->id }}">{{ $cityData->name }}</option>
                @endif
                @endforeach 
                </select>

                @error('city_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Township') }}</label>

              <div class="col-md-6">
                <select name="township_id" class="form-control">
                <option value="{{ $donorTownship->id }}">{{ $donorTownship->name }}</option>
                @foreach($allTownship as $townshipData) 
                @if ($townshipData->id != $donor->township_id)
                <option value="{{ $townshipData->id }}">{{ $townshipData->name }}</option>
                @endif
                @endforeach 
                </select>

                @error('township_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Remark') }}</label>

              <div class="col-md-6">
                <textarea name="remark" cols="30" rows="3" class="form-control @error('remark') is-invalid @enderror"> {{ $donor->remark }} </textarea>

                @error('remark')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Disease') }}</label>

              <div class="col-md-6">
                <textarea name="disease" cols="30" rows="3" class="form-control @error('disease') is-invalid @enderror"> {{ $donor->disease }} </textarea>

                @error('disease')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

              <div class="col-md-6">
                <textarea name="address" cols="30" rows="3" class="form-control @error('address') is-invalid @enderror" required> {{ $donor->address }} </textarea>

                @error('address')
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
                  <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ $donor->latitude }}" id="latId" required readonly>

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
                  <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ $donor->longitude }}" id="longId" required readonly>

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
                  {{ __('Update Location') }}
                </button>
                <button type="submit" class="btn btn-primary">
                  {{ __('Update Profile') }}
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