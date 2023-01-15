<?php session_start(); 


include_once 'database.php';
if (!isset($_SESSION['user'])) {
  # code...
  header('Location:./login.php');
}
?>
<?php


//include_once 'database.php';

?>


<!DOCTYPE html>

<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Dashboard</title>
  <link rel="icon" href="style_files/img/swpu.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="support_files/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="support_files/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="support_files/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="support_files/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="support_files/dist/css/select2.min.css">
  <link rel="stylesheet" href="support_files/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="style_files/css/main_style.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="style_files/css/skins/sidehead_style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
 <?php include_once 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        School
        <small>Overview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> School</a></li>
        <li class="active">Stat</li>
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">

    
       
 <div class="row">
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="statistics-box stat-box1">
            <div class="inner">

            <?php $sql1="SELECT count(*) as a from student"; 
            $result = $conn->query($sql1);

              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<h3>".$row['a']."</h3>";
                  }
                }

            ?>

              
              <p>Total Students</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <!-- <a href="#" class="small-box-footer"> <i class="fa fa-users"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="statistics-box stat-box2">
            <div class="inner">
               <?php $sql2="SELECT count(*) as a from teacher"; 
            $result = $conn->query($sql2);

              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<h3>".$row['a']."</h3>";
                  }
                }

            ?>
              

              <p>Total Teachers</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-circle"></i>
            </div>
          <!--   <a href="#" class="small-box-footer"><i class="fa fa-black-tie"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="statistics-box stat-box3">
            <div class="inner">
              <?php $sql3="SELECT count(*) as a from subject"; 
            $result = $conn->query($sql3);

              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<h3>".$row['a']."</h3>";
                  }
                }

            ?>

              <p>Total Subjects</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <!-- <a href="#" class="small-box-footer"><i class="fa fa-book"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="statistics-box stat-box4">
            <div class="inner">
              <?php $sql4="SELECT count(*) as a from parent"; 
            $result = $conn->query($sql4);

              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<h3>".$row['a']."</h3>";
                  }
                }

            ?>


              <p>Registered Parents</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <!-- <a href="#" class="small-box-footer"> <i class="fa fa-female"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
      </div>
 

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
   
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
   <?php include_once 'footer.php'; ?>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="support_files/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="support_files/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="support_files/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="support_files/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="support_files/dist/js/select2.full.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins_file/timepicker/bootstrap-timepicker.min.js"></script>

<script src="support_files/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins_file/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="support_files/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="style_files/js/main_script.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="style_files/js/demo.js"></script>
<!-- Page script -->



<script>   $('.select2').select2()
  $('#datepicker').datepicker({
      autoclose: true
    });


        
            var r = document.getElementById("stat"); 
            r.className += "active"; 
           
    </script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>