@extends('layout')

@section('content')

@php
$tabActive = 'home'; // Default active tab
@endphp



<div class="container box-container-tour">
    <div class="row">
        <ul class="breadcrumb">
            <li><a href="{{ route('homeweb') }}">Trang chủ <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            <li><a href="{{ route('homeweb') }}">Du lịch Nước ngoài <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            <li class="active"><a href="{{ route('tour',['du-lich-nhat-ban']) }}">Du lịch Nhật Bản <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            <li class="active"><a href="{{ route('chi-tiet-tour',['du-lich-dao-wibu-̀53654.html']) }}">Du lịch Đảo wibu</a></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row">
        <!-- Colunm Left Start -->
        <div class="container col-md-9 col-xs-12">
            <!-- Title Start -->
            <div>
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('frontend/images/sapa4.jpg') }}" alt="" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="text-center">
                            <h5 class="section-title text-center text-primary text-uppercase">Chi tiết tour</h5>  
                        </div>
                        <h5 class="mb-4"> {{$tour->title}} <span class="text-primary"></span></h5>
                        <p class="mb-4" style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em> Quy Nhơn &ndash; Mảnh đất thương nhớ.Th&agrave;nh phố thuộc tỉnh B&igrave;nh Định, nơi giao thương cảng biển quan trọng của miền Trung. Quy Nhơn l&agrave; một th&agrave;nh phố ven biển với những bờ biển đẹp như: Kỳ Co, H&ograve;n Kh&ocirc;, Trung Lương, Quy H&ograve;a&hellip; đ&acirc;y l&agrave; những nơi c&oacute; d&ograve;ng nước biển trong xanh đến tận đ&aacute;y, c&oacute; những rạn san h&ocirc; đầy m&agrave;u sắc, cũng l&agrave; những điểm tham quan bậc nhất tại v&ugrave;ng đất n&agrave;y. Đến Quy Nhơn du kh&aacute;ch sẽ được trải nghiệm cuộc sống&nbsp; y&ecirc;n b&igrave;nh của nơi đ&acirc;y, thưởng thức những m&oacute;n ăn độc đ&aacute;o của miền đất v&otilde;, được nghe những c&acirc;u từ của b&agrave;i ch&ograve;i, h&aacute;t bội sẽ l&agrave;m cho du kh&aacute;ch c&oacute; được những khoảnh khoắc đ&aacute;ng nhớ v&agrave; y&ecirc;u c&aacute;i b&igrave;nh dị ở th&agrave;nh phố Quy Nhơn nhỏ xinh n&agrave;y.</em></span></span></p>
                        <div class="row gy-2 gx-4 mb-4">
                            <div class="col-sm-6">
                                <p id="" class="mb-0"><i class="fa fa-calendar-alt text-primary me-2"></i>Thời gian: {{$tour->tour_time}}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-users text-primary me-2"></i>Số người tối đa: {{$tour->quantity}}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-plane text-primary me-2"></i>Phương tiện: {{$tour->vehicle}}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-map text-primary me-2"></i>Điểm khởi hành: {{$tour->tour_from}}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-hotel text-primary me-2"></i>Phòng khách sạn: Có</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-bell text-primary me-2"></i>Ưu đãi dành cho gói trên 5 người</p>
                            </div>
                            <div class="text-center">
                                <h6 class="section-title text-center text-primary text-uppercase">các ngày khởi hành khác</h6>  
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <th>STT</th>
                                    <th>Ngày khởi hành</th>
                                    <th>Số chổ còn</th>
                                </thead>
                                <tbody>
                                    @foreach ($departures as $key=>$depart )
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$depart->departure_date}}</td>
                                            <td>{{$depart->quantity}}</td>
                                        </tr>
                                    @endforeach
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Title End-->

            <div class="w-100"></div>

            <!-- Detail Tour Start -->
            <div class="container b-detail-ct-tour w-100 top-20 wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-tabs tab-dt-tour">
                        <li class="nav-item">
                            <a class="nav-link2 {{ $tabActive === 'home' ? 'active' : '' }}" id="home-tab" data-bs-toggle="tab" href="#home">Chi tiết tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link2{{ $tabActive === 'menu1' ? 'active' : '' }}" id="menu1-tab" data-bs-toggle="tab" href="#menu1">Đặt tour</a>
                        </li>
                        {{-- <li class="nav-item" id="tit_tab_booking">
                            <a class="nav-link2 {{ $tabActive === 'menu2' ? 'active' : '' }}" id="menu2-tab" data-bs-toggle="tab" href="#menu2">Đặt Tour</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade {{ $tabActive === 'home' ? 'show active' : '' }}" role="tabpanel" aria-labelledby="home-tab">
                            <div class="text-center">
                                <h6 class="section-title text-center text-primary text-uppercase">Thông tin chi tiết tour</h6>
                                
                            </div>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><strong><span style="color:#FF0000">NG&Agrave;Y 1: Đ&Oacute;N KH&Aacute;CH- CITY TOUR&nbsp; &nbsp; &nbsp;</span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">Xe v&agrave; HDV đ&oacute;n kh&aacute;ch tại s&acirc;n bay, nếu kh&aacute;ch đến sớm th&igrave; đ&oacute;n kh&aacute;ch d&ugrave;ng điểm t&acirc;m caf&eacute; (chi ph&iacute; tự t&uacute;c). S</span></span><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">au đ&oacute; gh&eacute;p đo&agrave;n đưa qu&yacute; kh&aacute;ch đi ăn trưa.&nbsp;</span></span><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">Sau bữa trưa khởi h&agrave;nh về Quy Nhơn. Tr&ecirc;n đường về gh&eacute; tham quan <span style="color:#008000"><strong>Ch&ugrave;a Thi&ecirc;n Hưng</strong>,</span> ng&ocirc;i ch&ugrave;a nổi tiếng với vẻ đẹp sơn thủy hữu t&igrave;nh v&agrave; cũng l&agrave; nơi lưu giữ <span style="color:#008000"><strong>Ngọc X&aacute; Lợi</strong></span> linh thi&ecirc;ng.&nbsp;</span></span><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">Di chuyển về Quy Nhơn l&agrave;m thủ tục nhận ph&ograve;ng kh&aacute;ch sạn v&agrave; nghỉ ngơi</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><strong><span style="color:#008000">14h00:</span> </strong>Đo&agrave;n khởi h&agrave;nh đi tham quan điểm đầu ti&ecirc;n <span style="color:#008000"><strong>- Khu du lịch Ghềnh R&aacute;ng, Qu&yacute; kh&aacute;ch được dạo bước tr&ecirc;n dốc Mộng Cầm, đồi Thi Nh&acirc;n, b&atilde;i tắm Ho&agrave;ng Hậu, Ti&ecirc;n Sa&nbsp;</strong></span></span></span><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">v&agrave; sống lại với những vần thơ H&agrave;n Mặc Tử c&ugrave;ng t&agrave;i nghệ của b&uacute;t lửa Dzũ Kha.</span></span></p>
                            <p style="text-align:justify"><strong><span style="color:#008000">15h30:</span> </strong><span style="font-family:arial,helvetica,sans-serif; font-size:14px">&nbsp;Đo&agrave;n đến </span><span style="color:#008000"><strong>Th&aacute;p Đ&ocirc;i</strong></span><span style="font-family:arial,helvetica,sans-serif; font-size:14px"><span style="color:#008000">,</span> l&agrave; cụm 02 ngọn th&aacute;p Chăm được x&acirc;y duy&ecirc;n d&aacute;ng b&ecirc;n cạnh nhau nằm giữa l&ograve;ng th&agrave;nh phố.</span></p>
                            <p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif; font-size:14px"><span style="color:#008000"><strong>16h30:</strong></span> Xe đưa đo&agrave;n tham quan <span style="color:#008000"><strong>Quảng Trường Quy Nhơn, nơi tượng đ&agrave;i Nguyễn Sinh Sắc &ndash; Nguyễn Tất Th&agrave;nh</strong></span> uy nghi tượng trưng cho t&igrave;nh cha con h&ograve;a quyện với t&igrave;nh y&ecirc;u nước v&agrave; Tham quan tự do, tắm biển ngắm ho&agrave;ng h&ocirc;n tr&ecirc;n biển Quy Nhơn.</span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><strong><span style="color:#008000">18h00:</span> </strong>Xe đưa qu&yacute; kh&aacute;ch ăn tối tại nh&agrave; h&agrave;ng. Với những m&oacute;n ẩm thực đặc trưng tại đất B&igrave;nh Định.&nbsp;</span></span><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">Nghỉ đ&ecirc;m kh&aacute;ch sạn tại Quy Nhơn.</span></span></p>
                            <hr />
                            <img alt="anh o dau" src="{{ asset('frontend/images/sapa4.jpg') }}" style="height:600px; width:1100px" />
                            <hr />
                            <p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif; font-size:14px"><span style="color:#FF0000"><strong>NG&Agrave;Y 2: PH&Uacute; Y&Ecirc;N- HOA V&Agrave;NG TR&Ecirc;N CỎ XANH&nbsp; </strong>&nbsp; </span>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>07h00:</strong></span>&nbsp;Qu&yacute; kh&aacute;ch ăn điểm t&acirc;m s&aacute;ng.</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>08h00:</strong></span> Đo&agrave;n khởi h&agrave;nh tham quan Ph&uacute; Y&ecirc;n.</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>09h30:</strong> </span>Tham quan <strong><span style="color:#008000">Nh&agrave; thờ Mằng Lăng,</span> </strong>được thiết kế theo lối kiến tr&uacute;c Gothic với c&aacute;c họa tiết tinh xảo, một kh&aacute;m ph&aacute; mới mẻ ở đ&acirc;y l&agrave; hang th&aacute;nh đường trong l&ograve;ng quả đồi nh&acirc;n tạo, cũng l&agrave; nơi lưu giữ <span style="color:#008000"><strong>Cuốn s&aacute;ch c&oacute; in chữ Quốc ngữ đầu ti&ecirc;n của nước ta.</strong></span></span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><strong><span style="color:#008000">10h30:</span> </strong>Đo&agrave;n đến <span style="color:#008000"><strong>Ghềnh Đ&aacute; Đĩa</strong></span>, một thắng cảnh thi&ecirc;n nhi&ecirc;n cấp quốc gia đầy kỳ th&uacute;, tr&ocirc;ng xa như một tổ ong đen b&oacute;ng hay l&agrave; những chồng đĩa trong l&ograve; gạch dưới b&agrave;n tay sắp đặt của tạo h&oacute;a.</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><strong><span style="color:#008000">11h30: Ăn trưa</span> </strong>tại nh&agrave; h&agrave;ng tr&ecirc;n <span style="color:#008000"><strong>đầm &Ocirc; Loan</strong> </span><strong><span style="color:#008000">c&ugrave;ng m&oacute;n s&ograve; huyết nổi tiếng.</span> </strong>Nghỉ ngơi ngắn tại nh&agrave; h&agrave;ng.</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><strong><span style="color:#008000">13h30:</span> </strong>Khởi h&agrave;nh đến<strong> <span style="color:#008000">B&atilde;i X&eacute;p &ndash; Ghềnh &Ocirc;ng,</span> </strong>h&igrave;nh ảnh quen thuộc từ Bộ phim<strong> <span style="color:#008000">T&ocirc;i thấy hoa v&agrave;ng tr&ecirc;n cỏ xanh,</span> </strong>ấn tượng phải kể đến l&agrave; b&atilde;i cỏ rộng m&ecirc;nh m&ocirc;ng của Ghềnh &Ocirc;ng ph&iacute;a b&ecirc;n tr&ecirc;n một b&atilde;i X&eacute;p s&oacute;ng vỗ hiền h&ograve;a.</span></span></p>
                            <hr />
                            <img alt="anh o dau" src="{{ asset('frontend/images/sapa4.jpg') }}" style="height:600px; width:1100px" />
                            <hr />
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>14h30:&nbsp;</strong></span>Qu&yacute; kh&aacute;ch tham quan <span style="color:#008000"><strong>Ch&ugrave;a Thanh Lương</strong>-</span> Tiểu cảnh hồ nước nơi đ&acirc;y c&oacute; tượng Phật B&agrave; Quan &Acirc;m lớn, được tạo h&igrave;nh như đang ẩn m&igrave;nh dưới nước độc đ&aacute;o. Trước mặt tượng c&oacute; lối đi nổi tr&ecirc;n mặt nước, n&ecirc;n du kh&aacute;ch c&oacute; thể lại gần tượng hơn để chi&ecirc;m ngưỡng, chụp ảnh check-in..</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>15h30:</strong></span> H&agrave;nh tr&igrave;nh về lại Quy Nhơn. Qu&yacute; kh&aacute;ch về lại kh&aacute;ch sạn nghỉ ngơi, tự do tắm biển.</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>18h00:</strong> </span>Xe v&agrave; HDV đưa đo&agrave;n đi <strong><span style="color:#008000">ăn tối tại nh&agrave; h&agrave;ng.</span>&nbsp;</strong></span></span><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">Sau bữa tối Quy Kh&aacute;ch tự do vui chơi, tham quan Quy Nhơn về đ&ecirc;m, dạo chơi trong Chợ đ&ecirc;m hoặc thưởng thức nhạc tại c&aacute;c ph&ograve;ng tr&agrave;, bar,....(chi ph&iacute; tự t&uacute;c).&nbsp;</span></span><span style="color:#008000"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><strong>Nghỉ đ&ecirc;m tại Quy Nhơn.</strong></span></span></span></p>
                            <hr />
                            <img alt="anh o dau" src="{{ asset('frontend/images/sapa4.jpg') }}" style="height:600px; width:1100px" />
                            <hr />
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><strong><span style="color:#FF0000">NG&Agrave;Y 3: KỲ CO- LẶN NGẮM SANHO- EO GI&Oacute;&nbsp; </span>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>07h00: </strong></span>Qu&yacute; kh&aacute;ch d&ugrave;ng điểm t&acirc;m s&aacute;ng.</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>8h00:</strong></span> Xe v&agrave; hướng dẫn vi&ecirc;n đ&oacute;n kh&aacute;ch tại kh&aacute;ch sạn, khởi h&agrave;nh đi đảo <span style="color:#008000"><strong>Kỳ Co </strong></span>với những cảnh sắc thi&ecirc;n nhi&ecirc;n tuyệt đẹp đang đ&oacute;n chờ.</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>8h30:</strong></span>&nbsp; Đến&nbsp; bến thuyền Nhơn L&yacute;, qu&yacute; kh&aacute;ch đi cano để di chuyển qua đảo <span style="color:#008000"><strong>Kỳ Co</strong></span>, với dải c&aacute;t v&agrave;ng &ocirc;m lấy biển, bọc th&agrave;nh một h&igrave;nh cung, mềm mại mềm mại như dải lụa uốn lượn, &ocirc;m trọn lấy l&agrave;n nước trong xanh tận đ&aacute;y. Tận hưởng những gi&acirc;y ph&uacute;t thư gi&atilde;n giữa m&ecirc;nh m&ocirc;ng s&oacute;ng nước.</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>09h30:</strong></span> Đến nơi, Qu&yacute; kh&aacute;ch h&ograve;a m&igrave;nh v&agrave;o thi&ecirc;n nhi&ecirc;n, một b&ecirc;n l&agrave; biển nước m&agrave;u xanh lam trong vắt, một b&ecirc;n l&agrave; n&uacute;i đ&aacute; cao sừng sững. Kh&aacute;m ph&aacute; bãi cát dài mịn, khung cảnh hoang sơ đ&acirc;̀y quy&ecirc;́n rũ, đặc bi&ecirc;̣t được ch&acirc;́m phá bằng những c&ocirc;ng trình đặc sắc như <span style="color:#008000"><strong>C&acirc;̀u Y&ecirc;́n, C&acirc;̀u Trái Tim, Kỳ Co Resort,</strong>&hellip;</span> và những hang đá, su&ocirc;́i nước đẹp đ&ecirc;́n b&acirc;́t ngờ.<span style="color:#008000">&nbsp;</span></span></span><span style="color:#008000"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><strong>Qu&yacute; kh&aacute;ch c&oacute; thể mua th&ecirc;m dịch vụ Đi bộ dưới đ&aacute;y biển, Motor nước, Jetsky,&hellip; (chi ph&iacute; tự t&uacute;c)</strong></span></span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>10h30:</strong> </span><strong><span style="color:#008000">Cano đưa Qu&yacute; kh&aacute;ch ra B&atilde;i Dứa lặn ngắm san h&ocirc;,</span> </strong>khu vực n&agrave;y c&oacute; nhiều rặng san h&ocirc; đa dạng, nhiều m&agrave;u sắc, chủng loại, ngo&agrave;i ra, thi thoảng c&ograve;n c&oacute; c&aacute;c loại Cầu gai, sao biển, nhiều loại c&aacute; đầy m&agrave;u sắc.</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>11h30:</strong></span> Qu&yacute; kh&aacute;ch trở lại bến thuyền tắm nước ngọt v&agrave; thưởng thức bữa trưa với c&aacute;c m&oacute;n hải sản tươi sống. Qu&yacute; kh&aacute;ch nghỉ trưa ngắn tại nh&agrave; h&agrave;ng</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>13h00:</strong></span> Đo&agrave;n kh&aacute;ch tham quan <span style="color:#008000"><strong>Eo Gi&oacute;</strong></span> một b&atilde;i biển hoang sơ dưới sự b&agrave;o m&ograve;n của nước v&agrave; gi&oacute;, tạo n&ecirc;n một eo biển tuyệt đẹp, quanh năm lộng gi&oacute;.</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>14h00:</strong> </span>Tiếp tục gh&eacute; thăm <span style="color:#008000"><strong>Tịnh x&aacute; Ngọc H&ograve;a</strong> </span>&ndash; một địa điểm l&yacute; tưởng để tĩnh t&acirc;m v&agrave; thiền định &ndash; với kiến tr&uacute;c nổi bật l&agrave; tượng đ&ocirc;i Phật B&agrave; Quan &Acirc;m cao nhất Việt Nam, gồm hai tượng phật B&agrave; Quan Thế &Acirc;m, tượng hướng về ph&iacute;a Nam (Cổng ch&iacute;nh Tịnh X&aacute;) c&ograve;n được gọi l&agrave; Quan Thế &Acirc;m Kiết Tường ph&ugrave; trợ cho rừng v&agrave;ng.C&ograve;n bức tượng c&ograve;n lại l&agrave; Quan Thế &Acirc;m Nam Hải hướng ra biển được người d&acirc;n xem l&agrave; ph&ugrave; trợ cho biển bạc.</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#008000"><strong>15h00:</strong></span> Xe v&agrave; HDV đưa qu&yacute; kh&aacute;ch ra s&acirc;n bay, Tr&ecirc;n đường đi qu&yacute; kh&aacute;ch dừng ch&acirc;n gh&eacute; tham quan v&agrave; checkin đồi <span style="color:#008000"><strong>Đồi C&aacute;t phương Mai</strong></span> checkin. (Hiện tại đồi c&aacute;t đ&atilde; được san lấp, n&ecirc;n qu&yacute; kh&aacute;ch c&oacute; thể dừng ch&acirc;n chụp c&aacute;c đồi c&aacute;t tương tự )</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif">HDV hướng dẫn đo&agrave;n l&agrave;m thủ tục l&ecirc;n chuyến bay trở về nh&agrave;, hẹn gặp lại qu&yacute; kh&aacute;ch ở những chuyến du lịch tiếp theo c&ugrave;ng VietnamTravel</span></span></p>
                            <p style="text-align:justify"><span style="font-size:14px"><span style="font-family:arial,helvetica,sans-serif"><img alt="" src="https://vietnamtravel.net.vn/media/images/Quy%20Nhon%20Phu%20Yen/den-Quy-Nhon-kham-pha-cung-duong-di-bo-ven-bien-dep-bac-nhat.jpg" style="height:550px; width:1100px" /></span></span></p>
                            <div class="w100 fl">
                                <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="tit-service-attach">Giá dịch vụ bao gồm</div>
                                    <ul class="ul-lst-service-attach">
                                        <li><img alt="du lịch" src="https://vietnamtravel.net.vn/assets/desktop/images/bao-hiem.png"> Bảo hiểm du lịch theo quy định</li>
                                        <li><img alt="du lịch" src="https://vietnamtravel.net.vn/assets/desktop/images/bua-an.png"> Các bữa ăn theo chương trình</li>
                                        <li><img alt="du lịch" src="https://vietnamtravel.net.vn/assets/desktop/images/huong-dan-vien.png"> Hướng dẫn viên suốt chương trình</li>
                                        <li><img alt="du lịch" src="https://vietnamtravel.net.vn/assets/desktop/images/ve-tham-quan.png"> Vé tham quan theo chương trình</li>
                                        <li><img alt="du lịch" src="https://vietnamtravel.net.vn/assets/desktop/images/van-chuyen.png"> Các loại hình vận chuyển theo chương trình</li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="tit-service-attach">Giá dịch vụ không bao gồm</div>
                                    <ul class="ul-lst-service-attach">
                                        <li><img alt="du lịch" src="https://vietnamtravel.net.vn/assets/desktop/images/ho-chieu.png"> Chứng minh thư, hộ chiếu còn hiệu lực 6 tháng</li>
                                        <li><img alt="du lịch" src="https://vietnamtravel.net.vn/assets/desktop/images/hanh-ly.png"> Phí hành lý quá cước và các chi phí cá nhân</li>
                                        <li><img alt="du lịch" src="https://vietnamtravel.net.vn/assets/desktop/images/ho-chieu.png"> Visa tái nhập cho người nước ngoài(nếu có)</li>
                                        <li><img alt="du lịch" src="https://vietnamtravel.net.vn/assets/desktop/images/money.png"> Tiền Tip cho hướng dẫn viên địa phương</li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                           <div id="menu1" class="tab-pane fade {{ $tabActive === 'menu1' ? 'show active' : '' }}" role="tabpanel" aria-labelledby="menu1-tab">
                            <div class="text-center">
                                <h6 class="section-title text-center text-primary text-uppercase">Bảng giá tour chi tiết</h6>  
                            </div>
                            <div class="lichtrinhtour-show">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr class="table-tr-header">
                                            <th class="thtd-code">Loại giá\Độ tuổi</th>
                                            <th class="thtd-destination">Người lớn(Trên 11 tuổi)</th>
                                            <th>Trẻ em(5-11 tuổi)</th>
                                            <th>Trẻ nhỏ(2-5 tuổi)</th>
                                            <th>Sơ sinh(<2 tuổi)</th>
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
                                <div class="text-center">
                                    <h6 class="section-title text-center text-primary text-uppercase">Thông tin liên hệ</h6>  
                                </div>
                                <div class="col-lg-12">
                                    <form id="contactForm">
                                        <input type="hidden" class="form-control tour_id" value="{{ $tour->id }}" id="tour_id">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control name" value="{{Session::get('customer_name')}}" id="name" placeholder="Họ tên">
                                                    <label for="name">Tên</label>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control email" value="{{Session::get('customer_email')}}" id="email" placeholder="Email">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control phone" value="{{Session::get('customer_phone')}}" id="phone" placeholder="Số điện thoại">
                                                    <label for="phone">Số điện thoại</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control departure_date" value="{{ $nearestDeparture ? $nearestDeparture->departure_date : '' }}" name="departure_date" id="departure_date" placeholder="" readonly>
                                                    <label for="departure_date">Ngày khởi hành (*Chỉ được đặt ngày khởi hành gần nhất)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control nguoi_lon" id="nguoi_lon" placeholder="0" value="1" data-price="{{ $tour->price }}">
                                                    <label for="nguoi_lon">Số người lớn</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control tre_em" id="tre_em" placeholder="0" value="0" data-price="{{ $tour->price_treem }}">
                                                    <label for="tre_em">Số trẻ em(5-11 tuổi)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control tre_nho" id="tre_nho" placeholder="0" value="0" data-price="{{ $tour->price_trenho }}">
                                                    <label for="tre_nho">Số trẻ nhỏ(2-5 tuổi)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control so_sinh" id="so_sinh" placeholder="0" value="0" data-price="{{ $tour->price_sosinh }}">
                                                    <label for="so_sinh">Số trẻ sơ sinh(<2 tuổi)</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control address" id="address" placeholder="Địa chỉ">
                                                    <label for="address">Địa chỉ</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control note" placeholder="Nội dung ghi chú" id="note" style="height: 60px"></textarea>
                                                    <label for="note">Ghi chú</label>
                                                </div>
                                            </div>
                                            <input type="hidden" class="customer_id" value="{{ Session::get('customer_id') }}">

                                            @if(Session::get('voucher'))
                                                @php
                                                    $voucher=Session::get('voucher');
                                                @endphp
                                                <div class="col-8">
                                                <p>Đang áp dụng Voucher: {{$voucher->voucher_name}}</p>
                                                <input type="hidden" class="form-control voucher" value="{{$voucher->voucher_code}}" id="voucher">
                                            </div>
                                            @else
                                            <div class="col-8">
                                                <div id="voucherSection">
                                                    @csrf
                                                    <div class="col-12" style="display: flex">
                                                        <div class="form-floating col-6">
                                                            <input class="form-control voucher" placeholder="Mã voucher" name="voucher_code" id="voucher">
                                                            <label for="voucher">Mã voucher</label>
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" class="btn btn-warning" id="applyVoucher">Sử dụng</button>
                                                        </div>
                                                    </div>
                                                    <p style="color: #FF0000; margin-top:5px;">(*) Sau khi nhập mã voucher, vui lòng nhấn vào nút sử dụng để mã có hiệu lực.</p>
                                                </div>
                                            </div>
                                            @endif
                                            
                                            
                                            <div class="col-4">
                                                <p id="initialPrice" style="padding-top: 10%; color: blue; font-size:18px; text-align:end;">Tổng giá ban đầu:</p>
                                                <p id="discountAmount" style="color: violet; font-size:18px; text-align:end;">Giảm:</p>
                                                <p id="totalPrice" style=" color: blue; font-size:18px; text-align:end;">Tổng giá sau giảm:</p>
                                            </div>
                                            
                                           
                                            <hr>
                                            <div class="text-center">
                                                <h6 class="section-title text-center text-primary text-uppercase">Phương thức thanh toán</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="radio" name="payment" id="payment_cod" value="COD" checked="">
                                                <label for="payment_cod">Thanh toán tại quầy Du Lịch Việt</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="radio" name="payment" id="payment_bank" value="BANK">
                                                <label for="payment_bank">Thanh toán chuyển khoản qua ngân hàng</label>
                                                <div class="payment_description" style="display: none;">
                                                    <p>Quý khách chuyển khoản qua ngân hàng sau:<br>
                                                        Ngân hàng <strong>MB BANK</strong>: Tài khoản <strong>2 3333 666 9999</strong> – CHI NHÁNH GIA ĐỊNH, TPHCM<br>
                                                        Ngân hàng <strong>ACB</strong>: Tài khoản <strong>1818386868</strong> – CHI NHÁNH BÌNH THẠNH, TPHCM<br>
                                                        Tên tài khoản <strong>"CÔNG TY CỔ PHẦN TRUYỀN THÔNG DU LỊCH VIỆT"</strong></p>
                                                    <p>Quý khách vui lòng ghi rõ mã tour, họ tên, địa chỉ, số điện thoại và tên chuyến du lịch, ngày khởi hành cụ thể đã được quý khách chọn đăng ký.<br>
                                                        <strong><i class="fa fa-hand-o-right"></i> <a href="https://dulichviet.com.vn/tin-tuc/dieu-khoan-dieu-kien" target="_blank">Xem thêm điều khoản điều kiện chuyển khoản.</a></strong></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="radio" name="payment" id="payment_zalopay" value="ZALOPAY">
                                                <label for="payment_zalopay">Thanh toán qua ZaloPay</label>
                                                <div class="payment_description" style="display: none;">
                                                    <p>Nhập mã <strong>CHOIVUI</strong> giảm đến 2,500,000 VNĐ</p>
                                                    <p><strong>Vui lòng chọn hình thức thanh toán:</strong></p>
                                                    <select name="paycode" id="paycode" class="form-control valid" style="width:430px">
                                                        <option value="">Thanh toán qua cổng ZaloPay</option>
                                                        <option value="domestic_card">Thẻ ATM/Internet Banking (Qua cổng ZaloPay)</option>
                                                        <option value="international_card">Visa, Master, JCB (Qua cổng ZaloPay)</option>
                                                        <option value="zalopay_wallet">Thanh toán ZaloPay QR</option>
                                                        <option value="vietqr">Thanh toán ZaloPay QR đa năng</option>
                                                        <option value="applepay">Apple Pay</option>
                                                    </select>
                                                    <p><strong><i class="fa fa-hand-o-right"></i> <a href="https://dulichviet.com.vn/tin-tuc/dieu-khoan-dieu-kien" target="_blank">Xem thêm điều khoản điều kiện phí thanh toán.</a></strong></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="radio" name="payment" id="payment_vnpay" value="VNPAY">
                                                <label for="payment_vnpay">Thanh toán qua VNPAY</label>
                                                <div class="payment_description" style="display: none;">
                                                    <p>Mức thanh toán phí cọc sẽ giới hạn không quá 10,000,000 đ. Cám ơn Quý khách.</p>
                                                    <p><strong><i class="fa fa-hand-o-right"></i> <a href="https://dulichviet.com.vn/tin-tuc/dieu-khoan-dieu-kien" target="_blank">Xem thêm điều khoản điều kiện phí thanh toán.</a></strong></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="radio" name="payment" id="payment_momo" value="MOMO">
                                                <label for="payment_momo">Thanh toán qua ví MoMo</label>
                                                <div class="payment_description" style="display: none;">
                                                    <p><strong><i class="fa fa-hand-o-right"></i> <a href="https://dulichviet.com.vn/tin-tuc/dieu-khoan-dieu-kien" target="_blank">Xem thêm điều khoản điều kiện phí thanh toán.</a></strong></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="radio" name="payment" id="payment_viettel" value="VIETTEL">
                                                <label for="payment_viettel">Thanh toán qua Viettel Money</label>
                                                <div class="payment_description" style="display: block;">
                                                    <p><strong><i class="fa fa-hand-o-right"></i> <a href="https://dulichviet.com.vn/tin-tuc/dieu-khoan-dieu-kien" target="_blank">Xem thêm điều khoản điều kiện phí thanh toán.</a></strong></p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <p style="text-align:center;">Bằng việc tiếp tục, bạn chấp nhận đồng ý với chính sách/điều khoản như trên.</p>
                                            <div style="display: flex;justify-content: center;align-items: center;" class="col-12">
                                                <input style="font-size:27px;" type="button" name="send_order" value="Đặt tour" class="add-to-cart btn btn-primary btn-sm send_order">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                       
                        <hr>
                    </div>
                </div>
            </div>
            
            <!-- Detail Tour End -->

            <!-- Comment Start -->
            
            <br><br>
            <div class="container wow fadeInUp">
                <div style="background-color:#0077B5;" class="tit-service-attach">Bình luận & Chia sẻ</div>
                <div class="heateor_sss_sharing_container heateor_sss_horizontal_sharing">
                    <div class="heateor_sss_sharing_title" style="font-weight:bold">Chia sẻ bài viết lên mạng xã hội</div>
                        <ul class="heateor_sss_sharing_ul">
                            <a target="_blank" href="#">
                                <li class="heateorSssSharingRound">
                                    <i style="width: 35px; height: 35px; border-radius: 999px;" alt="Facebook" title="Facebook" class="heateorSssSharing heateorSssRedditBackground">
                                        <img alt="Facebook" style="width: 35px; height: 35px; margin: 0px !important;" src="https://cdn4.iconfinder.com/data/icons/social-media-icons-the-circle-set/48/facebook_circle-512.png">
                                        <ss style="display: block; border-radius: 999px;" class="heateorSssSharingSvg heateorSssRedditSvg"></ss>
                                    </i>
                                </li>
                            </a>
                            <a target="_blank" href="#">
                                <li class="heateorSssSharingRound">
                                    <i style="width: 35px; height: 35px; border-radius: 999px;" alt="Instagram" title="Instagram" class="heateorSssSharing heateorSssRedditBackground">
                                        <img alt="Instagram" style="width: 35px; height: 35px; margin: 0px !important;" src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2-free/128/social-instagram-new-circle-512.png">
                                        <ss style="display: block; border-radius: 999px;" class="heateorSssSharingSvg heateorSssRedditSvg"></ss>
                                    </i>
                                </li>
                            </a>
                            
                            <a target="_blank" href="#">
                                <li class="heateorSssSharingRound">
                                    <i style="width:35px;height:35px;border-radius:999px;" alt="Reddit" title="Reddit" class="heateorSssSharing heateorSssRedditBackground" onclick="">
                                    <img alt="du lịch" style="width: 35px;height: 35px;margin: 0px !important;" src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2-free/128/social-reddit-circle-512.png">
                                    <ss style="display:block;border-radius:999px;" class="heateorSssSharingSvg heateorSssRedditSvg"></ss>
                                    </i>
                                </li>
                            </a>
                        </ul>
                   <div class="heateorSssClear"></div>
                </div>
                <br>
                <div class="comment-section">
                    <div class="comment-input">
                        <div class="comment-avatar">
                            <img src="{{asset('frontend/img/user.png')}}" alt="Avatar" class="avatar-img">
                        </div>
                        <div class="comment-content">
                            <form action="{{ route('comment.store') }}" method="post" class="comment-form" id="comment-form">
                                @csrf
                                <div class="mb-3">
                                    <label for="comment-message" class="form-label">
                                        @php
                                            echo Session::get('customer_name');
                                        @endphp
                                    </label>
                                    <input type="hidden" name="customer_id" class="customer_id" value="{{ Session::get('customer_id') }}" id="customer_id">
                                    <input type="hidden" name="comment_name" class="comment_name" value="{{ Session::get('customer_name') }}" id="comment_name">
                                    <input type="hidden" name="comment_tour_id" class="comment_tour_id" value="{{ $tour->id }}">
                                    <div class="mb-3">
                                        <small class="fa fa-star text-primary star" data-value="1"></small>
                                        <small class="fa fa-star text-primary star" data-value="2"></small>
                                        <small class="fa fa-star text-primary star" data-value="3"></small>
                                        <small class="fa fa-star text-primary star" data-value="4"></small>
                                        <small class="fa fa-star text-primary star" data-value="5"></small>
                                    </div>
                                    <input type="hidden" id="star-rating" class="star-rating" name="star-rating" value="0">
                                    <textarea class="form-control comment_content" id="comment_content" name="comment_content" rows="4" required placeholder="Nội dung bình luận"></textarea>
                                </div>
                                <button type="button" class="btn btn-primary btn-submit send-comment">Gửi bình luận</button>
                            </form>
                        </div>
                        
                        
                    </div>
                
                    <div class="comment-list">
                        @foreach ( $comments as $key=>$cmt )
                            <div class="comment-item">
                                <div class="comment-avatar">
                                    <img src="{{asset('frontend/img/user-1.jpg')}}" alt="Avatar" class="avatar-img">
                                </div>
                                <div class="comment-details">
                                    <p class="comment-author">{{$cmt->comment_name}}</p>
                                    <div class="mb-1">
                                        @php
                                            // Lấy xếp hạng của bình luận này từ danh sách ratings
                                            $rating = $ratings->firstWhere('comment_id', $cmt->comment_id);
                                        @endphp
                                        @if ($rating)
                                            @for ($i = 1; $i <= 5; $i++)
                                                <small class="fa fa-star {{ $i <= $rating->rating ? 'text-primary' : 'text-secondary' }}"></small>
                                            @endfor
                                           
                                       
                                        @endif
                                       
                                    </div>
                                    <p class="comment-text">{{$cmt->comment_content}}</p>
                                    <p class="comment-date">{{$cmt->created_at}}</p>
                                    @foreach ($reply as $key=>$rep )
                                        @if ($rep->comment_parent_comment==$cmt->comment_id)
                                            <div class="admin-reply mt-1 p-1 bg-light border rounded d-flex align-items-start">
                                                <div class="comment-avatar" style="margin-top:1%">
                                                    <img src="{{ asset('frontend/img/user.png') }}" alt="Admin Avatar" class="avatar-img">
                                                </div>
                                                <div class="admin-reply-details ms-2">
                                                    <p class="comment-author text-primary mb-1">Admin</p>
                                                    <p class="comment-text mb-1">{{ $rep->comment_content }}</p>
                                                    <p class="comment-date mb-0">{{ $rep->created_at }}</p>
                                                </div>
                                            </div>
                                        
                                        @endif
                                        
                                    @endforeach
                                    
                                </div>
                            </div>
                        @endforeach
                        
                        
                        <!-- Các comment khác -->
                    </div>
                </div>    
             </div>
            <!-- Comment End -->
        </div>
        <!-- Column Left End -->





        <!-- Column Right Start -->
        <div class="container col-md-3 col-xs-12 wow zoomIn">
            <div class="w100 fl top-15 box-cldl">
                <div class="w100 fl tit-child-larg">
                    <h2>Cẩm nang du lịch</h2>
                </div>
                <hr>
                <ul class="ul-lst-article-bar">
                    <li><i class="fa fa-arrow-right text-primary me-2"></i><a href="https://vietnamtravel.net.vn/vi/ct/100-10-diem-den-duoc-nguoi-viet-yeu-thich-nhat-trong-nam-2018.html">10 điểm đến được người Việt yêu thích nhất trong năm 2018</a></li>
                    <li><i class="fa fa-arrow-right text-primary me-2"></i><a href="https://vietnamtravel.net.vn/vi/ct/99-5-diem-du-lich-nuoc-ngoai-gia-ca-hop-ly-danh-cho-nguoi-viet-nam.html">5 điểm du lịch nước ngoài giá cả hợp lý dành cho người Việt Nam</a></li>
                    <li><i class="fa fa-arrow-right text-primary me-2"></i><a href="https://vietnamtravel.net.vn/vi/ct/98-nhung-dieu-can-biet-truoc-khi-du-lich-den-sri-lanka.html">Những điều cần biết trước khi du lịch đến Sri Lanka</a></li>
                    <li><i class="fa fa-arrow-right text-primary me-2"></i><a href="https://vietnamtravel.net.vn/vi/ct/97-nhung-dieu-luu-y-khi-di-du-lich-nhat-ban.html">Những điều lưu ý khi đi du lịch Nhật Bản</a></li>
                    <li><i class="fa fa-arrow-right text-primary me-2"></i><a href="https://vietnamtravel.net.vn/vi/ct/96-cam-nang-di-du-lich-da-nang-tat-tan-tat-tu-a-z-vo-cung-re.html">Cẩm nang đi du lịch Đà Nẵng tất tần tật từ A -> Z vô cùng rẻ</a></li>
                    <li><i class="fa fa-arrow-right text-primary me-2"></i><a href="https://vietnamtravel.net.vn/vi/ct/95-cam-nang-du-lich-thai-lan-nhung-dieu-ban-can-biet.html">Cẩm nang du lịch Thái Lan – Những điều bạn cần biết</a></li>
                    <li><i class="fa fa-arrow-right text-primary me-2"></i><a href="https://vietnamtravel.net.vn/vi/ct/94-cam-nang-du-lich-bhutan-nhung-dieu-quan-trong-nhat-dinh-phai-biet.html">Cẩm nang du lịch Bhutan – Những điều quan trọng nhất định phải biết</a></li>
                    <li><i class="fa fa-arrow-right text-primary me-2"></i><a href="https://vietnamtravel.net.vn/vi/ct/93-cam-nang-cho-chuyen-du-lich-phu-quoc-hon-dao-thien-duong-giua-long-bien-xanh.html">Cẩm nang cho chuyến du lịch Phú Quốc - Hòn đảo thiên đường giữa lòng biển xanh</a></li>
                    <li><i class="fa fa-arrow-right text-primary me-2"></i><a href="https://vietnamtravel.net.vn/vi/ct/92-net-doc-dao-cua-lang-chai-ca-trich-phu-quoc.html">Nét độc đáo của làng chài cá trích, Phú Quốc</a></li>
                    <li><i class="fa fa-arrow-right text-primary me-2"></i><a href="https://vietnamtravel.net.vn/vi/ct/91-kham-pha-thien-nhien-tuoi-dep-o-go-gang-tp-vung-tau.html">Khám phá thiên nhiên tươi đẹp ở Gò Găng – TP. Vũng Tàu</a></li>
                </ul>
            </div>
            <br>
            <div class="w100 fl box-lst-tour-sidebar">   
                <div class="w100 fl tit-child-larg">
                    <h2>Tour Liên Quan</h2>
                </div>
                <hr>
                <div class="clear"></div>
                <ul class="ul-lst-t-right">
                    <li>
                        <div class="wow zoomIn" data-wow-delay="0.1s">
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{asset('frontend/img/package-1.jpg')}}" alt="">
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>Đảo Wibu</small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>3 ngày</small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-users text-primary me-2"></i>10 người</small>
                                     
                                </div>
                                <div class="d-flex border-bottom">
                                  <small class="flex-fill text-center border-end py-2"><i class="fa fa-bell text-primary me-2"></i>Khuyến mãi 200K cho nhóm khách 5 người trở lên</small>
                                 
                                   
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
                                    <p>Tour Hot nhất Hè 2024 Nhật Bản - Đảo Wibu (Xứ sở dành cho wibu)</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="{{route('chi-tiet-tour',['du-lich-dao-wibu-̀53654.html'])}}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Chi tiết</a>
                                        <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Đặt ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="wow zoomIn" data-wow-delay="0.1s">
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{asset('frontend/img/package-1.jpg')}}" alt="">
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>Đảo Wibu</small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>3 ngày</small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-users text-primary me-2"></i>10 người</small>
                                     
                                </div>
                                <div class="d-flex border-bottom">
                                  <small class="flex-fill text-center border-end py-2"><i class="fa fa-bell text-primary me-2"></i>Khuyến mãi 200K cho nhóm khách 5 người trở lên</small>
                                 
                                   
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
                                    <p>Tour Hot nhất Hè 2024 Nhật Bản - Đảo Wibu (Xứ sở dành cho wibu)</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="{{route('chi-tiet-tour',['du-lich-dao-wibu-̀53654.html'])}}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Chi tiết</a>
                                        <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Đặt ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="wow zoomIn" data-wow-delay="0.1s">
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{asset('frontend/img/package-1.jpg')}}" alt="">
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>Đảo Wibu</small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>3 ngày</small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-users text-primary me-2"></i>10 người</small>
                                     
                                </div>
                                <div class="d-flex border-bottom">
                                  <small class="flex-fill text-center border-end py-2"><i class="fa fa-bell text-primary me-2"></i>Khuyến mãi 200K cho nhóm khách 5 người trở lên</small>
                                 
                                   
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
                                    <p>Tour Hot nhất Hè 2024 Nhật Bản - Đảo Wibu (Xứ sở dành cho wibu)</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="{{route('chi-tiet-tour',['du-lich-dao-wibu-̀53654.html'])}}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Chi tiết</a>
                                        <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Đặt ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="wow zoomIn" data-wow-delay="0.1s">
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{asset('frontend/img/package-1.jpg')}}" alt="">
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>Đảo Wibu</small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>3 ngày</small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-users text-primary me-2"></i>10 người</small>
                                     
                                </div>
                                <div class="d-flex border-bottom">
                                  <small class="flex-fill text-center border-end py-2"><i class="fa fa-bell text-primary me-2"></i>Khuyến mãi 200K cho nhóm khách 5 người trở lên</small>
                                 
                                   
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
                                    <p>Tour Hot nhất Hè 2024 Nhật Bản - Đảo Wibu (Xứ sở dành cho wibu)</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="{{route('chi-tiet-tour',['du-lich-dao-wibu-̀53654.html'])}}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Chi tiết</a>
                                        <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Đặt ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Column Right End -->
    </div>
