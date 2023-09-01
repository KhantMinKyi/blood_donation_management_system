<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_name',
        'admin_id',
        'email',
        'password',
        'phone',
        'gender',
        'dob',
        'nrc',
        'status',
        'remark',
        'hospital_id',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'created_at',
        'updated_at',

    ];
    public function hospital()
    {
        return $this->belongsTo(Hospital::class)->with('city', 'township');
    }
    public function blood_type()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function donationRecord()
    {
        return $this->hasMany(DonationRecord::class);
    }
}
