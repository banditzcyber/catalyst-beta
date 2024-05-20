<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class EmployeeImport implements ToModel
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

        return new Employee([
            'employee_id'       => $row[1],
            'employee_name'     => $row[2],
            'gender'            => $row[3],
            'directorate'       => $row[7],
            'division'          => $row[8],
            'department'        => $row[10],
            'section'           => $row[12],
            'loc'               => $row[13],
            'company'           => $row[14],
            'position'          => $row[15],
            'job_level'         => $row[16],
            'grade'             => $row[17],
            'email'             => $row[32],
            'jobcode'           => $row[34],
            'sm_code'           => $row[36],
            'dm_code'           => $row[38],
            'gm_code'           => $row[40],
            'status'            => $row[0]
        ]);
    }
}
