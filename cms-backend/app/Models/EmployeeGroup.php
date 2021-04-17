<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'office_id',
        'department_id',
        'group_name',
        'gropu_category',
        'scope_group',
        'created_at',
        'updated_at'
    ];
}
