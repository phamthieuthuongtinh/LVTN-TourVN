@extends('layouts.app')
@section('content')
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">Tất Cả Tour</h3>
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
                    <th>Thư viện</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                  
                    <th>Mô tả</th>
                    <th>Phương tiện</th>
                    <th>Hình ảnh</th>
                    <th>Số ngày</th>
                    <th>Số đêm</th>
                    <th>Nơi đi</th>
                    <th>Nơi đến</th>
                    <th>Mã tour</th>
                    <th>Slug</th>
                    <th>Ngày tạo</th>
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
                    @foreach($tours as $key => $tour)
                    <tr class="{{ $tour->status == 0 ? 'deleted-tour' : '' }}">
                        <td >{{$key}}</td>
                        <td>
                          @if($tour->status == 0)
                              <span class="disabled-link">Thêm ảnh</span>
                          @else
                              <a href="{{route('galleries.edit',[$tour->id])}}">Thêm ảnh</a>
                          @endif
                        </td>
                        <td>{{ substr($tour->title, 0, 20) }}...</td>
                        <td>{{ $tour->category->title}}</td>
                        <td>
                          <p style="color: blue; padding:0px; margin: 0px;">>11 tuổi:</p>
                          {{number_format($tour->price)}}đ
                          <p style="color: blue; padding:0px; margin: 0px;">5-11 tuổi:</p>
                          {{number_format($tour->price_treem)}}đ
                          <p style="color: blue; padding:0px; margin: 0px;">2-5 tuổi:</p>
                          {{number_format($tour->price_trenho)}}đ
                          <p style="color: blue; padding:0px; margin: 0px;"><2 tuổi:</p>
                          {{number_format($tour->price_sosinh)}}đ
                        </td>
                        
                        <td>{{ substr($tour->description, 0, 20) }}...</td>
                        <td>{{$tour->vehicle}}</td>
                        <td><img src="{{asset('upload/tours/'.$tour->image)}}" alt="" width=150 height=120></td>
                        <td>{{$tour->so_ngay}}</td>
                        <td>{{$tour->so_dem}}</td>
                        <td>{{$tour->tour_from}}</td>
                        <td>{{$tour->tour_to}}</td>
                        <td>{{$tour->tour_code}}</td>
                        <td>{{ substr($tour->slug, 0, 20) }}...</td>
                      
                        <td>{{$tour->created_at}}</td>
                        <td>
                            
                            @if($tour->status==1)
                            <a href="{{route('tours.edit',[$tour->id])}}" class="btn btn-warning" > 
                              Sửa
                           </a>
                           <br>
                           <br>
                            <form method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa tour này?');" action="{{route('tours.destroy',[$tour->id])}}">
                                @method('DELETE')
                                @csrf
                               <input type="submit" class="btn btn-danger" value="Xóa">
                            </form>
                            @else
                            <form method="POST" onsubmit="return confirm('Bạn có chắc khôi phục tour này?');" action="{{route('tours.destroy',[$tour->id])}}">
                              @method('DELETE')
                              @csrf
                             <input type="submit" class="btn btn-success" value="Khôi phục">
                          </form>
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