<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_cat_champion extends Model
{
    protected $fillable = [
        'grade',
        'cat_name',
        'cat_desk',
        'created_at',
        'updated_at'
    ];

}
