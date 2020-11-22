<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_bio extends Model
{
    protected $fillable = ['user_id', 'nama', 'no_hp', 'email', 'alamat', 'prov', 'kota', 'created_at', 'updated_at'];

    public function user() {
        return \App\User::find($this->user_id);
    }

    public function usr() {
        return $this->hasOne('App\User');
    }

}
