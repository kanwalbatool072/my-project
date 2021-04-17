<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintainCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_id',
        'company_name',
        'business_nature',
        'business_type',
        'company_scope',
        'company_start_date',
        'company_status',
        'cost_center_code',
        'profit_center_code',
        'iot_id',
        'address_id',
        'contact_id'
    ];
}
