<?php
namespace App\Http\Requests\Admin\Setting;

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
            'key'=>'required',
            'value'=>'required'
        ];
    }
}