</div>    


{{-- script chuyển tab-content  --}}
<script>
   document.addEventListener('DOMContentLoaded', function() {
       // Tìm tất cả các tab trigger
       var tabTriggerList = document.querySelectorAll('.nav-tabs .nav-link');

       // Xử lý sự kiện khi click vào mỗi tab
       tabTriggerList.forEach(function(tabTrigger) {
           tabTrigger.addEventListener('click', function(e) {
               e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ a

               // Lấy href của tab được click
               var target = tabTrigger.getAttribute('href');

               // Xóa class 'active' khỏi tất cả các tab
               tabTriggerList.forEach(function(trigger) {
                   trigger.classList.remove('active');
               });

               // Thêm class 'active' cho tab hiện tại
               tabTrigger.classList.add('active');

               // Ẩn tất cả các tab pane
               var tabPanes = document.querySelectorAll('.tab-pane');
               tabPanes.forEach(function(pane) {
                   pane.classList.remove('show', 'active');
               });

               // Hiển thị tab pane tương ứng với tab được click
               var tabPane = document.querySelector(target);
               tabPane.classList.add('show', 'active');
           });
       });
   });
</script>
{{-- Chọn sao --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star');
        const starRatingInput = document.getElementById('star-rating');

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const value = this.getAttribute('data-value');
                starRatingInput.value = value;
                updateStars(value);
            });

            star.addEventListener('mouseover', function () {
                const value = this.getAttribute('data-value');
                highlightStars(value);
            });

            star.addEventListener('mouseout', function () {
                const value = starRatingInput.value;
                updateStars(value);
            });
        });

        function updateStars(value) {
            stars.forEach(star => {
                if (star.getAttribute('data-value') <= value) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        }

        function highlightStars(value) {
            stars.forEach(star => {
                if (star.getAttribute('data-value') <= value) {
                    star.classList.add('hover');
                } else {
                    star.classList.remove('hover');
                }
            });
        }
    });
