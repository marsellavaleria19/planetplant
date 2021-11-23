<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PaymentTypeRequest;
use Illuminate\Support\Facades\DB;
use App\Models\PaymentType;

use Alert;

class PaymentTypeController extends Controller
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
        $paymentTypes = PaymentType::paginate(12);

        return view('pages.paymenttype.index')->with(['paymentTypes'=>$paymentTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.paymenttype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentTypeRequest $request)
    {
        $admin = Admin::getAdmin()->code."-".Admin::getAdmin()->name;

        PaymentType::create([
            'code' => $request->code,
            'type'=>$request->type,
            'note'=>$request->note,
            'createdby'=>$admin,
            'updatedby' => $admin
        ]);

        
        Alert::success('BERHASIL', 'Data Tipe Pembayaran Berhasil Ditambahkan!');
        
        return redirect()->route('paymenttypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paymentType = PaymentType::findOrFail($id);

        return view('pages.paymenttype.show')->with(['paymentType'=>$paymentType]);
    }

    public function search(Request $request)
	{
		$cari = $request->cari;
		$paymentTypes = PaymentType::where(DB::raw('concat(code,type)') , 'LIKE' , "%".$cari."%")->paginate(14);
		return view('pages.paymenttype.index',['paymentTypes' => $paymentTypes]);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymentType = PaymentType::findOrFail($id);

        return view('pages.paymenttype.edit')->with(['paymentType'=>$paymentType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentTypeRequest $request, $id)
    {
        
        $admin = Admin::getAdmin()->code."-".Admin::getAdmin()->name;
        PaymentType::where('id',$request->id)
            ->update([
                'deletedby' => $admin
        ]);
        PaymentType::destroy($request->id);
        Alert::success('BERHASIL', 'Data Tipe Pembayaran Berhasil Dihapus!');
        return response()->json(['success' => true]);
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
        PaymentType::where('id',$request->id)
            ->update([
                'deletedby' => $admin
        ]);
        PaymentType::destroy($request->id);
        Alert::success('BERHASIL', 'Data Tipe Pembayaran Berhasil Dihapus!');
        return response()->json(['success' => true]);
    }
}
