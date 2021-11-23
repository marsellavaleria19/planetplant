<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionView;
use App\Models\TransactionDetailView;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = TransactionView::where('transaction_status','BELUM BAYAR')->get();

        return ResponseFormatter::success(
            $transaction,
            'Data list transaksi berhasil diambil');
    }

    public function getTransactionByIdCustomer($id){

        $data = TransactionView::with("transaction_item")->where('id_customer',$id)->paginate(13);
        
        return ResponseFormatter::success($data,'Data berhasil diambil!');
    }

    public function getTransactionSearch(Request $request,$id){
        
        $cari = $request->cari;
        $data = TransactionView::with("transaction_item")->where('id_customer',$id)
                ->where(DB::raw('concat(code,transaction_date,SenderName,transaction_status,transaction_total)') , 'LIKE' , "%".$cari."%")->paginate(13);
        
        return ResponseFormatter::success($data,'Data berhasil diambil!');
    }

    public function setStatus(Request $request,$id){
       
        $item = Transaction::findOrFail($request->idTransaction);
        $item->transaction_status = $request->status;
        $item->save();
        $data = TransactionView::with("transaction_item")->where('id_customer',$id)->paginate(13);
        return ResponseFormatter::success($data,'Data berhasil diambil!');
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
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
