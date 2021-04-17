<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountParentChildAssociation extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'child_id',
        'created_at',
        'updated_at'
    ];
}
