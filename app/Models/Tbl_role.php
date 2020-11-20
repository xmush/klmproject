<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_role extends Model
{
    protected $fillable = [
        'name',
        'link',
        'desc',
        'created_at',
        'updated_at'
    ];
}
