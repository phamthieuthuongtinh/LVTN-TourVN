<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Like;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        
        $email = $request->email;
        $password =$request->password;
        $customer = Customer::where('email', $email)->first();



        if ($customer && Hash::check($password, $customer->password)) {
            Session::put('customer_id', $customer->customer_id);
            Session::put('customer_name', $customer->customer_name);
            Session::put('customer_phone', $customer->phone);
            Session::put('customer_email', $customer->email);
            toastr()->success('Đăng nhập thành công!',['positionClass' => 'toast-bottom-right']);
            return redirect()->route('homeweb');
        } else {
            toastr()->error('Tài khoản hoặc mật khẩu không chính xác!',['positionClass' => 'toast-bottom-right']);
            return redirect()->back();
        }
    }
    public function logout(){
        Session::invalidate(); 
        return redirect()->route('homeweb'); // Chuyển hướng về trang chủ
    }
    public function infor(string $id){
        $customer=Customer::where('customer_id',$id)->first();
        return view('admin.customers.infor_customer',compact('customer'));
    }
    public function ordered(string $id){
        $ordereds=Order::where('customer_id',$id)->where('order_status','!=',0)->get();
        $order_codes = $ordereds->pluck('order_code')->toArray();
        $orderdetails = OrderDetail::whereIn('order_code', $order_codes)->with('tour')->with('order')->get();
        return view('admin.customers.ordered_customer',compact('ordereds','orderdetails'));
    }

    public function liked(string $id){
        $likes=Like::where('customer_id',$id)->with('tour')->get();
        return view('admin.customers.liked_customer',compact('likes'));
    }
    public function index()
    {
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
        try {
            // Validate input data
            $data = $request->validate([
                'email' => 'required|unique:customers|max:255',
                'name' => 'required',
                'phone' => 'required|max:220',
              
                'password1' => 'required',
                'password2' => 'required|same:password1',
            ], [
                'email.required' => 'Bạn chưa nhập Email',
                'email.unique' => 'Email này đã được sử dụng',
                'name.required' => 'Bạn chưa nhập tên',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'password1.required' => 'Bạn chưa nhập mật khẩu',
                'password2.required' => 'Bạn chưa nhập lại mật khẩu',
                'password2.same' => 'Mật khẩu nhập lại không khớp',
            ]);

            // Create new Customer instance
            $customer = new Customer();
            $customer->email = $data['email'];
            $customer->phone = $data['phone'];
            $customer->age = $request->input('age', null);
            $customer->job = $request->input('job', null);
            $customer->hobby = $request->input('hobby', null);
            $customer->status = 1;
            $customer->customer_name = $data['name'];
            $customer->password = Hash::make($data['password1']);

            // Save customer to database
            $customer->save();

            // Success message
            toastr()->success('Đăng ký tài khoản thành công!',['positionClass' => 'toast-bottom-right']);
            return redirect()->back();

        } catch (ValidationException $e) {
            toastr()->error('Đăng ký không thành công! Vui lòng kiểm tra lại thông tin đăng ký.',['positionClass' => 'toast-bottom-right']);
            return redirect()->back()->withErrors($e->errors())->withInput();
            
        } catch (\Exception $e) {
            toastr()->error('Đăng ký tài khoản không thành công!',['positionClass' => 'toast-bottom-right']);
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
       
    }

    
}
