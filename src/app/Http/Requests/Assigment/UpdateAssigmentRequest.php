<?php

namespace App\Http\Requests\Assigment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAssigmentRequest extends FormRequest
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
            'customer_id' => 'nullable|string',
            'specialty_id' => 'nullable|string',
            'description' => 'nullable|string',
            'policy_number' => 'nullable|string',
            'insurance_company' => 'nullable|string',
            'insurance_phone' => 'nullable|string',
        ];
    }
}
