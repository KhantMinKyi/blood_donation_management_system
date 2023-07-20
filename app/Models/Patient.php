<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Patient extends Authenticatable
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
        'patient_id',
        'email',
        'password',
        'phone',
        'gender',
        'dob',
        'nrc',
        'status',
        'blood_type_id',
        'city_id',
        'disease',
        'township_id',
        'remark',
        'address',
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
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function blood_type()
    {
        return $this->belongsTo(BloodType::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function township()
    {
        return $this->belongsTo(Township::class);
    }
}
