@extends('patient.layout')

@section('content')
    <div class="container-fluid red-background size signin-section">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2 class="h2 text-center">Become a Patient</h2>
                <div class="card">
                    <div class="card-header">{{ __('Patient Register Page') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/patient/register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" required>

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
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                        name="user_name" required>

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
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" value="">

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
                                    <input type="phone" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" required>

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
                                        <option value="" selected>Select a gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
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
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror"
                                        name="dob" required>

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
                                    <select name="nrc1" class="form-control mb-3">
                                        <option value="" selected></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                    </select>
                                    <!--<input type="text" class="form-control mb-3" name="nrc2">-->

                                    <select name="nrc2" class="form-control mb-3">
                                        <option value="" selected></option>
                                        @foreach ($nrcTownships as $nrcTownship)
                                            <option value="{{ $nrcTownship['name_en'] }}">{{ $nrcTownship['name_en'] }}
                                            </option>
                                        @endforeach

                                    </select>

                                    <select name="nrc3" class="form-control mb-3">
                                        <option value="" selected></option>
                                        <option value="(N)">N</option>
                                        <option value="(M)">M</option>
                                        <option value="(AC)">AC</option>
                                        <option value="(NC)">NC</option>
                                        <option value="(V)">V</option>
                                        <option value="(C)">C</option>
                                    </select>
                                    <input type="number" class="form-control mb-3" name="nrc4">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Your Status') }}</label>

                                <div class="col-md-6">
                                    <select name="status" class="form-control">
                                        <option value="" selected>Choose Your Status</option>
                                        <option value="active">Active</option>
                                        <option value="away">Away</option>
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
                                        <option value="" selected>Select a Blood Type</option>
                                        @foreach ($blood_types as $blood_type)
                                            <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
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
                                        <option value="" selected>Select City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
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
                                        <option value="" selected>Select Township</option>
                                        @foreach ($townships as $township)
                                            <option value="{{ $township->id }}">{{ $township->name }}</option>
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
                                    <textarea name="remark" cols="30" rows="3" class="form-control @error('remark') is-invalid @enderror"></textarea>

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
                                    <textarea name="disease" cols="30" rows="3" class="form-control @error('disease') is-invalid @enderror"></textarea>

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
                                    <textarea name="address" cols="30" rows="3" class="form-control @error('address') is-invalid @enderror"
                                        required></textarea>

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
                                        <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                                            name="latitude" id="latId" required readonly>

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
                                        <input type="text"
                                            class="form-control @error('longitude') is-invalid @enderror"
                                            name="longitude" id="longId" required readonly>

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
