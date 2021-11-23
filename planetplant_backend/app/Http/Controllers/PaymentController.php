<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PaymentView;

use App\Models\ConfirmationPayment;

use App\Models\Transaction;


use Alert;

class PaymentController extends Controller
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
        $payments = PaymentView::paginate(12);

        return view('pages.payment.index')->with(['payments'=>$payments]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = PaymentView::findOrFail($id);

        return view('pages.payment.show')->with(['payment'=>$payment]);
    }

    public function search(Request $request)
	{
        
            $cari = $request->cari;
            $payments = PaymentView::where(DB::raw('concat(code,name,code_transaction,transfer_date,payment,payment_type,payment_status)') , 'LIKE' , "%".$cari."%")->paginate(14);
            return view('pages.payment.index',['payments' => $payments]);
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

    public function setStatus(Request $request,$id){
       
        $item = ConfirmationPayment::findOrFail($id);
        $item->payment_status = $request->status;
        $item->save();
        if($item->payment_status == 'DISETUJUI'){
            $transaction = Transaction::findOrFail($item->id_transaction);
            $transaction->payment_status = 'LUNAS';
        }
        else{
            $transaction = Transaction::findOrFail($item->id_transaction);
            $transaction->payment_status = 'DITOLAK';
        }
        $transaction->save();

        Alert::success('BERHASIL', 'Status Pembayaran Berhasil Diubah!');
        return redirect()->route('payments.index');
    }
}
