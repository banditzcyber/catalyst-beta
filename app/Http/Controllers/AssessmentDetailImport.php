<?php

namespace App\Imports;

use App\Models\AssessmentDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AssessmentDetailImport implements ToModel, WithCalculatedFormulas, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    protected $importedCount = 0;
    protected $assessment_id;

    public function __construct($assessment_id)
    {
        $this->assessment_id = $assessment_id;
    }

    // private $headerRow = true;
    public function model(array $row)
    {
        // Skip the first row (header)
        // if ($this->headerRow) {
        //     $this->headerRow = false;
        //     return null;
        // }


        // $assessment_id = $row[1];
        // $variableData = YourModel::where('some_condition', 'some_value')->first();
        $assessmentdetail = new AssessmentDetail([

            'assessment_id'      => $this->assessment_id,
            'item_id'            => $row['item_id'],
            'assessment_result'  => $row['result_num'],
            'actual_result'      => $row['actual_num'],
            'comment'            => $row['comment']

            // 'assessment_id'      => $this->assessment_id,
            // 'item_id'            => $row[1],
            // 'assessment_result'  => $row[2],
            // 'actual_result'      => $row[2],
            // 'comment'            => $row[3]
        ]);

        $this->importedCount++;

        return $assessmentdetail;
    }

    public function getImportedCount()
    {
        return $this->importedCount;
    }

    public function batchSize(): int
    {
        return 100; // Mengimpor 50 data sekaligus
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
