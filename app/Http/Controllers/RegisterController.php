<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class RegisterController extends Controller
{
    public function register(Request $r) {
        
        DB::beginTransaction();
        
        $data_user = [
            'role_id'   =>3,
            'name'      =>$r->username,
            'email'     =>$r->email,
            'password'  =>bcrypt($r->password)
        ];

        $user = \App\User::create($data_user);

        $data_regis = [
            'user_id'    => $user->id,
            'nama'       => $r->nama_lengkap,
            'no_hp'      => $r->no_hp,
            'email'      => $r->email,
            'alamat'     => $r->alamat,
            'prov'       => $r->prov,
            'kota'       => $r->kabupaten
        ];

        $bio = \App\Models\Tbl_bio::create($data_regis);

        if( !$user || !$bio )
        {
            DB::rollBack();
        } else {
            DB::commit();
        }

        Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil mendaftar, silahkan login tahap selanjutnya']);

        return redirect()->back();

    }
}
