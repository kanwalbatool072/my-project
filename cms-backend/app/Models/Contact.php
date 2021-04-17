<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

        protected $fillable = [
            'phone_number',
            'mobile_number',
            'fax_number',
            'facebook',
            'linkedin',
            'whatsapp',
            'twitter',
            'instagram',
            'email',
            'website',
            'pintrest',
        ];
}
