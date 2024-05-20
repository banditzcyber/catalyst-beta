<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SectionArea extends Model
{
    use HasFactory;

    public function getAssessment($subEmployee)
    {
        return DB::table('assessment_details AS ad')
            ->join('assessments AS a', 'a.id', '=', 'ad.assessment_id')
            ->join('items AS i', 'i.item_id', '=', 'ad.item_id')
            ->whereIn('a.employee_id', $subEmployee);
    }

    public function getLearning($subEmployee)
    {
        return DB::table('learnings as l')
                    ->whereIn('l.employee_id', $subEmployee);
    }
}
