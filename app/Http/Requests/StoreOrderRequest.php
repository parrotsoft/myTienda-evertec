<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'customer_name' => 'required|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_mobile' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'El :attribute es obligatorio.',
            'customer_email.required' => 'El :attribute es obligatorio.',
            'customer_mobile.required' => 'El :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'customer_name' => 'nombre del cliente',
            'customer_email' => 'email del cliente',
            'customer_mobile' => 'celular del cliente'
        ];
    }
}
