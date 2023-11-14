<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartDashboard extends Model
{
    use HasFactory;

    use HasFactory;

    public function getSubordinate($idLogin)
    {
        return DB::table('employees')
                ->select('employee_id', 'employee_name', 'position')
                ->where('employees.sm_code', '=', $idLogin)
                ->orWhere('employees.employee_id', '=', $idLogin);
    }

    public function getItemAssessment($subId, $id)
    {
        return DB::table('assessment_details')
                ->join('assessments', 'assessment_details.assessment_id', '=', 'assessments.id')
                ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
                ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
                ->where('assessments.employee_id', '=', $subId)
                ->where('competencies.competency_id', '=', $id);
    }
    public function getItemAssessmentLevel($subId, $id)
    {
        return DB::table('assessment_details')
                ->join('assessments', 'assessment_details.assessment_id', '=', 'assessments.id')
                ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
                ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
                ->where('assessments.employee_id', '=', $subId);
    }

    public function getiSubOrdinate($id)
    {
        return DB::table('employees')
                ->where('employees.sm_code', '=', $idLogin)
                ->orWhere('employees.employee_id', '=', $idLogin);
    }
}
