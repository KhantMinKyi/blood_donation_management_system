<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'user_name' => fake()->name(),
            'patient_id' => "BD_P" . rand(003, 999999),
            'email' => fake()->email(),
            'password' => Hash::make('patient'), // password
            'phone' => "09" . rand(2222222, 9999999),
            'gender' => 'male',
            'dob' => fake()->date(),
            'nrc' => "12/abcd(C)" . rand(22222, 99999),
            'status' => 'active',
            'blood_type_id' => rand(1, 8),
            'city_id' => 1,
            'township_id' => rand(1, 2),
            'address' => 'Insein',
            'latitude' => '16.888161956839216',
            'longitude' => '96.10802825095675',
        ];
    }
}
