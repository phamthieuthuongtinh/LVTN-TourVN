<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>AdminLTE 3 | Dashboard 3</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.2.6/css/froala_editor.pkgd.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/froala-editor@3.2.6/js/froala_editor.pkgd.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('layouts.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-1">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
    
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('backend/dist/js/demo.js')}}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/dist/js/pages/dashboard3.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}
<script>
  new FroalaEditor('#editor');
  new FroalaEditor('#editor1');
  new FroalaEditor('#editor2');
  new FroalaEditor('#editor3');
</script>



{{-- <script>
  CKEDITOR.replace('ckeditor1', {
      filebrowserUploadUrl: "{{ route('upload.image') }}",
      filebrowserUploadMethod: 'form',
      extraPlugins: 'uploadimage'
  });
</script> --}}
<script>
  $(document).ready(function() {
      $('#categorySelect').select2({
          placeholder: 'Chọn danh mục tour',
          allowClear: true
      });
  });
</script>
<script>
  $(document).ready(function() {
    
    $('#myTable').DataTable({
        "language": {
            
            "info": "Hiển thị từ _START_ đến _END_ của _TOTAL_ mục",
            "infoEmpty": "Hiển thị từ 0 đến 0 của 0 mục",
            "infoFiltered": "(được lọc từ _MAX_ tổng số mục)",
            "lengthMenu": "Hiển thị _MENU_ mục",
            "search": "Tìm kiếm:",
            "zeroRecords": "Không tìm thấy dữ liệu phù hợp"
        }
    });
    // let table = new DataTable('#myTable');
});

 
</script>

<script>
    function roundDownToThousands(value) {
            return Math.floor(value / 1000) * 1000;
        }

    document.getElementById('adultPrice').addEventListener('input', function() {
        var adultPrice = parseFloat(this.value) || 0;
        document.getElementById('childPrice').value = roundDownToThousands(adultPrice * 0.9);
        document.getElementById('toddlerPrice').value = roundDownToThousands(adultPrice * 0.9);
        document.getElementById('infantPrice').value = roundDownToThousands(adultPrice * 0.3);
    });
</script>
{{-- tính ngày --}}
{{-- <script>
  $( function() {
    $( "#departure_date" ).datepicker({
      format: 'dd-mm-yyyy', // Định dạng ngày
    });
    $( "#return_date" ).datepicker({
      format: 'dd-mm-yyyy', // Định dạng ngày
    });
  } );
</script> --}}
<script>
  function calculateDays() {
      var departureDateStr = document.getElementById('departure_date').value.trim();
      var returnDateStr = document.getElementById('return_date').value.trim();

      if (departureDateStr && returnDateStr) {
          // Chuyển đổi chuỗi thành đối tượng Date
          var departureDate = new Date(departureDateStr);
          var returnDate = new Date(returnDateStr);

          if (departureDate <= returnDate) {
              // Tính toán số ngày giữa hai ngày
              var timeDifference = returnDate.getTime() - departureDate.getTime();
              var dayDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));

              // Cập nhật giá trị của trường tour_time
              document.getElementById('tour_time').value = dayDifference + ' ngày ' + (dayDifference-1) + ' đêm';
          } else {
              // Hiển thị thông báo lỗi nếu ngày không hợp lệ
              document.getElementById('tour_time').value = 'Ngày đi phải trước ngày về';
          }
      } else {
          // Xóa giá trị nếu một trong hai ngày chưa được nhập
          document.getElementById('tour_time').value = '';
      }
  }

  // Gọi hàm calculateDays khi ngày thay đổi
  document.getElementById('departure_date').addEventListener('change', calculateDays);
  document.getElementById('return_date').addEventListener('change', calculateDays);

  // Gọi hàm calculateDays khi trang được tải
  window.onload = calculateDays;
</script>
<script>
 
  $('.btn-reply-comment').click(function() {
    
      var comment_id = $(this).data('comment_id');
      var comment = $('.reply_comment_' + comment_id).val();

      var comment_tour_id = $(this).data('tour_id');

 

      $.ajax({
        url: "{{route('comment.reply')}}",
        method: "POST",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          comment: comment,
          comment_id: comment_id,
          comment_tour_id: comment_tour_id
        },
        success: function(data) {
          $('.reply_comment_' + comment_id).val('');
          
          alert('Phản hồi thành công!');
          window.location.reload();
        }
      });

    })
</script>


