<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemTypeRequest;
use App\Models\ItemType;
use Illuminate\Support\Facades\DB;
use Alert;

class ItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        $itemTypes = ItemType::paginate(10);
        return view('pages.itemtype.index')->with(['itemTypes'=>$itemTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.itemtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemTypeRequest $request)
    {
        $admin = Admin::getAdmin()->code."-".Admin::getAdmin()->name;
        $image_name=null;
        $path_image = null;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');       
            $image_name = $request->code.".".$image->getClientOriginalExtension();
            $image->storeAs('public/img_item', $image_name);
            $path_image = "img_item/".$image_name;
        }
        else{
            $request->photo = "img_item/no_picture.jpg";
        }
            
            ItemType::create([
                'code' => $request->code,
                'name'=>$request->name,
                'cover'=>$path_image,
                'createdby' => $admin,
                'updatedby' => $admin
            ]);
        
        Alert::success('BERHASIL', 'Data Jenis Barang Berhasil Ditambahkan!');
        return redirect()->route("itemtypes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemType = ItemType::findOrFail($id);

        return view('pages.itemtype.show')->with(['itemType'=>$itemType]);
    }

    public function search(Request $request)
	{
		$cari = $request->cari;
		$itemTypes = ItemType::where(DB::raw('concat(code,name)') , 'LIKE' , "%".$cari."%")->paginate(14);
		return view('pages.itemtype.index',['itemTypes' => $itemTypes]);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemType = ItemType::findOrFail($id);

        return view('pages.itemtype.edit')->with(['itemType'=>$itemType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::getAdmin()->code."-".Admin::getAdmin()->name;

        $image_name=null;
        $path_image = null;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');       
            $image_name = $request->code.".".$image->getClientOriginalExtension();
            $image->storeAs('public/img_item', $image_name);
            $path_image = "img_item/".$image_name;
        }
        else{
            $path_image = "img_item/".$image_name;
        }

        ItemType::where('id',$id)
        ->update([
            'code' => $request->code,
            'name'=>$request->name,
            'cover' => $path_image,
            'updatedby' => $admin
        ]);
    
    Alert::success('BERHASIL', 'Data Jenis Barang Berhasil Diubah!');
    return redirect()->route('itemtypes.index');
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

        ItemType::where('id',$request->id)
            ->update([
                'deletedby' => $admin
            ]);

        ItemType::destroy($request->id);

        Alert::success('BERHASIL', 'Data Jenis Barang Berhasil Dihapus!');
        return response()->json(['success' => true]);
    }
}
