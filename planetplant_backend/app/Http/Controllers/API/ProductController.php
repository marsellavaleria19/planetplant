<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemView;
use App\Models\ItemNewView;
use App\Models\CountItemTypeView;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function newProduct(Request $request){
        
        $limit = $request->input('limit',6);
    
        $product = ItemNewView::all()->take(6);

        return ResponseFormatter::success(
            $product,
            'Data list produk berhasil diambil');
    }

    public function all(Request $request){
        
        $id = $request->input('id');
        $limit = $request->input('limit',10);
        $name = $request->input('name');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');
      
        $product = ItemView::paginate($limit);

        if($id){
            $product =ItemView::find($id);

            if($product)
                return ResponseFormatter::success($product,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada');
        }
 
        if($name)
            $product = ItemView::where('name','like','%',$name,'%')->paginate($limit);
        
        if($type)
            $product = ItemView::where('idType',$type)->paginate($limit);

        if($price_from)
            $product = ItemView::where('price','>=',$price_from)->paginate($limit);

        if($price_to)
            $product = ItemView::where('price','<=',$price_to)->paginate($limit);

        return ResponseFormatter::success(
            $product,
            'Data list produk berhasil diambil');

    }

    public function productSearch(Request $request){

        $cari = $request->cari;
     
        $dataSearch = ItemView::where(DB::raw('concat(code,name,price)') , 'LIKE' , "%".$cari."%")->paginate(10);
     
            return ResponseFormatter::success($dataSearch,'Data list produk berhasil diambil');
    }

    public function productTypeSearch(Request $request){

        $cari = $request->cari;
     
        $dataSearch = CountItemTypeView::where(DB::raw('concat(name)') , 'LIKE' , "%".$cari."%")->paginate(10);
     
            return ResponseFormatter::success($dataSearch,'Data list produk berhasil diambil');
    }

    public function showItemType()
    {
         $countItemType = CountItemTypeView::paginate(8);
        // $currentPage = $admins->currentPage();
        return ResponseFormatter::success(
            $countItemType,
            'Data list tipe produk berhasil diambil');
    }


}
