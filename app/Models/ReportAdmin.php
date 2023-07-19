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
        'patient_name',
        'patient_age',
        'blood_type_id',
        'status',
        'report_date_time',
        'confirm_date_time',
        'remark',
        'type'
    ];
    use HasFactory;
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
}
