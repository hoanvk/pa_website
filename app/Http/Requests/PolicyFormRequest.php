<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolicyFormRequest extends FormRequest
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
            //
            // 'insured_name'=>'required|max:50',
            // 'insured_id'=>'required|min:5',
            // 'insured_dob'=>'required',
            'plan_id' => 'required',
            'policy_type' => 'required',
            'destination_id' => 'required',       
            'start_date' => 'required',
            'end_date' => 'required'
        ];
    }
}