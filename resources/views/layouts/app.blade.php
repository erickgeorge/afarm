<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AFARM  | Home</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">


</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <?php use App\Models\crops_cropcategory;
          use App\Models\crops_crop; 
         $crops_ = crops_cropcategory::get(); ?>

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

          <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
              </li>
            </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <a href="{{ route('myprofile',[Auth::user()->id]) }}" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> My Profile
                    </a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-times mr-2"></i>     {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <div class="dropdown-divider"></div>


                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AFARM Logo" class="brand-image img-circle elevation-3" style="opacity: .8; background-color: whitesmoke;">
            <span class="brand-text font-weight-light">AFARM</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>




                    <li class="nav-item">
                        <a   href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                OFARM
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                                                       <li class="nav-item">
                                <a href="#" class="nav-link">
                                    &nbsp;&nbsp;  &nbsp; &nbsp;  <i class="ion ion-ios-people"></i>
                                    <p>
                                        Usajili
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('usajili')}}" class="nav-link">
                                            &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;<i class="far fa-dot-circle nav-icon"></i>
                                            <p>Pending</p>

                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('usajili_approved')}}" class="nav-link">
                                            &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;<i class="far fa-dot-circle nav-icon"></i>
                                            <p>Approved</p>

                                        </a>
                                    </li>
                                </ul>
                            </li>



                            <li class="nav-item">
                                <a href="{{route('mkulima')}}" class="nav-link">
                                    &nbsp;  &nbsp; &nbsp;<i class="far fa-user  nav-icon"></i>
                                    <p>Mkulima</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    &nbsp;  &nbsp; &nbsp;  <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Mazao
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @foreach($crops_ as $crops)
                                    <?php $cropscrop = crops_crop::where('crop_category_id', $crops->id)->get(); ?>
                                    <li class="nav-item">
                                        <a  class="nav-link">
                                            &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;<i class="far fa-dot-circle nav-icon"></i>
                                            <p>{{$crops->category_name}}</p>
                                            <i class="right fas fa-angle-left"></i>
                                        </a>

                                        <ul class="nav nav-treeview">
                                          @foreach($cropscrop as $cropss)
                                            <li class="nav-item">
                                                <a href="{{route('mazao', [$cropss->id])}}" class="nav-link">
                                                    &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;
                                                    <i class="nav-icon fas fa-tree"></i>
                                                    <p>{{$cropss->crop_name}}  </p>
                                                </a>
                                            </li>
                                          @endforeach

                                           
                                        </ul>
                                    </li>
                                    @endforeach

                                </ul>
                            </li>


                        </ul>
                    </li>



                    <li class="nav-item">
                        <a   href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                AFARM
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    &nbsp;&nbsp;  &nbsp; &nbsp;  <i class="ion ion-ios-people"></i>
                                    <p>
                                        Usajili
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('taarifa')}}" class="nav-link">
                                            &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;<i class="far fa-dot-circle nav-icon"></i>
                                            <p>Taarifa</p>

                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="pages/tables/nafaka.html" class="nav-link">
                                            &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;<i class="far fa-dot-circle nav-icon"></i>
                                            <p>Manunuzi</p>

                                        </a>
                                    </li>
                                </ul>
                            </li>



                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    &nbsp;&nbsp;  &nbsp; &nbsp;  <i class="ion ion-ios-people"></i>
                                    <p>
                                        Payment
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="mpesa.php" class="nav-link">
                                            &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;<i class="far fa-dot-circle nav-icon"></i>
                                            <p>MPesa</p>

                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="pages/tables/nafaka.html" class="nav-link">
                                            &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;<i class="far fa-dot-circle nav-icon"></i>
                                            <p>TigoPesa</p>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="pages/tables/nafaka.html" class="nav-link">
                                            &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;<i class="far fa-dot-circle nav-icon"></i>
                                            <p>AirtelMoney</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>


                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- /.content-header -->

        <!-- Main content -->
        <main class="py-4">
            @yield('content')
        </main>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="#">AFARM</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->



<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

</body>
</html>

