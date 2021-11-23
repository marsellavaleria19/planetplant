<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Hash;

class LoginController extends Controller
{
     
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
    
        $jumlahCustomer = Customer::count();
        $code = "C0000".($jumlahCustomer+1);

        $new_customer = new Customer;
        $new_customer->name = $request->get('name');
        $new_customer->email = $request->get('email');
        $new_customer->username = $request->get('username');
        $new_customer->password = Hash::make($request->get('password'));
        $new_customer->provider= 'Website';

        $user = $request->user();
        
        if ($user->tokenCan('customer:create')) {
        
        $new_user->save();
        return response()->json(['status' => 'success'], 200);
        }
        
        return response()->json(['status' => 'failed', 'data' => 'Unauthorised']);
    }
 
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        
        
        if ($this->checkAccountCustomer($request->username,$request->password)==null) {
            return ResponseFormatter::error(null,'Username dan password salah');
        }
        else{
            $user= $this->checkAccountCustomer($request->username,$request->password);
            $token = $user->createToken('ApiToken')->plainTextToken;
            $data = [
                'user'      => $user,
                'token'     => $token
            ];
            return ResponseFormatter::success($data,'Ansa berhasil login!');
        }
        
          
        
        
    }
    
    private function checkAccountCustomer($username,$password){
        
        $user = Customer:: where ('username',$username)->first();
        if($user!=null){
            if(Hash::check($password,$user['password'])){
                return $user;
            }
        }
        return null;
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'success'    => true
        ], 200);
    }
}
