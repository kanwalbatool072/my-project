<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentParentsChild extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'child_id'
    ];
}
