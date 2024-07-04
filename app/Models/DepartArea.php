<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DepartArea extends Model
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

    public function getAldp($getEmployee)
    {
        $query  = DB::table('learnings as l')
                    ->join('aldp_details as ad', 'l.aldp_detail_id', '=', 'ad.id')
                    ->join('aldps as a', 'ad.aldp_id', '=', 'a.id')
                    ->whereIn('');
    }

    public function getSubordinate()
    {
        return DB::table('employees');
    }

}
