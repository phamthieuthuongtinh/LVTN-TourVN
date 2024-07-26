@extends('layout')
@section('content')
<div class="container-xxl  destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="bg-white text-center text-primary px-3">Đăng ký hoặc đăng nhập</h1>
        </div>
        <div class="row g-5 mt-3 justify-content-center">
            <div class="col-lg-5">
                <div>
                    <form action="{{route('customers.store')}}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                                <h5 class="section-title bg-white text-center text-primary px-3">Đăng ký</h5>
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
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Tên">
                                    <label for="name">Tên</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại">
                                    <label for="phone">Số điện thoại</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Mật khẩu">
                                    <label for="password1">Mật khẩu</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Nhập lại mật khẩu">
                                    <label for="password2">Nhập lại mật khẩu</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Đăng ký</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-2 align-items-center d-flex justify-content-center pd-5" style="background-color:#86B817; border-radius: 50%; width: 180px; height: 180px; margin-top: 100px;">
                <h2>HOẶC</h2>
            </div>
            <div class="col-lg-5">
                <div>
                    <form action="{{route('customers.login')}}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                                <h5 class="section-title bg-white text-center text-primary px-3">Đăng nhập</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                                    <label for="password">Mật khẩu</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
