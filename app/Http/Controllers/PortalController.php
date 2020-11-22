<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PortalController extends Controller
{
    public function index(){
        return view('portal.page.index');
    }

    public function summary(){
        $jml_own = \App\User::where('role_id', 3)->count();
        $jml_fish = \App\Models\Tbl_user_fish::count();
        $jml_var = \App\Models\Tbl_user_fish::select('fish_id', DB::raw('count(*) as total'))
                        ->groupBy('fish_id')
                        ->orderBy('total', 'DESC')
                        ->first();
        $jml_own_city = \App\Models\Tbl_bio::select('prov', DB::raw('count(*) as t_prov'))
                        ->groupBy('prov')
                        ->orderBy('t_prov', 'DESC')
                        ->first();
        $jml_handler = \App\Models\Tbl_user_fish::select('handler_name', DB::raw('count(*) as t_handler'))
                        ->groupBy('handler_name')
                        ->orderBy('t_handler', 'DESC')
                        ->first();
        $jml_owner = \App\Models\Tbl_user_fish::select('user_id', DB::raw('count(*) as t_owner'))
                        ->groupBy('user_id')
                        ->orderBy('t_owner', 'DESC')
                        ->first();
        $n_handler = \App\Models\Tbl_user_fish::distinct('handler_name')->count();
        $n_owner = \App\Models\Tbl_user_fish::distinct('user_id')->count();

        // return response()->json($jml_var);
        // dd($jml_owner);

        return view('portal.page.summary', [
            'n_own' => $jml_own,
            'n_fish' => $jml_fish,
            'n_var' => $jml_var,
            'n_prov' => $jml_own_city,
            'n_hand' => $jml_handler,
            't_hand' => $n_handler,
            't_owner' => $jml_owner,
        ]);
    }

    public function point() {
        $p = \App\Models\Tbl_fish_point::orderBy('point', 'DESC')->get();

        return view('portal.page.point_table', ['points' => $p]);
    }

    public function BestInSize() {
        $csize = \App\Models\Tbl_cat::all();

        $bis = \App\Models\Tbl_bis_champion::where('cat_id', 1)->orderBy('position', 'ASC')->get();

        return view('portal.page.bis', ['data_cat' => $csize, 'data_bis' => $bis]);
    }

    public function BestInSizebyCat($cat_id) {
        $csize = \App\Models\Tbl_cat::all();

        $bis = \App\Models\Tbl_bis_champion::where('cat_id', $cat_id)
                                                ->orderBy('position', 'ASC')
                                                ->get();

        return view('portal.page.bis', ['data_cat' => $csize, 'data_bis' => $bis, 'cat_id' => $cat_id]);
    }

    public function GradeChampion() {

        $champ = \App\Models\Tbl_cat::all()->unique('grade');

        $fchamp = \App\Models\Tbl_grade_champion::where('cat_id', 1)->orderBy('position', 'ASC')->get();

        return view('portal.page.champion', [
            'data_cat' => $champ,
            'data_grade' => $fchamp
        ]);

    }

    public function GradeChampionbyGrade($grade_id) {
        $champ = \App\Models\Tbl_cat::all()->unique('grade');
        $fchamp = \App\Models\Tbl_grade_champion::where('cat_id', $grade_id)->orderBy('position', 'ASC')->get();

        return view('portal.page.champion', [
            'data_cat' => $champ,
            'data_grade' => $fchamp,
            'cat_id' => $grade_id
        ]);
    }

    public function RegularChampion() {

        $cats = \App\Models\Tbl_cat::all();
        $vars = \App\Models\Tbl_fish::all();
        $rcm = \App\Models\Tbl_regular_champion::where('fish_id', 1)
                                                ->where('cat_id', 1)
                                                ->orderBy('position', 'ASC')->get();
        
        return view('portal.page.regular', [
            'data_cat' => $cats,
            'data_var' => $vars,
            'data_champion' => $rcm,
        ]);
    }

    public function RegularChampionByVarByCat($var_id, $cat_id) {
        $cats = \App\Models\Tbl_cat::all();
        $vars = \App\Models\Tbl_fish::all();
        $rcm = \App\Models\Tbl_regular_champion::where('fish_id', $var_id)
                                                ->where('cat_id', $cat_id)
                                                ->orderBy('position', 'ASC')->get();
        
        return view('portal.page.regular', [
            'data_cat' => $cats,
            'data_var' => $vars,
            'data_champion' => $rcm,
            'var_id' => $var_id,
            'cat_id' => $cat_id
        ]);
    }

}
