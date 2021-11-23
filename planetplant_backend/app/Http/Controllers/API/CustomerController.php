<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\API\CustomerRequest;
use Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $user = request()->user();
        
        if ($user->tokenCan('customer:index')) {
            $users = Customer::orderBy('created_at', 'DESC')->get();
            return response()->json(['data' => $users]);
        }
        
        return response()->json(['status' => 'failed', 'data' => 'Unauthorized']);
    }

    public function update(CustomerRequest $request,$id){

        $path_image = null;

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');       
            $image_name = $request->code.".".$image->getClientOriginalExtension();
            $image->storeAs('public/img_client', $image_name);
            $path_image = "img_client/".$image_name;
        }
        else{
            $data['photo'] = $request->oldPhoto;
            $path_image = $request->oldPhoto;
        }

        if($request->password!=''){
            Customer::where('id',$id)
            ->update([
                'code' => $request->code,
                'name'=>$request->name,
                'gender' => $request->gender,
                'phone_number' => $request->phonenumber,
                'email' => $request->email,
                'photo' =>$path_image,
                'username'=>$request->username
                // 'password'=>Hash::make($request->password)
            ]);
        }
        else{
            Customer::where('id',$id)
            ->update([
                'code' => $request->code,
                'name'=>$request->name,
                'gender' => $request->gender,
                'phone_number' => $request->phonenumber,
                'email' => $request->email,
                'photo' => $path_image,
                'username'=>$request->username
            ]); 
        }
       

        return ResponseFormatter::success($data,'Data berhasil ditambah!');
    }

    public function store(Request $request){

        $path_image = null;

        $request->validate([
            'name'=>'required',
            'gender' => 'required',
            'phonenumber' => 'required|numeric',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required'],
            [
                'name.required' => "Nama wajib diisi.",
                'gender.required' => "Jenis kelamin wajib dipilih.",
                'phonenumber.required' => "Nomor telepon wajib diisi.",
                'email.required' => "Email wajib diisi.",
                'email.email'=>"Email wajib alamat email yang valid.",
                'username.required'=>"Username wajib diisi",
                'password.required'=>"Password wajib diisi"
            ]);

        $data = $request->all();

        $jumlahCustomer = Customer::count();

        $code = "C0000".($jumlahCustomer+1);

        $path_image = null;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');       
            $image_name = $code.".".$image->getClientOriginalExtension();
            $image->storeAs('public/img_client', $image_name);
            $path_image = "img_client/".$image_name;
        }
        else{
            $data['photo'] = $request->oldPhoto;
            $path_image = $request->oldPhoto;
        }

        Customer::create([
            'code' => $code,
            'name'=>$request->name,
            'gender' => $request->gender,
            'phone_number' => $request->phonenumber,
            'photo' => $path_image,
            'email'=>$request->email,
            'username' => $request ->username,
            'password' => Hash::make($request->password)
        ]);

        return ResponseFormatter::success($data,'Data berhasil ditambah!');
    }
}
