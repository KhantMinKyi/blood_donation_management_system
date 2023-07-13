<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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
    public function loginform()
    {
        return view('Admin.admin_login');
    }
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
    public function logout()
    {
        auth('admin')->logout();
        return redirect('/')->with('success', 'Your Are Successfully Logout');
    }
    public function adminDonationRequest()
    {
        return view('Admin.admin_blood_request');
    }
    public function adminBloodRequest()
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
