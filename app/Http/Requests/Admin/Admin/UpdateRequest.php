<?php

namespace App\Http\Requests\Admin\Admin;

use App\Repositories\AdminRepository;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return (new AdminRepository())->isLogged();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:admins,email,'.$this->admin->id,
            'password2' => 'required_with:password|same:password',
        ];
    }
}
