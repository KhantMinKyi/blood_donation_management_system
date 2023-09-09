<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'hospital_id',
        'admin_id',
        'donor_id',
        'patient_id',
        'type',
        'admin_report_id'
    ];
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
    public function admin_report()
    {
        return $this->belongsTo(ReportAdmin::class)->with('blood_type');
    }
}
