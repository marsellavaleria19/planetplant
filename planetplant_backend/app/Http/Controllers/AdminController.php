<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\ReportCountData;
use App\Customer;
use Hash;
use Alert;


class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){
        $admins = Admin::paginate(10);
        return view('pages.admin.index')->with(['admins'=>$admins]);
    }
 
    public function show($id){
        
        $admin = Admin::findOrFail($id);

        return view('pages.admin.show')->with(['admin'=>$admin]);
    }

    public function search(Request $request)
	{
		$cari = $request->cari;
		$admins = Admin::where(DB::raw('concat(code,name,username)') , 'LIKE' , "%".$cari."%")->paginate(14);
		return view('pages.admin.index',['admins' => $admins]);
	}

    public function create()
    {
        return view('pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {     
            $admin = Admin::getAdmin()->code."-".Admin::getAdmin()->name;
            $jumlahAdmin = Admin::count();
            $code = "A0000".($jumlahAdmin+1);
            $image_name=null;
            $path_image = null;
            if ($request->hasFile('photo')) {
                $path_image = "/img_client/";
                $image = $request->file('photo');
                $image_name = $code."-".$image->getClientOriginalExtension();
                $destinationPath = public_path('/img_client');
                $image->move($destinationPath, $image_name);
                $path_image .=$image_name;
            }
            else{
                $path_image = "/img_client/";
              $image_name="profile.jpg";
              $path_image .=$image_name;
            }

          
            Admin::create([
                'code' => $code,
                'name'=>$request->name,
                'gender' => $request->gender,
                'address' => $request ->address,
                'phone_number' => $request->phone_number,
                'photo' => $path_image,
                'email'=>$request->email,
                'username' => $request ->username,
                'password' => Hash::make($request->password),
                'show' => 1,
                'createdby'=>$admin,
                'updatedby'=>$admin
            ]);
        
         Alert::success('BERHASIL', 'Data Admin Berhasil Ditambahkan!');
         return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        return view('pages.admin.edit')->with(['admin'=>$admin]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        if($request->password_checkbox=='true'){
            $request->validate([
            'name'=>'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|unique:admins,email,' . $id,
            'username' => 'required|unique:admins,username,' . $id,
            'password' =>'required']
            );
        }
        else{
            $request->validate([
            'name'=>'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email|unique:admins,email,'.$id,
            'username' => 'required | unique:admins,username,'.$id
            ]
            );
        }
            
            $adminLogin = Admin::getAdmin()->code."-".Admin::getAdmin()->name;
            $image_name=null;
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = $admin->code.".".$image->getClientOriginalExtension();
                $destinationPath = public_path('/img_client');
                $image->move($destinationPath, $image_name);
                $path_image = "/img_client/".$image_name;
            }
            else{
                $image_name="/img_client/profile.jpg";
                $path_image = "/img_client/".$image_name;
            }

        Admin::where('id',$id)
            ->update([
                'name'=>$request->name,
                'gender' => $request->gender,
                'address' => $request ->address,
                'phone_number' => $request->phone_number,
                'email'=>$request->email,
                'photo' => $path_image,
                'username' => $request ->username,
                'password' => Hash::make($request->password),
                'updatedby'=>$adminLogin
            ]);

            Alert::success('BERHASIL', 'Data Admin Berhasil Diubah!');
            return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $admin = Admin::getAdmin()->code."-".Admin::getAdmin()->name;
        Admin::where('id',$request->id)
            ->update([
                'deletedby' => $admin
            ]);
        Admin::destroy($request->id);
        Alert::success('BERHASIL', 'Data Admin Berhasil Dihapus!');
        return  response()->json(['success' => true]);
    }
}
