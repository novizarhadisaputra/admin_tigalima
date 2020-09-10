<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;

class UserStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'email.required' => 'A email is required',
            'email.email' => 'A email must be valid',
            'email.unique' => 'A email is unique',
            'password.required' => 'A password is required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()->all()], 400));
    }
}
