<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',

    ];
    use HasFactory;
    public function townships()
    {
        return $this->hasMany(Township::class);
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