{{-- Chuyển đổi trạng thái đã thanh toán <> chưa thanh toán và cập nhật số lượng người còn của tour --}}
<script type="text/javascript">
  $(document).ready(function() {
      $('.order_details').change(function() {
          var order_status = $(this).val();
          var form = $(this).closest('form');
          var order_id = form.find('input[name="order_id"]').val();
          var orderdetails_id = form.find('input[name="orderdetail_id"]').val();
          var _token = $('input[name="_token"]').val();

          $.ajax({
              url: "{{ route('orders.update_quantity') }}",
              method: 'POST',
              data: {
                  _token: _token,
                  order_status: order_status,
                  orderdetails_id: orderdetails_id,
                  order_id: order_id
              },
              success: function(data) {
                  alert("Cập nhật trạng thái thành công!");
                  location.reload();
              }
          });
      });
  });
</script>

{{-- Dashboard --}}
<script>
  $(document).ready(function() {
      // Dữ liệu từ controller
      var statistics = @json($statistics);

      var labels = [];
      var salesData = [];
      var profitData = [];

      statistics.forEach(function(item) {
          labels.push(item.month);
          salesData.push(item.total_sales);
          profitData.push(item.total_profit);
      });

      var salesChart = new Chart($('#salesChart'), {
          type: 'bar',
          data: {
              labels: labels,
              datasets: [
                  {
                      label: 'Tổng thu',
                      backgroundColor: '#007bff',
                      borderColor: '#007bff',
                      data: salesData
                  },
                  {
                      label: 'Lợi nhuận',
                      backgroundColor: '#ced4da',
                      borderColor: '#ced4da',
                      data: profitData
                  }
              ]
          },
          options: {
              maintainAspectRatio: false,
              tooltips: {
                  mode: 'index',
                  intersect: false
              },
              hover: {
                  mode: 'nearest',
                  intersect: true
              },
              legend: {
                  display: true
              },
              scales: {
                  yAxes: [{
                      gridLines: {
                          display: true,
                          lineWidth: '4px',
                          color: 'rgba(0, 0, 0, .2)',
                          zeroLineColor: 'transparent'
                      },
                      ticks: {
                          beginAtZero: true,
                          callback: function(value) {
                              if (value >= 1000) {
                                  value /= 1000;
                                  value += 'k';
                              }

                              return 'vnđ ' + value;
                          }
                      }
                  }],
                  xAxes: [{
                      display: true,
                      gridLines: {
                          display: false
                      },
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });


      function updateChartData(labels, salesData, profitData) {
          salesChart.data.labels = labels;
          salesChart.data.datasets[0].data = salesData;
          salesChart.data.datasets[1].data = profitData;
          salesChart.update();
      }

      function resetChart() {
            var defaultLabels = [];
            var defaultSalesData = [];
            var defaultProfitData = [];

            statistics.forEach(function(item) {
                defaultLabels.push(item.month);
                defaultSalesData.push(item.total_sales);
                defaultProfitData.push(item.total_profit);
            });

            updateChartData(defaultLabels, defaultSalesData, defaultProfitData);
        }

        // Xử lý sự kiện nhấn nút "Làm mới"
        $('#resetForm').on('click', function() {
            $('#dateFilterForm')[0].reset(); // Xóa dữ liệu trong form
            resetChart(); // Làm mới biểu đồ với dữ liệu mặc định
        });
      // Xử lý sự kiện thay đổi bộ lọc
      $('#dateFilterForm').on('submit', function(event) {
          event.preventDefault(); // Ngăn chặn gửi form theo cách truyền thống

          var startDate = $('#startDate').val();
          var business_id = $('#business_id').val();
          var endDate = $('#endDate').val();
          var _token = $('input[name="_token"]').val();

          if (startDate && endDate || business_id) {
              $.ajax({
                  url: "{{ route('dashboard.filter_dashboard') }}",
                  method: "POST",
                  dataType: "JSON",
                  data: {
                      startDate: startDate,
                      endDate: endDate,
                      business_id:business_id,
                      _token: _token
                  },
                  success: function(data) {
                      // Kiểm tra dữ liệu nhận được từ AJAX
                      console.log('Dữ liệu nhận được:', data);

                      // Cập nhật dữ liệu cho biểu đồ
                      updateChartData(data.labels, data.salesData, data.profitData);
                  },
                  error: function(xhr, status, error) {
                      console.error('Lỗi khi lấy dữ liệu:', status, error);
                  }
              });
          } else {
              alert('Vui lòng nhập thông tin cần lọc.');
          }
      });
      
  });
</script>


{{-- iput min=0 --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
  const inputs = document.querySelectorAll('input[type="number"]');
  
  inputs.forEach(input => {
      input.addEventListener('input', function() {
          if (this.value <script 0) {
              this.value = 0;
          }
      });
  });
  });
</script>
</body>
</html>
