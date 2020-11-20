<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    public function login() {
        return view('login.login');
    }

    public function register() {
        return view('portal.page.form_register');
    }
    
    public function auth(Request $request) {

        if($request->name == null) {
            Session::flash('alert', ['type' => 'danger', 'msg' => 'username kosong!!']);
            return back();
        } elseif ($request->password == null) {
            Session::flash('alert', ['type' => 'danger', 'msg' => 'password kosong!!']);
            return back();
        } else {
            if(Auth::attempt($request->only('name', 'password'))) {
                $role_id = auth()->user()->role_id;
                $role = \App\Models\Tbl_role::find($role_id);
                
                return redirect()->route($role->route);
            }
            else {
                Session::flash('alert', ['type' => 'danger', 'msg' => 'username atau password salah!!']);
                return redirect()->route('login');
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
