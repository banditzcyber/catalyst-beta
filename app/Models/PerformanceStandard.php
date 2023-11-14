<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceStandard extends Model
{
    use HasFactory;

    protected $fillable = [
        'ps_id',
        'competency_id',
        'ps_name',
        'ps_bahasa',
        'level',
        'status'
    ];
}
