<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Du lịch Việt</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('frontend/img/logo.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    
    <!-- Sweet alert-->
    <link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Đang tải vui lòng đợi...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>3/2, Cần Thơ, Việt Nam</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@email.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
              
               {{-- <img class="img-fluid" src="{{asset('frontend/img/logo.png')}}" alt=""><h1 class="text-primary m-0">Du Lịch Việt</h1> --}}
               <div class="d-inline-block align-middle">
                  <img class="img-fluid" style="margin-right: 10px;" src="{{asset('frontend/img/logo.png')}}" alt="">
                  <h2 class="text-primary m-0 d-inline-block align-middle">Du Lịch Việt</h2>
              </div>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route('homeweb')}}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Trang chủ</a>
                    
                    @foreach ($categories as $cate)
                    @if ($cate->category_parent == 0)
                        <div class="nav-item dropdown {{ request()->is('tour/' . $cate->slug) ? 'active' : '' }}">
                            <a href="{{ route('tour', [$cate->slug]) }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                {{ $cate->title }}
                            </a>
                            <div class="dropdown-menu m-0" style="max-height: 200px; overflow-y: auto; overflow-x: hidden;">
                                @foreach ($categories as $sub_cate)
                                    @if ($sub_cate->category_parent == $cate->id)
                                        <a href="{{ route('tour', [$sub_cate->slug]) }}" class="dropdown-item">
                                            <i class="fa fa-map-marker"></i> {{ $sub_cate->title }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
                

                    {{-- <a href="about.html" class="nav-item nav-link">Về chúng tôi</a>
                    <a href="service.html" class="nav-item nav-link">Dịch vụ</a> --}}
                    <a href="package.html" class="nav-item nav-link">Gói tour</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Trang</a>
                        <div class="dropdown-menu m-0">
                            <a href="destination.html" class="dropdown-item">Điểm đến</a>
                            <a href="booking.html" class="dropdown-item">Đặt tour</a>
                            <a href="team.html" class="dropdown-item">Hướng dẫn viên</a>
                            <a href="destination.html" class="dropdown-item">Về chúng tôi</a>
                            <a href="destination.html" class="dropdown-item">Dịch vụ</a>
                            {{-- <a href="testimonial.html" class="dropdown-item">Testimonial</a> --}}
                            <a href="404.html" class="dropdown-item">404</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
                    @if(Session::has('customer_id'))
                   
                    <a href="package.html" class="nav-item nav-link">
                        <i class="fas fa-cart-plus"></i> 
                       
                    </a>
                    
                    <div class="nav-item dropdown" style="margin-right: 40px !important;">
                        <a href="#" class="nav-link dropdown-toggle pb-0 pt-3" data-bs-toggle="dropdown"><img src="{{asset('frontend/img/user.png')}}" alt="Avatar" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover;"></a>
                        <div class="dropdown-menu m-0">
                            <a class="dropdown-item" href="{{ route('customers.infor') }}">Trang cá nhân</a>
                            <a class="dropdown-item" href="{{route('customers.logout')}}">Tour đã đặt</a>
                            <a class="dropdown-item" href="{{ route('customers.logout') }}" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>

                            <form id="logout-form" action="{{ route('customers.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    
                        
                        
                    
                    @endif
                    
                </div>
                @if(!Session::has('customer_id'))
                    <a href="{{ route('login-reg') }}" class="btn btn-primary rounded-pill py-2 px-4">Đăng ký / Đăng nhập</a>
                @endif

                
             
            </div>
        </nav>
        {{-- <div class="position-relative">
     
            <!-- Carousel Start -->
            <div class="header-carousel owl-carousel position-relative z-index-1">
                <div class="header-carousel-item">
                    <img src="{{asset('frontend/images/bg-hero.jpg')}}" class="img-fluid w-100" alt="Image">
                    <div class="carousel-caption">
                        <div class="container align-items-center py-4">
                            <div class="row g-5 align-items-center">
                                <div class="col-xl-7 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;">
                                    <div class="text-start">
                                        <h4 class="text-primary text-uppercase fw-bold mb-4">Chào mừng đến với Du lịch Việt</h4>
                                        <h5 class=" text-white mb-4">Bla BLa</h5>
                                        <p class="mb-4 fs-5">bla bla ... </p>
                                        <div class="d-flex flex-shrink-0">
                                            <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="#">Chi tiết</a>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-5 fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                </div> 
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="header-carousel-item">
                    <img src="{{asset('frontend/images/bg-1.jpg')}}" class="img-fluid w-100" alt="Image">
                    <div class="carousel-caption">
                        <div class="container py-4">
                            <div class="row g-5 align-items-center">
                                <div class="col-xl-7 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;">
                                    <div class="text-start">
                                        <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome To WaterLand</h4>
                                        <h5 class="text-white mb-4">The Greatest Water and Amusement Park</h5>
                                        <p class="mb-4 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy... 
                                        </p>
                                        <div class="d-flex flex-shrink-0">
                                            <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="#">Our Packages</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel End -->
            <div  class="container-fluid booking-2 pb-5 wow fadeInUp mt-5 position-absolute top-0 start-50 translate-middle-x z-index-2" data-wow-delay="0.1s">
                <div class="container">
                    <div class="bg-white shadow" style="padding: 17px; border-radius: 50rem !important;">
                        <div class="row g-2">
                            <div class="col-md-10">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <div class="date" id="date1" data-target-input="nearest">
                                            <input style="border-radius: 50rem 0 0 50rem !important;" type="text" class="form-control datetimepicker-input"
                                                placeholder="Ngày đi" data-target="#date1" data-toggle="datetimepicker" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="date" id="date2" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" placeholder="Ngày về" data-target="#date2" data-toggle="datetimepicker"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select">
                                            <option selected>Người lớn</option>
                                            <option value="1">Trẻ em</option>
                                        
                                        </select>
                                    </div>
                                    <div  class="col-md-3">
                                        
                                        <select  class="form-select">
                                            <option selected>1 người</option>
                                            <option value="1">2 người</option>
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div  class="col-md-2">
                                <button style="border-radius: 0 50rem 50rem 0 !important;" class="btn btn-primary w-100">Xem giá</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
     
            <div class="position-relative">
                
                       <!-- Carousel Start -->
                       <div class="header-carousel owl-carousel position-relative z-index-1">
                        @foreach ( $banners as $key=>$ban )
                            
                        
                           <div class="header-carousel-item">
                               <img src="{{asset('upload/banners/'.$ban->banner_image)}}" class="img-fluid w-100" alt="Image">
                               <div class="carousel-caption">
                                   <div class="container align-items-center py-4">
                                       <div class="row g-5 align-items-center">
                                           <div class="col-xl-7 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;">
                                               <div class="text-start">
                                                   <h4 class="text-primary text-uppercase fw-bold mb-4">{{$ban->banner_title}}</h4>
                                                   <h5 class="text-white mb-4">{{$ban->banner_content}}</h5>
                                                   <p class="mb-4 fs-5"></p>
                                                   <div class="d-flex flex-shrink-0">
                                                       <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="#">Chi tiết</a>
                                                   </div>
                                               </div>
                                               
                                           </div>
                                           <div class="col-xl-5 fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                           </div> 
                                       </div>
                                   </div>
                                   
                               </div>
                               
                           </div>
                           
                           @endforeach
                       </div>
                       <!-- Carousel End -->
                       <div class="booking-container">
                           <div class="container-fluid booking-2 pb-5 wow fadeInUp position-relative start-50 translate-middle-x z-index-2" data-wow-delay="0.1s">
                               <div class="container">
                                   <div class="bg-white shadow" style="padding: 17px; border-radius: 30px !important;">
                                       <div class="row g-2">
                                           <div class="col-md-10">
                                               <div class="row g-2">
                                                   <div class="col-md-3">
                                                       <div class="date" id="date1" data-target-input="nearest">
                                                           <input style="border-radius: 50rem 0 0 50rem !important;" type="text" class="form-control datetimepicker-input"
                                                               placeholder="Ngày đi" data-target="#date1" data-toggle="datetimepicker" />
                                                       </div>
                                                   </div>
                                                   <div class="col-md-3">
                                                       <div class="date" id="date2" data-target-input="nearest">
                                                           <input type="text" class="form-control datetimepicker-input" placeholder="Ngày về" data-target="#date2" data-toggle="datetimepicker"/>
                                                       </div>
                                                   </div>
                                                   <div class="col-md-3">
                                                       <select class="form-select">
                                                           <option selected>Người lớn</option>
                                                           <option value="1">Trẻ em</option>
                                                       
                                                       </select>
                                                   </div>
                                                   <div  class="col-md-3">
                                                       
                                                       <select  class="form-select">
                                                           <option selected>1 người</option>
                                                           <option value="1">2 người</option>
                                                   
                                                       </select>
                                                   </div>
                                               </div>
                                           </div>
                                           <div  class="col-md-2">
                                               <button style="border-radius: 0 50rem 50rem 0 !important;" class="btn btn-primary w-100">Xem giá</button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div> 
           
           
        
    </div>

    <div class="container-fluid pt-5 mt-3 ">

        @yield('content')
   
    
    </div>

    <!-- Team Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Hướng Dẫn Viên</h6>
                <h1 class="mb-5">Gặp Gỡ Các Hướng Dẫn Viên</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('frontend/img/team-3.jpg')}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Tính Phạm</h5>
                            <small>Đẹp zai, tốt bụng</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('frontend/img/team-3.jpg')}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Tính Phạm</h5>
                            <small>Đẹp zai, tốt bụng</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('frontend/img/team-3.jpg')}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Tính Phạm</h5>
                            <small>Đẹp zai, tốt bụng</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('frontend/img/team-3.jpg')}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Tính Phạm</h5>
                            <small>Đẹp zai, tốt bụng</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Team End -->

    <!-- Testimonial Start -->
    {{-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Phản Hồi</h6>
                <h1 class="mb-5">Khách Hàng Phản Hồi!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{asset('frontend/img/testimonial-1.jpg')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mb-0">Dịch vụ tuyệt vời !!!</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{asset('frontend/img/testimonial-2.jpg')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mt-2 mb-0">Dịch vụ tuyệt vời !!!</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{asset('frontend/img/testimonial-3.jpg')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mt-2 mb-0">Dịch vụ tuyệt vời !!!</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{asset('frontend/img/testimonial-4.jpg')}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mt-2 mb-0">Dịch vụ tuyệt vời !!!</p>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->


        
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Công ty</h4>
                    <a class="btn btn-link" href="">Về chúng tôi</a>
                    <a class="btn btn-link" href="">Liên hệ</a>
                    <a class="btn btn-link" href="">Chính sách bảo mật</a>
                    <a class="btn btn-link" href="">Điều khoản & Điều kiện</a>
                    <a class="btn btn-link" href="">Hỏi đáp & Hỗ trợ</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Liên hệ</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>3/2, Cần Thơ University, Cần Thơ</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0123 124 145</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Thư viện</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('frontend/img/package-1.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('frontend/img/package-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('frontend/img/package-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('frontend/img/package-1.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('frontend/img/package-1.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('frontend/img/package-1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Đăng ký</h4>
                    <p>Hãy nhập Email bên dưới.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Email của bạn">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Du lịch Việt</a>, Đã đăng ký bản quyền.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Thiết kế bởi Admin<a class="border-bottom" href="#"></a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="{{route('homeweb')}}">Trang chủ</a>
                            <a href="#">Cookies</a>
                            <a href="#">Hỗ trợ</a>
                            <a href="#">Hỏi đáp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    {{-- <script src="lib/owlcarousel/owl.carousel.min.js"></script> --}}
 

    <!-- Template Javascript -->
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/sweetalert.js')}}"></script>
    <script>
        function filterDropdown() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            div = document.getElementsByClassName('dropdown-menu')[0];
            a = div.getElementsByTagName('a');
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = '';
                } else {
                    a[i].style.display = 'none';
                }
            }
        }
    </script>
    <script type="text/javascript">
        $(function () {
            $('#date1').datetimepicker({
                format: 'DD/MM/YYYY', // Định dạng ngày tháng: ngày/tháng/năm
                locale: 'vi' // Ngôn ngữ: tiếng Việt
            });
            $('#date2').datetimepicker({
                format: 'DD/MM/YYYY', // Định dạng ngày tháng: ngày/tháng/năm
                locale: 'vi' // Ngôn ngữ: tiếng Việt
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Gán sự kiện click cho phần tử "back-to-top"
            $(".back-to-top").click(function(e) {
                e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
                $("html, body").scrollTop(0,duration); // Cuộn mượt mà
                
            });
        });
    </script>

    {{-- // Send order --}}
    <script type="text/javascript">
        $(document).ready(function() {
            var selectedPayment = 'COD'; // Giá trị mặc định
        
            // Bắt sự kiện thay đổi trên các radio button
            $('.payment-option').change(function() {
                selectedPayment = $(this).val();
            });
        
            $('.send_order').click(function() {
                if (!$('.customer_id').val()) {
                    alert('Bạn chưa đăng nhập tài khoản, hãy đăng nhập tài khoản để đặt tour!');
                    window.location.href = "{{ route('login-reg') }}"; // Đường dẫn đến trang đăng nhập
                    return;
                }
                swal({
                        title: "Xác nhận đặt tour? ",
                        text: "Tour của bạn sẽ không được chỉnh sửa!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-success",
                        cancelButtonClass: "btn-danger",
                        confirmButtonText: "Cảm ơn, đặt tour!",
                        cancelButtonText: "Không, hủy đặt tour!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            var tour_id = $('.tour_id').val();
                            var name = $('.name').val();
                            var email = $('.email').val();
                            var phone = $('.phone').val();
                            var note = $('.note').val();
                            var address = $('.address').val();
                            var nguoi_lon = $('.nguoi_lon').val();
                            var tre_em = $('.tre_em').val();
                            var tre_nho = $('.tre_nho').val();
                            var so_sinh = $('.so_sinh').val();
                            var voucher = $('.voucher').val();
                            var departure_date = $('.departure_date').val();
                            var _token = $('input[name="_token"]').val();
                            var url = '';
                            var data = {
                                tour_id: tour_id,
                                name: name,
                                email: email,
                                phone: phone,
                                note: note,
                                address: address,
                                nguoi_lon: nguoi_lon,
                                tre_em: tre_em,
                                tre_nho: tre_nho,
                                so_sinh: so_sinh,
                                voucher: voucher,
                                departure_date: departure_date,
                                payment_method: selectedPayment,
                                _token: _token
                            };
                            if (selectedPayment === 'COD' || selectedPayment === 'BANK') {
                                $.ajax({
                                    url: "{{ route('orders.confirm') }}",
                                    method: 'POST',
                                    data: data,
                                    success: function() {
                                        swal("Đặt hàng", "Đặt tour thành công", "success");
                                    }
                                });
                                window.setTimeout(function() {
                                    location.reload();
                                }, 3000);
                            } else if (selectedPayment === 'VNPAY') {
                                $.ajax({
                                url: "{{ route('methods.vnpay') }}",
                                method: 'POST',
                                data: data,
                                success: function(response) {
                                    if (response.data) {
                                        window.location.href = response.data;
                                    } else {
                                        swal("Lỗi", "Không thể chuyển hướng đến VNPAY", "error");
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error: " + error);
                                    swal("Lỗi", "Có lỗi xảy ra khi xử lý yêu cầu thanh toán.", "error");
                                }
                            });
                               
                            } else if (selectedPayment === 'ZALOPAY') {
                                $.ajax({
                                url: "{{ route('methods.zalopay') }}",
                                method: 'POST',
                                data: data,
                                success: function(response) {
                                    if (response.data) {
                                        window.location.href = response.data;
                                    } else {
                                        swal("Lỗi", "Không thể chuyển hướng đến VNPAY", "error");
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error: " + error);
                                    swal("Lỗi", "Có lỗi xảy ra khi xử lý yêu cầu thanh toán.", "error");
                                }
                            });
                            } else if (selectedPayment === 'MOMO') {
                                $.ajax({
                                url: "{{ route('methods.momo') }}",
                                method: 'POST',
                                data: data,
                                success: function(response) {
                                    if (response.data) {
                                        window.location.href = response.data;
                                    } else {
                                        swal("Lỗi", "Không thể chuyển hướng đến VNPAY", "error");
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error: " + error);
                                    swal("Lỗi", "Có lỗi xảy ra khi xử lý yêu cầu thanh toán.", "error");
                                }
                            });
                            } else if (selectedPayment === 'VIETTEL') {
                                $.ajax({
                                url: "{{ route('methods.viettel') }}",
                                method: 'POST',
                                data: data,
                                success: function(response) {
                                    if (response.data) {
                                        window.location.href = response.data;
                                    } else {
                                        swal("Lỗi", "Không thể chuyển hướng đến VNPAY", "error");
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error: " + error);
                                    swal("Lỗi", "Có lỗi xảy ra khi xử lý yêu cầu thanh toán.", "error");
                                }
                            });
                            } else {
                                swal("Lỗi", "Phương thức thanh toán không hợp lệ", "error");
                            }
                        } else {
                            swal("Hủy", "Đã hủy", "error");
                        }
                    }
                );
            });
        });
    </script>
        
{{-- Tính tiền --}}
<script>
    var appliedVoucher = @json(Session::get('voucher')) || null; // Lưu thông tin voucher vào biến toàn cục từ server
    if(isset(nearestDeparture)){
        var maxQuantity = $nearestDeparture->quantity 
    }else{
        var maxQuantity ='null';
    }
    
    
    function calculateTotal() {
        var adultPrice = parseFloat(document.getElementById('nguoi_lon').dataset.price) || 0;
        var childPrice = parseFloat(document.getElementById('tre_em').dataset.price) || 0;
        var toddlerPrice = parseFloat(document.getElementById('tre_nho').dataset.price) || 0;
        var infantPrice = parseFloat(document.getElementById('so_sinh').dataset.price) || 0;

        var numAdults = parseInt(document.getElementById('nguoi_lon').value) || 0;
        var numChildren = parseInt(document.getElementById('tre_em').value) || 0;
        var numToddlers = parseInt(document.getElementById('tre_nho').value) || 0;
        var numInfants = parseInt(document.getElementById('so_sinh').value) || 0;

        var totalPeople = numAdults + numChildren + numToddlers + numInfants;
        if (maxQuantity !== null && totalPeople > maxQuantity) {
            alert('Số lượng người vượt quá số chỗ còn lại!');
            // Đặt lại giá trị về giới hạn
            if (totalPeople - maxQuantity > 0) {
                var excessPeople = totalPeople - maxQuantity;
                if (document.activeElement.id === 'nguoi_lon') {
                    document.getElementById('nguoi_lon').value = numAdults - excessPeople;
                } else if (document.activeElement.id === 'tre_em') {
                    document.getElementById('tre_em').value = numChildren - excessPeople;
                } else if (document.activeElement.id === 'tre_nho') {
                    document.getElementById('tre_nho').value = numToddlers - excessPeople;
                } else if (document.activeElement.id === 'so_sinh') {
                    document.getElementById('so_sinh').value = numInfants - excessPeople;
                }
            }
            return;
        }
        var totalPrice = (numAdults * adultPrice) + (numChildren * childPrice) + (numToddlers * toddlerPrice) + (numInfants * infantPrice);

        // Hiển thị tổng giá ban đầu
        document.getElementById('initialPrice').textContent = 'Tổng giá ban đầu: ' + totalPrice.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });

        // Tính giá giảm
        var discountAmount = 0;
        if (appliedVoucher) {
            if (appliedVoucher.voucher_condition === 0) {
                // Giảm giá theo phần trăm
                discountAmount = totalPrice * appliedVoucher.voucher_number / 100;
            } else if (appliedVoucher.voucher_condition === 1) {
                // Giảm giá theo số tiền cụ thể
                discountAmount = appliedVoucher.voucher_number;
            }
        }

        // Áp dụng giảm giá
        var finalPrice = totalPrice - discountAmount;

        // Hiển thị giá giảm
        document.getElementById('discountAmount').textContent = 'Giá giảm: ' + discountAmount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });

        // Hiển thị tổng giá sau giảm
        document.getElementById('totalPrice').textContent = 'Tổng giá sau giảm: ' + finalPrice.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    }

    // Lắng nghe sự kiện thay đổi của số lượng người
    document.getElementById('nguoi_lon').addEventListener('input', calculateTotal);
    document.getElementById('tre_em').addEventListener('input', calculateTotal);
    document.getElementById('tre_nho').addEventListener('input', calculateTotal);
    document.getElementById('so_sinh').addEventListener('input', calculateTotal);

    // Tính toán giá trị ban đầu khi trang được tải
    calculateTotal();
</script>
{{-- Tính tiền 1--}}


{{-- Check voucher --}}
<script>
    $(document).ready(function() {
        $('.applyVoucher').click(function(event) {
            event.preventDefault(); // Ngăn hành động mặc định của nút
            var voucherCode = $('.voucher').val();
            var _token = $('input[name="_token"]').val(); // Đảm bảo rằng có một trường ẩn với tên _token trong form

            $.ajax({
                url: "{{ route('vouchers.check') }}",
                method: 'POST',
                data: {
                    voucher_code: voucherCode,
                    _token: _token
                },
                success: function(response) {
                    // Xử lý thành công
                    console.log(response.message); // Kiểm tra dữ liệu trả về từ server
                    alert('Thêm mã voucher thành công!');
                    // Lưu thông tin voucher vào biến toàn cục
                    appliedVoucher = response.voucher;
                    console.log('Voucher:', appliedVoucher);
                    // Tính toán lại tổng số tiền
                    calculateTotal();
                },
                error: function(xhr) {
                    // Xử lý lỗi
                    console.log(xhr.responseText);
                    alert('Mã voucher không đúng');
                }
            });
        });
    });
</script>

{{-- Đánh giá --}}
<script>
  $('.send-comment').click(function() {
                var customerId = $('#customer_id').val();
                if (customerId==0) {
                     alert('Bạn hãy đăng nhập để bình luận');
                     window.location.href = "{{route('login-reg')}}";
                }else{
                    var comment_tour_id = $('.comment_tour_id').val();
                    var customer_id = $('.customer_id').val();
                    var comment_name = $('.comment_name').val();
                    var comment_content = $('.comment_content').val();
                    var star_rating = $('#star-rating').val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({

                        url: "{{route('comment.store')}}",
                        method: "POST",
                        data: {
                            comment_tour_id: comment_tour_id,
                            customer_id:customer_id,
                            comment_name: comment_name,
                            star_rating:star_rating,
                            comment_content: comment_content,
                            _token: _token
                        },
                        success: function(data) {

                            // $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, chờ được duyệt!</span>');
                            // load_comment();
                            // $('#notify_comment').fadeOut(9000);
                            $('.comment_name').val('');
                            $('.comment_content').val('');
                            $('#star-rating').val('0'); // Đặt lại giá trị rating về 0

                            // Đặt lại màu sắc của các sao về màu xám
                            const stars = document.querySelectorAll(".star");
                            stars.forEach(star => {
                                star.classList.remove("selected");
                            });
                            
                            alert('Gửi đánh giá thành công! Bình luận của bạn sẽ sớm được duyệt và phản hồi');
                            window.setTimeout(function() {
                                location.reload();
                            }, 100);
                        }
                        
                    });
                 } 
            });
</script>
{{-- Hiển thị mô tả phương thức thanh toán --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const paymentOptions = document.querySelectorAll('input.payment-option');
        paymentOptions.forEach(option => {
            option.addEventListener('change', function() {
                const paymentDescriptions = document.querySelectorAll('.payment_description');
                paymentDescriptions.forEach(desc => {
                    desc.style.display = 'none';
                });

                const selectedDescription = this.parentElement.querySelector('.payment_description');
                if (selectedDescription) {
                    selectedDescription.style.display = 'block';
                }
            });
        });
    });
</script>


{{-- iput min=0 --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('input[type="number"]');
    
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            if (this.value < 0) {
                this.value = 0;
            }
        });
    });
});

</script>

<style>
    .booking-2 {
        position: relative; /* Đặt vị trí tương đối */
        z-index: 2; /* Thiết lập z-index cao hơn để nằm trên carousel */
    }

    .header-carousel {
        position: relative; /* Đặt vị trí tương đối */
        z-index: 1; /* Thiết lập z-index thấp hơn để nằm dưới booking */
    }
    .payment_description {
        margin-top: 10px;
        padding: 10px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
    }


</style>

 
</body>

</html>