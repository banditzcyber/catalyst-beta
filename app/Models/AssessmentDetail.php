<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_id',
        'item_id',
        'assessment_result',
        'actual_result',
        'comment',
        'status'
    ];
}
