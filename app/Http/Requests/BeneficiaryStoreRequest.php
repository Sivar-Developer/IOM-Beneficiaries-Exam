<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeneficiaryStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:beneficiaries,name',
            'birthdate' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female',
            'phone_number' => 'nullable|max:255',
            'national_id_number' => 'nullable|integer|digits_between:0,20',
            'mother_name' => 'nullable|max:255',
            'martial_status' => 'nullable|in:Single,Married,Divorced',
            'employment_status' => 'nullable|boolean',
            'monthly_income' => 'nullable|numeric',
            'photo' => 'nullable|max:10240|image'
        ];
    }
}
