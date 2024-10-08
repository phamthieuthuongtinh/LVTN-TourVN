@extends('layout')
@section('content')
    <div class="container-xxl py-3 ">
        @if (Session::get('customer_id'))
            <div class="row">
                <div class="col-md-12 col-xs-12 bx-title-lst-tour text-center">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="section-title bg-white text-center text-primary px-3">Phù hợp với bạn</h6>
                        <h1 class="mb-5">Các Tour Gợi Ý</h1>
                    </div>
                    <div class="owl-carousel owl-theme">
                        @foreach ($recommends as $key => $recom)
                            <div style="padding: 10px" class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img style="width:456px !important; height:280px;" class="img-fluid"
                                            src="{{ asset('upload/tours/' . $recom->image) }}" alt="">
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{ $recom->category->title }}</small>
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-calendar-alt text-primary me-2"></i>{{ $recom->tour_time }}</small>
                                        <small class="flex-fill text-center py-2"><i
                                                class="fa fa-users text-primary me-2"></i>{{ $recom->quantity }}</small>
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-plane text-primary me-2"></i>Địa điểm xuất phát:
                                            {{ $recom->tour_from }}</small>
                                    </div>
                                    <div class="text-center p-4">
                                        <h3 class="mb-0">{{ number_format($recom->price) }} đ</h3>
                                        <div class="mb-3">
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                        </div>
                                        <p>{{ $recom->title }}</p>
                                        @php
                                            if (Session::get('customer_id')) {
                                                $isLiked = $likes->contains('tour_id', $recom->id);
                                            }
                                        @endphp
                                        <div class="d-flex justify-content-center mb-2">
                                            <a href="{{ route('chi-tiet-tour', ['slug' => $recom->slug]) }}"
                                                class="btn btn-sm btn-primary px-3 border-end"
                                                style="border-radius: 30px;">Chi tiết</a>
                                            <form action="{{ route('tour.like') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="customer_id" class="customer_id"
                                                    value="{{ Session::get('customer_id') }}" id="customer_id">
                                                @if (Session::get('customer_id'))
                                                    <button class="favorite-button btn btn-sm ms-2"
                                                        data-tour-id="{{ $recom->id }}">
                                                        <i style="font-size: 18px; color: {{ $isLiked ? 'red' : 'black' }};"
                                                            class="fa fa-heart"></i>
                                                    </button>
                                                @else
                                                    <button class="favorite-button btn btn-sm ms-2"
                                                        data-tour-id="{{ $recom->id }}">
                                                        <i style="font-size: 18px" class="fa fa-heart"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Destination Start -->
    <div class="container-xxl py-0 destination">
        <div class="container">



            <!-- Thêm các tour khác tương tự -->


            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Điểm Đến Phổ Biến</h6>
                <h1 class="mb-5">Các Điểm Đến Phổ Biến</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('frontend/img/destination-1.jpg') }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">Giảm
                                    30%</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                    Thailand</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('frontend/img/destination-2.jpg') }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">Giảm
                                    25%</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                    Malaysia</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('frontend/img/destination-3.jpg') }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">Giảm
                                    35%</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                    Australia</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100"
                            src="{{ asset('frontend/img/destination-4.jpg') }}" alt="" style="object-fit: cover;">
                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">Giảm 20%
                        </div>
                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Indonesia
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Destination Start -->

    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Gói Tour</h6>
                <h1 class="mb-5">Các Gói Tour Nổi Bật</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('frontend/img/package-1.jpg') }}" alt="">
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-map-marker-alt text-primary me-2"></i>Thái Lan</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-calendar-alt text-primary me-2"></i>3 ngày</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>2
                                người</small>
                        </div>
                        <div class="text-center p-4">
                            <h3 class="mb-0">3.000.000 VNĐ</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <p><u>Du lịch Thái Lan</u></p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="#" class="btn btn-sm btn-primary px-3 border-end"
                                    style="border-radius: 30px 0 0 30px;">Chi tiết</a>
                                <a href="#" class="btn btn-sm btn-primary px-3"
                                    style="border-radius: 0 30px 30px 0;">Đặt ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('frontend/img/package-2.jpg') }}" alt="">
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-map-marker-alt text-primary me-2"></i>Indonesia</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-calendar-alt text-primary me-2"></i>3 ngày</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>2
                                người</small>
                        </div>
                        <div class="text-center p-4">
                            <h3 class="mb-0">3.000.000 VNĐ</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <p>Du lịch Indonesia</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="#" class="btn btn-sm btn-primary px-3 border-end"
                                    style="border-radius: 30px 0 0 30px;">Chi tiết</a>
                                <a href="#" class="btn btn-sm btn-primary px-3"
                                    style="border-radius: 0 30px 30px 0;">Đặt ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('frontend/img/package-3.jpg') }}" alt="">
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-map-marker-alt text-primary me-2"></i>Malaysia</small>
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-calendar-alt text-primary me-2"></i>3 ngày</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>2
                                người</small>
                        </div>
                        <div class="text-center p-4">
                            <h3 class="mb-0">3.500.000 VNĐ</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <p>Du lịch Malaisia</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="#" class="btn btn-sm btn-primary px-3 border-end"
                                    style="border-radius: 30px 0 0 30px;">Chi tiết</a>
                                <a href="#" class="btn btn-sm btn-primary px-3"
                                    style="border-radius: 0 30px 30px 0;">Đặt ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Package End -->

    <!-- Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Đặt Tour</h6>
                <h1 class="mb-5">Đặt Tour Chỉ Với 3 Bước </h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px;">
                            <i class="fa fa-map-marker fa-3x text-white"></i>

                        </div>
                        <h5 class="mt-4">Chọn điểm đến</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Chọn điểm đến hoặc tour bạn muốn</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px;">
                            <i class="fa fa-dollar-sign fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Thanh toán</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Thanh toán hóa đơn đặt tour</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px;">
                            <i class="fa fa-plane fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Khởi hành</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Tận hưởng kỳ nghỉ của bạn tại điểm đến</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process Start -->
    <style>
        .owl-item .col-lg-4,
        .owl-item .col-md-6 {
            width: 100%;
            /* Chiếm toàn bộ chiều rộng của item */
            max-width: 100%;
            /* Đảm bảo không vượt quá chiều rộng */
            flex: none;
            /* Ngăn việc các phần tử này tự động điều chỉnh kích thước */
        }

        .owl-item .package-item {
            width: 100%;
            /* Chiếm toàn bộ chiều rộng */
        }

        .package-item .text-center p {
            height: 60px;
            /* Điều chỉnh chiều cao này tùy theo yêu cầu */
            overflow: hidden;
            font-size: 15px;
        }

        .owl-prev,
        .owl-next {
            background-color: #86B817 !important;
            /* Áp dụng màu nền */
            color: white !important;
            /* Màu của biểu tượng mũi tên */
            padding: 7px !important;
            /* Thêm khoảng cách bên trong nút */
        }

        .owl-prev i,
        .owl-next i {
            font-size: 20px;
            /* Điều chỉnh kích thước mũi tên */
        }
    </style>
@endsection
