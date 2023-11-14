<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'ps_id',
        'item_name',
        'item_bahasa',
        'intervention',
        'type_training',
        'status'
    ];
}
