@extends('layouts.app')
@section('content')
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">Chi Tiết Đơn</h3>
   </div>
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
   <!-- /.card-header -->
   <!-- form start -->
   <div class="card">
              <div class="card-header border-0">
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <h2 style="text-align: center; color:blue;" >Thông Tin Khách Hàng</h2>
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr class="">
                        <td>{{ $customer->customer_name}}</td>
                        <td>{{ $customer->email}}</td>
                        <td>{{$customer->phone}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <br>
              <br>
              <br>
              <div class="card-body table-responsive p-0">
                <h2 style="text-align: center; color:blue;" >Thông Tin Đơn</h2>
                <table class="table table-striped table-valign-middle" >
                  <thead>
                  <tr>
                    <th>Mã đơn</th>
                    <th>Mã tour</th>
                    <th>Ngày khởi hành</th>
                    <th>Voucher</th>
                    <th>Số người</th>
                    <th>Ghi chú</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <tr class="">
                        
                        <td>{{ $orderdetails->order_code}}</td>
                        <td>{{ $tour->tour_code}}</td>
                        <td>{{ $orderdetails->departure_date}}</td>
                        <td>{{$orderdetails->voucher}}</td>
                        <td>Người lớn: {{$orderdetails->nguoi_lon}} x  {{number_format($orderdetails->tour->price)}}đ<br>
                            Trẻ em: {{$orderdetails->tre_em}} x {{number_format($orderdetails->tour->price_treem)}}đ<br>
                            Trẻ nhỏ: {{$orderdetails->tre_nho}} x {{number_format($orderdetails->tour->price_trenho)}}đ<br>
                            Sơ sinh: {{$orderdetails->so_sinh}} x {{number_format($orderdetails->tour->price_sosinh)}}đ
                        </td>
                        <td>{{$orderdetails->note}}</td>
                        
                        
                    </tr>
                    <tr style="text-align: end">
                        
                        <td  colspan="5">Tổng phí: 
                            @php
                            $total=($orderdetails->tour->price * $orderdetails->nguoi_lon) + ($orderdetails->tour->price_treem * $orderdetails->tre_em) + ($orderdetails->tour->price_trenho * $orderdetails->tre_nho) + ($orderdetails->tour->price_sosinh * $orderdetails->so_sinh);
                            echo(number_format($total));
                            @endphp
                            đ
                            <br>
                            @if ($voucher!='no')
                              @if ($voucher->voucher_condition==0)
                                
                                @php
                                    $reduce=($total*$voucher->voucher_number/100);
                                    $total=$total-$reduce;
                                @endphp
                                <p>Voucher: -  @php
                                          echo(number_format($reduce)); 
                                      @endphp
                                đ </p>
                              @else
                                @php
                                  $total=$total-$voucher->voucher_number;
                                @endphp
                                <p>Voucher: -   @php
                                  echo(number_format($voucher->voucher_number)); 
                              @endphp
                        đ </p>
                              @endif
                            @else
                            <p>- 0 đ (Voucher)</p>
                            @endif
                            
                            <hr>
                            Tổng giá trị: 
                            @php
                               echo(number_format($total)); 
                            @endphp
                            đ
                        </td>
                    </tr>
                  </tbody>
                </table>
                
              </div>
            </div>
</div>
@endsection