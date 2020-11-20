<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;

class Mush {
    public static function uf_reg_num($fish_id) {
        //user fish id
        $ufish_id = $fish_id;

        $fish = \App\Models\Tbl_user_fish::find($fish_id);

        $own_id = str_pad($fish->bio->id, 4, '0', STR_PAD_LEFT);
        $uid = str_pad($fish->user->id, 3, '0', STR_PAD_LEFT);
        $date_reg = Carbon::parse($fish->date)->format('ymd');
        $fid = str_pad($fish_id, 3, 0, STR_PAD_LEFT);

        $reg_number = ''.$date_reg.''.$own_id.''.$uid.''.$fid;

        return $reg_number;
    }
    
    public static function no_reg($fish_id) {

        $ufish_id = $fish_id;

        $fid = str_pad($fish_id, 4, 0, STR_PAD_LEFT);

        return $fid;
    }
}