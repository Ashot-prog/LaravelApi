<?php

namespace App\Http\Requests;

use App\Rules\BirthDate;
use App\Rules\LinkedinUrl;
use App\Rules\ValidDate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegistrationRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'linkedin_profile_url' => ['required', new LinkedinUrl()],
            'birth_date' => ['required', new ValidDate(), new BirthDate()],
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}
