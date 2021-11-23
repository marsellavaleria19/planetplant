<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Item;
use App\Http\Requests\API\CheckoutRequest;


class CheckoutController extends Controller
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
     *()
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {     
        $jumlahTransaction = Transaction::count();
        $code = "T0000".($jumlahTransaction+1);
      
        $transaction = Transaction::create([
            'code' => $code,
            'id_customer'=>$request->id_customer,
            'transaction_date' => date('Y-m-d H:i:s'),
            'id_receiver' => $request ->id_receiver,
            'id_billing' => $request->id_billing,
            'tax_percent' =>$request->tax_percent,
            'tax_price'=>$request->tax_price,
            'shipping_name' => $request->shipping_name,
            'shipping_type'=>$request->shipping_type,
            'shipping_price' => $request ->shipping_price,
            'transaction_total' => $request->transaction_total,
            'transaction_status' => $request->transaction_status
        ]);

        foreach($request->transaction_items as $product)
        {
            
            $details[] = new TransactionItem([
                'id_transaction' => $transaction->id,
                'id_item' => $product['id_item'],
                'qty' => $product['qty'],
                'price' => $product['price'],
                'discount' => $product['discount'],
                'totalprice' => $product['totalprice'],
                'total' => $product['total']
            ]);

            Item::find($product['id_item'])->decrement('qty');
        }

        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction,'Data berhasil ditambah!');
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
