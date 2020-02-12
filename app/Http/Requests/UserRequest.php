<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        return  [
          'name' => ['string', 'max:50', 'required' ],
          'email' => ['string', 'required', 'email:rfc', Rule::unique('users')->ignore($this->user)],
          'role' => ['string', 'required', Rule::in(['user', 'admin'])],
          'password' => ['string', 'min:8', 'required'],
        ];
    }
}
