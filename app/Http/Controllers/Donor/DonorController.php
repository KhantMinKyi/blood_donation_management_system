<?php

namespace App\Http\Controllers\Donor;

use App\Models\City;
use App\Models\Donor;
use GuzzleHttp\Client;
use App\Models\Township;
use App\Models\Patient;
use App\Models\BloodType;
use App\Models\ReportDonor;
use Illuminate\Http\Request;
use App\Models\DonationRecord;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Location\Facades\Location;
use App\Http\Requests\StoreUpdateDonorRequest;
use App\Models\Hospital;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Donor::where('id', auth('donor')->user()->id)->get();
    }

    //showing about us page
    public function aboutUs()
    {
        return view('donor.aboutUs');
    }

    public function donorHomePage()
    {
        return view('donor.index');
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

    public function bloodRequestDetail($id) 
    {
        $bloodRequest = ReportDonor::find($id);
        $patient = Patient::find($bloodRequest->patient_id);
        $hospital = Hospital::find($bloodRequest->hospital_id);
        $hospitalLat = $hospital->latitude;
        $hospitalLong = $hospital->longitude;
        if (auth('donor')->user()) return view('donor.bloodRequestDetail', compact(['patient', 'hospitalLat', 'hospitalLong']));
        return redirect()->back()->with('success', 'You do not access to view this page');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donor = Donor::find($id);
        $all_blood_types = BloodType::all();
        $blood_types = BloodType::find($donor->blood_type_id);
        $donorTownship = Township::find($donor->township_id);
        $donorCity = City::find($donor->city_id);
        $allTownship = Township::all();
        $allCity = City::all();
        return view('donor.edit', compact(['donor', 'all_blood_types', 'blood_types', 'donorTownship', 'donorCity', 'allTownship', 'allCity']));
    }

    //Donation History Page of specified donor
    public function history($id)
    {
        $history = DonationRecord::join('hospitals', 'hospitals.id', '=', 'donation_records.hospital_id')
    ->join('donors', 'donors.id', '=', 'donation_records.donor_id')
    ->join('patients', 'patients.id', '=', 'donation_records.patient_id')
    ->where('donation_records.donor_id', '=', $id)
    ->where('donation_records.type', '=', 'donor')
    ->get(['donation_records.*', 'donors.name as donor_name', 'hospitals.name as hospital_name', 'patients.name as patient_name']);
    
    return view('donor.donationHistory', compact('history'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDonorRequest $request, $id)
    {
        $validated = $request->validated();
        $donor = Donor::find($id);
        if (!$donor) {
            return redirect()->back()->with('success',  'User Not Found');
        }
        $validated['donor_id'] = $request->donor_id;
        $donor->update($validated);
        return redirect('/donor')->with('success', 'Update Successfully, ' . $donor->name);
    }

    //donor's specified profile
    //@param  int  $id
    public function profile($id)
    {
        $donor = Donor::find($id);
        if (auth('admin')->user() or auth('donor')->user()->id == $donor->id) return view('donor.profile', compact('donor'));
        return redirect()->back()->with('success', 'You does not access to view other donor profiles');
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

    public function bloodRequest()
    {
        $donor_id = auth('donor')->user()->id;
        $blood_request = ReportDonor::where('id', $donor_id)->where('status', 'pending')->get();
        return view('donor.bloodRequest', compact('blood_request'));
    }

    public function responseRequest($id, $status)
    {
        $bloodRequest = ReportDonor::find($id);
        if ($status == 1) {
            $statusData = "pending";
        }
        elseif ($status == 2) {
            $statusData = "completed";
        }
        elseif ($status == 3) {
            $statusData = "cancel";
            $response = "You have successfully canceled this donation request.";
        }
        elseif ($status == 4) {
            $statusData = "processing";
            $response = "Congratulations! You have successfully accepted this donation request, Please wait Admin's Contact for Your Blood Donation";
        }
        $bloodRequest->update([
            'status' => $statusData,
        ]);
        return back()->with('success', $response);
    }

    //view location of loginform method Edited by znt on 5 july
    public function loginform()
    {
        return view('donor.signin');
    }

    public function registerForm()
    {
        $cities = City::all();
        $townships = Township::all();
        $blood_types = BloodType::all();
        return view('donor.register', compact('cities', 'townships', 'blood_types'));
    }

    public function register(StoreUpdateDonorRequest $request)
    {
        $validated = $request->validated();
        $validated['donor_id'] = "BD_D" . random_int(100000, 999999);
        $validated['password'] = Hash::make($validated['password']);
        $donor = Donor::create($validated);
        auth('donor')->login($donor);
        return redirect('/donor')->with('success', 'Welcome To Our Website, ' . $donor->name);
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $donor = Donor::where('user_name', $request->name)->first();
        if (!$donor) {
            return redirect()->back()->with(['error' => 'User Not Found']);
        }
        if (!Hash::check($request->password, $donor->password)) {
            return redirect()->back()->with(['error' => 'Password is Wrong , Try Again']);
        }
        auth('donor')->login($donor);
        return redirect('/donor')->with('success', 'Welcome To Our Website, ' . $donor->name);
    }
    public function logout()
    {
        auth('donor')->logout();
        return redirect('/')->with('success', 'Your Are Successfully Logout');
    }
    public function StoreBloodRequest(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required',
            'donor_confirm' => 'required',
        ]);
        $donor_id = auth('donor')->user()->id;
        $report = ReportDonor::find($request->report_id);
        if (!$report) {
            return redirect()->back()->with('error', 'Report Not Found');
        }
        $report->update($validated);
        // return $blood_request;
        return view('donor.bloodRequest');
    }
}
