<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

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
    public function infor(){
      
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
