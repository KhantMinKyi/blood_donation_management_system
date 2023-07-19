<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Donor;
use App\Models\Hospital;
use App\Models\Patient;
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
        BloodType::create([
            'name' => 'A+'
        ]);
        BloodType::create([
            'name' => 'A-'
        ]);
        BloodType::create([
            'name' => 'B+'
        ]);
        BloodType::create([
            'name' => 'B-'
        ]);
        BloodType::create([
            'name' => 'AB+'
        ]);
        BloodType::create([
            'name' => 'AB-'
        ]);
        BloodType::create([
            'name' => 'O+'
        ]);
        BloodType::create([
            'name' => 'O-'
        ]);
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
        Hospital::create([
            'name' => 'SSC Hospital',
            'latitude' => '16.810804391632814',
            'longitude' => '96.16568289526312',
            'city_id' => 1,
            'township_id' => 1
        ]);
        Hospital::create([
            'name' => 'Yangon General Hospital',
            'latitude' => '16.779128298536328',
            'longitude' => '96.15178296510845',
            'city_id' => 1,
            'township_id' => 1
        ]);

        Admin::create([
            'name' => 'admin',
            'user_name' => 'admin',
            'admin_id' => 'BD_A0001',
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
        Admin::create([
            'name' => 'admin2',
            'user_name' => 'admin2',
            'admin_id' => 'BD_A0002',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '095025362',
            'gender' => 'male',
            'dob' => '1999.09.09',
            'nrc' => '12/abcd(C)12345',
            'status' => 'active',
            'remark' => 'admin remark',
            'hospital_id' => 3,
            'latitude' => '16.77157947504272',
            'longitude' => '96.17471875366536',
        ]);
        Admin::create([
            'name' => 'admin3',
            'user_name' => 'admin3',
            'admin_id' => 'BD_A0003',
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '095025363',
            'gender' => 'male',
            'dob' => '1999.09.09',
            'nrc' => '12/abcd(C)12345',
            'status' => 'active',
            'remark' => 'admin remark',
            'hospital_id' => 2,
            'latitude' => '16.77157947504272',
            'longitude' => '96.17471875366536',
        ]);
        Donor::create([
            'name' => 'donor',
            'user_name' => 'donor',
            'donor_id' => 'BD_D0001',
            'email' => 'donor@gmail.com',
            'password' => Hash::make('donor'),
            'phone' => '095025363',
            'gender' => 'male',
            'dob' => '1999.09.09',
            'nrc' => '12/abcd(C)12345',
            'status' => 'active',
            'blood_type_id' => 1,
            'city_id' => 1,
            'township_id' => 1,
            'remark' => 'donor remark',
            'address' => 'donor address',
            'latitude' => '16.77157947504272',
            'longitude' => '96.17471875366536',
        ]);
        Donor::create([
            'name' => 'donor2',
            'user_name' => 'donor2',
            'donor_id' => 'BD_D0002',
            'email' => 'donor2@gmail.com',
            'password' => Hash::make('donor'),
            'phone' => '095025362',
            'gender' => 'male',
            'dob' => '1999.09.09',
            'nrc' => '12/abcd(C)12345',
            'status' => 'active',
            'blood_type_id' => 1,
            'city_id' => 1,
            'township_id' => 1,
            'remark' => 'donor remark',
            'address' => 'donor address',
            'latitude' => '16.79223489053137',
            'longitude' => '96.17358197879052',
        ]);
        Patient::create([
            'name' => 'patient',
            'user_name' => 'patient',
            'patient_id' => 'BD_P0001',
            'email' => 'patient@gmail.com',
            'password' => Hash::make('patient'),
            'phone' => '095025363',
            'gender' => 'male',
            'dob' => '1999.09.09',
            'nrc' => '12/abcd(C)12345',
            'status' => 'active',
            'blood_type_id' => 1,
            'city_id' => 1,
            'township_id' => 1,
            'remark' => 'patient remark',
            'address' => 'patient address',
            'latitude' => '16.77875476501006',
            'longitude' => '96.15071654766246',
        ]);
    }
}
