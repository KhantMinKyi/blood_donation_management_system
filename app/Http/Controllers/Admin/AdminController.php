<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Donor;
use App\Models\ReportAdmin;
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

        $report = ReportAdmin::find($id);
        if (!$report) {
            return redirect()->back()->with('error', 'Report Id : ' . $id . ' Not Found');
        }

        $admin = $report->admin;
        $hospital = $report->admin->hospital;
        $hospital_latitude = $hospital->latitude;
        $hospital_longitude = $hospital->longitude;
        $patient = $report->patient;
        $donor_locations = [];
        $near_donors = [];
        $donors = Donor::where('city_id', $hospital->city_id)
            ->where('township_id', $hospital->township_id)
            ->where('status', 'active')->get();
        if (!$donors) {
            $donors = Donor::where('city_id', $hospital->city_id)
                ->where('status', 'active')->get();
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
        return response()->json([
            'donors' => $donors,
            'hospital' => $hospital,
            'nearest' => $nearest,
            'near_donors' => $near_donors,
            'patient' => $patient,
            'admin' => $admin
        ]);
        // return view('Admin.admin_blood_request_detail', compact('report', 'admin', 'patient', 'hospital', 'near_donors'));
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
        return view('Admin.admin_blood_request');
    }
    public function users()
    {
        return view('Admin.users');
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
        return view('Admin.inventory');
    }
}
