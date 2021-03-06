<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'password' => 'required|confirmed|min:8',
            // 'password' => 'required|confirmed|min:8|strong_password',
            'email' => 'required|email|unique:users,email',
            'active' => 'boolean',
            'roles.*' => 'in:admin,editor,author,subscriber',
        ];
    }
}
