@extends('layouts.app')
@section('content')
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">Tất Cả Comment Chưa Duyệt</h3>
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
                    <th>Tour</th>
                    <th>Người đánh giá</th>
                   
                    <th>Nội dung</th>
                    <th>Ngày đánh giá</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <style>
                    .deleted-com {
                        background-color: #4d4d4d !important;    
                    }
                   
                  </style>
                  <tbody>
                    @foreach($comments as $key => $com)
                    <tr  class="{{ $com->status == 2 ? 'deleted-com' : '' }}">
                        <td>{{$key}}</td>
                        <td>{{$com->tour->title}}</td>
                        <td>{{$com->comment_name}}</td>
                    
                        <td>{{$com->comment_content}}</td>
                        <td>{{$com->created_at}}</td>
                        <td>
                            @if($com->status==0)
                                <form method="POST" onsubmit="return confirm('Bạn có chắc muốn duyệt?');" action="{{route('comment.update',[$com->comment_id])}}">
                                    @method('PATCH')
                                    @csrf
                                <input type="submit" class="btn btn-success" value="Duyệt">
                                </form>
                                <br>
                                <form method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');" action="{{route('comment.destroy',[$com->comment_id])}}">
                                    @method('DELETE')
                                    @csrf
                                <input type="submit" class="btn btn-danger" value="Xóa">
                                </form>
                            @elseif($com->status==1)
                                <form method="POST" onsubmit="return confirm('Bạn có chắc muốn bỏ duyệt?');" action="{{route('comment.update',[$com->comment_id])}}">
                                    @method('PATCH')
                                    @csrf
                                <input type="submit" class="btn btn-success" value="Bỏ duyệt">
                                </form>
                                <br>
                                <form method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');" action="{{route('comment.destroy',[$com->comment_id])}}">
                                    @method('DELETE')
                                    @csrf
                                <input type="submit" class="btn btn-danger" value="Xóa">
                                </form>
                            @else
                                <form method="POST" onsubmit="return confirm('Bạn có chắc muốn khôi phục?');" action="{{route('comment.destroy',[$com->comment_id])}}">
                                    @method('DELETE')
                                    @csrf
                                <input type="submit" class="btn btn-warning" value="Khôi phục">
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