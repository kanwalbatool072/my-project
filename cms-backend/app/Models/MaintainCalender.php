<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintainCalender extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'calender_name',
        'calender_type',
        'fiscal',
        'calender_year',
        'start_date',
        'end_date',
        'total_months',
        'total_weeks',
        'total_days',
        'workingdays_week',
        'workinghours_day',
        'workinghours_week',
        'workinghours_month',
        'created_at',
        'updated_at'
    ];
}
