<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class mylearning extends Model
{
    use HasFactory;

    protected $table = 'learnings';

    public function getData($idLogin)
    {
        return DB::table('learnings')
        ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
        ->join('items', 'learnings.item_id', '=', 'items.item_id')
        ->select('learnings.id', 'learnings.item_id', 'learnings.item_name', 'learnings.aldp_detail_id', 'learnings.competency_type', 'learnings.status', 'items.intervention', 'items.type_training')
        ->where('learnings.employee_id','=', $idLogin);
    }
}
