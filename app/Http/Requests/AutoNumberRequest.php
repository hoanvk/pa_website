<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutoNumberRequest extends FormRequest
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
            'product_id' => 'required',
            'last_number' => 'required|integer|between:10000000,99999999',
            'start_number' => 'required|integer|between:10000000,99999999',
            'end_number' => 'required|integer|between:10000000,99999999',
        ];
    }
}
