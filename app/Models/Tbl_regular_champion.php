<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_regular_champion extends Model
{
    protected $fillable = [
        'fish_id',
        'cat_id',
        'position',
        'user_fish_id',
        'created_at',
        'updated_at'
    ];

    public function fish() {
        return \App\Models\Tbl_user_fish::find($this->user_fish_id);
    }

    public function user_fish() {
        return $this->belongsTo('App\Models\Tbl_user_fish', 'user_fish_id');
    }
}
