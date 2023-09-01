<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationRecord extends Model
{
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
