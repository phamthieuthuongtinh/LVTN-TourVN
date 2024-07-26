<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Orderdetail;
use App\Models\Voucher;
use App\Models\Tour;
use Carbon\Carbon;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::with('customer')->Orderby('order_id','DESC')->get();   
        return view('admin.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $voucher= 'no';
        $order=Order::where('order_id',$id)->first();
        $orderdetails=Orderdetail::where('order_code',$order->order_code)->with('tour')->first();
        $tour=Tour::where('id',$orderdetails->tour_id)->first();
        if($orderdetails->voucher){
            $voucher=Voucher::where('voucher_code',$orderdetails->voucher)->first();
        }
        $customer=Customer::where('customer_id',$order->customer_id)->first();
        return view('admin.orders.show', compact('orderdetails','order','customer','voucher','tour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function confirm_order(Request $request)
    {
        $customer_id = Session::get('customer_id');
        // $customer = Customer::where('customer_id', $customer_id)->get();
        $data = $request->all();
        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
        

        $order = new Order;
        $order->customer_id = Session::get('customer_id');
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $order->order_date = $order_date;
        $order->save();

         


        $order_details = new Orderdetail();
        
        $order_details->order_code = $checkout_code;
        $order_details->note = $data['note'];
        $order_details->tour_id = $data['tour_id'];
        $order_details->voucher = $data['voucher'];
        $order_details->nguoi_lon = $data['nguoi_lon'];
        $order_details->tre_em = $data['tre_em'];
        $order_details->tre_nho = $data['tre_nho'];
        $order_details->so_sinh = $data['so_sinh'];
        $order_details->departure_date=$data['departure_date'];
        $order_details->save();

        Session::forget('voucher');
    }
}
