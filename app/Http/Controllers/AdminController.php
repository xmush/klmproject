<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\Validator;
use Response;
use Storage;
use Session;
use Image;
use File;
use DB;
use PDF;
use Mush;

class AdminController extends Controller
{
    public function index() {
        $n_owner = \App\User::where('role_id', 3)->count();
        $n_fish = \App\Models\Tbl_user_fish::all()->count();
        $n_lfish = \App\Models\Tbl_user_fish::where('status', 'LUNAS')->count();
        $n_bfish = \App\Models\Tbl_user_fish::where('status', 'BELUM LUNAS')->count();

        $n_payment = \App\Models\Tbl_user_fish::join('tbl_cats', 'tbl_user_fishs.cat_id', '=', 'tbl_cats.id')->sum('reg_price');
        $n_lpayment = \App\Models\Tbl_user_fish::join('tbl_cats', 'tbl_user_fishs.cat_id', '=', 'tbl_cats.id')->where('status', 'LUNAS')->sum('reg_price');
        $n_bpayment = \App\Models\Tbl_user_fish::join('tbl_cats', 'tbl_user_fishs.cat_id', '=', 'tbl_cats.id')->where('status', 'BELUM LUNAS')->sum('reg_price');

        // echo $n_payment;
        return view('backend.admin.index', [
            'n_owner' => $n_owner,
            'n_peserta' => $n_fish,
            'n_lfish' => $n_lfish,
            'n_bfish' => $n_bfish,
            'n_payment' => $n_payment,
            'n_lpayment' => $n_lpayment,
            'n_bpayment' => $n_bpayment,

        ]);
    }

    public function listPeserta() {
        // $peserta = \App\Models\Tbl_bio::all()->paginate(10);
        $peserta = \App\User::with(['bio','user_fish'])->where('role_id','=', 3)->get();
        // dd($peserta);
        return view('backend.admin.list_peserta', ['data_peserta' => $peserta]);
    }

    public function listFishPeserta($id) {
        $fish = \App\Models\Tbl_user_fish::where('user_id', $id)->get();

        return view('backend.admin.list_fish_peserta', ['data_fish' => $fish, 'user_id' => $id]);
    }

    public function detailUserFish($id) {
        $ufish = \App\Models\Tbl_user_fish::with([
            'user',
            'bio',
            'fish',
            'cat'
        ])->find($id);

        $cat = \App\Models\Tbl_cat::all();
        $var = \App\Models\Tbl_fish::all();

        return view('backend.admin.detail_user_fish', ['fish' => $ufish, 'data_cat' => $cat, 'data_var' => $var]);
    }

    public function UpdateUserFish(Request $req) {
        // dd($req->all());
        $ufish_id = $req->fish_id;

        $ufish = \App\Models\Tbl_user_fish::find($ufish_id);

        $ufish->handler_name = $req->handler_name;
        $ufish->handler_address = $req->handler_address;
        $ufish->fish_id = $req->varietas;
        $ufish->cat_id = $req->type_ukuran;
        $ufish->fish_size = $req->fish_size;
        
        if($req->status_reg == 'LUNAS') {
            $ufish->status = $req->status_reg;
            $ufish->confirm_by = auth()->user()->name;
        } else {
            $ufish->status = $req->status_reg;
            $ufish->confirm_by = '';
            $ufish->fish_resi_picture = '';
        }


        $update = $ufish->save();

        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Update Data Gagal, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Data Ikan Berhasil Di Update']);
        }

