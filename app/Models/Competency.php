<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    use HasFactory;

    protected $fillable = [
        'competency_id',
        'competency_area',
        'competency_type',
        'competency_name',
        'competency_bahasa',
        'description',
        'description_bahasa'
    ];
}
