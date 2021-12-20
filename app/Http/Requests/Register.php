<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'name' => 'required|max:80',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'min:6|confirmed|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请填写用户名',
            'email.required' => '请填写正确Email',
            'password.confirmed' => '两次输入的密码不一致',
            'email.unique:users' => '已经存在相同的邮箱',
        ];
    }
}
