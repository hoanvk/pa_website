<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemFormRequest extends FormRequest
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
            'item_item'=>'required|max:5',
            'item_tabl'=>'required|max:5',
            'short_desc'=>'required|max:50'
        ];
    }

    public function messages()
    {
        return [
            'item_item.required' => 'Item Code is required',
            'item_item.max'  => 'Item Code limit 5 characters',
        ];
    }
}
