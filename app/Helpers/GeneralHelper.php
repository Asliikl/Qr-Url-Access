<?php

namespace App\Helpers;

class GeneralHelper{
    static function getSetting($key){
        $setting = \App\Models\Setting::where('key',$key)->first();
        return $setting?->value ?? '';
    }
}
