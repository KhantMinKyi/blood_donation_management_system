<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePatientRequest;
use App\Models\Admin;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\ReportAdmin;
use App\Models\ReportDonor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Township;
use App\Models\Donor;
use App\Models\DonationRecord;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Patient::where('id', auth('patient')->user()->id)->get();
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
        $patient = Patient::find($id);
        $all_blood_types = BloodType::all();
        $blood_types = BloodType::find($patient->blood_type_id);
        $patientTownship = Township::find($patient->township_id);
        $patientCity = City::find($patient->city_id);
        $allTownship = Township::all();
        $allCity = City::all();
        return view('patient.edit', compact(['patient', 'all_blood_types', 'blood_types', 'patientTownship', 'patientCity', 'allTownship', 'allCity']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePatientRequest $request, $id)
    {
        $validated = $request->validated();
        $patient = Patient::find($id);
        if (!$patient) {
            return redirect()->back()->with('success',  'User Not Found');
        }
        $validated['patient_id'] = $request->patient_id;
        $patient->update($validated);
        return redirect('/patient')->with('success', 'Update Successfully, ' . $patient->name);
    }

    //patient's specified profile
    //@param  int  $id
    public function profile($id)
    {
        $patient = Patient::find($id);
        if (auth('admin')->user() or auth('patient')->user()->id == $patient->id) return view('patient.profile', compact('patient'));
        return redirect()->back()->with('success', 'You does not access to view other patient profiles');
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

    public function aboutUs()
    {
        return view('patient.aboutUs');
    }

    // public function notification()
    // {
    //     return view('patient.notification');
    // }

    public function notification()
    {
        $patient_id = auth('patient')->user()->id;
        $blood_request = ReportDonor::where('patient_id', $patient_id)->where('status', 'processing')->get();
        return view('patient.notification', compact('blood_request'));
    }

    public function notificationDetail($id)
    {
        $bloodRequest = ReportDonor::find($id);
        $donor = Donor::find($bloodRequest->donor_id);
        $hospital = Hospital::find($bloodRequest->hospital_id);
        $hospitalLat = $hospital->latitude;
        $hospitalLong = $hospital->longitude;
        if (auth('patient')->user()) return view('patient.notificationDetail', compact(['donor', 'hospitalLat', 'hospitalLong']));
        return redirect()->back()->with('success', 'You do not access to view this page');
    }

    public function registerForm()
    {
        $cities = City::all();
        $townships = Township::all();
        $blood_types = BloodType::all();
        return view('patient.register', compact('cities', 'townships', 'blood_types'));
    }

    public function register(StoreUpdatePatientRequest $request)
    {
        $validated = $request->validated();
        $validated['patient_id'] = "BD_P" . random_int(100000, 999999);
        $validated['password'] = Hash::make($validated['password']);
        $patient = Patient::create($validated);
        auth('patient')->login($patient);
        return redirect('/patient')->with('success', 'Welcome To Our Website ' . $patient->name);
    }

    public function emergencyForm()
    {
        $blood_types = BloodType::all();
        $cities = City::all();
        $townships = Township::all();
        return view('patient.emergencyform', compact('blood_types', 'cities', 'townships'));
    }

    public function normalForm()
    {
        return view('patient.normalform');
    }

    public function history($id)
    {
        $history = DonationRecord::join('hospitals', 'hospitals.id', '=', 'donation_records.hospital_id')
            ->join('patients', 'patients.id', '=', 'donation_records.patient_id')
            ->join('donors', 'donors.id', '=', 'donation_records.donor_id')
            ->where('donation_records.donor_id', '=', $id)
            ->where('donation_records.type', '=', 'donor')
            ->get(['donation_records.*', 'donors.name as donor_name', 'hospitals.name as hospital_name', 'patients.name as patient_name']);

        return view('patient.history', compact('history'));
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
            'blood_type_id' => 'nullable|exists:App\Models\BloodType,id',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'city_id' => 'nullable|integer',
            'township_id' => 'nullable|integer',
            'remark' => 'nullable',
            'phone' => 'nullable',
            'diseases' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'doa' => 'nullable',
        ]);
        $user = auth('patient')->user();
        // Check User Validate
        if ($user) {
            $validated['latitude'] = $user->latitude;
            $validated['longitude'] = $user->longitude;
            $validated['patient_name'] = $user->name;
            $validated['phone'] = $user->phone;
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
        $validated['hospital_id'] = $nearest_hospital->id;
        $validated['patient_id'] = $user_id;
        $validated['admin_id'] =  $admin->id;
        $validated['type'] = $request->type;
        $validated['report_date_time'] = Carbon::now();
        ReportAdmin::create($validated);
        return redirect('/patient')->with('success', 'Reported Successfully!');
    }
}
