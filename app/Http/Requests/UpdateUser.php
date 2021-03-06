<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
        $user = $this->route('user');

        return [
            'name' => 'sometimes|required',
            'password' => 'nullable|confirmed|min:8',
            'email' => 'sometimes|required|email|unique:users,email,'.$user->id,
            'active' => 'sometimes|boolean',
            'id_card' => 'sometimes|required|unique:users,id_card,'.$user->id,
            'phone_number' => 'sometimes|required|unique:users,phone_number,'.$user->id,
            'roles.*' => 'sometimes|in:admin,editor,author,subscriber',
        ];
    }
}
