<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\DonationRecord;
use App\Models\Donor;
use App\Models\Patient;
use App\Models\ReportAdmin;
use App\Models\ReportDonor;
use App\Services\DistanceCalculatorServices;
use Carbon\Carbon;
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
        $donors = Donor::get('blood_type_id');
        $patients = Patient::all();
        $report_admin = ReportAdmin::where('status', 'pending')->where('admin_id', auth('admin')->user()->id)->get();
        $count_users = count($donors) + count($patients);
        $blood_type_a_plus = Donor::where('blood_type_id', '1')->get();
        $blood_type_a_minus = Donor::where('blood_type_id', '2')->get();
        $blood_type_b_plus = Donor::where('blood_type_id', '3')->get();
        $blood_type_b_minus = Donor::where('blood_type_id', '4')->get();
        $blood_type_ab_plus = Donor::where('blood_type_id', '5')->get();
        $blood_type_ab_minus = Donor::where('blood_type_id', '6')->get();
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
        // return $count_a_plus;
        return view('Admin.admin', compact(
            'count_a_plus',
            'count_a_minus',
            'count_b_plus',
            'count_b_minus',
            'count_ab_minus',
            'count_ab_plus',
            'count_o_plus',
            'count_o_minus',
            'report_admin',
            'count_users'
        ));
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
        return redirect('/admins')->with('success', 'Welcome To Our Website ' . $admin->name);
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
        $reports = ReportAdmin::where('admin_id', $admin->id)->where('status', 'pending')->with('hospital', 'patient', 'admin', 'report_donor')->get();
        $reports_array = [];
        foreach ($reports as $report) {
            if ($report->report_donor === null) {
                array_push($reports_array, $report);
            }
        }
        $reports = $reports_array;
        // return response()->json($reports);
        return view('Admin.admin_blood_request', compact('reports'));
    }
    public function adminReportedBloodRequest(Request $request)
    {
        $admin = auth('admin')->user();
        $reports = ReportDonor::with('hospital', 'patient', 'admin', 'admin_report')
            ->where('admin_id', $admin->id)
            ->whereNot('status', 'completed')
            ->get()
            ->sortBy('report_date_time');
        $done_reports = ReportDonor::with('hospital', 'patient', 'admin', 'admin_report')
            ->where('admin_id', $admin->id)
            ->whereNot('status', 'completed')
            ->where('donor_confirm', 'done')
            ->get()
            ->sortBy('report_date_time');
        $undone_reports = ReportDonor::with('hospital', 'patient', 'admin', 'admin_report')
            ->where('admin_id', $admin->id)
            ->whereNot('status', 'completed')
            ->where('donor_confirm', 'undone')
            ->get()
            ->sortBy('report_date_time');
        // return response()->json($reports);
        return view('Admin.admin_reported_blood_request', compact('reports', 'done_reports', 'undone_reports'));
    }
    public function adminReportedBloodRequestDetail(Request $request, $id)
    {
        $admin = auth('admin')->user();
        $donor_report = ReportDonor::with('hospital', 'patient', 'admin', 'donor', 'admin_report')
            ->find($id);
        $report = ReportAdmin::with('admin', 'patient', 'report_donor')->find($donor_report->admin_report_id);
        // return response()->json($reports);
        return view('Admin.admin_reported_blood_request_detail', compact('donor_report', 'report'));
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
        if (!isset($donors[0])) {
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
            'report_type' => 'required'
        ]);
        $admin_report = ReportAdmin::with('hospital', 'patient', 'admin')->find($validated['admin_report_id']);
        if (!$admin_report) {
            return redirect()->back()->with('error', 'Report Not Found');
        }
        $validated['hospital_id'] = $admin_report->hospital_id;
        $validated['blood_type_id'] = $admin_report->blood_type_id;
        $validated['admin_id'] = $admin_report->admin_id;
        $validated['patient_id'] = $admin_report->patient_id;
        $validated['type'] = $admin_report->type;
        $validated['donor_confirm'] = 'undone';
        $validated['remark'] = $admin_report->remark;
        $validated['report_date_time'] = Carbon::now();
        ReportDonor::create($validated);
        $confirm_date_time = Carbon::now();
        $admin_report->update([
            'confirm_date_time' => $confirm_date_time
        ]);
        // $report_donor = ReportDonor::with('admin', 'hospital', 'donor', 'patient', 'admin_report', 'blood_type')->get();
        return redirect()->back()->with('success', 'Successfully Contact To Donor');
    }

    /**
     * View login From Function
     */
    public function loginform()
    {
        return view('Admin.admin_login');
    }
    public function donors()
    {
        $donors = Donor::latest()->get();
        return view('Admin.users', compact('donors'));
    }
    public function patients()
    {
        $donors = Patient::latest()->get();
        return view('Admin.patient', compact('donors'));
    }
    public function cancelHistory()
    {
        $admin = auth('admin')->user();
        $reports = ReportAdmin::where('admin_id', $admin->id)->where('status', 'cancel')->with('hospital', 'patient', 'admin', 'report_donor', 'blood_type')->get();
        // $reports_array = [];
        // foreach ($reports as $report) {
        //     if ($report->report_donor === null) {
        //         array_push($reports_array, $report);
        //     }
        // }
        // // return response()->json($reports);
        // $reports = $reports_array;
        return view('Admin.cancel_history', compact('reports'));
    }
    public function cancelHistoryDetail($id)
    {
        $admin = auth('admin')->user();
        $report = ReportAdmin::with('admin', 'patient')->find($id);
        $donor_report = ReportDonor::with('hospital', 'patient', 'admin', 'donor', 'admin_report')
            ->where('admin_report_id', $report->id)->first();
        // return response()->json($report);
        return view('Admin.cancel_history_detail', compact('donor_report', 'report'));
    }
    public function donationHistory()
    {
        $donation_records = DonationRecord::all();
        // return response()->json($donation_records);
        return view('Admin.donation_history', compact('donation_records'));
    }
    public function donationHistoryDetail($id)
    {
        $donation_record = DonationRecord::find($id);
        // return response()->json($donation_record);
        return view('Admin.donation_history_detail', compact('donation_record'));
    }
    public function inventory()
    {
        $donors = Donor::get('blood_type_id');
        $blood_type_a_plus = Donor::where('blood_type_id', '1')->get();
        $blood_type_a_minus = Donor::where('blood_type_id', '2')->get();
        $blood_type_b_plus = Donor::where('blood_type_id', '3')->get();
        $blood_type_b_minus = Donor::where('blood_type_id', '4')->get();
        $blood_type_ab_plus = Donor::where('blood_type_id', '5')->get();
        $blood_type_ab_minus = Donor::where('blood_type_id', '6')->get();
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
    public function adminCancelReport(Request $request)
    {
        $validated = $request->validate([
            'admin_report_id' => 'required|exists:App\Models\ReportAdmin,id',
            'report_type' => 'required'
        ]);

        // return response()->json($validated);
        $report_admin = ReportAdmin::find($validated['admin_report_id']);
        $report_admin->update([
            'status' => $validated['report_type']
        ]);
        $report_donor = ReportDonor::where('admin_report_id', $report_admin->id)->first();
        if ($validated['report_type'] === 'completed') {
            $validated['hospital_id'] = $report_admin->hospital_id;
            $validated['admin_id'] = $report_admin->admin_id;
            $validated['donor_id'] = $report_donor->donor_id;
            $validated['patient_id'] = $report_donor->patient_id;
            $validated['type'] = 'donor';
            DonationRecord::create($validated);
        }
        return redirect('/admin/admin_blood_request');
    }
}
