
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!--<link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">-->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!--<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">-->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<!--<script src="bower_components/moment/min/moment.min.js"></script>-->
<!--<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>-->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!--<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>-->
<!--<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>-->
<!--<script src="plugins/iCheck/icheck.min.js"></script>-->
<script src="dist/js/adminlte.min.js"></script>


<!--<script src="dist/js/demo.js"></script>-->
</head>
<body class="hold-transition skin-blue  sidebar-mini">

<div class="wrapper">
@include('inc.header')
  <!-- Left side column. contains the logo and sidebar -->
@include('inc.main-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @yield('content-header')

    <!-- Main content -->
   @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('inc.footer')

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>

<!-- Page script -->
<script type="text/javascript">
  $(document).ready(function(){
     $(".msg").fadeTo(2000, 500).slideUp(500, function(){
    $(".msg").slideUp(500);
    });
   
  });
</script>
@yield('jquery')
</body>
</html>
