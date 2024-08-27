@extends('layout')
@section('content')
    <div class="container box-list-tour">
        <div class="row">
            <div class="col-md-3 col-xs-9">
                <h4 class="mb-3">Bộ Lọc Tìm Kiếm</h4>
                <div class="filter-box bg-white p-3 shadow-lg rounded" style="border-radius:10px !important;">

                    <form id="filterForm" method="GET" action="">
                        <input type="hidden" class="category_id" name="category_id" id="" value="13">
                        <div class="form-group mb-3">
                            <label for="price">Ngân sách</label>
                            <select class="form-select tour_price_form" id="price" name="price">
                                <option value="">Tất cả</option>
                                <option value="under5">Dưới 5 triệu</option>
                                <option value="5to10">Từ 5 - 10 triệu</option>
                                <option value="10to20">Từ 10 - 20 triệu</option>
                                <option value="over20">Trên 20 triệu</option>
                            </select>
                        </div>
                
                        <!-- Loại tour -->
                        <div class="form-group mb-3">
                            <label for="tour_type">Loại tour</label>
                            <select class="form-select tour_type_form" id="tour_type" name="tour_type">
                                <option value="">Tất cả</option>
                                @foreach ($typetours as $type )
                                    <option value="{{ $type->type_name }}">{{ $type->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Điểm khởi hành và điểm đến -->
                        <div class="form-group mb-3">
                            <label for="tour_from">Điểm khởi hành</label>
                            <select class="form-select tour_from_form" id="tour_from" name="tour_from">
                                <option value="">Tất cả</option>
                                @foreach ($tourfroms as $from )
                                    <option value="{{ $from->tour_from }}">{{ $from->tour_from }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group mb-3">
                            <label for="tour_to">Điểm đến</label>
                            <select class="form-select tour_to_form" id="tour_to" name="tour_to">
                                <option value="">Tất cả</option>
                                @foreach ($tour_to as $to )
                                    @php
                                        $title = str_replace('Du lịch ', '', $to->title);
                                    @endphp
                                    <option value="{{ $to->id }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="form-group mb-3" id="date1" data-target-input="nearest">
                            <label for="tour_to">Ngày đi</label>
                            <input type="text" class="form-control datetimepicker-input departure_date_form" id="departure_filter" name="departure_date" data-target="#date1" data-toggle="datetimepicker"/>
                        </div> --}}
                        <div class="form-group d-flex justify-content-between">
                            {{-- <button type="submit" id="apply-filters" class="btn btn-primary">Áp dụng</button> --}}
                            <a href="#" id="resetButton" class="btn btn-secondary">Làm mới</a>

                        </div>
                     
                    </form>
                </div>
                
            </div>
            <div class="col-md-9 col-xs-9 bx-title-lst-tour text-center">
                <div class="w100 fl title-tour1 wow fadeInUp">
                    <h1 style="color: #86B817;font-size: 30px;"> Danh Mục Tour  </h1>
                </div>
                <div id="tour-list" class="row g-4 justify-content-center">
                    @foreach ($tours as $key => $tour)
                        @if ($tour->departures->isNotEmpty())
                            <div class="col-lg-4 col-md-6 fadeInUp" data-wow-delay="0.1s">
                                <div class="package-item">
                                    <div class="overflow-hidden">
                                        <img style="width:456px; height:260px;" class="img-fluid"
                                            src="{{ asset('upload/tours/' . $tour->image) }}" alt="">
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{ $tour->category->title }}</small>
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-calendar-alt text-primary me-2"></i>{{ $tour->type->type_name}}</small>
                                        <small class="flex-fill text-center py-2"><i
                                                class="fa fa-users text-primary me-2"></i>{{ $tour->vehicle }}</small>
                                    </div>
                                    <div class="d-flex border-bottom">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-plane text-primary me-2"></i>Điểm đi:
                                            {{ $tour->tour_from }}</small>
                                    </div>
                                    <div class="text-center p-4">
                                        <h3 class="mb-0">{{ number_format($tour->price) }} đ</h3>
                                        <div class="mb-3">
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                        </div>
                                        <p style="">{{ $tour->title }}</p>
                                        @php
                                            if(Session::get('customer_id')){
                                                $isLiked = $likes->contains('tour_id', $tour->id);
                                            }
                                        @endphp
                                        <div class="d-flex justify-content-center mb-2">
                                            <a href="{{ route('chi-tiet-tour', ['slug' => $tour->slug]) }}"
                                                class="btn btn-sm btn-primary px-3 border-end"
                                                style="border-radius: 30px;">Chi tiết</a>
                                            <form action="{{ route('tour.like') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="customer_id" class="customer_id" value="{{ Session::get('customer_id') }}" id="customer_id">
                                                @if (Session::get('customer_id'))
                                                    <button class="favorite-button btn btn-sm ms-2" data-tour-id="{{ $tour->id }}">
                                                        <i style="font-size: 18px; color: {{ $isLiked ? 'red' : 'black' }};" class="fa fa-heart"></i>
                                                    </button>
                                                @else
                                                    <button  class="favorite-button btn btn-sm ms-2" data-tour-id="{{ $tour->id }}">
                                                        <i style="font-size: 18px" class="fa fa-heart"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endif
                    @endforeach
                    {{-- @if($tours->count() > 3)
                        <div class="text-center">
                            <button id="loadMore" class="btn btn-primary mt-4">Xem thêm</button>
                        </div>
                    @endif --}}
                </div>
               
            </div>
        </div>
    </div>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            let loadMoreButton = document.getElementById('loadMore');
            let tourItems = document.querySelectorAll('#tour-list .col-lg-4, #tour-list .col-md-6'); // Chọn tất cả các tour
            let visibleItems = 6; // Số lượng tour ban đầu hiển thị

            // Ẩn tất cả các tour từ vị trí thứ 4 trở đi
            for (let i = visibleItems; i < tourItems.length; i++) {
                tourItems[i].style.display = 'none';
            }
            
            // Khi nhấn nút "Xem thêm"
            loadMoreButton.addEventListener('click', function() {
                let nextItems = visibleItems + 3; // Tăng số lượng tour hiển thị thêm 3
                for (let i = visibleItems; i < nextItems && i < tourItems.length; i++) {
                    tourItems[i].style.display = 'block'; // Hiển thị các tour tiếp theo
                }
                visibleItems = nextItems; // Cập nhật số lượng tour đang hiển thị

                // Ẩn nút "Xem thêm" nếu đã hiển thị hết các tour
                if (visibleItems >= tourItems.length) {
                    loadMoreButton.style.display = 'none';
                }
            });
        });
    </script> --}}
    
    <style>
        #favorite-button {
            border: none;
            background: none;
            cursor: pointer;
            transition: color 0.3s ease;
        }
    
        #favorite-button i {
            color: #535152; /* Màu mặc định của trái tim */
        }
    
        #favorite-button:hover i {
            color: #ff6f61; /* Màu khi hover */
        }
        .heart-favorited {
            color: red; /* Màu đỏ cho trái tim khi đã yêu thích */
        }
        
        .package-item .text-center p {
            height: 65px; /* Điều chỉnh chiều cao này tùy theo yêu cầu */
            overflow: hidden;
            font-size: 15px;
        }

    </style>
@endsection
