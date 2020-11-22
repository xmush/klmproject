<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_fish_champion extends Model
{
    protected $fillable = [
        'user_fish_id',
        'user_id',
        'cat_id',
        'champion_cat_id',
        'point_id',
        'date',
        'time',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function user_fish() {
        return $this->belongsTo('App\Models\Tbl_user_fish');
    }

    public function cat_champ() {
        return $this->hasOne('App\Models\Tbl_cat_champion', 'id', 'champion_cat_id');
    }
}
