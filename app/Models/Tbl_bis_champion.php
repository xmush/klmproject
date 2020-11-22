<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_bis_champion extends Model
{
    protected $fillable = [
        'cat_id',
        'position',
        'user_fish_id',
        'created_at',
        'updated_at'
    ];

    public function user_fish() {
        return $this->belongsTo('App\Models\Tbl_user_fish', 'user_fish_id');
    }
}
