<?php

namespace App\Http\Requests\Api;

use App\Repositories\AdminRepository;
use Illuminate\Foundation\Http\FormRequest;

class LinkGenerateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'type' => 'required',
            'data' => 'required|array',
            'test' => 'nullable|numeric',
        ];
        $data = $this->get('data');
        if ($this->get('type') == 'url'){
            if (!preg_match("~^(?:f|ht)tps?://~i", $data['url'])) {
                $requests = $this->all();
                $requests['data']['url'] = 'http://' . $data['url'];
                $this->merge($requests);
            }
            $rules['data.url'] = 'required|active_url';
        }

        if ($this->get('type') == 'phone'){
            $rules['data.phone'] = 'required|numeric';
        }

        if ($this->get('type') == 'email'){
            $rules['data.email'] = 'required|email';
            $rules['data.subject'] = 'required|max:155';
            $rules['data.message'] = 'required|max: 200';
        }

        if ($this->get('type') == 'sms'){
            $rules['data.phone'] = 'required|numeric';
            $rules['data.message'] = 'required|max:200';
        }

        if ($this->get('type') == 'vcard'){
            $rules['data.firstname'] = 'nullable|max:155';
            $rules['data.lastname'] = 'nullable|max:155';
            $rules['data.organization'] = 'nullable|max:155';
            $rules['data.position_work'] = 'nullable|max:155';
            $rules['data.phone_work'] = 'nullable|numeric';
            $rules['data.phone_private'] = 'nullable|numeric';
            $rules['data.phone_mobile'] = 'nullable|numeric';
            $rules['data.fax_work'] = 'nullable|numeric';
            $rules['data.fax_private'] = 'nullable|numeric';
            $rules['data.email'] = 'nullable|email';
            $rules['data.website'] = 'nullable|max:155';
            $rules['data.street'] = 'nullable|max:155';
            $rules['data.zipcode'] = 'nullable|numeric';
            $rules['data.city'] = 'nullable|max:155';
            $rules['data.state'] = 'nullable|max:155';
            $rules['data.country'] = 'nullable|max:155';
            $rules['data.version'] = 'nullable';
        }

        if ($this->get('type') == 'mecard'){
            $rules['data.firstname'] = 'nullable|max:155';
            $rules['data.lastname'] = 'nullable|max:155';
            $rules['data.nickname'] = 'nullable|max:155';
            $rules['data.phone_1'] = 'nullable|numeric';
            $rules['data.phone_2'] = 'nullable|numeric';
            $rules['data.phone_3'] = 'nullable|numeric';
            $rules['data.email'] = 'nullable|email';
            $rules['data.website'] = 'nullable|max:155';
            $rules['data.birthday'] = 'nullable|date';
            $rules['data.street'] = 'nullable|max:155';
            $rules['data.zipcode'] = 'nullable|numeric';
            $rules['data.city'] = 'nullable|max:155';
            $rules['data.state'] = 'nullable|max:155';
            $rules['data.country'] = 'nullable|max:155';
            $rules['data.notes'] = 'nullable|max:155';
        }

        if ($this->get('type') == 'wifi'){
            $rules['data.ssid'] = 'required|max:155';
            $rules['data.password'] = 'required|max:155';
            $rules['data.encryption'] = 'nullable|max: 155';
        }

        if ($this->get('type') == 'whatsapp'){
            $rules['data.phone'] = 'required|numeric';
            $rules['data.message'] = 'required|max:155';
        }

        return $rules;
    }
}
