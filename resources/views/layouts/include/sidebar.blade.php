<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('home')}}" class="brand-link">
  <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">Trang Quản Trị</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
           <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
     </div>
     <!-- SidebarSearch Form -->
     <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
           <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
           <div class="input-group-append">
              <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
              </button>
           </div>
        </div>
     </div>
     <!-- Sidebar Menu -->
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          @if(Auth::user()->id==1)
           <li class="nav-item {{Request::segment(1)=='dashboard' ? 'menu-is-opening menu-open' : ''}}">
              <a href="{{route('home')}}" class="nav-link">
                 <i class="nav-icon fas fa-tachometer-alt"></i>
                 <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('dashboard.show_dashboard')}}" class="nav-link">
                       <i class="fa-solid fa-chart-column"></i>
                       <p>Thống kê</p>
                    </a>
                 </li>
              </ul>
           </li>
           <li class="nav-item {{Request::segment(1)=='users' ? 'menu-is-opening menu-open' : ''}}">
            <a href="{{route('home')}}" class="nav-link">
               <i class="nav-icon fas fa-users"></i>
               <p>
                  Người dùng
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('admin.business_manage')}}" class="nav-link">
                     <i class="fa-solid fa-building"></i>
                     <p>Doanh nghiệp</p>
                  </a>
               </li>
            </ul>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('admin.customer_manage')}}" class="nav-link">
                     <i class="fa-solid fa-user"></i>
                     <p>Khách hàng</p>
                  </a>
               </li>
            </ul>
         </li>
           <li class="nav-item {{Request::segment(1)=='categories' ? 'menu-is-opening menu-open' : ''}}">
              <a href="{{route('categories.index')}}" class="nav-link">
                 <i class="nav-icon fas fa-folder-open"></i>
                 <p>
                    Danh Mục Địa Lý
                    <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('categories.create')}}" class="nav-link">
                       <i class="fa-solid fa-plus"></i>
                       <p>Thêm Danh Mục</p>
                    </a>
                 </li>
              </ul>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link">
                       <i class="fa-regular fa-rectangle-list"></i>
                       <p>Tất Cả Danh Mục</p>
                    </a>
                 </li>
              </ul>
           </li>
           <li class="nav-item {{Request::segment(1)=='types' ? 'menu-is-opening menu-open' : ''}}">
            <a href="{{route('types.index')}}" class="nav-link">
               <i class="nav-icon fas fa-folder-open"></i>
               <p>
                  Danh Mục Loại
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('types.create')}}" class="nav-link">
                     <i class="fa-solid fa-plus"></i>
                     <p>Thêm Danh Mục</p>
                  </a>
               </li>
            </ul>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('types.index')}}" class="nav-link">
                     <i class="fa-regular fa-rectangle-list"></i>
                     <p>Tất Cả Danh Mục</p>
                  </a>
               </li>
            </ul>
         </li>
           <li class="nav-item {{Request::segment(1)=='tours' ? 'menu-is-opening menu-open' : ''}}">
              <a href="{{route('tours.admin_index_tour')}}" class="nav-link">
                 <i class="fa-solid fa-plane-departure"></i>
                 <p>
                    Tour
                    <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('tours.admin_index_tour')}}" class="nav-link">
                       <i class="fa-regular fa-rectangle-list"></i>
                       <p>Quản lý tour</p>
                    </a>
                 </li>
              </ul>
              {{-- <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('tours.create')}}" class="nav-link">
                       <i class="fa-solid fa-plus"></i>
                       <p>Thêm Tour</p>
                    </a>
                 </li>
              </ul>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('tours.departure')}}" class="nav-link">
                       <i class="fa-solid fa-calendar-days"></i>
                       <p>Ngày khởi hành</p>
                    </a>
                 </li>
              </ul>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('tours.itinerary')}}" class="nav-link">
                       <i class="fa-solid fa-clipboard-list"></i>
                       <p>Lịch trình</p>
                    </a>
                 </li>
              </ul>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('tours.service')}}" class="nav-link">
                       <i class="fa-solid fa-pen"></i>
                       <p>Quản lý dịch vụ</p>
                    </a>
                 </li>
              </ul> --}}
           </li>
           <li class="nav-item {{Request::segment(1)=='banners' ? 'menu-is-opening menu-open' : ''}}">
              <a href="{{route('banners.index')}}" class="nav-link">
                 <i class="nav-icon fas fa-solid fa-sliders"></i>
                 <p>
                    Banner
                    <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('banners.create')}}" class="nav-link">
                       <i class="fa-solid fa-plus"></i>
                       <p>Thêm Banner</p>
                    </a>
                 </li>
              </ul>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('banners.index')}}" class="nav-link">
                       <i class="fa-regular fa-rectangle-list"></i>
                       <p>Tất Cả Banner</p>
                    </a>
                 </li>
              </ul>
           </li>
           <li class="nav-item {{Request::segment(1)=='comment' ? 'menu-is-opening menu-open' : ''}}">
              <a href="{{route('comment.index')}}" class="nav-link">
                 <i class="nav-icon fas fa-solid fa-comments"></i>
                 <p>
                    Đánh giá
                    <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('comment.index')}}" class="nav-link">
                       <i class="fa-solid fa-check"></i>
                       <p>Duyệt đánh giá</p>
                    </a>
                 </li>
              </ul>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('comment.create')}}" class="nav-link">
                       <i class="fa-solid fa-comment-dots"></i>
                       <p>Phản hồi đánh giá</p>
                    </a>
                 </li>
              </ul>
           </li>
           <li class="nav-item {{Request::segment(1)=='orders' ? 'menu-is-opening menu-open' : ''}}">
              <a href="{{route('orders.index')}}" class="nav-link">
                 <i class="fa-solid fa-person-walking-luggage"></i>
                 <p>
                    Đơn Đặt Tour
                    <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('orders.index')}}" class="nav-link">
                       <i class="fa-solid fa-ticket"></i>
                       <p>Danh sách đơn</p>
                    </a>
                 </li>
              </ul>
           </li>
           <li class="nav-item {{Request::segment(1)=='vouchers' ? 'menu-is-opening menu-open' : ''}}">
              <a href="{{route('vouchers.index')}}" class="nav-link">
                 <i class="fa-solid fa-money-bill"></i>
                 <p>
                    Voucher
                    <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('vouchers.create')}}" class="nav-link">
                       <i class="fa-solid fa-plus"></i>
                       <p>Thêm voucher</p>
                    </a>
                 </li>
              </ul>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('vouchers.index')}}" class="nav-link">
                       <i class="fa-regular fa-rectangle-list"></i>
                       <p>Danh sách voucher</p>
                    </a>
                 </li>
              </ul>
           </li>
           {{-- Sidebar của doanh nghiệp --}}
           @else{
            <li class="nav-item {{Request::segment(1)=='dashboard' ? 'menu-is-opening menu-open' : ''}}">
              <a href="{{route('home')}}" class="nav-link">
                 <i class="nav-icon fas fa-tachometer-alt"></i>
                 <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview pl-4">
                 <li class="nav-item">
                    <a href="{{route('dashboard.show_dashboard')}}" class="nav-link">
                       <i class="fa-solid fa-chart-column"></i>
                       <p>Thống kê</p>
                    </a>
                 </li>
              </ul>
           </li>
           <li class="nav-item {{Request::segment(1)=='tours' ? 'menu-is-opening menu-open' : ''}}">
            <a href="{{route('tours.index')}}" class="nav-link">
               <i class="fa-solid fa-plane-departure"></i>
               <p>
                  Tour
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('tours.index')}}" class="nav-link">
                     <i class="fa-regular fa-rectangle-list"></i>
                     <p>Tất Cả Tour</p>
                  </a>
               </li>
            </ul>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('tours.create')}}" class="nav-link">
                     <i class="fa-solid fa-plus"></i>
                     <p>Thêm Tour</p>
                  </a>
               </li>
            </ul>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('tours.departure')}}" class="nav-link">
                     <i class="fa-solid fa-calendar-days"></i>
                     <p>Ngày khởi hành</p>
                  </a>
               </li>
            </ul>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('tours.itinerary')}}" class="nav-link">
                     <i class="fa-solid fa-clipboard-list"></i>
                     <p>Lịch trình</p>
                  </a>
               </li>
            </ul>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('tours.service')}}" class="nav-link">
                     <i class="fa-solid fa-pen"></i>
                     <p>Quản lý dịch vụ</p>
                  </a>
               </li>
            </ul>
          </li>
          <li class="nav-item {{Request::segment(1)=='comment' ? 'menu-is-opening menu-open' : ''}}">
            <a href="{{route('comment.business_index')}}" class="nav-link">
               <i class="nav-icon fas fa-solid fa-comments"></i>
               <p>
                  Đánh giá
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('comment.business_index')}}" class="nav-link">
                     <i class="fa-solid fa-check"></i>
                     <p>Duyệt đánh giá</p>
                  </a>
               </li>
            </ul>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('comment.business_create')}}" class="nav-link">
                     <i class="fa-solid fa-comment-dots"></i>
                     <p>Phản hồi đánh giá</p>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item {{Request::segment(1)=='orders' ? 'menu-is-opening menu-open' : ''}}">
            <a href="{{route('orders.index')}}" class="nav-link">
               <i class="fa-solid fa-person-walking-luggage"></i>
               <p>
                  Đơn Đặt Tour
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('orders.business_index')}}" class="nav-link">
                     <i class="fa-solid fa-ticket"></i>
                     <p>Danh sách đơn</p>
                  </a>
               </li>
            </ul>
         </li>
         {{-- <li class="nav-item {{Request::segment(1)=='vouchers' ? 'menu-is-opening menu-open' : ''}}">
            <a href="{{route('vouchers.index')}}" class="nav-link">
               <i class="fa-solid fa-money-bill"></i>
               <p>
                  Voucher
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('vouchers.create')}}" class="nav-link">
                     <i class="fa-solid fa-plus"></i>
                     <p>Thêm voucher</p>
                  </a>
               </li>
            </ul>
            <ul class="nav nav-treeview pl-4">
               <li class="nav-item">
                  <a href="{{route('vouchers.index')}}" class="nav-link">
                     <i class="fa-regular fa-rectangle-list"></i>
                     <p>Danh sách voucher</p>
                  </a>
               </li>
            </ul>
         </li> --}}
           }
           @endif
           <br>
           <li class="nav-item li-break">
              <a href="{{route('banners.index')}}" class="nav-link">
                 <i class="fa-solid fa-circle-info"></i>
                 <p>
                    Thông tin tài khoản
                    <i class="right fas fa-angle-left"></i>
                 </p>
              </a>
              <ul class="nav nav-treeview">
                 <li class="nav-item">
                    <div style="padding-left:30px; color:white;">
                       <p>Công ty: {{Auth::user()->name}}</p>
                       <p>Email: {{Auth::user()->email}}</p>
                       <p>Địa chỉ: Trần Duy Hưng</p>
                       <p>Chức vụ: Chúa tể wibu</p>
                    </div>
                 </li>
              </ul>
           </li>
           <li class="nav-item">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
              </form>
              <a href="{{ route('logout') }}" class="nav-link" 
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 <i class="fa-solid fa-right-from-bracket"></i>
                 <p>Đăng xuất</p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
              </form>
           </li>
           
        </ul>
     </nav>
     <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<style>
  .li-break {
  padding: 10px 0;
  border-top: 1px solid #ccc;
  }
</style>