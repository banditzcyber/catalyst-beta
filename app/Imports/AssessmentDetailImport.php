<?php

namespace App\Imports;

use App\Models\AssessmentDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class AssessmentDetailImport implements ToModel
{
    protected $assessment_id;
    public function __construct($assessment_id)
    {
        $this->assessment_id = $assessment_id;
    }
    private $headerRow = true;
    public function model(array $row)
    {
        // Skip the first row (header)
        if ($this->headerRow) {
            $this->headerRow = false;
            return null;
        }

        // $assessment_id = $row[1];
        // $variableData = YourModel::where('some_condition', 'some_value')->first();
        return new AssessmentDetail([

            // 'assessment_id'      => $this->assessment_id,
            // 'item_id'            => $row[2],
            // 'assessment_result'  => $row[8],
            // 'actual_result'      => $row[8],
            // 'comment'            => $row[7]

            'assessment_id'      => $this->assessment_id,
            'item_id'            => $row[1],
            'assessment_result'  => $row[2],
            'actual_result'      => $row[2],
            'comment'            => $row[3]
        ]);
    }
}
