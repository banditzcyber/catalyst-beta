<?php

namespace App\Imports;

use App\Models\AssessmentDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class AssessmentDetailImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
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
           'assessment_id'      => $row[1],
           'item_id'            => $row[2],
           'assessment_result'  => $row[4],
           'actual_result'      => $row[6],
           'comment'            => $row[7]
        ]);
    }
}
