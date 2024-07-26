@extends('layout')
@section('content')
    <div class="container box-list-tour">
        <div class="row">
            <div class="col-md-12 col-xs-12 bx-title-lst-tour text-center">
                <div class="w100 fl title-tour1 wow fadeInUp">
                    <h1 style="color: #86B817;font-size: 30px;"> Danh Mục Tour</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach ($tours as $key => $tour)
                        <!-- Modal -->
                        <div class="modal fade" id="bookingModal_{{ $tour->id }}" tabindex="-1" aria-labelledby="bookingModalLabel_{{ $tour->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bookingModalLabel_{{ $tour->id }}">Đặt Tour</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <!-- Tour Price Table -->
                                    <div class="text-center">
                                        <h6 class="section-title text-center text-primary text-uppercase">Bảng giá tour chi
                                            tiết</h6>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>STT</th>
                                            <th>Ngày khởi hành</th>
                                            <th>Số chổ còn</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($tour->departures as $key=>$depart )
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$depart->departure_date}}</td>
                                                    <td>{{$depart->quantity}}</td>
                                                </tr>
                                            @endforeach
                                           
                                            
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <h6 class="section-title text-center text-primary text-uppercase">Bảng giá tour chi
                                            tiết</h6>
                                    </div>
                                    <div style="padding: 5px;" class="lichtrinhtour-show">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr class="table-tr-header">
                                                    <th class="thtd-code">Loại giá\Độ tuổi</th>
                                                    <th class="thtd-destination">Người lớn (Trên 11 tuổi)</th>
                                                    <th>Trẻ em (5-11 tuổi)</th>
                                                    <th>Trẻ nhỏ (2-5 tuổi)</th>
                                                    <th>Sơ sinh (<2 tuổi)</th>
                                                </tr>
                                                <tr>
                                                    <td>Giá</td>
                                                    <td>{{ number_format($tour->price) }}đ</td>
                                                    <td>{{ number_format($tour->price_treem) }}đ</td>
                                                    <td>{{ number_format($tour->price_trenho) }}đ</td>
                                                    <td>{{ number_format($tour->price_sosinh) }}đ</td>
                                                </tr>
                                                <tr>
                                                    <td>Phụ thu phòng đơn</td>
                                                    <td colspan="5" style="text-align: center">8.000.000 đ</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form id="bookingForm">
                                            <!-- Hidden field for tour ID -->
                                            <input type="hidden" class="customer_id"
                                                value="{{ Session::get('customer_id') }}">
                                            <input type="hidden" class="form-control tour_id" value="{{ $tour->id }}"
                                                id="tour_id">
                                            <div class="text-center">
                                                <h6 class="section-title text-center text-primary text-uppercase">Thông tin
                                                    liên hệ</h6>
                                            </div>
                                            <!-- Customer Information -->
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control name"
                                                            value="{{ Session::get('customer_name') }}" id="name"
                                                            placeholder="Họ tên">
                                                        <label for="name">Tên</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="email" class="form-control email"
                                                            value="{{ Session::get('customer_email') }}" id="email"
                                                            placeholder="Email">
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control phone"
                                                            value="{{ Session::get('customer_phone') }}" id="phone"
                                                            placeholder="Số điện thoại">
                                                        <label for="phone">Số điện thoại</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control departure_date" id="departure_date" value="{{$nearestDeparture->departure_date}}"
                                                            placeholder="Địa chỉ" readonly>
                                                        <label for="departure_date">Ngày khởi hành</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control nguoi_lon" id="nguoi_lon"
                                                            placeholder="0" value="1" data-price="{{ $tour->price }}">
                                                        <label for="nguoi_lon">Số người lớn</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control tre_em" id="tre_em"
                                                            placeholder="0" value="0"
                                                            data-price="{{ $tour->price_treem }}">
                                                        <label for="tre_em">Số trẻ em (5-11 tuổi)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control tre_nho" id="tre_nho"
                                                            placeholder="0" value="0"
                                                            data-price="{{ $tour->price_trenho }}">
                                                        <label for="tre_nho">Số trẻ nhỏ (2-5 tuổi)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control so_sinh" id="so_sinh"
                                                            placeholder="0" value="0"
                                                            data-price="{{ $tour->price_sosinh }}">
                                                        <label for="so_sinh">Số trẻ sơ sinh (<2 tuổi)</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control address" id="address"
                                                            placeholder="Địa chỉ">
                                                        <label for="address">Địa chỉ</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <textarea class="form-control note" placeholder="Nội dung ghi chú" id="note" style="height: 60px"></textarea>
                                                        <label for="note">Ghi chú</label>
                                                    </div>
                                                </div>
                                                <!-- Voucher Information -->
                                                @if (Session::get('voucher'))
                                                    @php
                                                        $voucher = Session::get('voucher');
                                                    @endphp
                                                    <div class="col-8">
                                                        <p>Đang áp dụng Voucher: {{ $voucher->voucher_name }}</p>
                                                        <input type="hidden" class="form-control voucher"
                                                            value="{{ $voucher->voucher_code }}" id="voucher">
                                                    </div>
                                                @else
                                                    <div class="col-8">
                                                        <div id="voucherSection">
                                                            @csrf
                                                            <div class="col-12" style="display: flex">
                                                                <div class="form-floating col-6">
                                                                    <input class="form-control voucher"
                                                                        placeholder="Mã voucher" name="voucher_code"
                                                                        id="voucher">
                                                                    <label for="voucher">Mã voucher</label>
                                                                </div>
                                                                <div class="col-2">
                                                                    <button type="button" class="btn btn-warning"
                                                                        id="applyVoucher">Sử dụng</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-8">
                                                                <p style="color: #FF0000; margin-top:5px;">(*) Sau khi nhập
                                                                    mã voucher, vui lòng nhấn vào nút sử dụng để mã có hiệu
                                                                    lực.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-4">
                                                    <p id="initialPrice"
                                                        style="padding-top: 10%; color: blue; font-size:18px; text-align:end;">
                                                        Tổng giá ban đầu:</p>
                                                    <p id="discountAmount"
                                                        style="color: violet; font-size:18px; text-align:end;">Giảm:</p>
                                                    <p id="totalPrice"
                                                        style=" color: blue; font-size:18px; text-align:end;">Tổng giá sau
                                                        giảm:</p>
                                                </div>
                                            </div>
                                            <!-- Pricing Details -->
                                            <div class="text-center">
                                                <h6 class="section-title text-center text-primary text-uppercase">Phương
                                                    thức thanh toán</h6>
                                            </div>
                                            <div class="row g-3" style="text-align: start !important;">
                                                <div class="col-md-6" >
                                                    <input type="radio" name="payment" id="payment_cod" value="COD"
                                                        checked="">
                                                    <label for="payment_cod">Thanh toán tại quầy Du Lịch Việt</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="radio" name="payment" id="payment_bank"
                                                        value="BANK">
                                                    <label for="payment_bank">Thanh toán chuyển khoản qua ngân hàng</label>
                                                    <div class="payment_description" style="display: none;">
                                                        <p>Quý khách chuyển khoản qua ngân hàng sau:<br>
                                                            Ngân hàng <strong>MB BANK</strong>: Tài khoản <strong>2 3333 666
                                                                9999</strong> – CHI NHÁNH GIA ĐỊNH, TPHCM<br>
                                                            Ngân hàng <strong>ACB</strong>: Tài khoản
                                                            <strong>1818386868</strong> – CHI NHÁNH BÌNH THẠNH, TPHCM<br>
                                                            Tên tài khoản <strong>"CÔNG TY CỔ PHẦN TRUYỀN THÔNG DU LỊCH
                                                                VIỆT"</strong>
                                                        </p>
                                                        <p>Quý khách vui lòng ghi rõ mã tour, họ tên, địa chỉ, số điện thoại
                                                            và
                                                            tên chuyến du lịch, ngày khởi hành cụ thể đã được quý khách chọn
                                                            đăng ký.<br>
                                                            <strong><i class="fa fa-hand-o-right"></i> <a
                                                                    href="https://dulichviet.com.vn/tin-tuc/dieu-khoan-dieu-kien"
                                                                    target="_blank">Xem thêm điều khoản điều kiện chuyển
                                                                    khoản.</a></strong>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="radio" name="payment" id="payment_zalopay"
                                                        value="ZALOPAY">
                                                    <label for="payment_zalopay">Thanh toán qua ZaloPay</label>
                                                    <div class="payment_description" style="display: none;">
                                                        <p>Nhập mã <strong>CHOIVUI</strong> giảm đến 2,500,000 VNĐ</p>
                                                        <p><strong>Vui lòng chọn hình thức thanh toán:</strong></p>
                                                        <select name="paycode" id="paycode" class="form-control valid"
                                                            style="width:360px">
                                                            <option value="">Thanh toán qua cổng ZaloPay</option>
                                                            <option value="domestic_card">Thẻ ATM/Internet Banking (Qua
                                                                cổng
                                                                ZaloPay)</option>
                                                            <option value="international_card">Visa, Master, JCB (Qua cổng
                                                                ZaloPay)</option>
                                                            <option value="zalopay_wallet">Thanh toán ZaloPay QR</option>
                                                            <option value="vietqr">Thanh toán ZaloPay QR đa năng</option>
                                                            <option value="applepay">Apple Pay</option>
                                                        </select>
                                                        <p><strong><i class="fa fa-hand-o-right"></i> <a
                                                                    href="https://dulichviet.com.vn/tin-tuc/dieu-khoan-dieu-kien"
                                                                    target="_blank">Xem thêm điều khoản điều kiện phí thanh
                                                                    toán.</a></strong></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="radio" name="payment" id="payment_vnpay"
                                                        value="VNPAY">
                                                    <label for="payment_vnpay">Thanh toán qua VNPAY</label>
                                                    <div class="payment_description" style="display: none;">
                                                        <p>Mức thanh toán phí cọc sẽ giới hạn không quá 10,000,000 đ. Cám ơn
                                                            Quý
                                                            khách.</p>
                                                        <p><strong><i class="fa fa-hand-o-right"></i> <a
                                                                    href="https://dulichviet.com.vn/tin-tuc/dieu-khoan-dieu-kien"
                                                                    target="_blank">Xem thêm điều khoản điều kiện phí thanh
                                                                    toán.</a></strong></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="radio" name="payment" id="payment_momo"
                                                        value="MOMO">
                                                    <label for="payment_momo">Thanh toán qua ví MoMo</label>
                                                    <div class="payment_description" style="display: none;">
                                                        <p><strong><i class="fa fa-hand-o-right"></i> <a
                                                                    href="https://dulichviet.com.vn/tin-tuc/dieu-khoan-dieu-kien"
                                                                    target="_blank">Xem thêm điều khoản điều kiện phí thanh
                                                                    toán.</a></strong></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="radio" name="payment" id="payment_viettel"
                                                        value="VIETTEL">
                                                    <label for="payment_viettel">Thanh toán qua Viettel Money</label>
                                                    <div class="payment_description" style="display: block;">
                                                        <p><strong><i class="fa fa-hand-o-right"></i> <a
                                                                    href="https://dulichviet.com.vn/tin-tuc/dieu-khoan-dieu-kien"
                                                                    target="_blank">Xem thêm điều khoản điều kiện phí thanh
                                                                    toán.</a></strong></p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <p style="text-align:center;">Bằng việc tiếp tục, bạn chấp nhận đồng ý với
                                                    chính sách/điều khoản như trên.</p>
                                               

                                           
                                                <div style="display: flex; justify-content: center; align-items: center;"
                                                    class="col-12 mb-3">
                                                    <input style="font-size:27px;" type="button" name="send_order"
                                                        value="Đặt tour"
                                                        class="add-to-cart btn btn-primary btn-sm send_order">
                                                </div>
                                            </div>
                                            <!-- Submit Button -->
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    <img style="width:356px; height:237px;" class="img-fluid"
                                        src="{{ asset('upload/tours/' . $tour->image) }}" alt="">
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fa fa-map-marker-alt text-primary me-2"></i>{{ $tour->category->title }}</small>
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fa fa-calendar-alt text-primary me-2"></i>{{ $tour->tour_time }}</small>
                                    <small class="flex-fill text-center py-2"><i
                                            class="fa fa-users text-primary me-2"></i>{{ $tour->quantity }}</small>
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fa fa-plane text-primary me-2"></i>Địa điểm xuất phát:
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
                                    <p>{{ $tour->title }}</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="{{ route('chi-tiet-tour', ['slug' => $tour->slug]) }}"
                                            class="btn btn-sm btn-primary px-3 border-end"
                                            style="border-radius: 30px 0 0 30px;">Chi tiết</a>
                                        <a href="#" class="btn btn-sm btn-primary px-3"
                                            style="border-radius: 0 30px 30px 0;" data-bs-toggle="modal"
                                            data-bs-target="#bookingModal_{{ $tour->id }}">Đặt ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
