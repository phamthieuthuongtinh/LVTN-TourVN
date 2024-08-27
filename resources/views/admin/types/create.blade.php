@extends('layouts.app')
@section('content')
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">Tạo Danh Mục</h3>
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
   <form method="POST" action="{{route('types.store')}}">
    @csrf
      <div class="card-body">
         <div class="form-group">
            <label for="exampleInputEmail1">Tên loại</label>
            <input type="text" class="form-control" name="type_name" id="exampleInputEmail1" placeholder="...">
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Mô tả</label>
            <input type="text" class="form-control" name="type_description" id="exampleInputPassword1" placeholder="...">
         </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
         <button type="submit" class="btn btn-primary">Tạo</button>
      </div>
   </form>
</div>
@endsection