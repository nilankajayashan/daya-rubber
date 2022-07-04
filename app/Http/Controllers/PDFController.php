<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PDFController extends Controller
{
    public function downloadOrder(Request $request){
        $validator = Validator::make($request->all(), [
            'order_id' => 'required'
        ]);
        if ($validator->fails()){
            if ($validator->errors()->has('order_id')){
                return redirect()->back()->with(['notify_error' => 'Can not identify order']);
            }else{
                return redirect()->back()->with(['notify_error' => 'Something went wrong']);

            }
        }
        $validated = $validator->validated();
        $order = Order::where('order_id', '=', $validated['order_id'])->first();
        $pdf = PDF::loadView('pdf/order-download', ['order' => $order]);
        return $pdf->download('Order-'.$validated['order_id'].'.pdf');
    }
    public function downloadOrderTemp(Request $request){

        $order = Order::where('order_id', '=', 7)->first();
        return view('pdf/order-download', ['order' => $order]);
    }
}
