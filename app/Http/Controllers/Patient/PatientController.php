<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\ReportAdmin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function patientform()
    {
        return view('patient.patient');
    }

    public function signin()
    {
        return view('patient.signin');
    }

    public function registerForm()
    {
        return view('patient.register');
    }

    public function register()
    {
        return 'Register Process Coming Soon';
    }

    public function emergencyForm()
    {
        return view('patient.emergencyform');
    }

    public function normalForm()
    {
        return view('patient.normalform');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $patient = Patient::where('user_name', $request->name)->first();
        if (!$patient) {
            return redirect()->back()->with(['error' => 'USer Not Found']);
        }
        if (!Hash::check($request->password, $patient->password)) {
            return redirect()->back()->with(['error' => 'Password is Wrong , Try Again']);
        }
        auth('patient')->login($patient);
        return redirect('/patient')->with('success', 'Welcome To Our Website ' . $patient->name);
    }
    public function logout()
    {
        auth('patient')->logout();
        return redirect('/patient')->with('success', 'Your Are Successfully Logout');
    }
    public function patientReport(Request $request)
    {
        $validated = $request->validate([
            'patient_name' => 'nullable',
            'patient_age' => 'nullable|integer',
            'blood_type_id' => 'nullable|exists:App\Models\BloodType,id',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'city_id' => 'nullable|integer',
            'township_id' => 'nullable|integer',
            'remark' => 'nullable',
        ]);
        $user = auth('patient')->user();
        // Check User Validate
        if ($user) {
            $validated['latitude'] = $user->latitude;
            $validated['longitude'] = $user->longitude;
            $validated['patient_name'] = $user->name;
            $validated['patient_age'] = $user->age;
            $validated['blood_type_id'] = $user->blood_type_id;
            $user_id = $user->id;
            $hospitals = Hospital::where('city_id', $user->city_id)->where('township_id', $user->township_id)->get();
        } else {
            $user_id = null;
            $hospitals = Hospital::where('city_id', $request->city_id)->where('township_id', $request->township_id)->get();
        }

        $hospital_locations = [];
        $distances = [];
        // Hospitals loop
        foreach ($hospitals as $hospital) {
            $hospital_latitude = $hospital->latitude;
            $hospital_longitude = $hospital->longitude;
            array_push($hospital_locations, ['latitude' => $hospital_latitude, 'longitude' => $hospital_longitude]);
        }
        // Finding Nearest hospital
        foreach ($hospital_locations as $hospital_location) {
            $latitude = $validated['latitude'] - $hospital_location['latitude'];
            $longitude = $validated['longitude'] - $hospital_location['longitude'];
            $distance = sqrt(($latitude ** 2) + ($longitude ** 2));
            array_push($distances, $distance);
        }
        asort($distances);
        $nearest = $hospital_locations[key($distances)];
        // Get Nearest Hospital
        $nearest_hospital = Hospital::where('latitude', $nearest['latitude'])->where('longitude', $nearest['longitude'])->first();
        // Get Hospital Admin
        $admin = Admin::where('hospital_id', $nearest_hospital->id)->first();
        ReportAdmin::create([
            'hospital_id' => $nearest_hospital->id,
            'patient_id' => $user_id,
            'admin_id' => $admin->id,
            'patient_name' => $request->patient_name,
            'patient_age' => $request->patient_age,
            'blood_type_id' => $request->blood_type_id,
            'type' => $request->type,
            'report_date_time' => Carbon::now(),
            'remark' => $validated['remark'],
        ]);
        return response()->json([
            'user' => $user,
            'hospital' => $hospitals,
            'hospital_locations' => $hospital_locations,
            'distances' => $distances,
            'nearest' => $nearest,
            'nearest_hospital' => $nearest_hospital,
            'admin' => $admin,
        ]);
    }

    public function history(){
        return view ('patient.history');
    }
}
