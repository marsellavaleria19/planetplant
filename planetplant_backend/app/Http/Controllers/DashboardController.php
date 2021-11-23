<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionView;


class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){
       
        $income = TransactionView::where('transaction_status','SELESAI')->sum('transaction_total');
        $sales =  TransactionView::count();
        $items = TransactionView::with('transaction_item')->orderBy('id','DESC')->take(5)->get();
        $pie=[
            'pending' => TransactionView::where('transaction_status','BELUM BAYAR')->count(),
            'confirm' => TransactionView::where('transaction_status','KONFIRMASI PEMBAYARAN')->count(),
            'delivered' => TransactionView::where('transaction_status','DIKIRIM')->count(),
            'failed' => TransactionView::where('transaction_status','BATAL')->count(),
            'success' =>  TransactionView::where('transaction_status','SELESAI')->count(),
        ];

        return view('pages.home')->with([
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie 
        ]);
    }
}
