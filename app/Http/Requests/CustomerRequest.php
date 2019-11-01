<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name'=>'required|max:50',
            'tgram'=>'required|min:5',
            'dob'=>'required',
            'natlty' =>'required',
            // 'email'=>'required|email:rfc,dns',
            // 'confirm_email'=>'required|email:rfc,dns',
            'email'=>'required|email:rfc',
            'confirm_email'=>'required|email:rfc',
            'city'=>'required',
            'mobile'=>'required',
            'address'=>'required|min:20',
        ];
    }
}
