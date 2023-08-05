<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at',

    ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function hospitals()
    {
        return $this->hasMany(Hospital::class);
    }
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
