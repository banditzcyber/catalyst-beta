<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProfileEmploy extends Model
{
    use HasFactory;

    public function getCompetency($idLogin){
        return DB::table('profile_matrices')
                      ->select('profile_matrices.competency_name', 'profile_matrices.competency_id')
                      ->join('employees', 'profile_matrices.jobcode', '=', 'employees.jobcode')
                      ->where('employees.employee_id', '=', $idLogin)
                      ->get();

    }

    public function getItemAssessment($idLogin, $id)
    {
        return DB::table('assessment_details')
                            ->join('assessments', 'assessment_details.assessment_id', '=', 'assessments.id')
                            ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
                            ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                            ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
                            ->where('assessments.employee_id', '=', $idLogin)
                            ->where('assessments.status', '=', 3)
                            ->where('assessments.status_launch', '=', 1)
                            ->where('competencies.competency_id', '=', $id);
    }

    public function getSubordinate($assessments)
    {
        return DB::table('assessment_details AS ad')
                ->join('assessments AS a', 'a.id', '=', 'ad.assessment_id')
                ->join('items AS i', 'i.item_id', '=', 'ad.item_id')
                ->whereIn('a.employee_id', $assessments);
    }
}
