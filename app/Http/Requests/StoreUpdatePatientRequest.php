<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'user_name' => 'required',
            'email' => ['nullable', Rule::unique('patients', 'email')->ignore($this->id, 'id')],
            'password' => 'required',
            'phone' => 'required',
            'gender' => 'required|in:male,female',
            'dob' => 'required',
            'nrc' => 'required',
            'status' => 'required|in:active,away',
            'blood_type_id' => 'required|exists:App\Models\BloodType,id',
            'city_id' => 'required|exists:App\Models\City,id',
            'township_id' => 'required|exists:App\Models\Township,id',
            'remark' => 'nullable',
            'disease' => 'nullable',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }
}
