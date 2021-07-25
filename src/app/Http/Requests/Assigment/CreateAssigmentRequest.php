<?php

namespace App\Http\Requests\Assigment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateAssigmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'required',
            'specialty_id' => 'required',
            'description' => 'required',
            'policy_number' => 'nullable',
            'insurance_company' => 'nullable',
            'insurance_phone' => 'nullable',
        ];
    }
}
