@extends('donor.layouts.app')

@section('content')

<div class="container-fluid red-background size signin-section">
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-12">
      <h2 class="h2 text-center">Become a Life Saver</h2>
      <div class="card">
        <div class="card-header">{{ __('Donor Register Page') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ url('/donor/register') }}">
            @csrf

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>

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
                <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" required>

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
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>

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
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="">

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
                <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required>

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
                  <option value="none" selected>Select a gender</option>
                  <option value="0">Male</option>
                  <option value="1">Female</option>
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
                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" required>

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
                <input type="text" class="form-control @error('nrc') is-invalid @enderror" name="nrc" required>

                @error('nrc')
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
                  <option value="none" selected>Select a Blood Type</option>
                  <option value="0">A</option>
                  <option value="1">B</option>
                  <option value="2">O</option>
                  <option value="3">AB</option>
                </select>

                @error('blood_type_id')
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
                  <option value="none" selected>Choose Your Status</option>
                  <option value="0">Active</option>
                  <option value="1">Away</option>
                </select>

                @error('status')
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
                  <option value="none" selected>Select City</option>
                  <option value="0">Yangon</option>
                  <option value="1">Mandalay</option>
                  <option value="2">TaungGyi</option>
                  <option value="3">Shan Lay</option>
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
                  <option value="none" selected>Select Township</option>
                  <option value="0">Botahtaung</option>
                  <option value="1">Insein</option>
                  <option value="2">Thuwana</option>
                  <option value="3">ThingyanKyant</option>
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
                <input type="text" class="form-control @error('remark') is-invalid @enderror" name="remark" required>

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
                <input type="text" class="form-control @error('disease') is-invalid @enderror" name="disease" required>

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
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" required>

                @error('address')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-form-label text-md-end">{{ __('Latitude') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" required>

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
                <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" required>

                @error('longitude')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            
            

            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
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