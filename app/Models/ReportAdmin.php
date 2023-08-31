<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportAdmin extends Model
{
    protected $fillable = [
        'hospital_id',
        'patient_id',
        'admin_id',
        'phone',
        'patient_name',
        'blood_type_id',
        'status',
        'latitude',
        'longitude',
        'report_date_time',
        'confirm_date_time',
        'remark',
        'diseases',
        'date_of_appointment',
        'type'
    ];
    use HasFactory;
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
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
    public function report_donor()
    {
        return $this->hasOne(ReportDonor::class, 'admin_report_id');
    }
}
