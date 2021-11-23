<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\DB;
use App\Models\ItemType;
use App\Models\Item;
use App\Models\ItemView;
use Alert;

class ItemController extends Controller
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
        $items = ItemView::paginate(14);
        // $currentPage = $admins->currentPage();
        return view('pages.item.index')->with(['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemTypes = ItemType::all();
        return view('pages.item.create')->with(['itemTypes'=>$itemTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
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
              $image_name= "no_picture.jpg";
              $path_image = "img_item/".$image_name;
            }

            Item::create([
                'code' => $request->code,
                'name'=>$request->name,
                'qty' => $request->qty,
                'photo' => $path_image,
                'price' => $request->price,
                'discount' => $request->discount,
                'description' => $request->description,
                'id_type' => $request->id_type,
                'createdby' => $admin,
                'updatedby' => $admin
            ]);

            Alert::success('BERHASIL', 'Data Barang Berhasil Ditambahkan!');
            return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = ItemView::findOrFail($id);

        return view('pages.item.show')->with(['item'=>$item]);
    }

    public function search(Request $request)
	{
		$cari = $request->cari;
		$items = ItemView::where(DB::raw('concat(code,name,tipeItem,price,discount,totalprice,qty)') , 'LIKE' , "%".$cari."%")->paginate(14);
		return view('pages.item.index',['items' => $items]);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);

        $itemTypes = ItemType::all();

        return view('pages.item.edit')->with(['item'=>$item,'itemTypes'=>$itemTypes]);
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
        validator($request->all(),[
            'code' => 'required|unique:items,code,' . $id,
            'name'=>'required',
            'price' => 'required',
            'discount' => 'required',
            'qty' => 'required'
        ])->validate();

        $admin = Admin::getAdmin()->code."-".Admin::getAdmin()->name;
        $image_name=null;
        
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');       
            $image_name = $request->code.".".$image->getClientOriginalExtension();
            $image->storeAs('public/img_item', $image_name);
            $path_image = "img_item/".$image_name;

            Item::where('id',$id)
            ->update([
                'code' => $request->code,
                'name'=>$request->name,
                'price' => $request->price,
                'qty' => $request->qty,
                'photo' => $path_image,
                'discount' => $request->discount,
                'description' => $request->description,
                'id_type' => $request->id_type,
                'updatedby' => $admin
            ]);
        }
        else{
            Item::where('id',$id)
            ->update([
                'code' => $request->code,
                'name'=>$request->name,
                'price' => $request->price,
                'qty' => $request->qty,
                'discount' => $request->discount,
                'description' => $request->description,
                'id_type' => $request->id_type,
                'updatedby' => $admin
            ]);
        }
       
       
    
        Alert::success('BERHASIL', 'Data Barang Berhasil Diubah!');
        return redirect()->route('items.index');
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

        Item::where('id',$request->id)
            ->update([
                'deletedby' => $admin
        ]);

        Item::destroy($request->id);

        Alert::success('BERHASIL', 'Data Barang Berhasil Dihapus!');
        return response()->json(['success' => true]);
    }
}
