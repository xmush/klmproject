<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\Validator;
use Storage;
use Session;
use Image;
use File;
use DB;
use PDF;

class UserController extends Controller
{
    public function index() {
        return view('backend.user.index');
    }

    public function personalData($id) {
        $bio = \App\User::with('bio')->find($id);

        // dd($bio);
        // echo $bio->bio->nama;
        return view('backend.user.personal', ['user' => $bio]);
    }

    public function personalUpdateData(Request $req) {
        $bio_id = $req->bio_id;

        $bio = \App\Models\Tbl_bio::find($bio_id);

        $bio->nama = $req->full_name;
        $bio->no_hp = $req->no_hp;
        $bio->alamat = $req->address;
        $bio->prov = $req->prov;
        $bio->kota = $req->kabupaten;
        $bio->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $update = $bio->save();
        
        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Update Data Gagal, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Data Personal Berhasil Di Update']);
        }

        return redirect()->back();
    }

    public function fishData($id) {
        $ufish = \App\Models\Tbl_user_fish::with([
            'user' => function($query) use ($id) {
                $query->where('id', '=', $id);
                },
            'bio' => function($query) use ($id) {
                $query->where('user_id', '=', $id);
                },
            'fish', 'cat'    
        ])->where('user_id', $id)->get();

        // $ufish = \App\User::where('id', $id)->with('user_fish')->get();
        // $ufish = \App\Models\Tbl_user_fish::with('fish')->get();    
        // dd($ufish);
        // echo count($ufish);
        return view('backend.user.fish', ['user_id' => $id, 'data_fish' => $ufish]);
    }

    public function userRegisterFish($id) {
        $user_id = $id;
        $user = \App\User::with('bio')->find($user_id);

        $varietas = \App\Models\Tbl_fish::all();

        $cat = \App\Models\Tbl_cat::all();

        // dd($user);
        return view('backend.user.create_fish', [
            'user' => $user,
            'data_varietas' => $varietas,
            'data_cat' => $cat,
        ]);
    }

    public function userStoreFish(Request $r) {

        if($r->hasFile('fish_pict')) {
            $filename_ext = $r->file('fish_pict')->getClientOriginalName();
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            $extension = $r->file('fish_pict')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.Carbon::now()->format('Y_m_d_His').'.'.$extension;
            $r->file('fish_pict')->storeAs('public/fish', $filenametostore);
            $r->file('fish_pict')->storeAs('public/fish/thumbnail', $filenametostore);
            $oripath = public_path('storage/fish/'.$filenametostore);
            $thumbnailpath = public_path('storage/fish/thumbnail/'.$filenametostore);
            $img = Image::make($oripath)->resize(500, null, function($constraint) {
                $constraint->aspectRatio();
            });
            // $img->save($oripath);
            $img = Image::make($thumbnailpath)->fit(100, 100, function($constraint) {
                $constraint->aspectRatio();
            });
            // $img->save($thumbnailpath);

            $img_path = '/storage/fish/'.$filenametostore;
            $img_thumb_path = '/storage/fish/thumbnail/'.$filenametostore;
        } else {
            $img_path = '/storage/fish/default_fish.jpg';
            $img_thumb_path = '/storage/fish/thumbnail/default_fish.jpg';
        }

        DB::beginTransaction();

        $user_fish = [
            'user_id'            => $r->user_id,
            'handler_name'       => $r->handler_name,
            'handler_address'    => $r->prov .', '.$r->kabupaten,
            'bio_id'             => $r->bio_id,
            'fish_id'            => $r->varietas,
            'cat_id'             => $r->type_ukuran,
            'fish_size'          => $r->fish_size,
            'fish_picture'       => $img_path,
            'fish_picture_thumb' => $r->img_thumb_path,
            'status'             => 'BELUM LUNAS',
            'date_reg'           => Carbon::now()->format('Y-m-d'),
            'time_reg'           => Carbon::now()->format('H:i:s')
        ];

        // $fish = \App\Models\Tbl_user_fish::create($user_fish);

        // if(!$fish) {
        //     Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Daftar, Ulangi Lagi']);
        //     DB::rollBack();
        // }
        // else {
        //     DB::commit();
        //     Session::flash('notif', ['type' => 'success', 'msg' => 'Ikan Berhasil Di daftarkan']);
        //     return redirect()->route('user.fish', ['id'=> auth()->user()->id]);
        // }
        
        Session::flash('notif', ['type' => 'error', 'msg' => 'Sesi Pendaftaran telah selesai']);
        return redirect()->back();

    }

    public function showDetailFish($id) {
        // $fish = \App\Models\Tbl_user_fish::find($id);
        $ufish = \App\Models\Tbl_user_fish::with([
            'user',
            'bio',
            'fish',
            'cat'
        ])->find($id);

        $cat = \App\Models\Tbl_cat::all();
        $var = \App\Models\Tbl_fish::all();

        return view('backend.user.show_fish', ['fish' => $ufish, 'data_cat' => $cat, 'data_var' => $var]);
    }

    public function updateFish(Request $req) {
        $ufish_id = $req->fish_id;

        $ufish = \App\Models\Tbl_user_fish::find($ufish_id);

        $ufish->handler_name = $req->handler_name;
        $ufish->handler_address = $req->handler_address;
        $ufish->fish_id = $req->varietas;
        $ufish->cat_id = $req->type_ukuran;
        $ufish->fish_size = $req->fish_size;

        $update = $ufish->save();

        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Update Data Gagal, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Data Ikan Berhasil Di Update']);
        }

        return redirect()->back();

    }

    public function updateFishPicture(Request $req) {
        if($req->hasFile('fish_pict')) {
            $filename_ext = $req->file('fish_pict')->getClientOriginalName();
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            $extension = $req->file('fish_pict')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.Carbon::now()->format('Y_m_d_His').'.'.$extension;
            $req->file('fish_pict')->storeAs('public/fish', $filenametostore);
            $req->file('fish_pict')->storeAs('public/fish/thumbnail', $filenametostore);
            $oripath = public_path('storage/fish/'.$filenametostore);
            $thumbnailpath = public_path('storage/fish/thumbnail/'.$filenametostore);
            $img = Image::make($oripath)->resize(500, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($oripath);
            $img = Image::make($thumbnailpath)->fit(100, 100, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);

            $img_path = '/storage/fish/'.$filenametostore;
            $img_thumb_path = '/storage/fish/thumbnail/'.$filenametostore;
        } else {
            $img_path = '/storage/fish/default_fish.jpg';
            $img_thumb_path = '/storage/fish/thumbnail/default_fish.jpg';
        }

        $ufish_id = $req->fish_id;
        $ufish = \App\Models\Tbl_user_fish::find($ufish_id);
        $oldimg = preg_replace("#/storage/fish/#", "", $ufish->fish_picture);
        // echo $oldimg;
        //delete old fish
        // echo base_path('/'.$oldimg);
        Storage::delete(base_path($oldimg));
        Storage::delete(base_path('/thumbnail'.$oldimg));
        $ufish->fish_picture = $img_path;
        $ufish->fish_picture_thumb = $img_thumb_path;
        $update = $ufish->save();


        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Update Gambar Gagal, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Gambar Ikan Berhasil Di Update']);
        }

        return redirect()->back();

    }

    public function userPaymentFish() {
        $user_id = auth()->user()->id;

        $ufish_bl = \App\Models\Tbl_user_fish::with([
                        'user' => function($query) use ($user_id) {
                            $query->where('id', '=', $user_id);
                            },
                        'bio' => function($query) use ($user_id) {
                            $query->where('user_id', '=', $user_id);
                            },
                        'fish', 'cat'    
                    ])->where('user_id', $user_id)
                      ->where('status', 'BELUM LUNAS')
                      ->get();

            $ufish_l = \App\Models\Tbl_user_fish::with([
                    'user' => function($query) use ($user_id) {
                        $query->where('id', '=', $user_id);
                        },
                    'bio' => function($query) use ($user_id) {
                        $query->where('user_id', '=', $user_id);
                        },
                    'fish', 'cat'    
                    ])->where('user_id', $user_id)
                      ->where('status', 'LUNAS')
                      ->get();                      
        
        // dd($ufish->all());
        return view('backend.user.payment_fish', ['fish_bl' => $ufish_bl, 'fish_l' => $ufish_l]);
    }

    public function userBillFish($id) {
        $fish = \App\Models\Tbl_user_fish::with(['user', 'fish', 'cat'])->find($id);

        return view('backend.user.payment_detail_fish', ['fish' => $fish]);
    }

    public function printAllFishNota($id) {
        $fishs = \App\Models\Tbl_user_fish::where('user_id', $id)->get();

        $l_fishs = count($fishs);

        if ($l_fishs != 0) {
            $pdf = PDF::loadView('backend.user.print_all_fish_nota', ['data_fish' => $fishs]);
            // return view('backend.user.print_all_fish_nota', ['data_fish' => $fishs]);
            $pdf->setPaper('A4', 'potrait');
    
            $file_name = Carbon::now()->format('YmdHis').'_'.auth()->user()->bio->id.'_'.auth()->user()->bio->nama;
            return $pdf->stream($file_name.'all_fish_bill.pdf');
        } else {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Belum Ada Ikan Terdaftar']);
            return redirect()->back();
        }

    }
}
