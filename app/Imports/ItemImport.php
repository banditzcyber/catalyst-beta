<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class ItemImport implements ToModel
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

        return new Item([
           'item_id'        => $row[0],
           'ps_id'          => $row[1],
           'item_name'      => $row[2],
           'item_bahasa'    => $row[3],
           'intervention'   => $row[4],
           'type_training'  => $row[5],
           'status'         => $row[6]
        ]);
    }
}
