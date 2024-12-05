<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'user_name' => 'required|string|max:191|unique:users,user_name',
            'email' => 'required|email|max:191|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name is required.',
            'last_name.required' => 'The last name is required.',
            'user_name.required' => 'The username is required.',
            'user_name.unique' => 'This username is already taken.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'A password is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }


    public function addUser(){
        $objSpeciality = new User($this->validated());
        if ($objSpeciality->save()) {
            return ['status' => 'success', 'message' => 'Account created successfully.', 'redirect' => route('sign-in')];
        } else {
            return ['status' => 'danger', 'message' => 'Something went wrong while saving the speciality.'];
        }

    }
}
