<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintainOffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'office_name',
        'office_type',
        'start_date',
        'office_status',
        'cost_center_code',
        'profit_center_code',
        'scope_office',
        'address_id',
        'contact_id'
    ];
}
