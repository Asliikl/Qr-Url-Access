<?php

namespace App\Http\Requests\Admin\Admin;

use App\Repositories\AdminRepository;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return (new AdminRepository())->isLogged();
    }

    public function rules()
    {
        return [];
    }
}
