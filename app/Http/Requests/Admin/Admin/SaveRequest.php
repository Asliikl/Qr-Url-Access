<?php

namespace App\Http\Requests\Admin\Admin;

use App\Repositories\AdminRepository;
use Illuminate\Foundation\Http\FormRequest;

class SaveRequest extends FormRequest
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
            'email' => 'required|email|unique:admins',
            'password' => 'required|same:password2',
        ];
    }
}
