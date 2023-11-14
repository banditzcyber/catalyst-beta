<?php

namespace App\Imports;

use App\Models\PerformanceStandard;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class PerformanceStandardImport implements ToModel
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

        return new PerformanceStandard([
           'ps_id'          => $row[0],
           'competency_id'  => $row[1],
           'ps_name'        => $row[2],
           'ps_bahasa'      => $row[3],
           'level'          => $row[4],
           'status'         => $row[5]
        ]);
    }
}
