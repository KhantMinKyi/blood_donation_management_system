<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\City;
use App\Models\Hospital;
use App\Models\Township;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        City::create([
            'name' => 'Yangon'
        ]);
        Township::create([
            'name' => 'Botahtaung',
            'city_id' => 1
        ]);
        Hospital::create([
            'name' => 'Gandi Hospital',
            'latitude' => '16.77157947504272',
            'longitude' => '96.17471875366536',
            'city_id' => 1,
            'township_id' => 1
        ]);
        Admin::create([
            'name' => 'admin',
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '095025363',
            'gender' => 'male',
            'dob' => '1999.09.09',
            'nrc' => '12/abcd(C)12345',
            'status' => 'active',
            'remark' => 'admin remark',
            'hospital_id' => 1,
            'latitude' => '16.77157947504272',
            'longitude' => '96.17471875366536',
        ]);
    }
}
