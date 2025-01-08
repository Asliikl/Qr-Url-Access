<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    use HasFactory;
    protected $table = 'qr_codes';
    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($qrCode) {
            $qrCode->hashed_id = md5(time().rand());
        });
    }
}
