@extends('layouts.app')
@section('content')
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">Chỉnh sửa Tour</h3>
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
   <form method="POST" action="{{route('tours.update',[$tour->id])}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
      <div class="card-body">
         <div class="form-group">
            <label for="exampleInputEmail1">Danh mục tour</label>
            <select class="form-control" name="category_id" id="">
               @foreach ( $categories as $key => $category )
                  <option {{$category->id==$tour->category_id ?'selected':''}} value="{{$category->id}}">{{$category->title}}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề tour</label>
            <input type="text" value="{{$tour->title}}" class="form-control" name="title" id="exampleInputEmail1" placeholder="...">
         </div>
         {{-- <div class="form-group">
            <label for="exampleInputPassword1">Số lượng tour</label>
            <input type="text" class="form-control" value="{{$tour->quantity}}" name="quantity" id="exampleInputPassword1" placeholder="...">
         </div> --}}
         <div class="form-group">
            <label for="exampleInputPassword1">Mô tả tour</label>
            <input type="text" class="form-control" value="{{$tour->description}}" name="description" id="exampleInputPassword1" placeholder="...">
         </div>
         <div class="form-group">
         <div class="form-group">
            <label for="exampleInputPassword1">Nơi xuất phát</label>
            <input type="text" class="form-control" value="{{$tour->tour_from}}" name="tour_from" id="exampleInputPassword1" placeholder="...">
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Nơi đến</label>
            <input type="text" class="form-control" value="{{$tour->tour_to}}" name="tour_to" id="exampleInputPassword1" placeholder="...">
         </div>
         <div class="form-group">
            <label for="adultPrice">Giá người lớn</label>
            <input type="text" value="{{$tour->price}}" class="form-control" name="price" id="adultPrice" placeholder="...">
         </div>
         <div class="form-group">
            <label for="childPrice">Giá trẻ em (5-11 tuổi)</label>
            <input type="text" value="{{$tour->price_treem}}" class="form-control" name="price_treem" id="childPrice" placeholder="...">
         </div>
         <div class="form-group">
            <label for="toddlerPrice">Giá trẻ nhỏ (2-5 tuổi)</label>
            <input type="text" value="{{$tour->price_trenho}}" class="form-control" name="price_trenho" id="toddlerPrice" placeholder="...">
         </div>
         <div class="form-group">
            <label for="infantPrice">Giá sơ sinh (<2 tuổi)</label>
            <input type="text" value="{{$tour->price_sosinh}}" class="form-control" name="price_sosinh" id="infantPrice" placeholder="...">
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Phương tiện</label>
            <input type="text" class="form-control" value="{{$tour->vehicle}}" name="vehicle" id="exampleInputPassword1" placeholder="...">
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Số ngày</label>
            <input type="number" class="form-control" value="{{$tour->so_ngay}}" name="so_ngay" id="so_ngay" placeholder="...">
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Số đêm</label>
            <input type="number" class="form-control" value="{{$tour->so_dem}}" name="so_dem" id="so_dem" placeholder="...">
         </div>
         {{-- <div class="form-group">
            <label for="exampleInputPassword1">Tổng thời gian đi</label>
            <input type="text" class="form-control" value="{{$tour->tour_time}}" name="tour_time" id="tour_time" placeholder="...">
         </div> --}}
        
         
         <div class="form-group">
            <label for="exampleInputFile">Hình ảnh</label>
            <div class="input-group">
               <div class="custom-file">
                  <input type="file" name="image" class="form-control-file" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
               </div>
               <img width='120' height='120' src="{{asset('upload/tours/'.$tour->image)}}" alt="">
            </div>
         </div>
         <div class="form-check">
            <input type="checkbox" value="1" {{$tour->status==1? 'checked' :'' }} name="status" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Hiển thị</label>
         </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
         <button type="submit" class="btn btn-primary">Cập nhật</button>
      </div>
   </form>
</div>
@endsection