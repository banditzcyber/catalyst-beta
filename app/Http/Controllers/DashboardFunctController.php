<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visitor;

class DashboardFunctController extends Controller
{
    public function index(Request $request)
    {

        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        $visitorCount               = Visitor::count();
        $employee                   = DB::table('employees')->count();
        $competencies               = DB::table('competencies')->count();
        $performance_standards      = DB::table('performance_standards')->count();
        $items                      = DB::table('items')->count();
        $closegap_activity          = DB::table('learnings')->count();
        $assessment                 = DB::table('assessments')->count();
        $matrix                     = DB::table('profile_matrices')->count();
        $users                      = DB::table('users')->count();
        $itemAssessment             = DB::table('assessment_details')
            ->join('assessments', 'assessments.id', '=', 'assessment_details.assessment_id')
            ->where('assessments.status', 3)
            ->where('assessments.status_launch', 1)->count();
        $itemCompetent              = DB::table('assessment_details')
            ->join('assessments', 'assessments.id', '=', 'assessment_details.assessment_id')
            ->where('assessment_details.actual_result', 1)
            ->where('assessments.status', 3)
            ->where('assessments.status_launch', 1)->count();
        $itemNeedImprovement        = DB::table('assessment_details')
            ->join('assessments', 'assessments.id', '=', 'assessment_details.assessment_id')
            ->where('assessment_details.actual_result', 2)
            ->where('assessments.status', 3)
            ->where('assessments.status_launch', 1)->count();
        $formAldp                   = DB::table('aldps')->where('aldps.status', 2)->count();
        $itemAldp                   = DB::table('aldp_details')
            ->join('aldps', 'aldps.id', '=', 'aldp_details.aldp_id')
            ->where('aldps.status', 2)->count();
        $participantAldp            = DB::table('learnings')
            ->join('aldp_details', 'aldp_details.id', '=', 'learnings.aldp_detail_id')
            ->join('aldps', 'aldps.id', '=', 'aldp_details.aldp_id')
            ->where('aldps.status', 2)
            ->count();
        $participantAldpCompleted   = DB::table('learnings')
            ->join('aldp_details', 'aldp_details.id', '=', 'learnings.aldp_detail_id')
            ->join('aldps', 'aldps.id', '=', 'aldp_details.aldp_id')
            ->where('aldps.status', 2)
            ->where('learnings.status', 3)
            ->count();

        try {
            $percentAldp                = ($participantAldpCompleted / $participantAldp) * 100;
        } catch (\Throwable $th) {
            $percentAldp = 0;
        }


        return view('admin.dashboard.index', [
            'title'                 => 'Dashboard',
            'employeeSession'       => $dEmployee->first(),
            'area'                  => $area,
            'roleId'                => $roleId,
            'employee'              => $employee,
            'competencies'          => $competencies,
            'performance_standards' => $performance_standards,
            'items'                 => $items,
            'closegap_activity'     => $closegap_activity,
            'matrix'                => $matrix,
            'users'                 => $users,
            'assessment'            => $assessment,
            'itemAssessment'        => $itemAssessment,
            'itemCompetent'         => $itemCompetent,
            'itemNeedImprovement'   => $itemNeedImprovement,
            'formAldp'              => $formAldp,
            'itemAldp'              => $itemAldp,
            'participantAldp'       => $participantAldp,
            'percentAldp'           => $percentAldp,
            'visitor'              => $visitorCount,

        ]);
    }
}
