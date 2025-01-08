<?php

namespace App\Http\Requests\Admin\QRCode;

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
            'content' => 'required',
        ];
    }
}
