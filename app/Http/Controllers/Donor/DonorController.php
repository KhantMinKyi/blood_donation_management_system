<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDonorRequest;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function update(StoreUpdateDonorRequest $request, $id)
    {
        $validated = $request->validated();
        $donor = Donor::find($id);
        if (!$donor) {
            return redirect()->back()->with('error',  'User Not Found');
        }
        $validated['donor_id'] = $request->donor_id;
        $donor->update($validated);
        return redirect('/')->with('success', 'Update Successfully' . $donor->name);
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
        return view('donor.bloodRequest');
    }

    //view location of loginform method Edited by znt on 5 july
    public function loginform()
    {

        return view('donor.signin');
    }

    public function registerForm()
    {
        return view('donor.register');
    }

    public function register(StoreUpdateDonorRequest $request)
    {
        $validated = $request->validated();
        $validated['donor_id'] = "BD_D" . random_int(100000, 999999);
        $donor = Donor::create($validated);
        auth('donor')->login($donor);
        return redirect('/')->with('success', 'Welcome To Our Website ' . $donor->name);
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $donor = Donor::where('user_name', $request->name)->first();
        if (!$donor) {
            return redirect()->back()->with(['error' => 'USer Not Found']);
        }
        if (!Hash::check($request->password, $donor->password)) {
            return redirect()->back()->with(['error' => 'Password is Wrong , Try Again']);
        }
        auth('donor')->login($donor);
        return redirect('/')->with('success', 'Welcome To Our Website ' . $donor->name);
    }
    public function logout()
    {
        auth('donor')->logout();
        return redirect('/')->with('success', 'Your Are Successfully Logout');
    }
}
