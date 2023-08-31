<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDonor extends Model
{
    use HasFactory;
    protected $fillable = [
        'hospital_id',
        'admin_id',
        'admin_report_id',
        'donor_id',
        'patient_id',
        'status',
        'type',
        'report_type',
        'donor_confirm',
        'remark',
        'report_date_time',
        'confirm_date_time',
    ];
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class)->with('blood_type', 'city', 'township');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class)->with('blood_type');
    }
    public function blood_type()
    {
        return $this->belongsTo(BloodType::class);
    }
    public function admin_report()
    {
        return $this->belongsTo(ReportAdmin::class)->with('blood_type');
    }
}
