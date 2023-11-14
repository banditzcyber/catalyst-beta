<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel
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

        return new User([
           'employee_name'     => $row[0],
           'email'    => $row[1],
           'password' => Hash::make($row[2]),
           'employee_id'=>$row[3],
           'role_id'=> $row[4]
        ]);
    }
}
