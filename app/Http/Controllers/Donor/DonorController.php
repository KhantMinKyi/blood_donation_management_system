<?php

namespace App\Http\Controllers\Donor;

use App\Models\Donor;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Location\Facades\Location;
use App\Http\Requests\StoreUpdateDonorRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Township;

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donor = Donor::find($id);
        return view('donor.edit', compact('donor'));
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
        return redirect('/donor')->with('success', 'Update Successfully' . $donor->name);
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
        return view('donor.bloodRequest');
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
        return redirect('/donor')->with('success', 'Welcome To Our Website ' . $donor->name);
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
        return redirect('/donor')->with('success', 'Welcome To Our Website ' . $donor->name);
    }
    public function logout()
    {
        auth('donor')->logout();
        return redirect('/')->with('success', 'Your Are Successfully Logout');
    }
}
