<?php

namespace App\Imports;

use App\Models\Competency;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class CompetenciesImport implements ToModel
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

        return new Competency([
           'competency_id'      => $row[0],
           'competency_area'    => $row[1],
           'competency_type'    => $row[2],
           'competency_name'    => $row[3],
           'competency_bahasa'  => $row[4],
           'description'        => $row[5],
           'description_bahasa' => $row[6]
        ]);
    }
}
