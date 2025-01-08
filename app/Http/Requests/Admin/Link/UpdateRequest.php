<?php
namespace App\Http\Requests\Admin\Link;

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
        $rules = [
            'old_url' => 'required|active_url',
            'new_url' => 'nullable|string',
        ];
        if ($this->has('old_url')) {
            $data = $this->all();
            if (!preg_match("~^(?:f|ht)tps?://~i", $data['old_url'])) {
                $data['old_url'] = 'http://' . $data['old_url'];
                $this->merge(['old_url' => $data['old_url']]);
            }
            $rules['old_url'] = 'required|url';
        }
        return $rules;
    }

}
