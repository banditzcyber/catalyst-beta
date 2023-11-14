<?php

namespace App\Imports;

use App\Models\ProfileMatrix;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class ProfileMatrixImport implements ToModel
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

        return new ProfileMatrix([
            'competency_id'          => $row[0],
            'competency_name'        => $row[1],
            'section'                => $row[2],
            'position'               => $row[3],
            'position_title'         => $row[4],
            'jobcode'                => $row[5],
            'level'                  => $row[6],
            'position_future'        => $row[7],
            'position_title_future'  => $row[8],
            'jobcode_future'         => $row[9],
            'level_future'           => $row[10],
            'status'                 => $row[11]
        ]);
    }
}
