@extends('layout')

@section('content')
<div class="container">
    <h2 class="my-4">Các tour bạn đã đặt</h2>
    @if($orderdetails->isEmpty())
        <p>Bạn chưa đặt tour nào.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên Tour</th>
                        <th>Thời gian</th>
                        <th>Địa điểm xuất phát</th>
                        <th>Số lượng</th>
                        <th>Tổng Giá</th>
                        <th>Phương thức</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderdetails as $order)
                        <tr>
                            <td><img style="width:100px; height:67px;" src="{{ asset('upload/tours/' . $order->tour->image) }}" alt=""></td>
                            <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                               <a href="{{route('chi-tiet-tour', ['slug' => $order->tour->slug])}}">{{ $order->tour->title }}</a> 
                            </td>
                            <td>{{ $order->departure_date }}</td>
                            <td>{{ $order->tour->tour_from }}</td>
                            <td style="max-width: 200px;">
                                @if( $order->nguoi_lon>0)
                                Người lớn: {{ $order->nguoi_lon }} x {{ number_format($order->tour->price)}}đ
                                @endif
                                @if( $order->tre_em>0)
                                <br>Trẻ em: {{ $order->tre_em }} x {{ number_format($order->tour->price_treem)}}đ
                                @endif
                                @if( $order->tre_nho>0)
                                <br>Trẻ nhỏ: {{ $order->tre_nho }} x {{ number_format($order->tour->price_trenho)}}đ
                                @endif
                                @if( $order->so_sinh>0)
                                <br>Sơ sinh: {{ $order->so_sinh }} x {{ number_format($order->tour->price_sosinh)}}đ
                                @endif
                            </td>
                            <td>{{ number_format($order->tour->price) }} đ</td>
                            <td style="max-width: 100px;">{{ $order->order->payment_method}}</td>
                            <td>
                                @if($order->order->order_status==2)
                                 Đã thanh toán
                                @else
                                 Chưa thanh toán
                                @endif
                                
                            </td>
                            <td>
                                @if($order->order->order_status==1)
                                <form method="POST" onsubmit="return confirm('Bạn có chắc muốn hủy tour này?');" action="{{route('orders.destroy',[$order->order->order_id])}}">
                                    @method('DELETE')
                                    @csrf
                                   <input type="submit" class="btn btn-danger" value="Hủy">
                                </form>
                               @else
                               <input type="submit" class="btn btn-default" value="Hủy" style="background-color: #d3d3d3; cursor: not-allowed;" disabled>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
