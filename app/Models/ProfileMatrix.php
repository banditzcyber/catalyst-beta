<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMatrix extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'position',
        'position_title',
        'competency_id',
        'competency_name',
        'jobcode',
        'level',
        'position_future',
        'position_title_future',
        'jobcode_future',
        'level_future',
        'status'
    ];
}
