<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student </title>
  <link rel="icon" type="image/x-icon" href="{{ asset ('assets/images/logo_student.jpg')}}">
  <link href="https://cdn.jsdelivr.net/npm/datatables-bootstrap@0.0.1/css/dataTables.bootstrap.min.css rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{ asset ('assets/plugins/fontawesome-free/css/all.min.css')}}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="{{ asset ('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

  <link rel="stylesheet" href="{{ asset ('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  
  <link rel="stylesheet" href="{{ asset ('assets/plugins/jqvmap/jqvmap.min.css')}}">
 
  <link rel="stylesheet" href="{{ asset ('assets/dist/css/adminlte.min.css ') }}">

  <link rel="stylesheet" href="{{ asset ('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  
  <link rel="stylesheet" href="{{ asset ('assets/plugins/daterangepicker/daterangepicker.css')}}">
 
  <link rel="stylesheet" href="{{ asset ('assets/plugins/summernote/summernote-bs4.min.css/')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Trang chủ</a>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto">
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
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <a href="{{('admin')}}" class="brand-link">
     
      <span class="brand-text font-weight-light">Online Quizz System</span>
    </a>
    <div class="sidebar">
     
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  
          <li class="nav-item ">
            <a href="{{url('student/dashboard')}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('student/exam')}}" class="nav-link ">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Bài thi
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('student/logout')}}" class="nav-link ">
              <i class="nav-icon fas fa-caret-square-left "></i>
              <p>
                Đăng xuất
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  </div>
  @yield('content')
</div>
<script src="{{ asset ('assets/plugins/jquery/jquery.min.js')}} "></script>
<script src="{{ asset ('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset ('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset ('assets/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset ('assets/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{ asset ('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset ('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{ asset ('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{ asset ('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset ('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset ('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset ('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ asset ('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{ asset ('assets/dist/js/adminlte.js')}}"></script>
<!-- <script src="{{ asset ('assets/dist/js/demo.js')}}"></script> -->
<script src="{{ asset ('assets/dist/js/pages/dashboard.js')}}"></script>
<script src="{{ asset ('assets/js/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-bootstrap@0.0.1/js/dataTables.bootstrap.min.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
    $('.datatable').dataTable();
  });
</script>
</body>
</html>
