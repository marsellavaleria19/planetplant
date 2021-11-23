<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Alert;

class LoginController extends Controller
{
    public function index(){
        return view('pages.login');
    }

    public function do_login(Request $request)
    {   
        $request->validate([
            'username'=>'required',
            'password'=>'required']);
        
            if($this->checkAccountAdmin($request->username,$request->password)!=null){
                $user = $this->checkAccountAdmin($request->username,$request->password);
                $request -> session()->put('admin',$user);
                Alert::success('BERHASIL', 'Berhasil login!');
                return redirect()->route('home.index');
            }
            else{
                return redirect()->back()->with('error','Username dan Password salah!');
            } 
    }

    private function checkAccountAdmin($username,$password){
        
        $user = Admin:: where ('username',$username)->first();
        if($user!=null){
            if(Hash::check($password,$user['password'])){
                return $user;
            }
        }
        return null;
    }

    public function do_logout(){

        session()->flush("admin");

        return redirect("/login");
    }
}
