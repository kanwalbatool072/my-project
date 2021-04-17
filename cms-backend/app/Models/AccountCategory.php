<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'office_id',
        'account_name',
        'account_id',
        'description',
        'bussiness_use',
        'created_at',
        'updated_at'
    ];
}
