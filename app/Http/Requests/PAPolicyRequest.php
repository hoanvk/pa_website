<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PAPolicyRequest extends FormRequest
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
            'plan_id' => 'required',           
            'period_id' => 'required',       
            'start_date' => 'required|date_format:d/m/Y',
            
        ];
    }
}