</script>




<style>
   .nav-tabs .nav-link2.active {
        background-color: #86B817 !important; /* Màu nền của tab khi được chọn */
        color: #fff !important; /* Màu chữ của tab khi được chọn */
        border-color: #2a3909 !important; /* Màu viền của tab khi được chọn */
    }
    .tit-service-attach{
        background-color: #86B817;
        border-radius:5px;
        padding: 5px;
        text-align: center;
        margin-bottom: 3px; 
        color: white;
    }
   .ul-lst-service-attach {
        list-style-type: none; /* Ẩn các dấu chấm */
        padding-left: 0; /* Xóa khoảng cách bên trái */
        margin-left: 2px;

    }
    .ul-lst-service-attach li {
        margin-bottom: 10px; /* Để lại khoảng cách giữa các mục trong danh sách */
    }
    .ul-lst-t-right {
        list-style-type: none; /* Ẩn các dấu chấm */
        padding: 0; /* Xóa khoảng cách mặc định */
        margin: 0; /* Xóa khoảng cách mặc định */
    }
    .ul-lst-article-bar {
        list-style-type: none; /* Ẩn các dấu chấm */
        padding: 0; /* Xóa khoảng cách mặc định */
        margin: 0; /* Xóa khoảng cách mặc định */
    }
    .payment_description {
        margin-top: 10px;
        padding: 10px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
    }
    .star {
        cursor: pointer;
        color: gray !important;
    }

    .star.selected,
    .star.hover {
        color: #86B817 !important;
    }
    .text-secondary {
        color: gray !important; /* Màu xám cho sao chưa chọn */
    
    }

</style>
@endsection
