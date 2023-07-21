<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Donor;
use App\Models\ReportAdmin;
use App\Services\DistanceCalculatorServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.admin');
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

    /**
     * Login Function
     */
    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required'
        ]);
        $admin = Admin::where('user_name', $request->user_name)->first();
        if (!$admin) {
            return response()->json(['error' => 'USer Not Found']);
        }
        if (!Hash::check($request->password, $admin->password)) {
            return response()->json(['error' => 'Password is Wrong , Try Again']);
        }
        auth('admin')->login($admin);
        return view('Admin.admin')->with('success', 'Welcome To Our Website ' . $admin->name);
    }

    /**
     * Logout Admin From Database Function
     */
    public function logout()
    {
        auth('admin')->logout();
        return redirect('/')->with('success', 'Your Are Successfully Logout');
    }


    /**
     * View Blood request From Patient Function
     */
    public function adminBloodRequest()
    {
        $admin = auth('admin')->user();
        $reports = ReportAdmin::where('admin_id', $admin->id)->with('hospital', 'patient', 'admin')->get();
        return view('Admin.admin_blood_request', compact('reports'));
    }


    /**
     * View Blood request From Patient Detail Function
     */
    public function adminBloodRequestDetail(Request $request, $id)
    {

        $report = ReportAdmin::with('admin', 'patient')->find($id);
        if (!$report) {
            return redirect()->back()->with('error', 'Report Id : ' . $id . ' Not Found');
        }
        $hospital = $report->admin->hospital;
        $hospital_latitude = $hospital->latitude;
        $hospital_longitude = $hospital->longitude;
        $donor_locations = [];
        $near_donors = [];
        $distance_patient = new DistanceCalculatorServices();
        $distance_patient = $distance_patient->generateKilometer($report->latitude, $report->longitude, $hospital_latitude, $hospital_longitude);
        $report['distance_patient'] = round($distance_patient, 2);
        $donors = Donor::where('city_id', $hospital->city_id)
            ->where('township_id', $hospital->township_id)
            ->where('blood_type_id', $report->blood_type_id)
            ->where('status', 'active')->with('blood_type', 'city', 'township')->get();
        if (!$donors) {
            $donors = Donor::where('city_id', $hospital->city_id)
                ->where('blood_type_id', $report->blood_type_id)
                ->where('status', 'active')->with('blood_type', 'city', 'township')->get();
        }
        foreach ($donors as $donor) {
            $latitude = $hospital_latitude - $donor['latitude'];
            $longitude = $hospital_longitude - $donor['longitude'];
            $distance = sqrt(($latitude ** 2) + ($longitude ** 2));
            array_push($donor_locations, $distance);
        }
        asort($donor_locations);
        foreach ($donor_locations as $key => $donor_location) {
            array_push($near_donors, $donors[$key]);
        }
        $nearest = $donors[key($donor_locations)];
        $near_donors =  array_slice($near_donors, 0, 3);
        foreach ($near_donors as $key => $near_donor) {
            $distance_hospital = new DistanceCalculatorServices();
            $distance_hospital = $distance_hospital->generateKilometer($hospital_latitude, $hospital_longitude, $near_donor->latitude, $near_donor->longitude);
            $near_donor['distance_hospital'] = round($distance_hospital, 2);
        }
        // return response()->json([
        //     'report' => $report,
        //     'hospital' => $hospital,
        //     'nearest' => $nearest,
        //     'near_donors' => $near_donors
        // ]);
        return view('Admin.admin_blood_request_detail', compact('report', 'hospital', 'near_donors'));
    }
    /**
     * View Blood request From Patient Detail Function
     */
    public function reportDonor(Request $request)
    {
        $validated = $request->validate([
            'admin_report_id' => 'required|exists:App\Models\ReportAdmin,id',
            'donor_id' => 'required',
        ]);
        $admin_report = ReportAdmin::with('hospital', 'patient', 'admin')->find($validated['admin_report_id']);
        $donor = Donor::find($validated['donor_id']);
        return response()->json([
            'admin_report' => $admin_report,
            'donor' => $donor
        ]);
    }

    /**
     * View login From Function
     */
    public function loginform()
    {
        return view('Admin.admin_login');
    }
    public function adminDonationRequest()
    {
        return view('Admin.admin_donation_request');
    }
    public function donors()
    {
        $donors = Donor::latest()->get();
        return view('Admin.users', compact('donors'));
    }
    public function requestHistory()
    {
        return view('Admin.request_history');
    }
    public function donationHistory()
    {
        return view('Admin.donation_history');
    }
    public function inventory()
    {
        $donors = Donor::get('blood_type_id');
        $blood_type_a_plus = Donor::where('blood_type_id', '1')->get();
        $blood_type_a_minus = Donor::where('blood_type_id', '2')->get();
        $blood_type_b_plus = Donor::where('blood_type_id', '3')->get();
        $blood_type_b_minus = Donor::where('blood_type_id', '4')->get();
        $blood_type_ab_minus = Donor::where('blood_type_id', '5')->get();
        $blood_type_ab_plus = Donor::where('blood_type_id', '6')->get();
        $blood_type_o_plus = Donor::where('blood_type_id', '7')->get();
        $blood_type_o_minus = Donor::where('blood_type_id', '8')->get();
        $count_a_plus = count($blood_type_a_plus);
        $count_a_minus = count($blood_type_a_minus);
        $count_b_plus = count($blood_type_b_plus);
        $count_b_minus = count($blood_type_b_minus);
        $count_ab_minus = count($blood_type_ab_minus);
        $count_ab_plus = count($blood_type_ab_plus);
        $count_o_plus = count($blood_type_o_plus);
        $count_o_minus = count($blood_type_o_minus);
        // return $donors;
        return view('Admin.inventory', compact(
            'count_a_plus',
            'count_a_minus',
            'count_b_plus',
            'count_b_minus',
            'count_ab_minus',
            'count_ab_plus',
            'count_o_plus',
            'count_o_minus',
        ));
    }
}
