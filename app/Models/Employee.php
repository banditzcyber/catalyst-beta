<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'employee_name',
        'gender',
        'email',
        'company',
        'directorate',
        'division',
        'department',
        'department',
        'section',
        'loc',
        'position',
        'job_level',
        'grade',
        'jobcode',
        'sm_code',
        'dm_code',
        'gm_code',
        'status'
    ];

}
