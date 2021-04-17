<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintainDepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'office_id',
        'department_name',
        'start_date',
        'cost_center',
        'profit_center',
        'department_scope',
        'status',
        'address_id',
        'contact_id'
    ];
}
