<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRecord;
use App\Models\Donor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\ReportAdmin;
use App\Models\ReportDonor;
use App\Models\Township;
use Carbon\Carbon;
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
        Township::create([
            'name' => 'Thanlyin',
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
        Hospital::create([
            'name' => 'မြို့နယ်ပြည်သူ့ဆေးရုံ၊ သန်လျင်မြို့',
            'latitude' => '16.75969014798281',
            'longitude' => '96.25256042553455',
            'city_id' => 1,
            'township_id' => 2
        ]);
        Hospital::create([
            'name' => 'ချမ်းမြေ့မေတ္တာဆေးရုံ',
            'latitude' => '16.772126245074116',
            'longitude' => '96.25118416569696',
            'city_id' => 1,
            'township_id' => 2
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
            'hospital_id' => 2,
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
            'hospital_id' => 3,
            'latitude' => '16.77157947504272',
            'longitude' => '96.17471875366536',
        ]);
        Admin::create([
            'name' => 'admin4',
            'user_name' => 'admin4',
            'admin_id' => 'BD_A0004',
            'email' => 'admin4@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '09879025363',
            'gender' => 'male',
            'dob' => '1999.09.09',
            'nrc' => '12/abcd(C)12345',
            'status' => 'active',
            'remark' => 'admin remark',
            'hospital_id' => 4,
            'latitude' => '16.75969014798281',
            'longitude' => '96.25256042553455',
        ]);
        Admin::create([
            'name' => 'admin5',
            'user_name' => 'admin5',
            'admin_id' => 'BD_A0005',
            'email' => 'admin5@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '09879025363',
            'gender' => 'male',
            'dob' => '1999.09.09',
            'nrc' => '12/abcd(C)12345',
            'status' => 'active',
            'remark' => 'admin remark',
            'hospital_id' => 5,
            'latitude' => '16.772126245074116',
            'longitude' => '96.25118416569696',
        ]);
        Donor::create([
            'name' => 'Chit Su',
            'user_name' => 'chitsu',
            'donor_id' => 'BD_D0001',
            'email' => 'chitsu@gmail.com',
            'password' => Hash::make('donor'),
            'phone' => '095025363',
            'gender' => 'female',
            'dob' => '1999.09.09',
            'nrc' => '၁၂/သကတ(နိုင်)၀၇၈၉၁၄',
            'status' => 'active',
            'blood_type_id' => 1,
            'city_id' => 1,
            'township_id' => 1,
            'remark' => 'donor remark',
            'address' => 'thitsar road, tharkayta township, yangon',
            'latitude' => '16.792324064179855',
            'longitude' => '96.19670629740229',
        ]);
        Donor::create([
            'name' => 'Kyaw Si Thu',
            'user_name' => 'kyawsithu',
            'donor_id' => 'BD_D0002',
            'email' => 'kyawsithu@gmail.com',
            'password' => Hash::make('donor'),
            'phone' => '095025362',
            'gender' => 'male',
            'dob' => '1999.09.09',
            'nrc' => '၁၂/ဗတထ(နိုင်)၉၇၃၆၂',
            'status' => 'active',
            'blood_type_id' => 1,
            'city_id' => 1,
            'township_id' => 1,
            'address' => 'near shwe pa zun cafe, thanlyin township, yangon',
            'latitude' => '16.805069979740292',
            'longitude' => '96.1941830909391',
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

        Patient::create([
            'name' => 'yeyintchanthar',
            'user_name' => 'yeyintchanthar',
            'patient_id' => 'BD_P0002',
            'email' => 'yeyintchanthar@gmail.com',
            'password' => Hash::make('yeyintchanthar'),
            'phone' => '09970570823',
            'gender' => 'male',
            'dob' => '1999.01.01',
            'nrc' => '12/htd(C)12345',
            'status' => 'active',
            'blood_type_id' => 1,
            'city_id' => 1,
            'township_id' => 1,
            'remark' => 'yeyintchanthar remark',
            'address' => 'Thanlyin',
            'latitude' => '16.77875476501006',
            'longitude' => '96.15071654766246',
        ]);

        Patient::create([
            'name' => 'Mg Thuta',
            'user_name' => 'thuta',
            'patient_id' => 'BD_P0003',
            'email' => 'thuta@gmail.com',
            'password' => Hash::make('thuta'),
            'phone' => '09250859898',
            'gender' => 'male',
            'dob' => '1998.03.08',
            'nrc' => '12/YKN(N)09785789',
            'status' => 'active',
            'blood_type_id' => 1,
            'city_id' => 1,
            'township_id' => 1,
            'remark' => 'thuta remark',
            'address' => 'Thanlyin',
            'latitude' => '16.77875476501006',
            'longitude' => '96.15071654766246',
        ]);

        Donor::create([
            'name' => 'donor',
            'user_name' => 'donor',
            'donor_id' => 'BD_P0003',
            'email' => 'donor@gmail.com',
            'password' => Hash::make('donor'),
            'phone' => '09250859898',
            'gender' => 'male',
            'dob' => '1998.03.08',
            'nrc' => '12/YKN(N)09785789',
            'status' => 'active',
            'blood_type_id' => 1,
            'city_id' => 1,
            'township_id' => 1,
            'remark' => 'donor remark',
            'address' => 'Thanlyin',
            'latitude' => '16.77875476501006',
            'longitude' => '96.15071654766246',
        ]);

        \App\Models\Donor::factory(20)->create();
        \App\Models\Patient::factory(20)->create();

        ReportAdmin::create([
            'hospital_id' => '3',
            'patient_id' => '1',
            'patient_name' => 'patient',
            'blood_type_id' => '1',
            'admin_id' => '3',
            'phone' => '09899889989',
            'latitude' => '16.77875476501006',
            'longitude' => '96.15071654766246',
            'report_date_time' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);





        //ReportDonor::create([
        //    'hospital_id' => 3,
        //    'admin_report_id' => 1,
        //    'admin_id' => 3,
        //    'donor_id' => 3,
        //    'patient_id' => 1,
        //    'status' => 'pending',
        //    'type' => 'normal',
        //    'report_type' => 'website',
        //    'donor_confirm' => 'undone',
        //    'report_date_time' => \Carbon\Carbon::now()->toDateTimeString(),
        //]);
    }
}
