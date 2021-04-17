<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'registration_id',
        'registration_name',
        'registration_authority',
        'registration_date',
        'expiry_date',
        'registration_authority_address',
        'website',
        'email',
        'phone_number',
        'mobile_number' 
    ];
}
