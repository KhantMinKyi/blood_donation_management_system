@extends('layouts.app')

@section('content')

<div class="container-fluid red-background size signin-section">
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-12">
      <h2 class="h2 text-center">Request form for Normal Patient</h2>
      <div class="card">
        <div class="card-header">{{ __('Normal Blood Request Page') }}</div>

        <div class="card-body">
          <form method="POST" action="">
            @csrf

            <input type="hidden" name="normal">

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
              <label class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

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
              <label class="col-md-4 col-form-label text-md-end">{{ __('Diseases') }}</label>

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
              <label class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>

              <div class="col-md-6">
              <button type="submit" class="btn btn-info" name="location">
                  {{ __('Share your location') }}
                </button>

                @error('location')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
      
            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
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