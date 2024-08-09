@extends('layouts.app')
@section('content')
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">Tất Cả Các Đơn</h3>
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
                <table class="table table-striped table-valign-middle" id="myTable">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Mã đơn</th>
                    <th>Người đặt</th>
                    <th>Ngày đặt</th>
                    <th>Phương thức TT</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <style>
                    .deleted-tour {
                        background-color: #4d4d4d !important;    
                    }
                    .disabled-link {
                          color: gray;
                          pointer-events: none;
                          text-decoration: none;
                      }
                  </style>
                  <tbody>
                    @foreach($orders as $key => $ord)
                    <tr class="{{ $ord->order_status == 0 ? 'deleted-tour' : '' }}">
                        <td >{{$key}}</td>
                        <td>{{ $ord->order_code}}</td>
                        <td>{{ $ord->customer->customer_name}}</td>
                        <td>{{$ord->order_date}}</td>
                        <td>{{$ord->payment_method}}</td>
                        <td>
                          @if ($ord->order_status==1)
                              Chưa thanh toán
                          @else
                              Đã thanh toán
                          @endif
                          
                          
                        </td>
                        
                        <td>
                            @if($ord->order_status==1)
                            <a href="{{route('orders.show',[$ord->order_id])}}" class="btn btn-warning" > 
                              Cập nhật
                           </a>
                           <br>
                           <br>
                            <form method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa tour này?');" action="{{route('orders.destroy',[$ord->order_id])}}">
                                @method('DELETE')
                                @csrf
                               <input type="submit" class="btn btn-danger" value="Xóa">
                            </form>
                            @else
                            <a href="{{route('orders.show',[$ord->order_id])}}" class="btn btn-success" > 
                              Xem
                            @endif
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
</div>
@endsection