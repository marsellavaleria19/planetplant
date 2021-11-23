<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ReportProductOrder;

use App\Models\ReportSellingOrder;

class ReportController extends Controller
{
    public function show_report_product_order(Request $request){
        // abort_unless(\Gate::allows('city_access'), 401);
        
        $reportProductOrders = ReportProductOrder::all();

        return response()->json($reportProductOrders);
    }

    public function show_report_selling_order(Request $request){
        // abort_unless(\Gate::allows('city_access'), 401);
        
        $reportSellingOrders = ReportSellingOrder::all();

        return response()->json($reportSellingOrders);
    }
}
