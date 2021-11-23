<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentType;
use App\Models\ConfirmationPayment;
use App\Models\Transaction;


class ConfirmationPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_transaction)
    {
        $confirmationPayment = ConfirmationPayment::where("id_transaction",$id_transaction)->get();

        return ResponseFormatter::success($confirmationPayment,
            'Data list konfirmasi pembayaran berhasil diambil');
    }

    public function getAllPaymentType(){
       
        $paymentType = PaymentType::all();

        return ResponseFormatter::success(
            $paymentType,
            'Data list tipe pembayaran berhasil diambil');
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

        if($request->payment==0){
            validator($request->all(),[
                'name' =>'required',
                'id_transaction'=> 'required',
                'transfer_date' => 'required',
                'slip_transfer' => 'required | max : 2000',
                'payment' => 'required|gt:0',
                'id_payment_type' => 'required'],
                ['name.required' => 'nama harus diisi.',
                'id_transaction.required'=>'kode invoice harus diisi.',
                'transfer_date.required'=>'tanggal pembayaran harus diisi.',
                'slip_transfer.required'=>'bukti pembayaran harus diupload',
                'slip_transfer.max'=>'file bukti pembayaran maksimal 2MB',
                'payment.required'=>'jumlah yang dibayar harus diisi.',
                'payment.gt'=>'jumlah yang dibayar harus lebih besar dari 0',
                'id_payment_type.required'=>'tipe pembayaran harus diisi.'
            ])->validate();
        }
        else{
            validator($request->all(),[
                'name' =>'required',
                'id_transaction'=> 'required',
                'transfer_date' => 'required',
                'slip_transfer' => 'required | max : 2000',
                'payment' => 'required|same:transaction_total',
                'id_payment_type' => 'required'],
                ['name.required' => 'nama harus diisi.',
                'id_transaction.required'=>'kode invoice harus diisi.',
                'transfer_date.required'=>'tanggal pembayaran harus diisi.',
                'slip_transfer.required'=>'bukti pembayaran harus diupload',
                'slip_transfer.max'=>'file bukti pembayaran maksimal 2MB',
                'payment.required'=>'jumlah yang dibayar harus diisi.',
                'payment.same'=>'jumlah yang dibayar harus '.$request->transaction_total,
                'id_payment_type.required'=>'tipe pembayaran harus diisi.'
                ])->validate();
        }
      
        $path_image = null;
        $jumlahConfirmationPayment = ConfirmationPayment::count();
        $code = "CP0000".($jumlahConfirmationPayment+1);

        if ($request->hasFile('slip_transfer')) {
            $image = $request->file('slip_transfer');       
            $image_name = $code.".".$image->getClientOriginalExtension();
            $image->storeAs('public/img_payment', $image_name);
            $path_image = "img_payment/".$image_name;
        }

        $confirmationPayment  = ConfirmationPayment::create([
            'code' => $code,
            'name' => $request->name,
            'id_transaction'=>$request->id_transaction,
            'transfer_date' => $request->transfer_date,
            'slip_transfer' => $path_image,
            'payment' => $request->payment,
            'id_payment_type' => $request->id_payment_type,
            'payment_status' =>'PENDING',
            'notes'=>$request->notes
        ]);

        Transaction::where('id',$confirmationPayment->id_transaction)
            ->update([
               'transaction_status' => 'KONFIRMASI PEMBAYARAN',
               'payment_status' => 'PENDING'
            ]);
        
        return ResponseFormatter::success( $confirmationPayment,
            'Data list konfirmasi pembayaran berhasil ditambah');
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
