<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receiver;
use App\Http\Requests\API\ReceiverRequest;
use Illuminate\Support\Facades\DB;

class ReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiverRequest $request)
    {
        $data = $request->all();

        $receiver = Receiver::create($data);

        $dataReceiver = Receiver::find($receiver->id);

        return ResponseFormatter::success($dataReceiver,'Data berhasil ditambah!');

    }

    public function getAllReceiverByIdCustomerPaginate($id){

        $data = Receiver::where('id_customer',$id)->paginate(10);

        return ResponseFormatter::success($data,'Data berhasil diambil!');
    }

    public function getAllReceiverByIdCustomer($id){

        $data = Receiver::where('id_customer',$id)->get();

        return ResponseFormatter::success($data,'Data berhasil diambil!');
    }

    public function getTransactionSearch(Request $request,$id){
        
        $cari = $request->cari;
        $data = Receiver::where('id_customer',$id)
                ->where(DB::raw('concat(title,name)') , 'LIKE' , "%".$cari."%")->paginate(10);
        
        return ResponseFormatter::success($data,'Data berhasil diambil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Receiver::find($id);

        return ResponseFormatter::success($data,'Data berhasil diambil!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiverRequest $request,$id)
    {
        $data = $request->all();

        $dataReceiver = Receiver::where('id',$id)
        ->update([
            'name' => $request->name,
            'address' => $request->address,
            'id_city' => $request->id_city,
            'type_city' =>$request->type_city,
            'city'=>$request->city,
            'id_province' => $request->id_province,
            'province' => $request->province,
            'postalcode' => $request->postalcode,
            'phone_number' => $request->phone_number,
            'id_customer' => $request->id_customer,
            'title' => $request->title
        ]);

        $dataReceiver = Receiver::find($id);

        return ResponseFormatter::success($dataReceiver,'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Receiver::findOrFail($id);
        $item->delete();

        return ResponseFormatter::success(null,'Data berhasil dihspus!');
    }
}
