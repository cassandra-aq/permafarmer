<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /* @var User $user_subject */
        $user_subject = $this->user;
        /* @var User $auth_user */
        $auth_user = $this->user();

        return $auth_user !== null && ($auth_user->isAdmin() || $auth_user->is($user_subject));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
