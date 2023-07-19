<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
     public function patientform(){
        return view('patient.patient');
    }

    public function signin(){
        return view ('patient.signin');
    }

    public function registerForm(){
        return view('patient.register');
    }

    public function register()
    {
        return 'Register Process Coming Soon';
    }

    public function emergencyForm(){
        return view('patient.emergencyform');
    }

    public function normalForm(){
        return view('patient.normalform');
    }

    public function history(){
        return view ('patient.history');
    }
}
