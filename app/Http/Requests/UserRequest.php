<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
	/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //le passer à true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
        	'firstname' => 'required|max:255|min:2|string',
        	'lastname' => 'required|max:255|min:2|string',
    		'phone' => 'required|max:10|min:10|string',
    		'password' => 'required|string|confirmed|min:6|sometimes'
        ];
        return $rules;
    }

    // public function messages()
    // {
    //     return [
    //         'password.min' => 'Il faut minimum 6 caractère',
    //         'password.confirmed' => 'Le mot de passe doit être identique',
    //         'phone.max' => 'Le numéros de téléphone doit faire 10 caractères',
    //         'phone.min' => 'Le numéros de téléphone doit faire 10 caractères'
    //     ];
    // }
}