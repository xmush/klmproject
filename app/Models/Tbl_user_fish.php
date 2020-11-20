<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_user_fish extends Model
{
    //

    protected $table = 'tbl_user_fishs';
    
    protected $fillable = [
        'user_id', 'handler_name', 'handler_address', 'bio_id', 'fish_id', 'cat_id', 'fish_size', 'fish_picture', 'fish_picture_thumb', 'status', 'fish_resi_picture', 'date_reg', 'time_reg',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function bio() {
        return $this->belongsTo('App\Models\Tbl_bio');
    }

    public function fish() {
        return $this->hasOne('App\Models\Tbl_fish', 'id', 'fish_id');
    }

    public function cat() {
        return $this->hasOne('App\Models\Tbl_cat', 'id', 'cat_id');
    }

}