        return redirect()->back();
    }

    public function ConfirmRegistrasi(Request $r) {
        // dd($r->all());
        $id = $r->fish_id;

        $ufish = \App\Models\Tbl_user_fish::find($id);
        $ufish->status = $r->status;
        $ufish->confirm_by = auth()->user()->name;

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

    public function uploadFishResiReg(Request $req) {
        if($req->hasFile('fish_resi_pict')) {
            $filename_ext = $req->file('fish_resi_pict')->getClientOriginalName();
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            $extension = $req->file('fish_resi_pict')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.Carbon::now()->format('Y_m_d_His').'.'.$extension;
            $req->file('fish_resi_pict')->storeAs('public/resi', $filenametostore);
            $oripath = public_path('storage/resi/'.$filenametostore);
            $img = Image::make($oripath)->resize(500, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($oripath);

            $img_path = '/storage/resi/'.$filenametostore;
        } else {
            $img_path = '/storage/resi/default_fish.jpg';
        }

        $ufish_id = $req->fish_id;
        $ufish = \App\Models\Tbl_user_fish::find($ufish_id);

        $ufish->fish_resi_picture = $img_path;
        $ufish->status = "LUNAS";
        $ufish->confirm_by = auth()->user()->name;
        $update = $ufish->save();


        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Simpan Resi Gagal, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Gambar Resi Berhasil Di Simpan']);
        }

        return redirect()->back();
    }

    public function updateFishResiReg(Request $req) {
        if($req->hasFile('fish_resi_pict')) {
            $filename_ext = $req->file('fish_resi_pict')->getClientOriginalName();
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            $extension = $req->file('fish_resi_pict')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.Carbon::now()->format('Y_m_d_His').'.'.$extension;
            $req->file('fish_resi_pict')->storeAs('public/resi', $filenametostore);
            $oripath = public_path('storage/resi/'.$filenametostore);
            $img = Image::make($oripath)->resize(500, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($oripath);

            $img_path = '/storage/resi/'.$filenametostore;
        } else {
            $img_path = '/storage/resi/default_fish.jpg';
        }

        $ufish_id = $req->fish_id;
        $ufish = \App\Models\Tbl_user_fish::find($ufish_id);

        $ufish->fish_resi_picture = $img_path;
        $ufish->status = "LUNAS";
        $ufish->confirm_by = auth()->user()->name;
        $update = $ufish->save();


        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Update Resi Gagal, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Gambar Resi Berhasil Di Update']);
        }

        return redirect()->back();
    }

    public function addPeserta() {
        return view('backend.admin.tambah_peserta');
    }

    public function storePeserta(Request $r) {
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

        Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil mendaftarkan peserta!!.. || username ='.$r->username.' || Password = '.$r->password.' ||']);

        return redirect()->back();
    }

    public function addAdmin() {
        return view('backend.admin.tambah_admin');
    }

    public function storeAdmin(Request $r) {
        DB::beginTransaction();
        
        $data_user = [
            'role_id'   =>1,
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

        Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil menambahkan administrator !!.. || username ='.$r->username.' || Password = '.$r->password.' ||']);

        return redirect()->back();
    }

    public function dataFish() {
        $fishs = \App\Models\Tbl_user_fish::all();

        return view('backend.admin.list_ikan', ['data_fish' => $fishs]);
    }

    public function deleteFishbyId(Request $r) {

        $fish = \App\Models\Tbl_user_fish::find($r->fish_id);

        $delete = $fish->forceDelete();

        if(!$delete) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Data Ikan Gagal di Hapus']);
            return redirect()->back();            
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Data Ikan Berhasil di Hapus']);
            return redirect()->back();
        }


    }

    public function AjaxDeleteFishbyId(Request $r) {

        $fish = \App\Models\Tbl_user_fish::find($r->fish_id);

        $delete = $fish->forceDelete();

        if(!$delete) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Data Ikan Gagal di Hapus']);
            return redirect()->route('admin.fish_entry');            
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Data Ikan Berhasil di Hapus']);
            return redirect()->route('admin.fish_entry');
        }


    }

    public function printStickerFish($id){
        $fish = \App\Models\Tbl_user_fish::find($id);
        // dd($fish);
        return view('backend.pdf.test', ['fish' => $fish]);
        // $pdf = PDF::loadView('backend.pdf.test', ['fish' => $fish]);
        // return $pdf->stream($id.'-file.pdf');
    }

    public function setupUserPass() {

        $peserta = \App\User::where('role_id', 3)->get();

        return view('backend.admin.c_pass_user', ['data_peserta' => $peserta]);
    }

    public function updatePass(Request $r) {
        if ($r->has('user_id')) {
            $user_id = $r->user_id;
            $user = \App\User::find($user_id);
            $user->password = bcrypt($r->password);
            $user->save();
            Session::flash('notif', ['type' => 'success', 'msg' => 'Pawword berhasil berubah, harap password disimpan dengan baik, password '.$user->name.' : '.$r->password]);
            return redirect()->back();
            
        } else {
            $user_id = auth()->user()->id;
            $user = \App\User::find($user_id);
            $user->password = bcrypt($r->password);
            $user->save();
            Session::flash('notif', ['type' => 'success', 'msg' => 'Pawword berhasil berubah, harap password disimpan dengan baik, password '.$user->name.' : '.$r->password]);
            return redirect()->route('logout');
        }

    }

    public function setupPass() {
        return view('backend.admin.change_password');
    }

    public function FishPoint() {
        $point = \App\Models\Tbl_fish_point::orderBy('point', 'DESC')->get();
            
        return view('backend.admin.fish_point', ['data_point' => $point]);
    }

    public function addFishPoint() {

        $fs = \App\User::where('role_id', 3)
                                        ->get();

        return view('backend.admin.add_fish_point', ['data_fish' => $fs]);

    }

    public function getFishByBio($id) {
        $fs = \App\Models\Tbl_user_fish::with('fish')
                                        ->where('bio_id', $id)
                                        ->where('status', 'LUNAS')
                                        ->get();

        // $res = "";                                        
        // foreach ($fs as $fish) {
        //     $res .= "<option value='".$fs->id."'>".$fs->fish->name." | ".$fs->fish_size."</option>";
        // }

        // echo $res;

        return response()->json($fs, 200);

    }

    public function storeFishPoint(Request $r) {
        // dd($r->all());
        $user = \App\Models\Tbl_bio::find($r->bio_id);

        $fish = \App\Models\Tbl_fish_point::where('user_fish_id', $r->fish_id)->count();

        if($fish != 0) {
            $fish = \App\Models\Tbl_fish_point::where('user_fish_id', $r->fish_id)->first();

            $new = \App\Models\Tbl_fish_point::find($fish->id);

            $new->point = $r->fish_point;
            $new->date = Carbon::now()->format('Y-m-d');
            $new->time = Carbon::now()->format('H:i:s');

            $new->save();

            Session::flash('notif', ['type' => 'success', 'msg' => 'Data Point Di Update']);
            return redirect()->back();

        } else {
            $data_point = [
                'user_id' => $user->user_id,
                'user_fish_id' => $r->fish_id,
                'point' => $r->fish_point,
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s')            
            ];
        }

        // print_r($data_point);

        $store_fish = \App\Models\Tbl_fish_point::updateOrCreate($data_point);

        Session::flash('notif', ['type' => 'success', 'msg' => 'Point Berhasil Di Simpan']);

        return redirect()->back();

    }

    public function champion() {
        $champion = \App\Models\Tbl_fish_champion::all();
        return view('backend.admin.champion_list', ['data_champion' => $champion]);
    }
    
    public function addChampion() {
        $cat = \App\Models\Tbl_cat_champion::distinct()->get(['grade']);
        $fish = \App\Models\Tbl_user_fish::with(['fish', 'bio'])
                                            ->where('status', 'LUNAS')
                                            ->get();
        return view('backend.admin.add_champion', ['data_cat' => $cat, 'data_ikan' => $fish]);
    }

    public function getChampionCat($grade) {
        $cat = \App\Models\Tbl_cat_champion::where('grade', $grade)->get();
        return Response::json($cat);
    }
    
    public function getFishChampion($user_id) {
        $fish = \App\Models\Tbl_user_fish::with('fish')
                                            ->where('user_id', $user_id)
                                            ->where('status', 'LUNAS')
                                            ->get();
        return Response::json($fish);
    }

    public function storeFishChampion(Request $r) {

        
        $fish = \App\Models\Tbl_user_fish::find($r->user_fish_id);
        
        $point = \App\Models\Tbl_fish_point::where('user_fish_id', $fish->id)->first();

        // dd($point);
        if($point == null) {
            // Session::flash('notif', ['type' => 'error', 'msg' => 'Point Ikan no '.Mush::no_reg($fish->id).' Kosong silahkan di isi dan Ulangi Lagi']);
            // return redirect()->route('admin.champion');

            $fpoint = 1234;

        } else {

            $fpoint = $point->point;

        }

        $data_champion = [
            'user_fish_id'  => $fish->id,
            'user_id'   => $fish->user_id,
            'cat_id'    => $fish->cat_id,
            'champion_cat_id'   => $r->cat_id,
            'point_id'  => $fpoint,
            'date'  => Carbon::now()->format('Y-m-d'),
            'time'  => Carbon::now()->format('H:i:s'),
        ];

        DB::beginTransaction();

        $champion = \App\Models\Tbl_fish_champion::create($data_champion);

        if(!$champion) {
            DB::rollBack();
            Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Menyimpan Data Champion, Ulangi Lagi']);
        } else {
            DB::commit();
            Session::flash('notif', ['type' => 'success', 'msg' => 'Data Champion Berhasil Tersimpan']);
        }
        return redirect()->route('admin.champion');

    }

    public function showFishChampion($id) {
        $cat = \App\Models\Tbl_cat_champion::distinct()->get(['grade']);
        $fish = \App\Models\Tbl_user_fish::with(['fish', 'bio'])
                                            ->where('status', 'LUNAS')
                                            ->get();
        $user = \App\User::where('role_id', 3)->get();
        $champ = \App\Models\Tbl_fish_champion::find($id);

        return view('backend.admin.show_champion', ['data_cat' => $cat, 'data_ikan' => $fish, 'champion' => $champ]);

    }

    public function updateFishChampion(Request $r,$id) {

        $champion = \App\Models\Tbl_fish_champion::find($id);

        $user_fish = \App\Models\Tbl_user_fish::find($r->user_fish_id);

        
        $champion->user_fish_id = $r->user_fish_id;
        $champion->user_id = $r->owner;
        $champion->cat_id = $user_fish->cat_id;
        $champion->champion_cat_id = $r->cat_id;
        $champion->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $update = $champion->save();

        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Update Data Champion, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Update Data Champion Berhasil!!']);
        }
        return redirect()->route('admin.champion');
    }

    public function addCatChampion() {
        $cat = \App\Models\Tbl_cat_champion::distinct()->get(['grade']);
        $position = \App\Models\Tbl_cat_champion::distinct()->get(['id','grade', 'cat_name']);
        return view('backend.admin.add_cat_champion', ['data_cat' => $cat, 'data_position' => $position]);
    }

    public function storeCatChampion(Request $r) {
        $data_cat = [
            'grade' => $r->grade,
            'cat_name' => $r->position,
            'cat_desk' => $r->desc
        ];

        $cat = \App\Models\Tbl_cat_champion::create($data_cat);

        if(!$cat) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Menyimpan Data Category Champion, Ulangi Lagi']);
            return redirect()->back();
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil Menyimpan Data Category Champion!']);
            return redirect()->back();
        }
    }

    public function showFishPoint($id) {

        $fpoint = \App\Models\Tbl_fish_point::where('user_fish_id',$id)->first();
        // $peserta = \App\User::where('role_id', 3)->get();
        // dd($fpoint);
        $peserta = \App\Models\Tbl_user_fish::where('status', 'LUNAS')->get();

        return view('backend.admin.show_fish_point', ['point' => $fpoint, 'data_peserta' => $peserta]);

    }

    public function updateFishPoint(Request $r, $id) {

        $point = \App\Models\Tbl_fish_point::find($id);
        // dd($r->all());
        $point->user_fish_id = $r->user_fish_id;
        $point->user_id = $r->user_id;
        $point->point = $r->fish_point;
        $point->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $point->save();

        if(!$point) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Update Data Point, Ulangi Lagi']);
            return redirect()->route('admin.fish_point');
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil Update Data Point!']);
            return redirect()->route('admin.fish_point');
        }
    }

    public function deleteFishPoint(Request $r) {
        $point = \App\Models\Tbl_fish_point::find($r->point_id);

        $point->forceDelete();

        Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil Delete Data Point!']);

        return redirect()->back();

    }

    public function deleteChampion(Request $r) {
        $chp = \App\Models\Tbl_fish_champion::find($r->champion_id);

        $chp->forceDelete();

        Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil Delete Data Champion!']);

        return redirect()->back();
    }

    public function printFishSticker() {

        $stc = \App\Models\Tbl_user_fish::orderBy('fish_id', 'DESC')
                                            ->orderBy('fish_size', 'ASC')
                                            ->get();
        
        // dd()
        return view('backend.admin.print_fish_sticker', ['data_stc' => $stc]);
        // $pdf = PDF::loadView('backend.admin.print_fish_sticker', ['data_stc' => $stc]);
        // $pdf->setPaper('A4', 'potrait');
        // return $pdf->stream('KLM_Project_fish_sticker.pdf');


    }

    public function printUserFishSticker($id) {
        $stc = \App\Models\Tbl_user_fish::where('user_id', $id)->get();
        return view('backend.admin.print_fish_sticker', ['data_stc' => $stc]);

    }

    public function printFishNota($user_id) {
        $fishs = \App\Models\Tbl_user_fish::where('user_id', $user_id)->get();
        $user = \App\User::find($user_id);

        $l_fishs = count($fishs);

        if ($l_fishs != 0) {
            return view('backend.admin.print_fish_nota', ['data_fish' => $fishs, 'user' => $user]);
            // $pdf = PDF::loadView('backend.admin.print_fish_nota', ['data_fish' => $fishs, 'user' => $user]);
            // $pdf->setPaper('A4', 'potrait');
    
            // $file_name = Carbon::now()->format('YmdHis').'_'.$user->bio->id.'_'.$user->bio->nama;
            // return $pdf->download($file_name.'all_fish_bill.pdf');
            // dd($fishs);
        } else {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Belum Ada Ikan Terdaftar']);
            return redirect()->back();
        }
    }

    public function printUserFishNota($fish_id) {
        $fish = \App\Models\Tbl_user_fish::find($fish_id);

        // dd($fish);s
        return view('backend.admin.print_user_fish_nota', ['fish' => $fish]);
    }

    public function printUserFishData($user_id) {
        $fish = \App\Models\Tbl_user_fish::where('user_id', $user_id)->get();
        $user = \App\User::find($user_id);
        return view('backend.admin.print_user_fish_data', ['fishs' => $fish, 'user' => $user]);
    }

    public function rekapPayment() {

        $lunas = \App\Models\Tbl_user_fish::where('status', 'LUNAS')->get();
        $tlunas = \App\Models\Tbl_user_fish::where('status', 'BELUM LUNAS')->get();
        $all_fish = \App\Models\Tbl_user_fish::all();

        return view('backend.admin.rekap_payment',
                        [
                            'data_lunas' => $lunas,
                            'data_tlunas' => $tlunas,
                            'all_data' => $all_fish
                        ]
                    );
    }

    public function printRekapPaymentAll() {

        $fishs = \App\Models\Tbl_user_fish::all();
        $user2 = \App\Models\Tbl_user_fish::with('user')->distinct()->get(['user_id']);
        return view('backend.admin.print_rekap_payment', 
                [
                    'data_ikan' => $fishs,
                    'data_user' => $user2
                ]);
    }
    
    public function printRekapPaymentLunas() {

        $fishs = \App\Models\Tbl_user_fish::where('status', 'LUNAS')->get();
        $user2 = \App\Models\Tbl_user_fish::with('user')
                                            ->where('status', 'LUNAS')
                                            ->distinct()->get(['user_id']);
        return view('backend.admin.print_rekap_payment', 
                [
                    'data_ikan' => $fishs,
                    'data_user' => $user2,
                ]);
    }
    
    public function printRekapPaymentBLunas() {

        $fishs = \App\Models\Tbl_user_fish::where('status', 'BELUM LUNAS')->get();
        $user2 = \App\Models\Tbl_user_fish::with('user')
                                            ->where('status', 'BELUM LUNAS')
                                            ->distinct()->get(['user_id']);
        return view('backend.admin.print_rekap_payment', 
                [
                    'data_ikan' => $fishs,
                    'data_user' => $user2,
                ]);
    }

    public function regularChampion() {
        $varietas = \App\Models\Tbl_fish::all();
        $cat = \App\Models\Tbl_cat::all();

        $creg = \App\Models\Tbl_regular_champion::all();

        return view('backend.admin.regular_champion', [
            'data_var' => $varietas,
            'data_cat' => $cat,
            'data_rc' => $creg,
        ]);
    }

    public function regularChampiongetFish($var_id, $cat_id) {
        $fish = \App\Models\Tbl_user_fish::where('fish_id', $var_id)
                                            ->where('cat_id', $cat_id)
                                            ->get();

        return Response::json($fish);

    }

    public function storeRegularChampion(Request $r) {
        $trch = \App\Models\Tbl_regular_champion::where('fish_id', $r->var_id)
                                                    ->where('cat_id', $r->ukuran_id)
                                                    ->where('position', $r->posisi)
                                                    ->count();
        if($trch > 5) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Slot Regular Champion Sudah Penuh']);
            return redirect()->back();
        } else {
            $drch = \App\Models\Tbl_regular_champion::where('fish_id', $r->var_id)
                                                        ->where('cat_id', $r->ukuran_id)
                                                        ->where('user_fish_id', $r->peserta_id)
                                                        ->get();
            $prch = \App\Models\Tbl_regular_champion::where('fish_id', $r->var_id)
                                                        ->where('cat_id', $r->ukuran_id)
                                                        ->where('position', $r->posisi)
                                                        ->get();
            // echo count($drch);
            if(count($drch) == 0 && count($prch) == 0) {
                $data_rc = [
                    'fish_id' => $r->var_id,
                    'cat_id' => $r->ukuran_id,
                    'user_fish_id' => $r->peserta_id,
                    'position' => $r->posisi
                ];

                $rc = \App\Models\Tbl_regular_champion::create($data_rc);

                if(!$rc) {
                    Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Menambah Data Regular Champion']);
                    return redirect()->back();
                } else {
                    Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil, Data Regular Champion Disimpan']);
                    return redirect()->back();
                }
            } else {
                Session::flash('notif', ['type' => 'error', 'msg' => 'Slot Posisi Regular Champion Sudah di isi']);
                return redirect()->back();
            }
        }
    }

    public function regularChampionDelete(Request $r) {
        $rc = \App\Models\Tbl_regular_champion::find($r->ch_id);
        $delete = $rc->forceDelete();
        
        if(!$delete) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Menghapus Data Regular Champion']);
            return redirect()->back();
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil, Data Regular Champion Dihapus']);
            return redirect()->back();            
        }
    }

    public function bisChampion() {
        $cat = \App\Models\Tbl_cat::all();
        $fbis = \App\Models\Tbl_bis_champion::all();
        return view('backend.admin.bis_champ', [
            'data_cat' => $cat,
            'data_bis' => $fbis,
        ]);
    }

    public function bisChampiongetFish($cat_id) {
        $fish = \App\Models\Tbl_user_fish::with('fish')
                                            ->where('cat_id', $cat_id)
                                            ->get();

        return Response::json($fish);        
    }

    public function bisChampionStore(Request $r) {
        $trch = \App\Models\Tbl_bis_champion::where('cat_id', $r->ukuran_id)
                                                    ->where('position', $r->posisi)
                                                    ->count();
        if($trch > 3) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Slot Best Champion Sudah Penuh']);
            return redirect()->back();
        } else {
            $drch = \App\Models\Tbl_bis_champion::where('cat_id', $r->ukuran_id)
                                                        ->where('user_fish_id', $r->peserta_id)
                                                        ->get();
            $prch = \App\Models\Tbl_bis_champion::where('cat_id', $r->ukuran_id)
                                                        ->where('position', $r->posisi)
                                                        ->get();
            // echo count($drch);
            if(count($drch) == 0 && count($prch) == 0) {
                $data_rc = [
                    'fish_id' => $r->var_id,
                    'cat_id' => $r->ukuran_id,
                    'user_fish_id' => $r->peserta_id,
                    'position' => $r->posisi
                ];

                $rc = \App\Models\Tbl_bis_champion::create($data_rc);

                if(!$rc) {
                    Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Menambah Data Regular Champion']);
                    return redirect()->back();
                } else {
                    Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil, Data Regular Champion Disimpan']);
                    return redirect()->back();
                }
            } else {
                Session::flash('notif', ['type' => 'error', 'msg' => 'Slot Posisi Regular Champion Sudah di isi']);
                return redirect()->back();
            }
        }
    }

    public function bisChampionDelete(Request $r) {
        $rc = \App\Models\Tbl_bis_champion::find($r->ch_id);
        $delete = $rc->forceDelete();
        
        if(!$delete) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Menghapus Data Best In Size']);
            return redirect()->back();
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil, Data Best In Size']);
            return redirect()->back();            
        }
    }

    public function gradeChampion() {
        $cat = \App\Models\Tbl_cat::all()->unique('grade');
        $fbis = \App\Models\Tbl_grade_champion::all();
        return view('backend.admin.grade_champ', [
            'data_cat' => $cat,
            'data_bis' => $fbis,
        ]);
    }

    public function gradeChampiongetFish($grade) {
        $grades = \App\Models\Tbl_cat::where('grade', $grade)->get();
        $ids = array();
        foreach ($grades as $grade) {
            array_push($ids, $grade->id);
        }
        $fish = \App\Models\Tbl_user_fish::with(['cat', 'fish'])
                                            ->whereIn('cat_id', $ids)
                                            ->get();

        return Response::json($fish);
        // return Response::json($grade_ids);        
    }

    public function gradeChampionStore(Request $r) {
        $trch = \App\Models\Tbl_grade_champion::where('cat_id', $r->cat_id)
                                                    ->where('position', $r->posisi)
                                                    ->count();
        if($trch > 3) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Slot Best Champion Sudah Penuh']);
            return redirect()->back();
        } else {
            $drch = \App\Models\Tbl_grade_champion::where('cat_id', $r->cat_id)
                                                        ->where('user_fish_id', $r->peserta_id)
                                                        ->get();
            $prch = \App\Models\Tbl_grade_champion::where('cat_id', $r->cat_id)
                                                        ->where('position', $r->posisi)
                                                        ->get();
            // echo count($drch);
            if(count($drch) == 0 && count($prch) == 0) {
                $data_rc = [
                    // 'fish_id' => $r->var_id,
                    'cat_id' => $r->cat_id,
                    'user_fish_id' => $r->peserta_id,
                    'position' => $r->posisi
                ];

                $rc = \App\Models\Tbl_grade_champion::create($data_rc);

                if(!$rc) {
                    Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Menambah Data Regular Champion']);
                    return redirect()->back();
                } else {
                    Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil, Data Regular Champion Disimpan']);
                    return redirect()->back();
                }
            } else {
                Session::flash('notif', ['type' => 'error', 'msg' => 'Slot Posisi Regular Champion Sudah di isi']);
                return redirect()->back();
            }
        }
    }

    public function gradeChampionDelete(Request $r) {
        $rc = \App\Models\Tbl_grade_champion::find($r->ch_id);
        $delete = $rc->forceDelete();
        
        if(!$delete) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Menghapus Data Best In Size']);
            return redirect()->back();
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil, Data Best In Size']);
            return redirect()->back();            
        }
    }

}
